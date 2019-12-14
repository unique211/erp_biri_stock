<?php
class Finished_product_model extends CI_Model{

    function insertdata($data,$table)
	{
        $result = $this->db->insert($table,$data);
        return $result;
    } 
    function updatedata($table,$id)
    {
        $this->db->where('ref_id',$id);
        $result = $this->db->delete($table);
        return $result;
    } 
    function showalldata($table,$where)
    {
        $where1=$this->input->post('where1');
        if($table == "finished_product")
        {
            $this->db->select('finished_product.*,packingbatch.lablenm,packingbatch.id as pid,packingbatch.asalbidi as bidi,packingbatch.chantbidi as cbidi');    
            $this->db->from('finished_product');
            $this->db->join('packingbatch','packingbatch.id=finished_product.label_id');
            $this->db->where('date >=',$where);
            $this->db->where('date <=',$where1);
            //$this->db->where('index_value != ""');
            $query = $this->db->get();
            return $query->result();
        }
    }
    function delete_data($table_name,$id)
    {
        $this->db->where('ref_id',$id);
        $result = $this->db->delete($table_name);
        return $result;
    } 
    function formdata($table)
    {  
        if($table == "packingbatch")
        {
            $this->db->select('packingbatch.*');    
            $this->db->from('packingbatch');
            $this->db->where('index_value != ""');
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
        } 
        else {
            $id= $id + $query;
        }
        return  $id;
    }
    function editdata($table_name,$id)
    {
        $value='';
        $this->db->where('ref_id',$id);
        $this->db->select('finished_product.*,packingbatch.lablenm,packingbatch.asalbidi as bidi,packingbatch.chantbidi as cbidi ');    
        $this->db->from('finished_product');
        $this->db->join('packingbatch','packingbatch.id=finished_product.label_id');
        //$this->db->where('index_value',$value);
        $query = $this->db->get();
        return $query->result();
    } 
    function filtertoday($table_name)
    {
        $this->db->select_max('date');
        $query = $this->db->get('finished_product');
        return $query->result();
    } 
     
}
?>