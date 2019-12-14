<?php
class Rg12Amodel extends CI_Model{

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
      function getdateitemsum($fidate,$cudate){
       $currentdate=array();
       $getdatedata=array();
       $result=array();
        $loosepcs=0;
        $opninglable=0;
        $sum=0;
        $sumdata=0;
        $ratio1=0;
        $ratio2=0;
        $ratio3=0;
        $alltotal=0;
        $openingcurtn=0;
        $cartonsumdata=0;
       
        $datedata=array();
         $qtysum=0;
        $chanbidy=0;
        $aslbidi=0;
        $cartonsumdata=0;
        $totalbidy=0;
        $saleproqtysum=0;
      
        $totalbidy=0;
       
        $looseinfo=0;
        $opninglableinfo=0;
        $alltotalinfo=0;
        $closingloospc=0;
        $closinglable=0;
        $closingbalancelableinpc=0;
        $reciveloosepc=0;
        $totalloosepcs=0;
        $totalopninglable=0;
        $totalalltotal=0;
        $this->db->select('fsdate');    
        $this->db->from('financial_period');

       $query = $this->db->get();
      $finicialdate= $query->result_array();
      $start=$finicialdate[0]['fsdate'];
      $enddate= date("Y/m/d");
    $end= date("Y-m-t",strtotime($enddate));
   
   

     
       
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

      $datedata=getDatesFromRange($start,$end);

foreach($datedata as $date){
  $salesqty=0;
  $pack=0;
        $this->db->select('sum(qty) as loosepcs');    
        $this->db->from('item_master');
        $this->db->where_in('id','11,12,13,14');
       $query = $this->db->get();
       $itemsum=$query->result_array();
       $loosepcs=$itemsum[0]['loosepcs'];

       $this->db->select('sum(openingcurtn) as openingcurtn');    
       $this->db->from('packingbatch');
      $query1 = $this->db->get();
      if($query1->num_rows()>0){
      $lable=$query1->result_array();
        $opninglable=$lable[0]['openingcurtn'];
      }

      $this->db->select('ratio1,ratio2,ratio3,openingcurtn');    
      $this->db->from('packingbatch');
     $query3 = $this->db->get();
     $opnigcarton=$query3->result_array();
     foreach($opnigcarton as $packingdata){
      $ratio1=$packingdata['ratio1'];
      $ratio2=$packingdata['ratio2'];
      $ratio3=$packingdata['ratio3'];
      $openingcurtn=$packingdata['openingcurtn'];

      if($ratio1 > 0 && $ratio2 >0 &&  $ratio3 && $openingcurtn >0){
        $sum=($ratio1 *  $ratio2 * $ratio3 * $openingcurtn);
        $sumdata=$sum /1000;
        $alltotal=$alltotal+$sumdata;
      } 
     }
   

    
     $this->db->select('sum(asal_bidi) as asal_bidi,sum(chant_bidi_pcs) as chant_bidi_pcs');    
     $this->db->from('cont_issue_receive');
     $this->db->where('cont_issue_receive.date', $date);
    $query3 = $this->db->get();
    $opnigcarton=$query3->result_array();
    if($query3->num_rows()>0){
    foreach($opnigcarton as $cont_issue_receive){
    $chanbidy=$cont_issue_receive['chant_bidi_pcs'];
    $aslbidi=$cont_issue_receive['asal_bidi'];
    if($chanbidy ==null){
      $chanbidy=0;
    }if($aslbidi ==null){
      $aslbidi=0;
    }
  }
}
     $this->db->select('id');    
     $this->db->from('purchase_master');
     $this->db->where('type','Purchase');
     $this->db->where('purchase_id !=','0');
     $this->db->where('voucher_date', $date);
    $query33 = $this->db->get();
      if($query33->num_rows()>0){
    $purchase=$query33->result_array();
 
    foreach($purchase as $purchase_data){
      $id=$purchase_data['id'];
         $this->db->select('sum(qty) as qtysum');    
         $this->db->from('purchase_data');
         $this->db->where('purchase_id', $id);
       $query4 = $this->db->get();
      foreach($query4->result_array() as $purchaseqty){
        $qtysum=$purchaseqty['qtysum'];
      }
      }
    }
     
     $this->db->select('sum(cartons) as cartonssum,sum(total_bidi) as totalbidy');    
     $this->db->from('finished_product');
     $this->db->where('finished_product.date', $date);
     $query5 = $this->db->get();
      if($query5->num_rows()>0){
    foreach($query5->result_array() as $cartonsum){
        
        $cartonsumdata=$cartonsum['cartonssum'];
        $totalbidy=$cartonsum['totalbidy'];
        if($cartonsumdata==null){
          $cartonsumdata=0;
        }
        if($totalbidy==null){
          $totalbidy=0;
        }
       
    }
  }

    $this->db->select('id');    
     $this->db->from('purchase_master');
     $this->db->where('type','Sales');
     $this->db->where('purchase_id !=','0');
     $this->db->where('voucher_date',$date);
    $query33 = $this->db->get();
    if($query33->num_rows()>0){
    $salespurchase=$query33->result_array();
 
    foreach($salespurchase as $purchase_data1){
      $id=$purchase_data1['id'];
         $this->db->select('sum(qty) as qtysum');    
         $this->db->from('purchase_data');
         $this->db->where('purchase_id', $id);
       $query4 = $this->db->get();
       if($query4->num_rows >0){
      foreach($query4->result_array() as $purchaseqty){
        $saleproqtysum=$purchaseqty['qtysum'];
      }
     
     
     }
    }
  }
    $this->db->select('id');    
    $this->db->from('purchase_master');
    $this->db->where('type','Finish Product');
    $this->db->where('sale_id!=','0');
    $this->db->where('voucher_date', $date);
     $query7 = $this->db->get();
   //  echo $this->db->last_query();
     if($query7->num_rows()>0){
   $finishedproduct=$query7->result_array();
   foreach($finishedproduct as $finishedata){
   
     $salid=$finishedata['id'];
     
    $this->db->select('sum(qty) as saleqtysum,sum(pack) as packsum');    
    $this->db->from('sale_data');
    $this->db->where('sale_id', $salid);
     $query9 = $this->db->get();
    // echo $this->db->last_query();
  if($query9->num_rows() >0){
    foreach($query9->result_array() as $salesinfo){

      $salesqty=$salesinfo['saleqtysum'];
      $pack=$salesinfo['packsum'];
     
    }
  }
   }
  }
  
    $reciveloosepc=$chanbidy+$aslbidi+$qtysum;
   
  
    
   
    
     
   
     if($start !=$date){
   
      $loosepcs=$closingloospc;
   
    $opninglable=$closinglable;
    $alltotal=$closingbalancelableinpc;
  }
  $totalopninglable= ($cartonsumdata+$opninglable);
  $totalloosepcs=(($reciveloosepc+$loosepcs)-$totalbidy); 
  $totalalltotal=($alltotal+$totalbidy);
  
  if($saleproqtysum >0){
    $closingloospc=$totalloosepcs-$saleproqtysum;
  }else{
    $closingloospc=$totalloosepcs;
  }
  if($pack>0){
    $closinglable=$totalopninglable-$pack;
  }else{
    $closinglable=$totalopninglable;
  }
  if($salesqty >0){
    $closingbalancelableinpc=$totalalltotal-$salesqty;
  }else{
    $closingbalancelableinpc=$totalalltotal;
  }
 
 /*$loosepcs=round($loosepcs, 3);
 $alltotal=round($alltotal, 3);
 $reciveloosepc=round($reciveloosepc, 3);
 $totalbidy=round($totalbidy, 3);
 $closingloospc=round($closingloospc, 3);
 $closingbalancelableinpc=round($closingbalancelableinpc, 3);
 $totalloosepcs=round($totalloosepcs, 3);
 $totalalltotal=round($totalalltotal,3);*/

 /*number_format($loosepcs,3);
 number_format($alltotal,3);
 number_format($reciveloosepc,3);
 number_format($totalbidy,3);
 number_format($closingloospc,3);
 number_format($closingbalancelableinpc,3);
 number_format($totalloosepcs,3);
 number_format($totalalltotal,3);*/


    $result[]=array(
      'date'=>$date,
      'loosepcs'=>$loosepcs,
      'opninglable'=>$opninglable,
      'alltotal'=>$alltotal,
      'chanbidy'=>$chanbidy,
      'aslbidi'=>$aslbidi,
      'qtysum'=>$qtysum,
      'reciveloosepc'=>$reciveloosepc,
      'receivelable'=>$cartonsumdata,
      'receivepcs'=>$totalbidy,
      'saleloses'=>$saleproqtysum,
      'saleslablebox'=>$pack,
      'saleslableinpcs'=>$salesqty,
      'closingloosepc'=>$closingloospc,
      'closinglabel'=>$closinglable,
      'closingbalancelableinpc'=>$closingbalancelableinpc,
      'totallosebalnce'=> $totalloosepcs,
      'totallablebox'=> $totalopninglable,
      'totallabelinpc'=> $totalalltotal,
      
    );
}
if($start==$fidate &&  $end==$cudate){
 
return  $result;
      }else{
        $todaydate= date("Y-m-d");
        
        $currentdate=getDatesFromRange($fidate,$cudate);
        
        foreach($currentdate as $betwwendate){
         
           
         foreach($result as $alldata){
        //  for($i=0;$i<count($result);$i++)
          
          // $result[$i]['date'];
            if($betwwendate == $alldata['date']){
              if($betwwendate ==$todaydate || $betwwendate <$todaydate ){ 
              
              $getdatedata[]=array(
                'date'=>$alldata['date'],
                'loosepcs'=>$alldata['loosepcs'],
                'opninglable'=>$alldata['opninglable'],
                'alltotal'=>$alldata['alltotal'],
                'chanbidy'=>$alldata['chanbidy'],
                'aslbidi'=>$alldata['aslbidi'],
                'qtysum'=>$alldata['qtysum'],
                'reciveloosepc'=>$alldata['reciveloosepc'],
                'receivelable'=>$alldata['receivelable'],
                'receivepcs'=>$alldata['receivepcs'],
                'saleloses'=>$alldata['saleloses'],
                'saleslablebox'=>$alldata['saleslablebox'],
                'saleslableinpcs'=>$alldata['saleslableinpcs'],
                'closingloosepc'=>$alldata['closingloosepc'],
                'closinglabel'=>$alldata['closinglabel'],
                'closingbalancelableinpc'=>$alldata['closingbalancelableinpc'],
                'totallosebalnce'=> $alldata['totallosebalnce'],
                'totallablebox'=> $alldata['totallablebox'],
                'totallabelinpc'=> $alldata['totallabelinpc'],
              );
            }
          }
        
        }
        }
        return $getdatedata;
      }    
    }


  

  function getreceivedata($sdate,$edate){
    $this->db->select('sum(cartons) as cartonssum,sum(total_bidi) as totalbidy');    
    $this->db->from('finished_product');
    $this->db->where('finished_product.date', $date);
    $query5 = $this->db->get();
    return $query5->result();

   }
  

     
}
?>