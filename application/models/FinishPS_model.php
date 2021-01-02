<?php
class FinishPS_model extends CI_Model{

     function insertdata($data,$table)
	{
            $this->db->insert($table,$data);
            $result = $this->db->insert_id();
            return $result;
           
           
     } 
     function insertdata1($data,$table)
	{
          $result =$this->db->insert($table,$data);
            
            return $result;
           
           
     } 
     function updatedata($data,$table,$id)
     {
          $this->db->where('id',$id);
          $result = $this->db->update($table,$data);
           return $result;

     } 
     function showalldata($table,$where)
     { 
         if($table == "purchase_master")
         {
          //  $this->db->select('purchase_master.*,con-party_master.name as party_name');    
          //  $this->db->from('purchase_master');
          //  $this->db->join('con-party_master', 'con-party_master.id = purchase_master.party_id');
          //  $this->db->where($where);
          //  $query = $this->db->get();
		//  return $query->result();

		$sdate =$this->input->post('date');
		$edate =$this->input->post('edate');
		
		$result=array();
           $this->db->select('purchase_master.*,con-party_master.name as party_name,purchase_master.id as id');    
           $this->db->from('purchase_master');
           $this->db->join('con-party_master', 'con-party_master.id = purchase_master.party_id');
		 //$this->db->where('type','Finish Product');
		  $this->db->where($where);
		  if(($sdate != "")&& ($edate !="")){
			$this->db->where('purchase_master.voucher_date >=',$sdate);
			$this->db->where('purchase_master.voucher_date <=',$edate);
		  }else if(($sdate != "")&& ($edate =="")){
			$this->db->where('purchase_master.voucher_date',$edate);
 
		  }
		 

		 $query = $this->db->get();
		 foreach($query->result_array() as $value){

			$id=$value['id'];
			$sale_id=$value['sale_id'];
			$voucher_date=$value['voucher_date'];
			$type=$value['type'];
			$bill_no=$value['bill_no'];
			$bill_date=$value['bill_date'];
			$party_id=$value['party_id'];
			$sgst=$value['sgst'];
			$cgst=$value['cgst'];
			$igst=$value['igst'];
			$nccd=$value['nccd'];
			$total=$value['total'];
			$truck_no=$value['truck_no'];
			$freight=$value['freight'];
			$basic=$value['basic'];
			$party_name=$value['party_name'];
			$gst_invoice_no=$value['gst_invoice_no'];
			$packsum=0;
			$qtysum=0;

			$this->db->select('SUM(pack) AS AMOUNT,sum(qty) as sumqty');
			$this->db->where('sale_id',$id);
			$query1 = $this->db->get('sale_data');
			foreach($query1->result_array() as $value1){
				$packsum=$value1['AMOUNT'];
				$qtysum=$value1['sumqty'];
			}
			$result[]=array(
				'id'=>$id,
				'sale_id'=>$sale_id,
				'voucher_date'=>$voucher_date,
				'type'=>$type,
				'bill_no'=>$bill_no,
				'bill_date'=>$bill_date,
				'party_id'=>$party_id,
				'sgst'=>$sgst,
				'cgst'=>$cgst,
				'igst'=>$igst,
				'nccd'=>$nccd,
				'total'=>$total,
				'truck_no'=>$truck_no,
				'freight'=>$freight,
				'basic'=>$basic,
				'party_name'=>$party_name,
				'packsum'=>$packsum,
				'qtysum'=>$qtysum,
				'gst_invoice_no'=>$gst_invoice_no
			);

			


		 }
		 return $result;
          
         }
 
       }
       function showalldata1($table)
     { 
         if($table == "purchase_master")
         {
		    $result=array();
           $this->db->select('purchase_master.*,con-party_master.name as party_name,purchase_master.id as id');    
           $this->db->from('purchase_master');
           $this->db->join('con-party_master', 'con-party_master.id = purchase_master.party_id');
           $this->db->where('type','Finish Product');
		 $query = $this->db->get();
		 foreach($query->result_array() as $value){

			$id=$value['id'];
			$sale_id=$value['sale_id'];
			$voucher_date=$value['voucher_date'];
			$type=$value['type'];
			$bill_no=$value['bill_no'];
			$bill_date=$value['bill_date'];
			$party_id=$value['party_id'];
			$sgst=$value['sgst'];
			$cgst=$value['cgst'];
			$igst=$value['igst'];
			$nccd=$value['nccd'];
			$total=$value['total'];
			$truck_no=$value['truck_no'];
			$freight=$value['freight'];
			$basic=$value['basic'];
			$party_name=$value['party_name'];
			$gst_invoice_no=$value['gst_invoice_no'];

			$packsum=0;
			$qtysum=0;

			$this->db->select('SUM(pack) AS AMOUNT,sum(qty) as sumqty');
			$this->db->where('sale_id',$id);
			$query1 = $this->db->get('sale_data');
			foreach($query1->result_array() as $value1){
				$packsum=$value1['AMOUNT'];
				$qtysum=$value1['sumqty'];
			}
			$result[]=array(
				'id'=>$id,
				'sale_id'=>$sale_id,
				'voucher_date'=>$voucher_date,
				'type'=>$type,
				'bill_no'=>$bill_no,
				'bill_date'=>$bill_date,
				'party_id'=>$party_id,
				'sgst'=>$sgst,
				'cgst'=>$cgst,
				'igst'=>$igst,
				'nccd'=>$nccd,
				'total'=>$total,
				'truck_no'=>$truck_no,
				'freight'=>$freight,
				'basic'=>$basic,
				'party_name'=>$party_name,
				'packsum'=>$packsum,
				'qtysum'=>$qtysum,
				'gst_invoice_no'=>$gst_invoice_no,
			);

			


		 }
		 return $result;
           //$a=$this->db->last_query();
          // echo $a;
         //  return $query->result();
          
         }
 
       }
     function data_get($table){
          $this->db->select('*');
          $this->db->order_by('lablenm','ASC');
          //$this->db->from($table);
          $this->db->where('index_value != ""');
          $hasil=$this->db->get($table);
		return $hasil->result();
	}
       function getcode($id){
            $flag=0;
            $this->db->select('state_code');
            $this->db->from('company_management');
            $result=$this->db->get();
            if($result->num_rows()>0){
            $code= $result->row()->state_code;
            $this->db->select('state_code');
            $this->db->where('id',$id);
            $this->db->from('con-party_master');
            $query=$this->db->get();
            $scode= $query->row()->state_code;
            if($scode == $code){
               $flag = 1;
              // return $flag;
            }
            else{
                 $flag=0;
                 //return $flag;
            }
            return $flag;
          }
       }
       function delete_data($table_name,$id)
      {
           if($table_name == "purchase_master")
          {
          $this->db->where('id',$id);
          $result = $this->db->delete($table_name);
         
          }else if($table_name == "sale_data"){
                $this->db->where('sale_id',$id);
               $result = $this->db->delete($table_name);
             
          }
          return $result;
      }
      function filter_batch($table,$where)
     { 
         if($table == "batch_wise_stock")
         {
           $this->db->select('batch_wise_stock.*');    
           $this->db->from('batch_wise_stock');
           $this->db->where('item',$where);
           $query = $this->db->get();
           return $query->result();
          
         }
 
       }
       public function getmaxid()
       {
       $this->db->select_max('purchase_id');
       $this->db->from('purchase_master');
       $result = $this->db->get()->row();
      
       $id=1;
       $query=$result->purchase_id;
       if ($query == null) {
            $id=1;
       } else {
            $id= $id + $query;
       }
       return  $id;
       }
       public function getmaxid2()
       {
       $this->db->select_max('sale_id');
       $this->db->from('purchase_master');
       $result = $this->db->get()->row();
      
       $id=1;
       $query=$result->sale_id;
       if ($query == null) {
            $id=1;
       } else {
            $id= $id + $query;
       }
       return  $id;
       }
       function fetch_data($id,$table_name)  
          {
          $this->db->select('sale_data.*,packingbatch.lablenm as batch_name');    
           $this->db->from('sale_data');
           $this->db->join('packingbatch', 'packingbatch.id = sale_data.batch_id');
           $this->db->where("sale_id", $id);  
          
           $query = $this->db->get();
           return $query->result();
              
               
          }
          function formdata($table,$where)
          { 
              if($table == "packingbatch")
              {
                $this->db->select('packingbatch.*');    
                $this->db->from('packingbatch');
                $this->db->where("id", $where); 
                $query = $this->db->get();
                return $query->result();
               
              }
      
		  }
		  function getmasterdata($id){
			$result=array();
			$this->db->select('purchase_master.*,con-party_master.name as party_name,purchase_master.id as id,con-party_master.address as address,con-party_master.district,con-party_master.pan,con-party_master.aadhar,con-party_master.gstno');    
			$this->db->from('purchase_master');
			$this->db->join('con-party_master', 'con-party_master.id = purchase_master.party_id');
			$this->db->where('type','Finish Product');
			$this->db->where('purchase_master.id',$id);
			$query = $this->db->get();
			foreach($query->result_array() as $value){
    
			    $id=$value['id'];
			    $sale_id=$value['sale_id'];
			    $voucher_date=$value['voucher_date'];
			    $type=$value['type'];
			    $bill_no=$value['bill_no'];
			    $bill_date=$value['bill_date'];
			    $party_id=$value['party_id'];
			    $sgst=$value['sgst'];
			    $cgst=$value['cgst'];
			    $igst=$value['igst'];
			    $nccd=$value['nccd'];
			    $total=$value['total'];
			    $truck_no=$value['truck_no'];
			    $freight=$value['freight'];
			    $basic=$value['basic'];
			    $party_name=$value['party_name'];
					$gst_invoice_no=$value['gst_invoice_no'];
					
					$address=$value['address'];
					$district=$value['district'];
					$pan=$value['pan'];
					$aadhar=$value['aadhar'];
					$gstno=$value['gstno'];
    
			    $packsum=0;
			    $qtysum=0;
    
			    $this->db->select('SUM(pack) AS AMOUNT,sum(qty) as sumqty');
			    $this->db->where('sale_id',$id);
			    $query1 = $this->db->get('sale_data');
			    foreach($query1->result_array() as $value1){
				    $packsum=$value1['AMOUNT'];
				    $qtysum=$value1['sumqty'];
			    }
			    $result[]=array(
				    'id'=>$id,
				    'sale_id'=>$sale_id,
				    'voucher_date'=>$voucher_date,
				    'type'=>$type,
				    'bill_no'=>$bill_no,
				    'bill_date'=>$bill_date,
				    'party_id'=>$party_id,
				    'sgst'=>$sgst,
				    'cgst'=>$cgst,
				    'igst'=>$igst,
				    'nccd'=>$nccd,
				    'total'=>$total,
				    'truck_no'=>$truck_no,
				    'freight'=>$freight,
				    'basic'=>$basic,
				    'party_name'=>$party_name,
				    'packsum'=>$packsum,
				    'qtysum'=>$qtysum,
						'gst_invoice_no'=>$gst_invoice_no,
						'address'=>$address,
						'district'=>$district,
						'pan'=>$pan,
						'aadhar'=>$aadhar,
						'gstno'=>$gstno,
			    );
    
			    
    
    
			}
			return $result;
			}
			function companydata(){
				$this->db->select('company_management.*,states.name as statename');    
				$this->db->from('company_management');
				$this->db->join('states', 'states.id = company_management.state');
				$query = $this->db->get();
				return $query->result();
			}

			function getcontractortdata($fdate,$date){
				$query='';$id='';$contractorname=''; $data=array();$result='';
        $nm="contractor";
			 
			
		$where="withoutdeduction";
			
	
        if($where == 'withoutdeduction'){
            $this->db->select('id,party,name,address,district,pin');
            $this->db->from('con-party_master');
            $this->db->order_by('name','ASC');
            $this->db->where('party',$nm);
            $query=$this->db->get()->result();
            //echo json_encode($query);
            foreach($query as $row){
                $asalbidi=0;$chatbidikg=0;$wg=0;$fromwages='';$wages=0;$mulwages=0;$bonus=0;$mulbonus=0;$sumofbounas=0;$sum=0;$handling=0;$sumofhand=0;$mulhand=0;$chatbiri=0;$sumofadition=0;$muladdition=0;$sumofasbWg=0;$selectsum=0;
                $GrossTotal=0;$getval=0;$sumasbchat=0;$contract='';$totalg=0;
                //'16';//'1-ANATH KUMAR';//
								$id=$row->id;
								$address=$row->address;
								$district=$row->district;
								$pin=$row->pin;
							
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
                    $GrossTotal=round($sumofasbWg,2)+round($sumofbounas,2)+round($sumofhand,2)+round($sumofadition,2);
										$totalg=$sumofasbWg+$sumofbounas+$sumofhand;
									}
								
                if($selectsum != ''){
									
                    $data[]=array(
                        'address'=>$address,
                        'name'=>$contractorname,
                        'district'=>$district,
                        'pin'=>$pin,
                        'netbiri'=>number_format(round($selectsum,3),3),
                        'wages'=>number_format(round($sumofasbWg,2),2),
                        'bonus'=>number_format(round($sumofbounas,2),2),
                        'handlingcharges'=>number_format(round($sumofhand,2),2),
                        'addition'=>number_format(round($sumofadition,2),2),
                        'grossTotal'=>number_format(round($GrossTotal,2),2),
                        'wagesd'=>number_format(round($wages,2),2),
                        'bonusd'=>number_format(round($bonus,2),2),
                        'handlingd'=>number_format(round($handling,2),2),
                        'chatbirid'=>number_format(round($chatbiri,2),2),
                        'totalg'=>round($totalg,2),
                    );
                }
                else{
                }
            }
            return $data;
			}
		}

		function getconitem($ctype){
			if($ctype=="Wages"){
				$this->db->select('con_bill_item.*');    
				$this->db->from('con_bill_item');
				$this->db->order_by("id", "asc");
				$this->db->limit(3);  
				$query = $this->db->get();
				return $query->result();
			}else{
				$this->db->select('con_bill_item.*');    
				$this->db->from('con_bill_item');
				$this->db->order_by("id", "desc");
				$this->db->limit(1);  
				$query = $this->db->get();
				return $query->result();
			}
			
		}

     
}
?>
