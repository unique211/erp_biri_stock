<?php
class Financial_period_model extends CI_Model{

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
         if($table == "financial_period")
         {
           $this->db->select('financial_period.*');    
           $this->db->from('financial_period');
          
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
      function chkdata($table_name)
      {
         
          $this->db->select('financial_period.*');    
          $this->db->from('financial_period');
          $query = $this->db->count_all_results();
          return $query;
      }  
     
}
?>