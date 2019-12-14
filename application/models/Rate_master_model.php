<?php
class Rate_master_model extends CI_Model{

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
         if($table == "rate_master")
         {
         // $this->db->select('rate_master.*');
           $this->db->select('rate_master.*, batch_master.batch as batchname');    
          $this->db->from('rate_master');
          $this->db->join('batch_master', 'batch_master.id = rate_master.batch');
        
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
      function selectdata($table_name,$fdate,$sdate,$batch)
      {
        $this->db->select('rate_master.*');    
        $this->db->from('rate_master');
        //$this->db->where('fdate <=', $sdate);
       // $this->db->where('sdate >=', $fdate);
        $this->db->where('batch', $batch);
        $this->db->where('fdate <= "'. date('Y-m-d', strtotime($fdate)). '" and "'. date('Y-m-d', strtotime($sdate)).'"');
        $this->db->where('sdate >= "'. date('Y-m-d', strtotime($fdate)). '" and "'. date('Y-m-d', strtotime($sdate)).'"');
      //$query=$this->db->query( "SELECT * FROM rate_master WHERE 'batch' = $batch AND 'fdate' BETWEEN $fdate,$sdate AND 'sdate' BETWEEN $fdate,$sdate");
      
        $query = $this->db->count_all_results();
        return $query;
      }
     
}
?>