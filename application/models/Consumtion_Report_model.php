<?php
class Consumtion_Report_model extends CI_Model
{
    function showData($table)
    {
        $id = '';
        $sql = '';
        $name = '';
        $tob = 0;
        $lev = 0;
        $bly = 0;
        $why = 0;
        $fil = 0;
        $query = '';
        $fdate = $this->input->post('fdate');
		$tdate = $this->input->post('tdate');
		$fdate='2020-04-01';
		$tdate='2020-06-30';
        $qry = '';
        $data = array();
        $this->db->select('*');
        $this->db->from('batch_master');
        $qry = $this->db->get()->result();
        if ($qry != null) {
            foreach ($qry as $row) {
                $asbiri = 0;
                $dt = '';
                $chbiri = 0;
                $sum = 0;
                $lq = 0;
                $tq = 0;
                $bq = 0;
                $wq = 0;
                $filter = 0;
                $bct = '';
                //'2'; //'0.280'; //'0.750'; //'0.0083'; //'0.0044'; //'0.000'; //
                $bid = $row->id;
                $name = $row->batch;
                $tob = $row->tobacco;
                $lev = $row->leaves;
                $bly = $row->bl_sutta;
                $why = $row->wh_sutta;
                $fil = $row->filter;
                $this->db->select('date ,SUM(asal_bidi) as asal_bidi, sum(chant_bidi_pcs) as chant_bidi_pcs');
                $this->db->from('cont_issue_receive');
                $this->db->where('batch1', $bid);
               // $this->db->order_by('date', 'ASC');
                $this->db->group_by('date');
                $this->db->where('date >=', $fdate);
                $this->db->where('date <=', $tdate);
                $query = $this->db->get()->result();
                if ($query != null) {
                    foreach ($query as $row) {
                        $bct = $name . " - L-" . $lev . " / T-" . $tob. " / B-" . $bly. " / W-" . $why. " / F-" . $fil;
                        $dt = $row->date;
                        $asbiri = $row->asal_bidi;
                        $chbiri = $row->chant_bidi_pcs;
                        $sum = $asbiri + $chbiri;
                        $lq = $sum * $lev;
                        $tq = $sum * $tob;
                        $bq = $sum * $bly;
                        $wq = $sum * $why;
                        $filter = $sum * $fil;
                        //echo $tq."<br>Black ".$bq."<br>white ".$wq."<br>filter ".$fil."<br>";
                        $data[] = array(
                            'date' => $dt,
                            'batch' => $bct,
                            'netbiri' => round($sum, 3),
                            'leaves' => round($lq, 3),
                            'tobacco' => round($tq, 3),
                            'blackyarn' => round($bq, 3),
                            'whiteyarn' => round($wq, 3),
                            'filter' => round($filter, 3)
                        );
						$sum=0;$asbiri = 0;
                
                $chbiri = 0;
                    }
                    //echo json_encode($data).$bid."<br>";
                }
            }
        }
        return $data;
        // return $data;
    }

    function getbatch($table)
    {
        $tdate = $this->input->post('tdate');
        $fdate = $this->input->post('fdate');
        $this->db->select('*');
        $this->db->from('batch_master');
        $qry = $this->db->get()->result();
        if ($qry != null) {
            foreach ($qry as $row) {
                $asbiri = 0;
                $dt = '';
                $chbiri = 0;
                $sum = 0;
                $lq = 0;
                $tq = 0;
                $bq = 0;
                $wq = 0;
                $fil = 0;
                $bct = '';
                $bid = $row->id;
                $name = $row->batch;
                $tob = $row->tobacco;
                $lev = $row->leaves;
                $bly = $row->bl_sutta;
                $why = $row->wh_sutta;
                $fil = $row->filter;
                $this->db->select('SUM(asal_bidi) as asal_bidi, sum(chant_bidi_pcs) as chant_bidi_pcs');
                $this->db->from('cont_issue_receive');
                $this->db->where('batch1', $bid);
                
                $this->db->where('date >=', $fdate);
                $this->db->where('date <=', $tdate);
                $query = $this->db->get()->result();
			//	$this->db->order_by('date');
				
                if ($query != null) {
					foreach ($query as $row) {
						 
                    $asbiri = $row->asal_bidi;
                     $chbiri = $row->chant_bidi_pcs;
                    $sum = $asbiri + $chbiri;
                    $bct = $name . " - L-" . $lev . " / T-" . $tob. " / B-" . $bly. " / W-" . $why. " / F-" . $fil;
                    $lq = $sum * $lev;
                    $tq = $sum * $tob;
                    $bq = $sum * $bly;
                    $wq = $sum * $why;
                    $fil =$sum * $fil;
                    $data[] = array(
                        'bat' => $bct,
                        'sumnetbiri' => round($sum, 3),
                        'sumleaves' => round($lq, 3),
                        'sumtobacco' => round($tq, 3),
                        'sumblackyarn' => round($bq, 3),
                        'sumwhiteyarn' => round($wq, 3),
                        'sumfilter' => round($fil, 3)
                    );
					$asbiri = 0;
                $sum=0;
                $chbiri = 0;
                }
			}
            }
        }

        // $this->db->select('batch_master.batch,SUM(cont_issue_receive.tob)as tob,sum(cont_issue_receive.tob_bag)as tob_bag,sum(cont_issue_receive.leaves)as leaves,SUM(cont_issue_receive.leaves_bag) as leaves_bag, sum(cont_issue_receive.bl_yarn)as bl_yarn,sum(cont_issue_receive.wh_yarn) as wh_yarn,sum(cont_issue_receive.filter)as filter,sum(cont_issue_receive.disc)as disc,SUM(cont_issue_receive.cartons)as cartons');
        // $this->db->group_by('cont_issue_receive.batch1');
        // $this->db->order_by('batch_master.batch', 'DESC');
        // $this->db->from('cont_issue_receive');
        // $this->db->join('batch_master', 'batch_master.id=cont_issue_receive.batch1');
        // $this->db->where('date >=', $fdate);
        // $this->db->where('date <=', $tdate);
        // $query = $this->db->get()->result();
        // // echo $this->db->last_query();
        return $data;
    }
}
//SUM(cont_issue_receive.asal_bidi)as asal_bidi,sum(cont_issue_receive.chant_bidi_pcs)as chant_bidi_pcs,SUM(cont_issue_receive.chant_bidi_kgs)as chant_bidi_kgs,
