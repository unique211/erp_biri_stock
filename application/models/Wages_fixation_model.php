<?php
class Wages_fixation_model extends CI_Model{

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
         if($table == "wages_fixation")
         {
           $this->db->select('wages_fixation.*');    
           $this->db->order_by("index_value", "asc");
           $this->db->from('wages_fixation');
          
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
     
}
?>