<?php
class Bidisalesmonthlymodel extends CI_Model{

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
      function getsumofbidisales($fidate,$cudate){
       // $fidate = '2019-04-15'; // yy-mm-dd format
        //$cudate = '2020-04-1';
        $start    = new DateTime($fidate);
       
      
        $end      = new DateTime($cudate);
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);
        $result=array();
       
        foreach ($period as $dt) {
            $basicsum=0;
            $sumnccdamt=0;
            $cgstsum=0;
            $igstsum=0;
            $sgstsum=0;
            $sumqty=0;
            $totalqty=0;
            $totalpackno=0;
            $totalrate=0;
            $bidi=0;
            $sumigt=0;
            $date= $dt->format("Y-m") ."&nbsp;&nbsp;" ;
             $dateinfo=(explode("-",$date));
             $year=$dateinfo[0];
             $month=$dateinfo[1];
             $sumtotal=0;
             $totalgst=0;
                //echo $year."".$month;
            
                $this->db->select('id,sgst,cgst,nccd,basic,igst,total');    
                $this->db->from('purchase_master');
                $this->db->where('type','Finish Product');
                $this->db->where('MONTH(voucher_date)',$month);
                $this->db->where('year(voucher_date)',$year);
                
                $query5 = $this->db->get();
               // echo $this->db->last_query();
                if($query5->num_rows()>0){

                    foreach($query5->result_array() as $purchasemasterdata){
                      
                        
                            $salid=$purchasemasterdata['id'];
                            $sgst=$purchasemasterdata['sgst'];
                            $cgst=$purchasemasterdata['cgst'];
                            $nccd=$purchasemasterdata['nccd'];
                            $basic=$purchasemasterdata['basic'];
                            $totalvalue=0;
                            $igst=$purchasemasterdata['igst'];
                            $totaldata=$purchasemasterdata['total'];
                           $totalbasicqty=0;
                            
                          
                    $this->db->select('*');    
                    $this->db->from('sale_data');
                     $this->db->where('sale_id', $salid);
                    $query6 = $this->db->get();
                    if($query6->num_rows() >0){
                        foreach($query6->result_array() as $salesdata){
                            $qty=$salesdata['qty'];
                            $packno=$salesdata['pack'];
                            $rate=$salesdata['rate'];
                            $totalvalue= $totalvalue+$qty*$packno* $rate;
                           //$totaldata=$totaldata+$totalvalue;
                        $totalbasicqty=$totalbasicqty+$qty;
                          //echo $packno;
                            $totalqty=$totalqty+$qty;
                           // echo  $totalqty;
                            $totalpackno=$totalpackno+$packno;
                            $totalrate=$totalrate+$rate;

                        }
                       

                    }
                    

                    
                    $basicsum=$basicsum+($totalbasicqty*$basic);
                    $sumnccdamt=$sumnccdamt+($totalbasicqty*$nccd);
                    $sgstsum=$sgstsum+(round($totaldata*$sgst/100));
                    $cgstsum=$cgstsum+(round($totaldata*$cgst/100));
                    $igstsum=$igstsum+(round($totaldata*$igst/100));
                    $totalgst= $sgstsum+$cgstsum+$igstsum;
                    
                    }
                  

                    
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
               
               
               
               
               
               
               
            $sumnccdamt=round($sumnccdamt);
            $basicsum=round($basicsum);
               
               
            $result[]=array(
                'packno'=>$totalpackno,
                'sumqty'=>$totalqty,
                'salevalue'=>$totalrate,
                'sumbasic'=>$basicsum,
                'sumnccd'=>$sumnccdamt,
                'sumcgst'=>$cgstsum,
                'sumsgst'=>$sgstsum,
                'sumigst'=>$igstsum,
                'totalgst'=>$totalgst,
                'month'=>$mon1,
                'year'=>$year,
                'montid'=>$month,
            );
                

        }
        return $result;
     
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