<?php
class Recieved_Report_model extends CI_Model
{
    function showData($table)
    {
        $id = '';
        $sql = '';
        $name = '';
        //
        // $bt = '1';//$this->input->post('batch');
        // $where = '2';//$this->input->post('where');
        // $fdate = '2019-04-01'; //$this->input->post('fdate');
        // $tdate = '2019-04-30'; //$this->input->post('tdate');
		
		$bt =$this->input->post('batch');
        $where =$this->input->post('where');
        $fdate =$this->input->post('fdate');
        $tdate =$this->input->post('tdate');
		
        $qry = '';
        $data[] = '';
        $this->db->select('*');
        $this->db->from($table);
		$this->db->order_by('name', 'ASC');
        $qry = $this->db->get()->result();
        foreach ($qry as $row) {
            $bid = '';
            $batch = '';
            $sql = '';
            $other = '0';
            $asal_bidi = 0;
            $chant_bidi_pcs = 0;
            $chant_bidi_kgs = 0;
            $wages=0;
            $id = $row->id; //'18';
            $name = $row->name;
            $this->db->select('wages_fixation.name as wages,batch_master.batch,cont_issue_receive.batch1, cont_issue_receive.cont_name, sum(cont_issue_receive.asal_bidi) as asal_bidi ,sum(cont_issue_receive.chant_bidi_pcs) as chant_bidi_pcs,sum(cont_issue_receive.chant_bidi_kgs) as chant_bidi_kgs');
            $this->db->from('cont_issue_receive');
            $this->db->join('batch_master', 'batch_master.id=cont_issue_receive.batch1');
            $this->db->join('wages_fixation', 'wages_fixation.id=cont_issue_receive.wages');
            $this->db->group_by('cont_issue_receive.batch2');
            $this->db->where('cont_issue_receive.cont_name', $id);
			if($bt != null){
				$this->db->where('cont_issue_receive.batch1', $bt);
			}
			if($where != null){
				$this->db->where('cont_issue_receive.wages', $where);
			}
            $this->db->where('cont_issue_receive.date >=', $fdate);
            $this->db->where('cont_issue_receive.date <=', $tdate);
            $query = $this->db->get()->result();
            //echo $this->db->last_query();
            if ($query != null) {
                foreach ($query as $row) {
                    $batch = $row->batch;
                    $asal_bidi = $row->asal_bidi;
                    $chant_bidi_pcs = $row->chant_bidi_pcs;
                    $chant_bidi_kgs = $row->chant_bidi_kgs;
                    $wages = $row->wages;
                    //if($tob != '0' && $tob_bag != '0' && $leaves != '0' && $leaves_bag != '0' && $bl_yarn != '0' && $wh_yarn != '0' && $filter != '0' ){
                    $data[] = array(
                        'id' => $id,
                        'contractor' => $name,
                        'batch' => $batch,
                        'asal_bidi' => $asal_bidi,
                        'chant_bidi_pcs' => $chant_bidi_pcs,
                        'chant_bidi_kgs' => $chant_bidi_kgs,
                        'wages' => $wages,
                       
                    );
                    //  }
                }
            }

            // echo json_encode($data);
        }
        return $data;
    }

    function getbatch($table, $fdate)
    { 
        $where = $this->input->post('where');
        $batch = $this->input->post('batch');
        $tdate = $this->input->post('tdate');
        $fdate = $this->input->post('fdate');
        $this->db->select('batch_master.batch,SUM(cont_issue_receive.asal_bidi)as asal_bidi,sum(cont_issue_receive.chant_bidi_pcs)as chant_bidi_pcs,sum(cont_issue_receive.chant_bidi_kgs)as chant_bidi_kgs');
        $this->db->group_by('batch_master.batch');
        $this->db->order_by('batch_master.batch', 'DESC');
        $this->db->from('cont_issue_receive');
        $this->db->join('batch_master', 'batch_master.id=cont_issue_receive.batch1');
		 $this->db->join('wages_fixation', 'wages_fixation.id=cont_issue_receive.wages');
        $this->db->where('cont_issue_receive.date >=', $fdate);
        $this->db->where('cont_issue_receive.date <=', $tdate);
		if($batch != null){
			$this->db->where('cont_issue_receive.batch1', $batch );
		}
		if($where != null){
			$this->db->where('cont_issue_receive.wages', $where );
		}
        $query = $this->db->get()->result();
        return $query;
    }
}
//SUM(cont_issue_receive.asal_bidi)as asal_bidi,sum(cont_issue_receive.chant_bidi_pcs)as chant_bidi_pcs,SUM(cont_issue_receive.chant_bidi_kgs)as chant_bidi_kgs,
