<?php
class Itemwisemonthlymodel extends CI_Model{

     function insertdata($data,$table)
	{
           $result = $this->db->insert($table,$data);
            return $result;
     } 
     function updatedata($data,$table,$id)
     {
          $this->db->where('id',$id);
          $result = $this->db->update($table,$data);
           return $result;

     } 
     function showalldata($table)
     { 
         if($table == "item_master")
         {
           $this->db->select('item_master.*');    
           $this->db->from('item_master');
          
           $query = $this->db->get();
           return $query->result();
           
         }
 
     }
       function delete_data($table_name,$id)
      {
          $this->db->where('id',$id);
          $result = $this->db->delete($table_name);
          return $result;

      } 
      function getdatefsdate(){
        
          $this->db->select('fsdate');    
          $this->db->from('financial_period');
         $query = $this->db->get();
          return $query->result();
      }
      function getsumofbidisales($fidate,$cudate,$item_name){
       // $fidate = '2019-04-15'; // yy-mm-dd format
        //$cudate = '2020-04-1';
        $start    = new DateTime($fidate);
       
      
        $end      = new DateTime($cudate);
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);
        $result=array();

       
      
        $sale=0;
        $closebalanceamt=0;
       
       
        foreach ($period as $dt) {
           $itemqty=0;
           $opningbal=0;
           $openingcartun=0;
            $purchseinfo=0;
            $purchase=0;
            $date= $dt->format("Y-m") ."&nbsp;&nbsp;" ;
             $dateinfo=(explode("-",$date));
             $year=$dateinfo[0];
             $month=$dateinfo[1];
             $saleinfo=0;
             $sales=0;
             $consumption=0;
             $shortage=0;
             $sum = 0;
             $filter = 0;
             $closebalance=0;
             $lq = 0;
            $tq = 0;
            $bq = 0;
            $wq = 0;
             $tobacco_amt=0;
             $leaves_amt=0;
             $bl_yarn_amt=0;
             $wh_yarn_amt=0;
             $filter_amt=0;
            
                //echo $year."".$month;
            
                $this->db->select('*');    
                $this->db->from('item_master');
                $this->db->where('id',$item_name);
                //$this->db->where('MONTH(voucher_date)',$month);
               // $this->db->where('year(voucher_date)',$year);
                 $query5 = $this->db->get();
               // echo $this->db->last_query();
                if($query5->num_rows()>0){

                    foreach($query5->result_array() as $item_masteronfo){
                      $itemqty=$item_masteronfo['qty'];
                    }
                 }

                 $this->db->select('sum(openingcurtn) as openingcurtn');    
                 $this->db->from('packingbatch');
                 $query6 = $this->db->get();
               if($query6->num_rows()>0){
                    foreach($query6->result_array() as $packingbatch){
                       $openingcartun=$packingbatch['openingcurtn'];
                     }
                  }

                //  echo $itemqty."".$openingcartun;
                  $opningbal=$openingcartun+ $itemqty;


                $this->db->select('*');    
                $this->db->from('purchase_master');
                $this->db->where('type','Purchase');
                $this->db->where('MONTH(voucher_date)',$month);
                $this->db->where('year(voucher_date)',$year);
                $query7 = $this->db->get();
               
                if($query7->num_rows()>0){
                    foreach($query7->result_array() as $purchasedata ) {  
                    $purchseid=$purchasedata['id'];

                   
                    if($purchseid >0){
                        $this->db->select('qty');    
                        $this->db->from('purchase_data');
                        $this->db->where('purchase_id',$purchseid);
                        $this->db->where('item_id',$item_name);
                        $query10 = $this->db->get();
                        
                        foreach($query10->result_array() as $purchasedata1){
                            $purchseinfo=$purchasedata1['qty'];
                            $purchase=$purchase + $purchseinfo;
                           
                        }

                       
                    }
                }
            }
                $this->db->select('*');    
                $this->db->from('purchase_master');
                $this->db->where('type','Sales');
                $this->db->where('MONTH(voucher_date)',$month);
                $this->db->where('year(voucher_date)',$year);
                $query11 = $this->db->get();
                if($query11->num_rows()>0){
                    foreach($query11->result_array() as $salesdata ) {   
                    $saleid=$salesdata['id'];
                  
                    if($saleid >0){
                        $this->db->select('qty');    
                        $this->db->from('purchase_data');
                        $this->db->where('purchase_id',$saleid);
                        $this->db->where('item_id',$item_name);
                        $query12 = $this->db->get();
                      
                        foreach($query12->result_array() as $salesdata1){
                            $saleinfo=$salesdata1['qty'];
                          
                            $sales=$sales+ $saleinfo;
                        }

                       
                    }
                }
            }

                $this->db->select('*');
        $this->db->from('batch_master');
        $qry = $this->db->get()->result();
        if ($qry != null) {
            foreach ($qry as $row) {
                $asbiri = 0;
                $dt = '';
                $chbiri = 0;
               
                $bct = '';
                //'2'; //'0.280'; //'0.750'; //'0.0083'; //'0.0044'; //'0.000'; //
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
               // $this->db->order_by('date', 'ASC');
                 $this->db->group_by('date');
                $this->db->where('MONTH(date)',$month);
                $this->db->where('year(date)',$year);
             // echo $this->db->last_query();
               $query = $this->db->get()->result();
                if ($query != null) {
                    foreach ($query as $row) {
                     
                      //  $dt = $row->d
                        $asbiri = $row->asal_bidi;
                        $chbiri = $row->chant_bidi_pcs;
                        $sum =   $asbiri + $chbiri;

                        $lq =  $lq+($sum * $lev);
                        $tq = $tq+ ($sum * $tob);
                        $bq = $bq + ($sum * $bly);
                        $wq = $wq+($sum * $why);
                        $filter =$filter+ ($sum * $fil);
                      
                       
                       // echo "sum is".$sum."lev".$lev;
                     //  echo "lq".$lq;
                    }
                    
                }
            }
        }

            if($item_name=="2"){
                $consumption= $tq;
            }else  if($item_name=="1"){
               
                $consumption= $lq;
            }else  if($item_name=="3"){
                $consumption= $bq;
            }else  if($item_name=="4"){
                $consumption= $wq;
            }else  if($item_name=="5"){
                $consumption= $filter;
            }
            
            $this->db->select('date ,SUM(tobacco_amt) as tobacco_amt, sum(leaves_amt) as leaves_amt,sum(bl_yarn_amt) as bl_yarn_amt,sum(wh_yarn_amt) as wh_yarn_amt,sum(filter_amt) as filter_amt');
            $this->db->from('cont_adj');
            $this->db->where('MONTH(date)',$month);
            $this->db->where('year(date)',$year);
           $query8 = $this->db->get()->result();
            if ($query8 != null) {
                foreach ($query8 as $row1) {


                    $tobacco_amt= $row1->tobacco_amt;
                    $leaves_amt=$row1->leaves_amt;;
                    $bl_yarn_amt=$row1->bl_yarn_amt;;
                    $wh_yarn_amt=$row1->wh_yarn_amt;;
                    $filter_amt=$row1->filter_amt;;
                }

            }

            if($item_name=="2"){
                $shortage= $tobacco_amt;
            }else  if($item_name=="1"){
                $shortage= $leaves_amt;
            }else  if($item_name=="3"){
                $shortage= $bl_yarn_amt;
            }else  if($item_name=="4"){
                $shortage= $wh_yarn_amt;
            }else  if($item_name=="5"){
                $shortage= $filter_amt;
            }
            if($shortage ==""){
                $shortage=0;
            }



               // $month1=str_replace(' ', '', $month);
               $mon1="";
               if($month==04){
                   $mon1='Apr';
         } if($month==05){
                $mon1='May';
            } if($month==06){
                $mon1='June';
            } if($month==07){
                $mon1='July';
            } if($month==8){
                $mon1='Aug';
            } if($month==9){
                $mon1='Sep';
            } if($month==10){
                $mon1='Oct';
            } if($month==11){
                $mon1='Nov';
            } if($month==12){
                $mon1='Dec';
            } if($month==01){
                $mon1='Jan';
            } if($month==02){
                $mon1='Feb';
            } if($month==03){
                $mon1='Mar';
            }
           
            if($month==04){
                   
            }else{
             
                $opningbal=$closebalanceamt;
             
            } 
             $closebalance=$opningbal+ $purchase-($sales+$shortage+ $consumption);
             $closebalanceamt=$closebalance;
               
            
               
               
           
               
               
            $result[]=array(
                'openingbal'=>$opningbal,
                'purchase'=>$purchase,
                'consumption'=>$consumption,
                'shortage'=>$shortage,
                'sales'=>$sales,
                'closebalance'=>$closebalance,
                'month'=>$mon1,
                'year'=>$year,
                'montid'=>$month,
            );
           }
    return $result;
      }
  
   function get_dropdown($table_name,$where){
    $this->db->select('*');    
    $this->db->from($table_name);
    $this->db->where($where);
    $query5 = $this->db->get();
    return $query5->result();
   }  
  
function get_finicialmonthwisedata($fidate,$end,$item_name){
   $result=array();
   $getdatedata=array();

    function getDatesFromRange($start, $end, $format = 'Y-m-d') {
        $array = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            $array[] = $date->format($format); 
        }
    
        return $array;
    }

    $this->db->select('fsdate');    
    $this->db->from('financial_period');

   $query = $this->db->get();
  $finicialdate= $query->result_array();
  $start=$finicialdate[0]['fsdate'];
 
    $datedata=  getDatesFromRange($start,$end);
    $closebalanceamt=0;
    foreach($datedata as $date){
        $itemqty=0;
        $opningbal=0;
        $openingcartun=0;
         $purchseinfo=0;
         $purchase=0;
    
          $saleinfo=0;
          $sales=0;
          $consumption=0;
          $shortage=0;
          $sum = 0;
          $filter = 0;
          $closebalance=0;
          $lq = 0;
         $tq = 0;
         $bq = 0;
         $wq = 0;
          $tobacco_amt=0;
          $leaves_amt=0;
          $bl_yarn_amt=0;
          $wh_yarn_amt=0;
          $filter_amt=0;
         
         
          $this->db->select('*');    
          $this->db->from('item_master');
          $this->db->where('id',$item_name);
         $query5 = $this->db->get();
         // echo $this->db->last_query();
          if($query5->num_rows()>0){

              foreach($query5->result_array() as $item_masteronfo){
                $itemqty=$item_masteronfo['qty'];
              }
           }

           $this->db->select('sum(openingcurtn) as openingcurtn');    
           $this->db->from('packingbatch');
           $query6 = $this->db->get();
         if($query6->num_rows()>0){
              foreach($query6->result_array() as $packingbatch){
                 $openingcartun=$packingbatch['openingcurtn'];
               }
            }

         $opningbal=$openingcartun+ $itemqty;

         $this->db->select('*');    
         $this->db->from('purchase_master');
         $this->db->where('type','Purchase');
         $this->db->where('voucher_date',$date);
         $query7 = $this->db->get();
        
         if($query7->num_rows()>0){
             foreach($query7->result_array() as $purchasedata ) {  
             $purchseid=$purchasedata['id'];

            
             if($purchseid >0){
                 $this->db->select('qty');    
                 $this->db->from('purchase_data');
                 $this->db->where('purchase_id',$purchseid);
                 $this->db->where('item_id',$item_name);
                 $query10 = $this->db->get();
                 
                 foreach($query10->result_array() as $purchasedata1){
                     $purchseinfo=$purchasedata1['qty'];
                     $purchase=$purchase + $purchseinfo;
                    
                 }

                
             }
         }
     }

             $this->db->select('*');    
                $this->db->from('purchase_master');
                $this->db->where('type','Sales');
                $this->db->where('voucher_date',$date);
                $query11 = $this->db->get();
                if($query11->num_rows()>0){
                    foreach($query11->result_array() as $salesdata ) {   
                    $saleid=$salesdata['id'];
                  
                    if($saleid >0){
                        $this->db->select('qty');    
                        $this->db->from('purchase_data');
                        $this->db->where('purchase_id',$saleid);
                        $this->db->where('item_id',$item_name);
                        $query12 = $this->db->get();
                      
                        foreach($query12->result_array() as $salesdata1){
                            $saleinfo=$salesdata1['qty'];
                          
                            $sales=$sales+ $saleinfo;
                        }

                       
                    }
                }
            }

            $this->db->select('*');
            $this->db->from('batch_master');
            $qry = $this->db->get()->result();
            if ($qry != null) {
                foreach ($qry as $row) {
                    $asbiri = 0;
                    $dt = '';
                    $chbiri = 0;
                   
                    $bct = '';
                    //'2'; //'0.280'; //'0.750'; //'0.0083'; //'0.0044'; //'0.000'; //
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
                   // $this->db->order_by('date', 'ASC');
                    // $this->db->group_by('date');
                    $this->db->where('date',$date);
                   
                  //echo $this->db->last_query();
                   $query = $this->db->get()->result();
                    if ($query != null) {
                        foreach ($query as $row) {
                         
                          //  $dt = $row->d
                            $asbiri = $row->asal_bidi;
                            $chbiri = $row->chant_bidi_pcs;

                            
                            $sum = $asbiri + $chbiri;
    
                         
                            $lq =  $lq+($sum * $lev);
                            $tq = $tq+ ($sum * $tob);
                            $bq = $bq + ($sum * $bly);
                            $wq = $wq+($sum * $why);
                            $filter =$filter+ ($sum * $fil);
                           
                           // echo "sum is".$sum."lev".$lev;
                         //  echo "lq".$lq;
                        }
                       
                        
                    }
                   
                }
            }

            if($item_name=="2"){
                $consumption= $tq;
            }else  if($item_name=="1"){
               
                $consumption= $lq;
            }else  if($item_name=="3"){
                $consumption= $bq;
            }else  if($item_name=="4"){
                $consumption= $wq;
            }else  if($item_name=="5"){
                $consumption= $filter;
            }
            

            $this->db->select('date ,SUM(tobacco_amt) as tobacco_amt, sum(leaves_amt) as leaves_amt,sum(bl_yarn_amt) as bl_yarn_amt,sum(wh_yarn_amt) as wh_yarn_amt,sum(filter_amt) as filter_amt');
            $this->db->from('cont_adj');
            $this->db->where('date',$date);
            $query8 = $this->db->get()->result();
            if ($query8 != null) {
                foreach ($query8 as $row1) {


                    $tobacco_amt= $row1->tobacco_amt;
                    $leaves_amt=$row1->leaves_amt;;
                    $bl_yarn_amt=$row1->bl_yarn_amt;;
                    $wh_yarn_amt=$row1->wh_yarn_amt;;
                    $filter_amt=$row1->filter_amt;;
                }

            }

            if($item_name=="2"){
                $shortage= $tobacco_amt;
            }else  if($item_name=="1"){
                $shortage= $leaves_amt;
            }else  if($item_name=="3"){
                $shortage= $bl_yarn_amt;
            }else  if($item_name=="4"){
                $shortage= $wh_yarn_amt;
            }else  if($item_name=="5"){
                $shortage= $filter_amt;
            }
            if($shortage ==""){
                $shortage=0;
            }

            if($start==$date){
                   
            }else{
             
                $opningbal=$closebalanceamt;
             
            } 
             $closebalance=$opningbal+ $purchase-($sales+$shortage+ $consumption);
             $closebalanceamt=$closebalance;
               
            
            $consumption  =round($consumption, 3); 
            $shortage  =round($shortage, 3); 
           
               
               
            $result[]=array(
                'openingbal'=>$opningbal,
                'purchase'=>$purchase,
                'consumption'=>$consumption,
                'shortage'=>$shortage,
                'sales'=>$sales,
                'closebalance'=>$closebalance,
                'date'=>$date,
               
            );

    }

    if($start==$fidate){
    return $result;   
    }else{
        $currentdate=getDatesFromRange($fidate,$end);
        
        foreach($currentdate as $betwwendate){
         
           
         foreach($result as $alldata){
        //  for($i=0;$i<count($result);$i++)
          
          // $result[$i]['date'];
            if($betwwendate == $alldata['date']){
                $getdatedata[]=array(
                    'openingbal'=>$alldata['openingbal'],
                    'purchase'=>$alldata['purchase'],
                    'consumption'=>$alldata['consumption'],
                    'shortage'=>$alldata['shortage'],
                    'sales'=>$alldata['sales'],
                    'closebalance'=>$alldata['closebalance'],
                    'date'=>$alldata['date'],
                   
                );
             }
            }
        }
        return $getdatedata;  
}
}

  

}
?>