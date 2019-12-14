<?php
class Con_sheet_model extends CI_Model{
    function showData($table){
        $query='';$id='';$contractorname=''; $data=array();$result='';
        $nm="contractor";
        //'withoutdeduction';//'2019-04-01';//'2019-04-05';//
        $fdate=$this->input->post('fdate');'withdeduction';//
        $date=$this->input->post('date');
        $where=$this->input->post('where');
        if($where == 'withoutdeduction'){
            $this->db->select('id,party,name');
            $this->db->from($table);
            $this->db->order_by('name','ASC');
            $this->db->where('party',$nm);
            $query=$this->db->get()->result();
            //echo json_encode($query);
            foreach($query as $row){
                $asalbidi=0;$chatbidikg=0;$wg=0;$fromwages='';$wages=0;$mulwages=0;$bonus=0;$mulbonus=0;$sumofbounas=0;$sum=0;$handling=0;$sumofhand=0;$mulhand=0;$chatbiri=0;$sumofadition=0;$muladdition=0;$sumofasbWg=0;$selectsum=0;
                $GrossTotal=0;$getval=0;$sumasbchat=0;$contract='';
                //'16';//'1-ANATH KUMAR';//
                $id=$row->id;
                $contractorname=$row->name;
                $this->db->select_sum('asal_bidi');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('date >=',$fdate);
                $this->db->where('date <=',$date);
                $selectsum=$this->db->get()->row()->asal_bidi;
                //echo $this->db->last_query();
                //echo $contractorname." --------->".$selectsum." <br>";
                $this->db->select('*');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('date >=',$fdate);
                $this->db->where('date <=',$date);
                $result=$this->db->get()->result();
                foreach($result as $row){
                    $asalbidi=$row->asal_bidi;
                    $chatbidikg=$row->chant_bidi_kgs;
                    $wg=$row->wages;
                    $this->db->select('*');
                    $this->db->from('wages_fixation');
                    $this->db->where('id',$wg);
                    //$this->db->where('com_date >=',$fdate);
                    //$this->db->where('com_date <=',$date);
                    $fromwages=$this->db->get()->result();
                    //echo json_encode($fromwages);
                    if($fromwages != null){
                        //echo "IF:";
                        foreach($fromwages as $row){
                            $wages=$row->wages;
                            $bonus=$row->bonus;
                            $handling=$row->handling;
                            $chatbiri=$row->chat_biri;
                        }
                    }
                    else{
                        $wages=0;
                        $bonus=0;
                        $handling=0;
                        $chatbiri=0;
                    }
                    $mulwages=$wages*$asalbidi;
                    $mulbonus=$bonus*$asalbidi;
                    $mulhand=$handling*$asalbidi;
                    $muladdition=$chatbiri*$chatbidikg;
                    $sumofasbWg=$sumofasbWg+$mulwages;
                    $sumofbounas=$sumofbounas+$mulbonus;
                    $sum=$sumofasbWg+$sumofbounas;
                    $sumofhand=$sumofhand+$mulhand;
                    $sumofadition=$sumofadition+$muladdition;
                    $GrossTotal=round($selectsum,3)+round($sumofasbWg,2)+round($sumofbounas,2)+round($sumofhand,2)+round($sumofadition,2);
                }
                if($selectsum != ''){
                    $data[]=array(
                        'name'=>$contractorname,
                        'netbiri'=>number_format(round($selectsum,3),3),
                        'wages'=>number_format(round($sumofasbWg,2),2),
                        'bonus'=>number_format(round($sumofbounas,2),2),
                        'handlingcharges'=>number_format(round($sumofhand,2),2),
                        'addition'=>number_format(round($sumofadition,2),2),
                        'grossTotal'=>number_format(round($GrossTotal,2),2)
                    );
                }
                else{
                }
            }
            return $data;
        }
        else{// if($where == 'withdeduction')
           // echo "from else";
            $this->db->select('id,party,name');
            $this->db->from($table);
            $this->db->order_by('name','ASC');
            $this->db->where('party',$nm);
            $query=$this->db->get()->result();
            //echo json_encode($query);
            foreach($query as $row){
                $asalbidi=0;$chatbidikg=0;$wg=0;$fromwages='';$wages=0;$mulwages=0;$bonus=0;$mulbonus=0;$sumofbounas=0;$sum=0;$handling=0;$sumofhand=0;$mulhand=0;$chatbiri=0;$sumofadition=0;$muladdition=0;$sumofasbWg=0;$selectsum=0;
                $GrossTotal=0;$conadjust='';$tobAmt=0;$levAmt=0;$blAmt=0;$whAmt=0;$filAmt=0;$tob_bag=0;$disc=0;$other=0;$bid=0;$raemaster=0; $tbag=0;$dise=0;$muldise=0;$mulTob=0;$sumtob=0;$sumDise=0;$tobweight=0;$tobaccoval=0;$sumTsort=0;$tsort=0;$tval=0;$mul=0;$sumasbchat=0;$sumopfTsort=0;$amount=0;$tds='';$pf='';$TDS=0;$PF=0;$sumPf=0;$mulpf=0;$sumTds=0;$multds=0;$netTotal=0;
                //'16';//'1-ANATH KUMAR';//
                $id=$row->id;
                $contractorname=$row->name;
                $this->db->select_sum('asal_bidi');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('date >=',$fdate);
                $this->db->where('date <=',$date);
                $selectsum=$this->db->get()->row()->asal_bidi;
                //echo $this->db->last_query();
                //echo $contractorname." --------->".$selectsum." <br>";
                $this->db->select('*');
                $this->db->from('cont_issue_receive');
                $this->db->where('cont_name',$id);
                $this->db->where('date >=',$fdate);
                $this->db->where('date <=',$date);
                $result=$this->db->get()->result();
                if($result != null){
                    //echo $this->db->last_query();
                    //echo "Data is: ".json_encode($result)." <BR>";
                    foreach($result as $row){
                        $asalbidi=$row->asal_bidi;
                        $chatbidikg=$row->chant_bidi_kgs;
                        $wg=$row->wages;
                        $bid=$row->batch2;
                        $tob_bag=$row->tob_bag;
                        $disc=$row->disc;
                        $tobweight=$row->tob_wt;
                        //echo " Batch ".$bid;
                        $this->db->select('*');
                        $this->db->from('wages_fixation');
                        $this->db->where('id',$wg);
                        $fromwages=$this->db->get()->result();//echo json_encode($fromwages);
                        if($fromwages != null){//echo "IF:";
                            foreach($fromwages as $row){
                                $wages=$row->wages;
                                $bonus=$row->bonus;
                                $handling=$row->handling;
                                $chatbiri=$row->chat_biri;
                            }
                        }
                        else{
                            $wages=0;
                            $bonus=0;
                            $handling=0;
                            $chatbiri=0;
                        }
                        
                        $mulwages=$wages*$asalbidi;
                        $mulbonus=$bonus*$asalbidi;
                        $mulhand=$handling*$asalbidi;
                        $muladdition=$chatbiri*$chatbidikg;
                        $sumofasbWg=$sumofasbWg+$mulwages;
                        $sumofbounas=$sumofbounas+$mulbonus;
                        $sum=$sumofasbWg+$sumofbounas;
                        $sumofhand=$sumofhand+$mulhand;
                        $sumofadition=$sumofadition+$muladdition;
                        $GrossTotal=round($selectsum,3)+round($sumofasbWg,2)+round($sumofbounas,2)+round($sumofhand,2)+round($sumofadition,2);
                    }
                    $this->db->select('tobacco_amt,leaves_amt,bl_yarn_amt,wh_yarn_amt,filter_amt');
                        $this->db->from('cont_adj');
                        $this->db->where('contractor',$id);
                        //$this->db->where('batch',$b//
                        $this->db->where('date >= ',$fdate);
                        $this->db->where('date <=',$date);
                        $conadjust=$this->db->get()->result();
                        if($conadjust != null){
                            echo json_encode($conadjust);
                            foreach($conadjust as $row){
                                $tobAmt=$row->tobacco_amt;
                                $levAmt=$row->leaves_amt;
                                $blAmt=$row->bl_yarn_amt;
                                $whAmt=$row->wh_yarn_amt;
                                $filAmt=$row->filter_amt;
                            }
                        }
                        else{
                            $tobAmt=0;$levAmt=0;$blAmt=0;$whAmt=0;$filAmt=0;
                        }
                        $this->db->select('tbag,dise');
                        $this->db->from('rate_master');
                        $this->db->where('batch',$bid);
                        $raemaster=$this->db->get()->result();
                        if($raemaster != null){
                            foreach($raemaster as $row){
                                $tbag=$row->tbag;
                                $dise=$row->dise;
                            }//echo json_encode($raemaster);
                        }
                        else
                        {
                            $tbag=0;$dise=0;//echo "ELse";
                        }
                        $this->db->select_sum('cartons');
                        $this->db->from('cont_issue_receive');
                        $this->db->where('cont_name',$id);
                        $other=$this->db->get()->row()->cartons;
                        //echo $other."<br>";

                        $this->db->select('tobacco');    
                        $this->db->from('batch_master');
                        $this->db->where('id',$bid);
                        $tobaccoval = $this->db->get()->row()->tobacco;
                        $tval=$tobaccoval-0.020;
                        $tsort=$tval-$tobweight;
                        //$sumTsort=$sumTsort+$tsort;
                        if($tsort == 0){
                            $mul=0;$mul1=0;
                            $sumopfTsort=$mul1+$mul;
                            //echo " Sum is 0 <br>";
                        }else if($sumTsort > 0){
                            $mul=0;$mul1=0;
                            $sumopfTsort=$mul1+$mul;
                            //echo " Sum is more then zero(0) <br>";
                        }else if($sumTsort < 0){
                            $this->db->select('tobacco');
                            $this->db->from('rate_master');
                            $this->db->where('batch',$bid);
                            $getval=$this->db->get()->row()->tobacco;
                            $mul=$tsort*$getval;
                            $sumasbchat=$asalbidi+$chatbidikg;
                            $mul1=$sumasbchat*$tsort;
                            $sumopfTsort=$mul1+$sumasbchat+$mul;
                            //$sumopfTsort=number_format(abs($sumopfTsort));
                            //echo " Sum is less then zero(0) <br>";
                        }
                        $this->db->select_sum('amount');
                        //$this->db->group_by('name');
                        $this->db->from('information');
                        $this->db->where('name',$id);
                        $amount=$this->db->get()->row()->amount;
                        //echo $this->db->last_query();
                        //echo $sumTsort." <BR>";
                        $this->db->select('pf,tds');
                        $this->db->from('con-party_master');
                        $this->db->where('id',$id);
                        $contract=$this->db->get()->result();
                        foreach($contract as $row){
                            $pf=$row->pf;
                            $tds=$row->tds;
                        }
                        if($pf == 'yes'){
                            $this->db->select('pf');
                            $this->db->from('wages_fixation');
                            $this->db->where('id',$wg);
                            $PF=$this->db->get()->row()->pf;
                            $mulpf=$sumofasbWg*$PF/100;
                            $sumPf=$sumPf+$mulpf;
                        }else{

                        }
                        if($tds == 'yes'){
                            $this->db->select('tds');
                            $this->db->from('wages_fixation');
                            $this->db->where('id',$wg);
                            $TDS=$this->db->get()->row()->tds;
                            $multds=$GrossTotal*$TDS/100;
                            $sumTds=$sumTds+$multds;
                        }
                        $mulTob=$tob_bag*$tbag;
                        $sumtob=$sumtob+$mulTob;
                        $muldise=$disc*$dise;
                        $sumDise=$sumDise+$muldise;
                        $netTotal=$GrossTotal-$levAmt-$tobAmt-$blAmt-$whAmt-$filAmt-$sumtob-$sumDise-$other-$sumopfTsort-$amount-$sumPf-$sumTds;
                }
                else{
                    $sumofasbWg=0;$sumofbounas=0;$sumofhand=0;$sumofadition=0;$GrossTotal=0;$levAmt=0;$tobAmt=0;$blAmt=0;$whAmt=0;$filAmt=0;$sumtob=0;$sumDise=0;$other=0;$sumopfTsort=0;$amount;$sumPf=0;$sumTds=0;$netTotal=0;
                }
                if($selectsum != ''){
                    $data[]=array(
                        'name'=>$contractorname,
                        'netbiri'=>number_format(round($selectsum,3),3),
                        'wages'=>number_format(round($sumofasbWg,2),2),
                        'bonus'=>number_format(round($sumofbounas,2),2),
                        'handlingcharges'=>number_format(round($sumofhand,2),2),
                        'addition'=>number_format(round($sumofadition,2),2),
                        'grossTotal'=>number_format(round($GrossTotal,2),2),
                        'leaves'=>number_format(round($levAmt,2),2),
                        'tobacco'=>number_format(round($tobAmt,2),2),
                        'blackyarn'=>number_format(round($blAmt,2),2),
                        'whiteyarn'=>number_format(round($whAmt,2),2),
                        'filter'=>number_format(round($filAmt,2),2),
                        'Bags'=>number_format(round($sumtob,2),2),
                        'Dice'=>number_format(round($sumDise,2),2),
                        'other'=>number_format(round($other,2),2),
                        'T_Short'=>number_format(round($sumopfTsort,2),2),
                        'Advance'=>number_format(round($amount,2),2),
                        'Pf'=>number_format(round($sumPf,2),2),
                        'Tds'=>number_format(round($sumTds,2),2),
                        'NetTotal'=>number_format(round($netTotal,2),2),
                    );
                }
                else{
                }
               
            }
            return $data;
        }
    }
}
?>