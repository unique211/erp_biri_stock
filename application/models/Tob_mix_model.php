<?php
class Tob_mix_model extends CI_Model{

     function insertdata($data,$table)
	{
          $this->db->insert($table,$data);
          $result = $this->db->insert_id();
          return $result;
     } 
     function insertdata1($data,$table)
	{
          $result =  $this->db->insert($table,$data);
       
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
         if($table == "tobaccomix_master")
         {
           $this->db->select('tobaccomix_master.*,raw_batch_master.batch as batch_name');    
           $this->db->from('tobaccomix_master');
           $this->db->join('raw_batch_master','raw_batch_master.id=tobaccomix_master.batch');
           $this->db->where('date',$where);
           $query = $this->db->get();
           return $query->result();
          
         }
 
       }
       function delete_data($table_name,$id)
      {
          if ($table_name == "tobaccomix_master") {
              $this->db->where('id', $id);
              $result = $this->db->delete($table_name);
              return $result;
          }else if ($table_name == "tobaccomix_data") {
               $this->db->where('ref_id', $id);
               $result = $this->db->delete($table_name);
               return $result;
           }

      } 
      function formdata($table,$where)
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
       function formdata2($table,$where)
     { 
         if($table == "raw_batch_master")
         {
           $this->db->select('raw_batch_master.*');    
           $this->db->from('raw_batch_master');
           $this->db->where('batch',$where);
           $query = $this->db->get();
           return $query->result();
          
         }
 
       }
       public function getmaxid()
          {
          $this->db->select_max('id');
          $this->db->from('finished_product');
          $result = $this->db->get()->row();
         
          $id=1;
          $query=$result->id;
          if ($query == null) {
               $id=1;
          } else {
               $id= $id + $query;
          }
          return  $id;
          }
          function editdata($table_name,$id)
          {
              $this->db->where('ref_id',$id);
             
              $this->db->select('finished_product.*,packingbatch.lablenm ');    
           $this->db->from('finished_product');
           $this->db->join('packingbatch','packingbatch.id=finished_product.label_id');
          
          
           $query = $this->db->get();
           return $query->result();
            
    
          } 
          function filtertoday($table_name)
      {
        $this->db->select_max('date');
       $query = $this->db->get('tobaccomix_master');
        return $query->result();
      } 
      function tobacco_id($item)
      {
          $this->db->select('item_master.id');    
          $this->db->from('item_master');
          $this->db->where('name',$item);
          $query = $this->db->get();
          return $query->result();
      } 
      function fetch_data($id,$table_name)  
          {
          $this->db->select('tobaccomix_data.*,batch_wise_stock.batch as batch_name');    
           $this->db->from('tobaccomix_data');
           $this->db->join('batch_wise_stock', 'batch_wise_stock.id = tobaccomix_data.batch');
           $this->db->where("ref_id", $id);  
          
           $query = $this->db->get();
           return $query->result();
              
               
          }
     
}
?>