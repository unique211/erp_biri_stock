<?php
class Raw_IT_model extends CI_Model{

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
     function showalldata($table,$where)
     { 
         if($table == "raw_item")
         {
           $this->db->select('raw_item.*
           ,(select cm.name from `con-party_master` cm where cm.id=raw_item.t_from) as t_from_name
           ,(select cm1.name from `con-party_master` cm1 where cm1.id=raw_item.t_to) as t_to_name
           ,(select bm.batch from `batch_master` bm where bm.id=raw_item.batch1) as batch1_name
           ,(select bm1.batch from `batch_master` bm1 where bm1.id=raw_item.batch2) as batch2_name
           ');    
           $this->db->from('raw_item');
           $this->db->where('date',$where);
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
      function filtertoday($table_name)
      {
        $this->db->select_max('date');
       $query = $this->db->get('raw_item');
        return $query->result();
      } 
}
?>