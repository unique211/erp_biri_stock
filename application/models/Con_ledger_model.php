<?php
class Con_ledger_model extends CI_Model{
    function getdata($table){
        $this->db->select('psdate,pedate');
        $this->db->from($table);
        $result=$this->db->get()->result();
        return $result;
    }
    function showData($table){
        //"2019-04-05";//"2019-04-01";//'16';//
        $date=$this->input->post('date');
        $fdate=$this->input->post('fdate');
        $id=$this->input->post('where');
        $sqlQry='';$asalbidi=0;$chatbidipcs=0;$chatbidikgs=0;$asb=0;$asbidi=0; $sumoftob=0; $bid=0;$tobsum=0;$batchqry=0;
        $sql=0;$t=0;$l=0;$bl=0;$wy=0;$fi=0;$mulfil=0;$mulbl=0;$mullev=0;$multob=0;$mulwy=0; $batchnm='';$totalTobacco=0;
        $totalLeaves=0;$data=array();$batchname='';$leaves=0;$tobacco=0;$black_yarn=0;$white_yarn=0;$filter=0;$qry='';
        $btc=array();$tobacco_amt=0;$leaves_amt=0;$bl_yarn_amt=0;$wh_yarn_amt=0;$filter_amt=0;$dateof='';$grtotal=0;
        $GrossTotal='';$btr='';$tLev=0;$tTob=0;$blsutta=0;$whsutta=0;$bags=0;$dice=0;$tsort=0;$advance=0;$pf=0;$sumofvalue=0;
        $abidi=0;$abidis=0; $sortArray = array();$people=array();$myarray=array();$sum=0;$bsum=0;$quantity=0;$batchid=0;
        $bnm='';$wggroup='';$count=0;$bt='';$clleaves=0;$cltobacco=0;$clbly=0;$clwhy=0;$clfil=0;
        $sumofabs=0;$sumofchps=0;$sumofchkg=0;$sumoftob=0;$sumoflev=0;$sumofbly=0;$sumofwhy=0;$sumoffil=0;
        $prev_date = date('Y-m-d', strtotime($fdate .' -1 day'));
        $fun=$this->getob($id,$prev_date);
        //echo json_encode($fun);
        $batchname=$fun['batchname'];
        $tobacco=$fun['tobacco'];
        $leaves=$fun['leaves'];
        $black_yarn=$fun['black_yarn'];
        $white_yarn=$fun['white_yarn'];
        $filter=$fun['filter'];
        $GrossTotal=$this->getGrtotal($id,$fdate,$date);
        $grtotal=$GrossTotal['grossTotal'];
        $tLev=$GrossTotal['leaves'];
        $tTob=$GrossTotal['tobacco'];
        $blsutta=$GrossTotal['blackyarn'];
        $whsutta=$GrossTotal['whiteyarn'];
        $bags=$GrossTotal['Bags'];
        $dice=$GrossTotal['Dice'];
        $tsort=$GrossTotal['T_Short'];
        $advance=$GrossTotal['Advance'];
        $pf=$GrossTotal['Pf'];
        $sumoftob=$sumoftob+$tobacco;
        $sumoflev=$sumoflev+$leaves;
        $sumofbly=$sumofbly+$black_yarn;
        $sumofwhy=$sumofwhy+$white_yarn;
        $sumoffil=$sumoffil+$filter;
        //echo json_encode($GrossTotal);
        //echo $grtotal.'<br>';
        $this->db->select('*');
        $this->db->from('batch_master');
        $bqry=$this->db->get()->result();
        foreach($bqry as $row)
        {
            $bid=$row->id;
            $bnm=$row->batch;
            $this->db->select('sum(asal_bidi) as asal_bidi');
            $this->db->from('cont_issue_receive');
            $this->db->where('cont_name',$id);
            $this->db->where('batch1',$bid);
            $this->db->where('date <= ',$date);
            $select=$this->db->get()->result();
            foreach($select as $row){
                $bsum=0;
                $asal=$row->asal_bidi;
                //$chat=$row->chant_bidi_pcs;
                if($asal != ''){
                    $abidis=$abidis+$asal;
                    //$cbidis=$cbidis+$chat;
                    $sum=$abidi;//+$cbidis;
                    $bsum=$asal;//+$chat;
                }
                else{
                    $asal=0;$chat=0;
                    $abidis=$abidis+$asal;
                    $sum=$abidis;//+$cbidis;
                    $bsum=$asal;//+$chat;
                }
                $myarray=array('batchid'=>$bid,
                'bname'=>$bnm,
            'sum'=>$bsum);
            }
            //echo json_encode($myarray);
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
        $ary=$people[0]['bname'];
        $this->db->select('qty');
        $this->db->from('weekly_adjustment');
        $this->db->where('entry_date >=',$fdate);
        $this->db->where('to_date >=',$date);
        $quantity=$this->db->get()->row()->qty;
        $qty=0-$quantity;
        $this->db->select('cont_issue_receive.*,batch_master.batch,wages_fixation.name as wgnm');
        $this->db->from('cont_issue_receive');
        $this->db->join('batch_master','batch_master.id=cont_issue_receive.batch1');
        $this->db->join('wages_fixation','wages_fixation.id=cont_issue_receive.wages');
        $this->db->where('cont_issue_receive.date >= ',$fdate);
        $this->db->where('cont_issue_receive.date <= ',$date);
        $this->db->where('cont_issue_receive.cont_name',$id);
        $sqlQry=$this->db->get()->result();
        //echo $this->db->last_query();
        if($sqlQry != null){
            foreach($sqlQry as $row){
                $batch=$row->batch;
                $dateof=$row->date;
                $batchid=$row->batch1;
                $asalbidi=$row->asal_bidi;
                $chatbidipcs=$row->chant_bidi_pcs;
                $chatbidikgs=$row->chant_bidi_kgs;
                $wggroup=$row->wgnm;
                $tob=$row->tob;
                $lev=$row->leaves;
                $bl_yarn=$row->bl_yarn;
                $wh_yarn=$row->wh_yarn;
                $fil=$row->filter;
                
                if($ary == $batch){
                    
                    $sumoflev=$sumoflev+$lev;
                    $sumofbly=$sumofbly+$bl_yarn;
                    $sumofwhy=$sumofwhy+$wh_yarn;
                    $sumoffil=$sumoffil+$fil;  
                    if($btr != $batch){
                        $sumoftob=$sumoftob+$tob;   
                        $btr=$batch;
                        $btarray=array('batch'=>$btr,
                            'sumofasb'=>$sumofabs,
                            'sumofchps'=>$sumofchps,
                            'sumofchkg'=>$sumofchkg,
                            'sumoftob'=>$sumoftob,
                            'sumoflev'=>$sumoflev,
                            'sumofbly'=>$sumofbly,
                            'sumofwhy'=>$sumofwhy,
                            'sumoffil'=>$sumoffil
                        );
                        array_push($btc,$btr);
                    }
                    
                    $data[]=array(
                        'date'=>$dateof,
                        'batch'=>$batch,
                        'batchname'=>null,
                        'batchnm'=>null,
                        'wages'=>$wggroup,
                        'asalbidi'=>number_format(round($asalbidi,3),3),
                        'chatbidipcs'=>$chatbidipcs,
                        'chatbidikgs'=>$chatbidikgs,
                        'tob'=>$tob,
                        'lev'=>$lev,
                        'bly'=>$bl_yarn,
                        'why'=>$wh_yarn,
                        'fil'=>$fil,
                        'qty'=>number_format(round($qty,3),3)
                        
                    );
                }
                else{
                    if($btr != $batch){
                        $sumoftob=$sumoftob+$tob;
                        $sumoflev=$sumoflev+$lev;
                        $sumofbly=$sumofbly+$bl_yarn;
                        $sumofwhy=$sumofwhy+$wh_yarn;
                        $sumoffil=$sumoffil+$fil;
                        $btr=$batch;
                        $btarray=array('batch'=>$btr,
                            'sumoftob'=>$sumoftob,
                            'sumoflev'=>$sumoflev,
                            'sumofbly'=>$sumofbly,
                            'sumofwhy'=>$sumofwhy,
                            'sumoffil'=>$sumoffil
                        );
                        array_push($btc,$btr);
                    }
                    $data[]=array(
                        'date'=>$dateof,
                        'batch'=>$batch,
                        'batchname'=>null,
                        'batchnm'=>null,
                        'wages'=>$wggroup,
                        'asalbidi'=>number_format(round($asalbidi,3),3),
                        'chatbidipcs'=>$chatbidipcs,
                        'chatbidikgs'=>$chatbidikgs,
                        'tob'=>$tob,
                        'lev'=>$lev,
                        'bly'=>$bl_yarn,
                        'why'=>$wh_yarn,
                        'fil'=>$fil,
                        'qty'=>number_format(round($qty,3),3)
                        
                    );
                }
            }//array_push($btc,$btarray);
            $count=count($btc);
            //echo $count;
            $this->db->select('*');
            $this->db->from('batch_master');
            //$this->db->where('id',$batchid);
            $batchqry=$this->db->get()->result(); //echo json_encode($batchqry);
            foreach($batchqry as $row){
                $bid=$row->id;
                $batchnm=$row->batch;
                $t=$row->tobacco;
                $l=$row->leaves;
                $bl=$row->bl_sutta;
                $wy=$row->wh_sutta;
                $fi=$row->filter;
                $this->db->select_sum('tob');
                //$this->db->group_by('batch2');
                $this->db->from('cont_issue_receive');
                $this->db->where('date >= ',$fdate);
                $this->db->where('date <= ',$date);
                $this->db->where('cont_name',$id);
                $this->db->where('batch2',$bid);
                $tobsum=$this->db->get()->row()->tob;//result();
                 //echo $this->db->last_query()."<br>";
                // echo json_encode($tobsum);
                if($tobsum != ''){
                    //echo $this->db->last_query();
                    $this->db->select_sum('qty');
                    $this->db->from('weekly_adjustment');
                    $this->db->where('to_date >=',$fdate);
                    $this->db->where('to_date <=',$date);
                    $sql=$this->db->get()->row()->qty;
                    if($sql != ''){
                        $sql=$sql;
                    }
                    else{
                        $sql=0;
                    }
                    //echo $tobsum."<br>";
                    $sumoftob=$sumoftob+$tobsum;
                }
                else{
                    $sql=0;
                    //echo $tobsum."<br>";
                }
                $multob=$tobsum*$t;
                $mullev=$tobsum*$l;
                $mulbl=$tobsum*$bl;
                $mulwy=$tobsum*$wy;
                $mulfil=$tobsum*$fi;

                $this->db->select('sum(tobacco_amt) as tobacco_amt,sum(leaves_amt) as leaves_amt,sum(bl_yarn_amt) as bl_yarn_amt,sum(wh_yarn_amt) as wh_yarn_amt,sum(filter_amt) as filter_amt');
                $this->db->from('cont_adj');
                $this->db->where('date >=',$fdate);
                $this->db->where('date <=',$date);
                $this->db->where('contractor',$id);
                $this->db->where('batch',$bid);
                $qry=$this->db->get()->result();
                //echo $this->db->last_query();
                if($qry != null){
                    foreach($qry as $row){
                        $tobacco_amt=$row->tobacco_amt;
                        $leaves_amt=$row->leaves_amt;
                        $bl_yarn_amt=$row->bl_yarn_amt;
                        $wh_yarn_amt=$row->wh_yarn_amt;
                        $filter_amt=$row->filter_amt;
                    }
                }
                else{
                    $tobacco_amt=0;
                    $leaves_amt=0;
                    $bl_yarn_amt=0;
                    $wh_yarn_amt=0;
                    $filter_amt=0;
                }
                $this->db->select('sum(b_qty) as b_qty,sum(t_qty) as t_qty');
                $this->db->from('raw_item');
                $this->db->where('date >=',$fdate);
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
                $this->db->where('date >=',$fdate);
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
                }
                elseif ($b_qty != '' && $t_qty != ''){
                    $totalTobacco=0-$b_qty;$totalLeaves=0-$t_qty;
                }
                elseif($bqty != '' && $tqty != ''){
                    $totalTobacco=$bqty;$totalLeaves=$tqty;
                }
               

                if($bt == $batchnm){
                   // 0;//0;//
                   $sumoflev=0;$mullev=0;$leaves_amt=0;$totalLeaves=0;$sumoftob=0;
                    //echo $sumoflev." &".$multob." ".$tobacco_amt." ".$totalTobacco;
                    $clleaves=$sumoflev-$mullev-$leaves_amt-$totalLeaves;
                    $cltobacco=$sumoftob-$multob-$tobacco_amt-$totalTobacco;
                    $clbly=0;
                    $clwhy=0;
                    $clfil=0;
                    $data[]=array(
                        'batchnm'=>$batchnm,
                        'batch'=>null,
                        'batchname'=>null,
                        'consumption'=>array(
                            'clev'=>number_format(round($mullev,3),3),
                            'ctob'=>number_format(round($multob,3),3),
                            'cbl'=>number_format(round($mulbl,3),3),
                            'cwy'=>number_format(round($mulwy,3),3),
                            'cfil'=>number_format(round($mulfil,3),3),
                        ),
                        'lesssortage'=>array(
                            'lstob'=>number_format(round($tobacco_amt,3),3),
                            'lslev'=>number_format(round($leaves_amt,3),3),
                            'lsbl'=>number_format(round($bl_yarn_amt,3),3),
                            'lswy'=>number_format(round($wh_yarn_amt,3),3),
                            'lsfil'=>number_format(round($filter_amt,3),3),
                        ),
                        'transfer'=>array(
                            'ttob'=>number_format(round($totalTobacco,3),3),
                            'tlev'=>number_format(round($totalLeaves,3),3),
                        ),
                        'closingBalance'=>array(
                            'closelev'=>number_format(round($clleaves,3),3),
                            'closetob'=>number_format(round($cltobacco,3),3),
                            'closebly'=>number_format(round($clbly,3),3),
                            'closewhy'=>number_format(round($clwhy,3),3),
                            'closefil'=>number_format(round($clfil,3),3),
                        ),
                    );
                    
                }
                else{
                    
                    for( $i = 0; $i<$count; $i++ ) {
                        $bt=$btc[$i];
                        $clleaves=$sumoflev-$mullev-$leaves_amt-$totalLeaves;
                        $cltobacco=$sumoftob-$multob-$tobacco_amt-$totalTobacco;
                        $clbly=$sumofbly-$mulbl-$bl_yarn_amt;
                        $clwhy=$sumofwhy-$mulwy-$wh_yarn_amt;
                        $clfil=$sumoffil-$mulfil-$filter_amt;
                        if($bt == $batchnm){
                            $data[]=array(
                                'batchnm'=>$batchnm,
                                'batch'=>null,
                                'batchname'=>null,
                                'consumption'=>array(
                                    'clev'=>number_format(round($mullev,3),3),
                                    'ctob'=>number_format(round($multob,3),3),
                                    'cbl'=>number_format(round($mulbl,3),3),
                                    'cwy'=>number_format(round($mulwy,3),3),
                                    'cfil'=>number_format(round($mulfil,3),3),
                                ),
                                'lesssortage'=>array(
                                    'lstob'=>number_format(round($tobacco_amt,3),3),
                                    'lslev'=>number_format(round($leaves_amt,3),3),
                                    'lsbl'=>number_format(round($bl_yarn_amt,3),3),
                                    'lswy'=>number_format(round($wh_yarn_amt,3),3),
                                    'lsfil'=>number_format(round($filter_amt,3),3),
                                ),
                                'transfer'=>array(
                                    'ttob'=>number_format(round($totalTobacco,3),3),
                                    'tlev'=>number_format(round($totalLeaves,3),3),
                                ),
                                'closingBalance'=>array(
                                    'closelev'=>number_format(round($clleaves),3),
                                    'closetob'=>number_format(round($cltobacco),3),
                                    'closebly'=>number_format(round($clbly,3),3),
                                    'closewhy'=>number_format(round($clwhy,3),3),
                                    'closefil'=>number_format(round($clfil,3),3),
                                ),
                            );
                        }
                        else{
                        }
                    } 
                }
            }
        }
        else{
            $asalbidi=0;$chatbidipcs=0;$chatbidikgs=0;$asb=0;$asbidi=0;
        }
        if($tobacco != 0 && $leaves != 0 && $black_yarn != 0 && $white_yarn != 0 && $filter != 0){
            $data[]=array(
                // 'obalance'=>array(
                    'batchnm'=>null,
                    'batch'=>null,
                    'batchname'=>$batchname,
                    'leaves'=>$leaves,
                    'tobacco'=>$tobacco,
                    'black_yarn'=>$black_yarn,
                    'white_yarn'=>$white_yarn,
                    'filter'=>$filter,
                    'finalTotal'=>array(
                        'gtotal'=>$grtotal,
                        'tLev'=>$tLev,
                        'tTob'=>$tTob,
                        'blsutta'=>$blsutta,
                        'whsutta'=>$whsutta,
                        'bags'=>$bags,
                        'dice'=>$dice,
                        'tsort'=>$tsort,
                        'advance'=>$advance,
                        'pf'=>$pf,
                    ),
                    
                // )
            );
        }    //echo json_encode($sqlQry);
        return $data;

    }
    function getob($id,$date){
        $btob=0; $blev=0;$select='';$abidi=0;$sum=0; $sortArray = array();$people=array();$myarray=array();
        $bby=0;$bwy=0;$bfil=0;$bqty=0;$tqty=0;$contractorname='';$batchqry='';
        $data[]='';$name='';$cid='';$batch='';$bname='';$tobacco='';$leaves='';$batchid=0;$batchname='';
        $blackYarn='';$whiteYarn='';$filter='';$totL=0;$totT=0;$totB=0;$totW=0;$totF=0;$res='';$data1='';$con=0;
        $tob=0;$leav=0;$bl_yarn=0;$wh_yarn=0;$fil=0;$batch2='';$res='';$qry='';$sql='';$asbidi=0;$cbidi=0;$b='';
        $totalbidi=0;$totalTob=0;$totalLev=0;$totalBY=0;$totalWY=0;$totalFil=0; $asb=0;$get=0;$totalTobacco=0;$totalLeaves=0;$abidis=0;$cbidis=0;$asal=0;$chat=0;
        $TT=0;$TL=0;$TBY=0;$TWY=0;$TF=0;$ConAdj='';$bach=0;$l=0;$t=0;$by=0;$wy=0;$f=0;$cat=0;$cal=0;$caby=0;$cawy=0;$caf=0;
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
                $data=array(
                    'batch'=>$bid,
                    'cid'=>$id,
                    'batchname'=>$batch_name,
                    'tobacco'=>number_format(round($totalTobacco,3),3),
                    'leaves'=>number_format(round($totalLeaves,3),3),
                    'black_yarn'=>number_format(round($caby,3),3),
                    'white_yarn'=>number_format(round($cawy,3),3),
                    'filter'=>number_format(round($caf,3),3)
                );
                return $data;
            }
        }

    }
    function getGrtotal($id,$fdate,$date){
            $id=$id;$data='';
            $asalbidi=0;$chatbidikg=0;$wg=0;$fromwages='';$wages=0;$mulwages=0;$bonus=0;$mulbonus=0;$sumofbounas=0;$sum=0;
            $handling=0;$sumofhand=0;$mulhand=0;$chatbiri=0;$sumofadition=0;$muladdition=0;$sumofasbWg=0;$selectsum=0;
            $GrossTotal=0;$conadjust='';$tobAmt=0;$levAmt=0;$blAmt=0;$whAmt=0;$filAmt=0;$tob_bag=0;$disc=0;$other=0;$bid=0;
            $raemaster=0; $tbag=0;$dise=0;$muldise=0;$mulTob=0;$sumtob=0;$sumDise=0;$tobweight=0;$tobaccoval=0;$sumTsort=0;
            $tsort=0;$tval=0;$mul=0;$sumasbchat=0;$sumopfTsort=0;$amount=0;$tds='';$pf='';$TDS=0;$PF=0;$sumPf=0;$mulpf=0;
            $sumTds=0;$multds=0;$netTotal=0;
            $this->db->select_sum('asal_bidi');
            $this->db->from('cont_issue_receive');
            $this->db->where('cont_name',$id);
            $this->db->where('date >=',$fdate);
            $this->db->where('date <=',$date);
            $selectsum=$this->db->get()->row()->asal_bidi;
            $this->db->select('*');
            $this->db->from('cont_issue_receive');
            $this->db->where('cont_name',$id);
            $this->db->where('date >=',$fdate);
            $this->db->where('date <=',$date);
            $result=$this->db->get()->result();
            if($result != null){
                foreach($result as $row){
                    $asalbidi=$row->asal_bidi;
                    $chatbidikg=$row->chant_bidi_kgs;
                    $wg=$row->wages;
                    $bid=$row->batch2;
                    $tob_bag=$row->tob_bag;
                    $disc=$row->disc;
                    $tobweight=$row->tob_wt;
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
                    //echo json_encode($conadjust);
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
            $data=array(
                //'name'=>$contractorname,
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
            return $data;
        }
        else{
        }
        
    }
}
?>