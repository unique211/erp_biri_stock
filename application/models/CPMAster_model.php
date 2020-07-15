<?php
class CPMAster_model extends CI_Model{
    function getBatch(){
        $this->db->select('batch');
        $result=$this->db->get('batch_master');
        return $result;
    }
    function insertdata($table,$data)
	{         
        $this->db->insert($table,$data);
        $result = $this->db->insert_id();
        return $result;
   	} 
   	function updatedata($table,$data,$id)
    {
        $this->db->where('id',$id);
		$result = $this->db->update($table,$data);
      	return $result;
    } 
    function insertrecord($table,$data)
	{         
        $result = $this->db->insert($table,$data);
        return $result;
   	} 
   	function updaterecord($table,$data,$id)
    {
        $this->db->where('id',$id);
		$result = $this->db->update($table,$data);
      	return $result;
    }
    function getstate($table,$where) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$where);
        $query = $this->db->get();
        return $query->result();
    }
    function statusSet($table,$date,$where) {
        $data = array(
            'close_date'=>$date,
            'status' => 0
        );
        $this->db->where('id',$where);
        $result = $this->db->update($table,$data);
        return $result;
    }
    function updatestatusSet($table,$where) {
        $data = array(
            'close_date'=>'0000-00-00',
            'status' => 1
        );
        $this->db->where('id',$where);
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
       	if($table=="con-party_master"){
            $this->db->select('*');    
            $this->db->from('con-party_master');
            $this->db->order_by("name");
            $this->db->where('status','1');
            $query = $this->db->get();
            return $query->result();
        }
        elseif($table=="contractor_master"){
            $this->db->select('*');    
            $this->db->from('contractor_master');
            $query = $this->db->get();
            return $query->result();
        }
    }
    function showallBatch($table,$id)
    { 
        //$id=//'11';
    
       //	if($table=="contractor_master"){,
            $this->db->select('contractor_master.*,batch_master.batch as batchname');    
            $this->db->where('c_id',$id);
            $this->db->from('contractor_master');
            $this->db->join('batch_master','batch_master.id = contractor_master.batch');
            $query = $this->db->get();
            return $query->result();
        //}
    }
    function delete_data($table_name,$id)
    	{
      		if($table_name == "con-party_master"){
      			$this->db->where('id',$id);
		}elseif($table_name == "contractor_master"){
        		$this->db->where('c_id',$id);
       	}
      		$result = $this->db->delete($table_name);
      		return $result;
    }
}

    ?>
