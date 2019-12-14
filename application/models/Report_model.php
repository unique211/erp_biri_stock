<?php
class Report_model extends CI_Model{
    function showData($table){
        $table="con-party_master";
        $nm="contractor";
        $date="2019-04-01";//$this->input->post('date');
        $this->db->select('id,party,name');
        $this->db->from($table);
        $this->db->order_by('name','ASC');
        $this->db->where('party',$nm);
        $query=$this->db->get()->result();
        //echo json_encode($query);
           
        foreach($query as $row){
        
            $fun='';
            $sqlQry='';$btob=0; $blev=0;$select='';$abidi=0;$sum=0; $sortArray = array();$people=array();$myarray=array();
            $bby=0;$bwy=0;$bfil=0;$bqty=0;$tqty=0;$contractorname='';$batchqry='';
            $data[]='';$id='';$name='';$cid='';$batch='';$bname='';$tobacco='';$leaves='';$batchid=0;$batchname='';
            $blackYarn='';$whiteYarn='';$filter='';$totL=0;$totT=0;$totB=0;$totW=0;$totF=0;$res='';$data1='';$con=0;
            $tob=0;$leav=0;$bl_yarn=0;$wh_yarn=0;$fil=0;$batch2='';$res='';$qry='';$sql='';$asbidi=0;$cbidi=0;$b='';
            $totalbidi=0;$totalTob=0;$totalLev=0;$totalBY=0;$totalWY=0;$totalFil=0; $asb=0;$get=0;$totalTobacco=0;$totalLeaves=0;$abidis=0;$cbidis=0;$asal=0;$chat=0;
            $TT=0;$TL=0;$TBY=0;$TWY=0;$TF=0;$ConAdj='';$bach=0;$l=0;$t=0;$by=0;$wy=0;$f=0;$cat=0;$cal=0;$caby=0;$cawy=0;$caf=0;
            //'5-BABLU KUMAR';//'18';//'1-ANATH KUMAR';//
            $id=$row->id;
            $contractorname=$row->name;
            //echo $fun;
            $this->db->select('*');
            $this->db->from('batch_master');
            $bqry=$this->db->get()->result();
            foreach($bqry as $row)
            {
                $batchid=$row->id;
                $this->db->select('sum(asal_bidi) as asal_bidi,sum(chant_bidi_pcs) as chant_bidi_pcs');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('batch1',$batchid);
                $this->db->where('date <= ',$date);
                $select=$this->db->get()->result();
                foreach($select as $row){
                    $bsum=0;
                    $asal=$row->asal_bidi;
                    $chat=$row->chant_bidi_pcs;
                    if($asal != '' && $chat != ''){
                        $abidis=$abidis+$asal;
                        $cbidis=$cbidis+$chat;
                        $sum=$abidi+$cbidis;
                        $bsum=$asal+$chat;
                    }
                    else{
                        $asal=0;$chat=0;
                        $abidis=$abidis+$asal;
                        $cbidis=$cbidis+$chat;
                        $sum=$abidis+$cbidis;
                        $bsum=$asal+$chat;
                    }
                    $myarray=array('batchid'=>$batchid,
                    'sum'=>$bsum);
                }
                array_push($people,$myarray);
            } 
            $sortArray = array(); 
            foreach($people as $person){ 
                foreach($person as $key=>$value){ 
                    if(!isset($sortArray[$key])){ 
                        $sortArray[$key] = array(); 
                    } 
                    $sortArray[$key][] = $value; 
                } 
            } 
            $orderby = "sum"; //change this to whatever key you want from the array 
            array_multisort($sortArray[$orderby],SORT_DESC,$people); 
            $ary=$people[0]['sum'];
            $this->db->select('*');
            $this->db->from('batch_master');
            $batchqry=$this->db->get()->result(); //echo json_encode($batchqry);
            foreach($batchqry as $row){
                $bid=$row->id;
                $batch_name=$row->batch;
                $btob=$row->tobacco;
                $blev=$row->leaves;
                $bby=$row->bl_sutta;
                $bwy=$row->wh_sutta;
                $bfil=$row->filter;
                $this->db->select('contractor_master.batch,sum(tobacco) as tobacco,sum(leaves) as leaves,sum(blackYarn) as blackYarn,sum(whiteYarn) as whiteYarn,sum(filter) as filter,contractor_master.c_id');
                $this->db->group_by('batch');
                $this->db->order_by('id ASC');
                $this->db->where('contractor_master.c_id',$id);
                $this->db->where('contractor_master.batch',$bid);
                $this->db->from('contractor_master');
                $result=$this->db->get()->result();
                if($result != null ){
                    foreach($result as $row){
                        $tobacco=$row->tobacco;
                        $leaves=$row->leaves;
                        $blackYarn=$row->blackYarn;
                        $whiteYarn=$row->whiteYarn;
                        $filter=$row->filter;
                    }
                }
                else{
                    $tobacco=0;
                    $leaves=0;
                    $blackYarn=0;
                    $whiteYarn=0;
                    $filter=0;
                }   
                    $this->db->select('cont_issue_receive.batch2,batch_master.batch as batchnm,sum(cont_issue_receive.tob) as tob,sum(cont_issue_receive.leaves) as lev,sum(cont_issue_receive.bl_yarn) as bl_yarn,sum(cont_issue_receive.wh_yarn) as wh_yarn ,sum(cont_issue_receive.filter) as fil');
                    $this->db->group_by('batch2');
                    $this->db->from('cont_issue_receive');
                    $this->db->join('batch_master','batch_master.id=cont_issue_receive.batch2');
                    $this->db->where('date <=',$date);
                    $this->db->where('batch2',$bid);
                    $this->db->where('cont_name',$id);
                    $res=$this->db->get()->result();//
                    //echo $this->db->last_query();//
                    if($res != null){
                        foreach($res as $row){
                            $tob=$row->tob;
                            $leav=$row->lev;
                            $bl_yarn=$row->bl_yarn;
                            $wh_yarn=$row->wh_yarn;
                            $fil=$row->fil;
                        }
                    }
                    else{
                        $tob=0;
                        $leav=0;
                        $bl_yarn=0;
                        $wh_yarn=0;
                        $fil=0;
                    }
                    $totT=$tobacco+$tob;
                    $totL=$leaves+$leav;
                    $totB=$blackYarn+$bl_yarn;
                    $totW=$whiteYarn+$wh_yarn;
                    $totF=$filter+$fil;
                    $this->db->select('batch1,sum(asal_bidi) as asal_bidi,sum(chant_bidi_pcs) as chant_bidi_pcs');
                    $this->db->from('cont_issue_receive');
                    $this->db->where('date <=',$date);
                    $this->db->where('batch1',$bid);
                    $this->db->where('cont_name',$id);
                    $qry=$this->db->get();
                    foreach($qry->result() as $row){
                        $asbidi=$row->asal_bidi;
                        $cbidi=$row->chant_bidi_pcs;
                        $b=$row->batch1;
                    }
                    if($asbidi != '' && $cbidi != ''){
                        $this->db->select('count(cont_name) cont_name');
                        $this->db->from('cont_issue_receive');
                        $this->db->where('cont_name',$id);
                        $this->db->where('date <=',$date);
                        $con=$this->db->get()->row()->cont_name;
                    }
                    else{
                        $asbidi=0;
                        $cbidi=0;
                    }
                    $totalbidi=$asbidi+$cbidi;
                    $this->db->select_sum('qty');
                    $this->db->from('weekly_adjustment');
                    $this->db->where('to_date <=',$date);
                    $sql=$this->db->get()->row()->qty;
                    if($sql != ''){
                        $sql=$sql;
                    }
                    else{
                        $sql=0;
                    }
                    if($people[0]['batchid'] == $bid)
                    {
                        $asb=$totalbidi - $sql;
                    }
                    else{
                        $asb=$totalbidi;
                    }
                    $totalTob=$asb*$btob;
                    $totalLev=$asb*$blev;
                    $totalBY=$asb*$bby;
                    $totalWY=$asb*$bwy;
                    $totalFil=$asb*$bfil;
                    $TT=$totT-$totalTob;
                    $TL=$totL-$totalLev;
                    $TBY=$totB-$totalBY;
                    $TWY=$totW-$totalWY;
                    $TF=$totF-$totalFil;
                    $this->db->select('*');
                    $this->db->from('cont_adj');
                    $this->db->where('contractor',$id);
                    $this->db->where('batch',$bid);
                    $this->db->where('date <=',$date);
                    $ConAdj=$this->db->get();
                    foreach($ConAdj->result() as $row){
                    $t=$row->tobacco;
                    $l=$row->leaves;
                    $by=$row->bl_yarn;
                    $wy=$row->wh_yarn;
                    $f=$row->filter;
                }
                if($t != '' && $l != '' && $by != '' && $wy != '' && $f != '')
                {
                    $cat=$TT-$t;
                    $cal=$TL-$l;
                    $caby=$TBY-$by;
                    $cawy=$TWY-$wy;
                    $caf=$TF-$f;
                }
                else{
                    $cat=$TT-0;
                    $cal=$TL-0;
                    $caby=$TBY-0;
                    $cawy=$TWY-0;
                    $caf=$TF-0;
                }
                $this->db->select('sum(b_qty) as b_qty,sum(t_qty) as t_qty');
                $this->db->from('raw_item');
                $this->db->where('date <=',$date);
                $this->db->where('t_from',$id);
                $this->db->where('batch1',$bid);
                $get=$this->db->get();
                foreach($get->result() as $row){
                    $b_qty=$row->b_qty;
                    $t_qty=$row->t_qty;
                }
                $this->db->select_sum('b_qty');
                $this->db->select_sum('t_qty');
                $this->db->from('raw_item');
                $this->db->where('date <=',$date);
                $this->db->where('t_to',$id);
                $this->db->where('batch2',$bid);
                $get=$this->db->get();
                foreach($get->result() as $row){
                    $bqty=$row->b_qty;
                    $tqty=$row->t_qty; 
                }
                if($b_qty =='' && $t_qty == '' && $bqty == '' && $tqty == ''){
                    $totalTobacco=0;$totalLeaves=0;
                    $totalTobacco=$totalTobacco+$cat;
                    $totalLeaves=$totalLeaves+$cal;
                }
                elseif ($b_qty != '' && $t_qty != ''){
                    $totalTobacco=$cat-$t_qty;
                    $totalLeaves=$cal-$b_qty;
                }
                elseif($bqty != '' && $tqty != ''){
                    $totalTobacco=$cat+$t_qty;
                    $totalLeaves=$cal+$b_qty;    
                }
                if($totalTobacco == 0 && $totalLeaves ==0 && $caby ==0 && $cawy ==0 && $caf == 0)  {
                }
                else{
                    $data[]=array(
                        'bname'=>$contractorname,
                        'count'=>$con,
                        'name'=>array(
                            'batch'=>$bid,
                            'cid'=>$id,
                            'batchName'=>$batch_name,
                            'tobacco'=>number_format(round($totalTobacco,3),3),
                            'leaves'=>number_format(round($totalLeaves,3),3),
                            'black_yarn'=>number_format(round($caby,3),3),
                            'white_yarn'=>number_format(round($cawy,3),3),
                            'filter'=>number_format(round($caf,3),3)
                        )                        
                    );   
                }
            }
        }
        return $data;
    }
    
}

?>