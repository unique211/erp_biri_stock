<?php
class Batch_creation_model extends CI_Model{

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
    function updateindex($table,$where,$id) {
        $data = array(
            'index_value'=>$where,
        );
        $this->db->where('id',$id);
        $result = $this->db->update($table,$data);
        return $result;
    } 
    function showalldata($table)
    { 
        if($table == "batch_master")
        {
           $this->db->select('batch_master.*');    
           $this->db->order_by("index_value", "asc");
           $this->db->from('batch_master');
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