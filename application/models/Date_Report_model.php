<?php
class Date_Report_model extends CI_Model{
    function showData($table){
        $nm="contractor";$select='';$id='';$name='';$contractorname='';$result='';
        //'2019-04-05';//'2019-04-09';//
        $fdate=$this->input->post('fdate');
		$date=$this->input->post('date');
		
		// $fdate='2020-07-13';
		// $date='2020-07-13';
        $this->db->select('id,party,name');
        $this->db->from($table);
        $this->db->order_by('name','ASC');
        $this->db->where('party',$nm);
        $query=$this->db->get();
        $data[]='';$bqry='';
        foreach($query->result() as $row){
            $bid='';$batch='';$asalbidi=0; $chatbidi=0;$abidi=0;$cbidi=0;$totalBiri=0;$tobacco=0;$leaves=0;$bags=0;$tob=0;$lev=0;$ileave=0;$ibag=0;$itob=0;$cleaves=0;$ctobacco=0;$totalTobacco=0;$totalLeaves=0;$qry='';$sum=0;$Tobacco=0;$Leaves=0;$sumT=0;$sumL=0;$cat=0; $cal=0;$ConAdj='';$t=0;$l=0;$stob=0;$slev=0;$sbag=0;$ctob=0;$clev=0;$cbag=0;$consuptionT=0;$consuptionL=0;$batchid=0;$abidis=0;$cbidis=0;$people=array();$ary=0;$fun='';$cbtob=0;$cblev=0;$cbbag=0;
            //'18';//
            $id=$row->id;
            $contractorname=$row->name;
            $prev_date = date('Y-m-d', strtotime($fdate .' -1 day'));
            $fun=$this->getData($id,$prev_date);
            $cbtob=$fun[0]['closingtobacco'];
            $cblev=$fun[0]['closingleaves'];
            $cbbag=$fun[0]['closingbag'];
            //echo json_encode($fun);
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
                $this->db->where('date >= ',$fdate);
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
            //$aryid=$people[0]['sum'];
            //print_r($people);
            $this->db->select('*');
            $this->db->from('batch_master');
            $Select=$this->db->get()->result();
            foreach($Select as $row)
            {   $sum=0;$bsum=0;
                $Tobacco=0;$Leaves=0;$mulTob=0;$mulLev=0;
                $calculation=0;$sql=0; 
                $bid=$row->id;
                $Tobacco=$row->tobacco;
                $Leaves=$row->leaves;
                $this->db->select('sum(asal_bidi) as asal_bidi,sum(chant_bidi_pcs) as chant_bidi_pcs');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('batch1',$bid);
                $this->db->where('date >= ',$fdate);
                $this->db->where('date <= ',$date);
                $select=$this->db->get()->result();
                foreach($select as $row){
                    $bsum=0;
                    $asalbidi=$row->asal_bidi;
                    $chatbidi=$row->chant_bidi_pcs;
                    if($asalbidi != '' && $chatbidi != ''){
                        $abidi=$abidi+$asalbidi;
                        $cbidi=$cbidi+$chatbidi;
                        $sum=$abidi+$cbidi;
                        $bsum=$asalbidi+$chatbidi;
                    }
                    else{
                        $asalbidi=0;$chatbidi=0;
                        $abidi=$abidi+$asalbidi;
                        $cbidi=$cbidi+$chatbidi;
                        $sum=$abidi+$cbidi;
                        $bsum=$asalbidi+$chatbidi;
                    }
                }
                $this->db->select_sum('tobacco');
                $this->db->select_sum('leaves');
                $this->db->from('contractor_master');
                $this->db->where('c_id',$id);
                $this->db->where('batch',$bid);
                $result=$this->db->get()->result();
                foreach($result as $row){
                    $tobacco=$row->tobacco;
                    $leaves=$row->leaves;
                    if($tobacco == null && $leaves == null){
                        $tobacco=0;
                        $leaves=0;
                        $bags=0;
                        $tob=$tob+$tobacco;
                        $lev=$lev+$leaves;
                       // echo " IF: ";
                    }
                    else{
                        $tob=$tob+$tobacco;
                        $lev=$lev+$leaves;
                        $bags=0;//echo " else: ";
                    }
                }
                $this->db->select('sum(tob)as tob,sum(tob_bag) as tob_bag,sum(leaves) as leaves,sum(leaves_bag) as leaves_bag');
                //$this->db->select_sum('chant_bidi_pcs');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('batch2',$bid);
                $this->db->where('date >= ',$fdate);
                $this->db->where('date <= ',$date);
                $qry=$this->db->get()->result();
                foreach($qry as $row){
                    $ctobacco=$row->tob;
                    $cleaves=$row->leaves;
                    $tob_bag=$row->tob_bag;
                    $leaves_bag=$row->leaves_bag;
                    if($ctobacco != null && $tob_bag != null && $cleaves != null && $leaves_bag != null){
                        //echo $this->db->last_query();
                        //echo json_encode($qry);
                        $ileave=$cleaves+$ileave;
                        $itob=$ctobacco+$itob;
                        $ibag=$ibag+$tob_bag+$leaves_bag;
                    }
                    else{
                        $ctobacco=0;$cleaves=0;$tob_bag=0;$leaves_bag=0;
                        $ileave=$cleaves+$ileave;
                        $itob=$ctobacco+$itob;
                        $ibag=$ibag+$tob_bag+$leaves_bag;
                    }
                }
                
                $this->db->select_sum('qty');
                $this->db->from('weekly_adjustment');
                $this->db->where('to_date >=',$fdate);
                $this->db->where('to_date <=',$date);
                $sql=$this->db->get()->row()->qty;
               // echo $sql;
                if($sql == ''){
                    $sql=0;
                    //echo " SQL ". $sql;
                }
                else{
                    $sql=$sql;
                   
                }
                if($people[0]['batchid']== $bid){
                    $calculation= $bsum-$sql;
                }
                else{
                    $calculation= $bsum;
                }
               // echo " Calculation: ".$calculation."</br>";
                $mulTob=$calculation*$Tobacco;
                $mulLev=$calculation*$Leaves;
               // echo " Multiplication T: ".$mulTob."-".$mulLev."</br>";
               // echo " Multiplication L: ".$mulLev;
                $consuptionT=$mulTob+$consuptionT;
                $consuptionL=$mulLev+$consuptionL;
             //   echo " sum consumption T: ".$consuptionT."-".$consuptionL."</br>";
               // echo " Sum: ".$sum." & Tobbaco :".$Tobacco;
               // echo " calculation T ".$consuptionT." calculation L ".$consuptionL;
                $this->db->select_sum('tobacco');
                $this->db->select_sum('leaves');
                $this->db->from('cont_adj');
                $this->db->where('contractor',$id);
                $this->db->where('batch',$bid);
                $this->db->where('date >=',$fdate);
                $this->db->where('date <=',$date);
                $ConAdj=$this->db->get();
                foreach($ConAdj->result() as $row){
                    $t=$row->tobacco;
                    $l=$row->leaves;
                }
                if($t != '' && $l != '' )
                {//echo "IF ";
                    $cat=$cat+$t;
                    $cal=$$cal+$l;
                }
                else{
                   // echo "else ";
                   $t=0;$l=0;
                   $cat=$cat+$t;
                   $cal=$cal+$l;
                }
               // echo" Consuption T: ",$cat." & L: ".$cal;
            }
            
            //echo json_encode($select);
           // if($abidi == 0 && $cbidi == 0){
           //     echo "data if"."</br>";
           // }else{
               // echo "data else"."</br>";
                $totalBiri=$abidi+$cbidi;
                $totalTobacco=$cbtob+$itob;
                $totalLeaves=$cblev+$ileave;
                $totalBag=$cbbag+$ibag;

                $closing_tobacco=$totalTobacco-$consuptionT;
                $closing_tobacco=$closing_tobacco-$stob;

                $closing_leaves=$totalLeaves-$consuptionL;
                $closing_leaves=$closing_leaves-$slev;

                $closing_bag=$totalBag-0;
                $closing_bag=$closing_bag-$sbag;
                
            $data[]=array(
                'contractorname'=>$contractorname,
              'asalbiri'=>number_format(round($abidi,3),3),
              'chatbiri'=>number_format(round($cbidi,3),3),
              'totalBiri'=>number_format(round($totalBiri,3),3),
              'obtob'=>number_format(round($cbtob,3),3),
              'oblev'=>number_format(round($cblev,3),3),
              'obbags'=>number_format(round($cbbag,0),0),
              'itob'=>number_format(round($itob,3),3),
              'ileave'=>number_format(round($ileave,3),3),
              'ibag'=>number_format(round($ibag,0),0),
              'TotalTobbaco'=>number_format(round($totalTobacco,3),3),
              'TotalLeaves'=>number_format(round($totalLeaves,3),3),
              'TotalBag'=>number_format(round($totalBag,0),0),
              'cTob'=>number_format(round($consuptionT,3),3),
              'cLev'=>number_format(round($consuptionL,3),3),
              'cBag'=>'0',//number_format(round($stob,3),3),
              'smTob'=>number_format(round($stob,3),3),
              'smLev'=>number_format(round($slev,3),3),
              'smBag'=>number_format(round($sbag,0),0),
              'closingtobacco'=>number_format(round($closing_tobacco,3),3),
              'closingleaves'=>number_format(round($closing_leaves,3),3),
              'closingbag'=>number_format(round($closing_bag,0),0),
          );
      //  }  
       }
       return $data;
    }
    function getData($id,$date){
        $bid='';$batch='';$asalbidi=0; $chatbidi=0;$abidi=0;$cbidi=0;$totalBiri=0;$tobacco=0;$leaves=0;$bags=0;$tob=0;$lev=0;$ileave=0;$ibag=0;$itob=0;$cleaves=0;$ctobacco=0;$totalTobacco=0;$totalLeaves=0;$qry='';$sum=0;$Tobacco=0;$Leaves=0;$sumT=0;$sumL=0;$cat=0; $cal=0;$ConAdj='';$t=0;$l=0;$stob=0;$slev=0;$sbag=0;$ctob=0;$clev=0;$cbag=0;$consuptionT=0;$consuptionL=0;$batchid=0;$abidis=0;$cbidis=0;$people=array();$ary=0;$fun='';
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
                //$this->db->where('date >= ',$fdate);
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
            //print_r($people); 
            //echo "<br>";
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
            //$aryid=$people[0]['sum'];
            //print_r($people);
            $this->db->select('*');
            $this->db->from('batch_master');
            $Select=$this->db->get()->result();
            foreach($Select as $row)
            {   $sum=0;$bsum=0;
                $Tobacco=0;$Leaves=0;$mulTob=0;$mulLev=0;
                $calculation=0;$sql=0; 
                $bid=$row->id;
                $Tobacco=$row->tobacco;
                $Leaves=$row->leaves;
                $this->db->select('sum(asal_bidi) as asal_bidi,sum(chant_bidi_pcs) as chant_bidi_pcs');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('batch1',$bid);
               // $this->db->where('date >= ',$fdate);
                $this->db->where('date <= ',$date);
                $select=$this->db->get()->result();
                foreach($select as $row){
                    $bsum=0;
                    $asalbidi=$row->asal_bidi;
                    $chatbidi=$row->chant_bidi_pcs;
                    if($asalbidi != '' && $chatbidi != ''){
                        $abidi=$abidi+$asalbidi;
                        $cbidi=$cbidi+$chatbidi;
                        $sum=$abidi+$cbidi;
                        $bsum=$asalbidi+$chatbidi;
                    }
                    else{
                        $asalbidi=0;$chatbidi=0;
                        $abidi=$abidi+$asalbidi;
                        $cbidi=$cbidi+$chatbidi;
                        $sum=$abidi+$cbidi;
                        $bsum=$asalbidi+$chatbidi;
                    }
                }
                $this->db->select_sum('tobacco');
                $this->db->select_sum('leaves');
                $this->db->from('contractor_master');
                $this->db->where('c_id',$id);
                $this->db->where('batch',$bid);
                $result=$this->db->get()->result();
                foreach($result as $row){
                    $tobacco=$row->tobacco;
                    $leaves=$row->leaves;
                    if($tobacco == null && $leaves == null){
                        $tobacco=0;
                        $leaves=0;
                        $bags=0;
                        $tob=$tob+$tobacco;
                        $lev=$lev+$leaves;
                       // echo " IF: ";
                    }
                    else{
                        $tob=$tob+$tobacco;
                        $lev=$lev+$leaves;
                        $bags=0;//echo " else: ";
                    }
                }
                $this->db->select('sum(tob)as tob,sum(tob_bag) as tob_bag,sum(leaves) as leaves,sum(leaves_bag) as leaves_bag');
                //$this->db->select_sum('chant_bidi_pcs');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('batch2',$bid);
                //$this->db->where('date >= ',$fdate);
                $this->db->where('date <= ',$date);
                $qry=$this->db->get()->result();
                foreach($qry as $row){
                    $ctobacco=$row->tob;
                    $cleaves=$row->leaves;
                    $tob_bag=$row->tob_bag;
                    $leaves_bag=$row->leaves_bag;
                    if($ctobacco != null && $tob_bag != null && $cleaves != null && $leaves_bag != null){
                        //echo $this->db->last_query();
                        //echo json_encode($qry);
                        $ileave=$cleaves+$ileave;
                        $itob=$ctobacco+$itob;
                        $ibag=$ibag+$tob_bag+$leaves_bag;
                    }
                    else{
                        $ctobacco=0;$cleaves=0;$tob_bag=0;$leaves_bag=0;
                        $ileave=$cleaves+$ileave;
                        $itob=$ctobacco+$itob;
                        $ibag=$ibag+$tob_bag+$leaves_bag;
                    }
                }
                
                $this->db->select_sum('qty');
                $this->db->from('weekly_adjustment');
             //   $this->db->where('to_date >=',$fdate);
                $this->db->where('to_date <=',$date);
                $sql=$this->db->get()->row()->qty;
               // echo $sql;
                if($sql == ''){
                    $sql=0;
                    //echo " SQL ". $sql;
                }
                else{
                    $sql=$sql;
                   
                }
                if($people[0]['batchid']== $bid){
                    $calculation= $bsum-$sql;
                }
                else{
                    $calculation= $bsum;
                }
               // echo " Calculation: ".$calculation."</br>";
                $mulTob=$calculation*$Tobacco;
                $mulLev=$calculation*$Leaves;
               // echo " Multiplication T: ".$mulTob."-".$mulLev."</br>";
               // echo " Multiplication L: ".$mulLev;
                $consuptionT=$mulTob+$consuptionT;
                $consuptionL=$mulLev+$consuptionL;
             //   echo " sum consumption T: ".$consuptionT."-".$consuptionL."</br>";
               // echo " Sum: ".$sum." & Tobbaco :".$Tobacco;
               // echo " calculation T ".$consuptionT." calculation L ".$consuptionL;
                $this->db->select_sum('tobacco');
                $this->db->select_sum('leaves');
                $this->db->from('cont_adj');
                $this->db->where('contractor',$id);
                $this->db->where('batch',$bid);
              //  $this->db->where('date >=',$fdate);
                $this->db->where('date <=',$date);
                $ConAdj=$this->db->get();
                foreach($ConAdj->result() as $row){
                    $t=$row->tobacco;
                    $l=$row->leaves;
				}
				
                if($t != '' && $l != '' )
                {//echo "IF ";
                    $cat=$cat+$t;
                    $cal=$cal+$l;
                }
                else{
                   // echo "else ";
                   $t=0;$l=0;
                   $cat=$cat+$t;
                   $cal=$cal+$l;
                }
               // echo" Consuption T: ",$cat." & L: ".$cal;
            }
            
            //echo json_encode($select);
           // if($abidi == 0 && $cbidi == 0){
           //     echo "data if"."</br>";
           // }else{
               // echo "data else"."</br>";
                $totalBiri=$abidi+$cbidi;
                $totalTobacco=$tob+$itob;
                $totalLeaves=$lev+$ileave;
                $totalBag=$bags+$ibag;

                $closing_tobacco=$totalTobacco-$consuptionT;
                $closing_tobacco=$closing_tobacco-$stob;

                $closing_leaves=$totalLeaves-$consuptionL;
                $closing_leaves=$closing_leaves-$slev;

                $closing_bag=$totalBag-0;
                $closing_bag=$closing_bag-$sbag;
                
            $data[]=array(
           
              'closingtobacco'=>number_format(round($closing_tobacco,3),3),
              'closingleaves'=>number_format(round($closing_leaves,3),3),
              'closingbag'=>number_format(round($closing_bag,0),0),
          );
          return $data;
    }
}
?>
