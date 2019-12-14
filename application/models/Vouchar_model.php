<?php
class Vouchar_model extends CI_Model{
    
    function insertdata($table,$data)
	{         
        $result = $this->db->insert($data,$table);
        return $result;
    }
    function insertrecord($table,$data)
	{         
        $this->db->insert($data,$table);
        $result = $this->db->insert_id();
        return $result;
    }
    function updatedata($table,$data,$id)
    {
        $this->db->where('id',$id);
		$result = $this->db->update($data,$table);
      	return $result;
    } 
    function showalldata($table,$id)
    {
        if($table == 'information'){
            $this->db->select('information.*,con-party_master.name as contractor');    
            $this->db->from($table);
            $this->db->join('con-party_master','con-party_master.id=information.name');
            $this->db->where('refid',$id);
            $query = $this->db->get();
            return $query->result();
        }
        else if($table=="vouchar"){
            
            $result ='';$tcontractor='';$data[]='';$query='';$id='';$date='';$type='';$from=0;$to=0;$contractor='';
            $amount=''; $remark='';
            $this->db->select('vouchar.*,cm.name as contractor');    
            $this->db->from($table);
            $this->db->join('con-party_master cm' ,'cm.id=vouchar.from');
            //$this->db->join('con-party_master cm1','cm1.id=vouchar.to');,cm1.name as tcontractor
            $query = $this->db->get()->result();
            foreach($query as $row){
                $id=$row->id;
                $date=$row->date;
                $type=$row->type;
                $from=$row->from;
                $to=$row->to;
                $contractor=$row->contractor;
                $amount=$row->amount;
                $remark=$row->remark;
                //echo $this->db->last_query();
                if($to != ''){
                    $this->db->select('name as tcontractor');    
                    $this->db->from('con-party_master');
                    $this->db->where('id',$to);
                    $result = $this->db->get()->result();
                    foreach($result as $row){
                        $tcontractor=$row->tcontractor;
                        $to=$to;
                    }
                    if($tcontractor != ''){
                        $tcontractor=$tcontractor;
                      //  $tcontrct='';
                    }
                    else{
                        $tcontractor='';
                    }
                }
                else{
                    $tcontractor=='';
                    $to='';
                }
                //if($to == 0 )
                if($type=="Contractor"){
                    $this->db->select_sum('amount');
                    //$this->db->select('*');
                    $this->db->from('information');
                    $this->db->where('refid',$id);
                    $result=$this->db->get()->result();
                    foreach($result as $row){
                       // $refid=$row->refid;
                        $amount=$row->amount;
                    }
                    //echo $this->db->last_query();
                    $data[]=array(
                        'id'=>$id,
                        'date'=>$date,
                        'type'=>$type,
                        'from'=>$from,
                        'to'=>$to,
                        'amount'=>$amount,
                        'remark'=>$remark,
                        'contractor'=>$contractor,
                        'tcontractor'=>''
                    );
    
                }else{
                    $data[]=array(
                        'id'=>$id,
                        'date'=>$date,
                        'type'=>$type,
                        'from'=>$from,
                        'to'=>$to,
                        'amount'=>$amount,
                        'remark'=>$remark,
                        'contractor'=>$contractor,
                        'tcontractor'=>$tcontractor
                    );
    
                }
                
            }
            //echo "data " .json_encode($data);
            return $data;
        }
    }

    function delete_data($table_name,$id)
    {
        if($table_name=='information'){
            $this->db->where('refid',$id);
        }else{
        
            $this->db->where('id',$id);
        }
        $result = $this->db->delete($table_name);
        return $result;
    } 
    function getname($table){
        $where=$this->input->post('ledger');
        $this->db->select('id,name');
        $this->db->from($table);
        //$this->db->where('party',$where);
        //$this->db->where('index_value!=""');
        $query=$this->db->get()->result();
        return $query;
    }
    function getnamebywhere($table){
        $ledger=$this->input->post('ledger');
        $where=$this->input->post('where');
        $where1=$this->input->post('where1');
        $this->db->select('id,name');
        $this->db->from($table);
        $this->db->where('party',$ledger);
        $this->db->where('ledger',$where);
        $this->db->or_where('ledger',$where1);
        $query=$this->db->get()->result();
        return $query;
    }
    function getparty($table){
        $where=$this->input->post('contractor');
        $this->db->select('id,name');
        $this->db->from($table);
        $this->db->where('party',$where);
        $this->db->where('index_value!=""');
        $query=$this->db->get()->result();
        return $query;
    }
}
?>