<?php
class Cont_IR_model extends CI_Model{

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
        if($table == "cont_issue_receive")
        {
            $this->db->select('cont_issue_receive.*, con-party_master.name as co_name,batch_master.batch as batchname,wages_fixation.name as wagesname');    
            $this->db->order_by('cont_issue_receive.batch1','Desc');
            $this->db->from('cont_issue_receive');
            $this->db->join('con-party_master', 'con-party_master.id = cont_issue_receive.cont_name');
            $this->db->join('batch_master', 'batch_master.id = cont_issue_receive.batch1');
            //$this->db->join('batch_master', 'batch_master.id = cont_issue_receive.batch2');
            $this->db->join('wages_fixation', 'wages_fixation.id = cont_issue_receive.wages');
            $query = $this->db->get()->result();
            return $query;
            //$ary=$query[0]['sum'];
        }
        
    }
       function delete_data($table_name,$id)
      {
          $this->db->where('id',$id);
          $result = $this->db->delete($table_name);
          return $result;

      } 
      function fetch_tobacco($table_name,$id)
      {
          $this->db->select('batch_master.*');    
          $this->db->from('batch_master');
          $this->db->where('id',$id);
          $query = $this->db->get();
          return $query->result();
    } 
    function filterdate($table_name,$where)
    {
        //'2019-04-03';//
        $tdate=$this->input->post('tdate');
        $this->db->select('cont_issue_receive.*, con-party_master.name as co_name,batch_master.batch as batchname,wages_fixation.name as wagesname');    
        $this->db->order_by('batch_master.batch','DESC');
        $this->db->from('cont_issue_receive');
        $this->db->join('con-party_master', 'con-party_master.id = cont_issue_receive.cont_name');
        $this->db->join('batch_master', 'batch_master.id = cont_issue_receive.batch1');
        $this->db->join('wages_fixation', 'wages_fixation.id = cont_issue_receive.wages');
        $this->db->where('date >=',$where);
        $this->db->where('date <=',$tdate);
        $query = $this->db->get()->result();
        return $query;
    } 
    function filtertoday($table_name)
    {
        $this->db->select_max('date');
        $query = $this->db->get('cont_issue_receive');
        return $query->result();
    }
    function getbatch($table,$where){
       // '2019-04-03';//
       $tdate=$this->input->post('tdate');
        $this->db->select('batch_master.batch,SUM(cont_issue_receive.asal_bidi)as asal_bidi,sum(cont_issue_receive.chant_bidi_pcs)as chant_bidi_pcs,SUM(cont_issue_receive.chant_bidi_kgs)as chant_bidi_kgs,SUM(cont_issue_receive.tob)as tob,sum(cont_issue_receive.tob_bag)as tob_bag,sum(cont_issue_receive.leaves)as leaves,SUM(cont_issue_receive.leaves_bag) as leaves_bag, sum(cont_issue_receive.bl_yarn)as bl_yarn,sum(cont_issue_receive.wh_yarn) as wh_yarn,sum(cont_issue_receive.filter)as filter,sum(cont_issue_receive.disc)as disc,SUM(cont_issue_receive.cartons)as cartons');
        $this->db->group_by('batch_master.batch');
        $this->db->order_by('batch_master.batch','DESC');
        $this->db->from('cont_issue_receive');
        $this->db->join('batch_master','batch_master.id=cont_issue_receive.batch1');
        $this->db->where('date >=',$where);
        $this->db->where('date <=',$tdate);
        $query=$this->db->get()->result();
        return $query;
    }
     
}
?>