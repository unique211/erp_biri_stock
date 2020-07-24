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

     
}
?>
