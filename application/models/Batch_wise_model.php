<?php
class Batch_wise_model extends CI_Model{

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
          if($table == "batch_wise_stock")
          {
          // $this->db->select('rate_master.*');
            $this->db->select('batch_wise_stock.*, item_master.name as itemname');    
           $this->db->from('batch_wise_stock');
           $this->db->join('item_master', 'item_master.id = batch_wise_stock.item');
         
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
      function fetch_qty($table_name,$table_name2,$id)
      {
         
          $this->db->select('item_master.qty,item_master.alt_qty, sum(batch_wise_stock.qty) as total_qty, sum(batch_wise_stock.alt_qty) as total_alt_qty');    
          $this->db->from('item_master');
          $this->db->join('batch_wise_stock','batch_wise_stock.item=item_master.id','inner');
          $this->db->where('item_master.id',$id);
          $query = $this->db->get();
          return $query->result();

      } 
      function selectdata($table_name,$where)
      {
         
          $this->db->select('batch_wise_stock.*');    
          $this->db->from('batch_wise_stock');
          $this->db->where($where);
          $query = $this->db->count_all_results();
          return $query;
      } 
      function selectdata2($table_name,$where)
      {
         
          $this->db->select('raw_batch_master.*');    
          $this->db->from('raw_batch_master');
          $this->db->where('batch',$where);
          $query = $this->db->count_all_results();
          return $query;
      } 
     
}
?>