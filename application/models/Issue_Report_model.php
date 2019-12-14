<?php
class Issue_Report_model extends CI_Model
{
	function setDate($table)
    {	$fsdate='';
		$this->db->select('fsdate');
        $this->db->from($table);
		$qry = $this->db->get()->result();
		foreach ($qry as $row) {
			$fsdate = $row->fsdate;
		}
		return $fsdate;
	}
    function showData($table)
    {
        $id = '';
        $sql = '';
        $name = '';
        //'2019-04-01'; //'2019-04-30'; //
        $fdate = $this->input->post('fdate');
        $tdate = $this->input->post('tdate');
		//$fdate = '2019-04-01';
       // $tdate = '2019-06-07';
        $qry = '';
        $data = array();
        $this->db->select('*');
        $this->db->from($table);
		 $this->db->order_by('name', 'ASC');
        $qry = $this->db->get()->result();
        foreach ($qry as $row) {
            $bid = '';
            $batch = '';
            $sql = '';
            $other = '0';
            $tob = 0;
            $tob_bag = 0;
            $leaves = 0;
            $leaves_bag = 0;
            $bl_yarn = 0;
            $wh_yarn = 0;
            $filter = 0;
            $disc = 0;

            $id = $row->id; //'18';
            $name = $row->name;
            $this->db->select('batch_master.batch,cont_issue_receive.batch2, cont_issue_receive.cont_name, sum(cont_issue_receive.tob) as tob ,sum(cont_issue_receive.tob_bag) as tob_bag,sum(cont_issue_receive.leaves) as leaves,sum(cont_issue_receive.leaves_bag) as leaves_bag,sum(cont_issue_receive.bl_yarn) as bl_yarn,sum(cont_issue_receive.wh_yarn) as wh_yarn,sum(cont_issue_receive.filter) as filter,sum(cont_issue_receive.disc) as disc,sum(cont_issue_receive.cartons) as other ');
            $this->db->from('cont_issue_receive');
            $this->db->join('batch_master', 'batch_master.id=cont_issue_receive.batch2');
            $this->db->group_by('cont_issue_receive.batch2');
            $this->db->where('cont_issue_receive.cont_name', $id);
            $this->db->where('cont_issue_receive.date >=', $fdate);
            $this->db->where('cont_issue_receive.date <=', $tdate);
            $query = $this->db->get()->result();
            //echo $this->db->last_query();
            if ($query != null) {
                foreach ($query as $row) {
                    $batch = $row->batch;
                    $tob = $row->tob;
                    $tob_bag = $row->tob_bag;
                    $leaves = $row->leaves;
                    $leaves_bag = $row->leaves_bag;
                    $bl_yarn = $row->bl_yarn;
                    $wh_yarn = $row->wh_yarn;
                    $filter = $row->filter;
                    $disc = $row->disc;
                    $other = $row->other;
                    //if($tob != '0' && $tob_bag != '0' && $leaves != '0' && $leaves_bag != '0' && $bl_yarn != '0' && $wh_yarn != '0' && $filter != '0' ){
                    $data[] = array(
                        'id' => $id,
                        'contractor' => $name,
                        'batch' => $batch,
                        'tobacco' => $tob,
                        'tob_bag' => $tob_bag,
                        'leaves' => $leaves,
                        'leaves_bag' => $leaves_bag,
                        'bl_yarn' => $bl_yarn,
                        'wh_yarn' => $wh_yarn,
                        'filter' => $filter,
                        'disc' => $disc,
                        'other' => $other,
                    );
                    //  }
                }
            }

            // echo json_encode($data);
        }
        return $data;
    }

    function getbatch($table)
    {
        // '2019-04-03';//'2019-04-30'; //
        $tdate = $this->input->post('tdate');
        $where=$this->input->post('where');
        $this->db->select('batch_master.batch,SUM(cont_issue_receive.tob)as tob,sum(cont_issue_receive.tob_bag)as tob_bag,sum(cont_issue_receive.leaves)as leaves,SUM(cont_issue_receive.leaves_bag) as leaves_bag, sum(cont_issue_receive.bl_yarn)as bl_yarn,sum(cont_issue_receive.wh_yarn) as wh_yarn,sum(cont_issue_receive.filter)as filter,sum(cont_issue_receive.disc)as disc,SUM(cont_issue_receive.cartons)as cartons');
        $this->db->group_by('batch_master.batch');
        $this->db->order_by('batch_master.batch', 'DESC');
        $this->db->from('cont_issue_receive');
        $this->db->join('batch_master', 'batch_master.id=cont_issue_receive.batch1');
        $this->db->where('date >=', $where);
        $this->db->where('date <=', $tdate);
        $query = $this->db->get()->result();
        return $query;
    }
}
//SUM(cont_issue_receive.asal_bidi)as asal_bidi,sum(cont_issue_receive.chant_bidi_pcs)as chant_bidi_pcs,SUM(cont_issue_receive.chant_bidi_kgs)as chant_bidi_kgs,
