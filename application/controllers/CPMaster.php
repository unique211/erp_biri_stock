<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPMaster extends CI_Controller {
    function __construct(){
		parent:: __construct();
		$this->load->model('CPMAster_model','m');
     }
     function index(){

     }
    public function adddata(){
        $table_name = $this->input->post('table_name');
        $id=$this->input->post('id');
        $party = $this->input->post('party');
        $data1="";
        $data="";
    
        if($table_name == "con-party_master"){
            $data = array(
                    'party'=>$this->input->post('party'),
                    'ledger'=>$this->input->post('ledger'),
                    'name'=>$this->input->post('name'),
                    'state'=>$this->input->post('state'),
                    'state_code'=>$this->input->post('state_code'),
                    'address'=>$this->input->post('address'),
                    'postoffice'=>$this->input->post('postoffice'),
                    'district'=>$this->input->post('district'),
                    'pin'=>$this->input->post('pin'),
                    'pan'=>$this->input->post('pan'),
                    'aadhar'=>$this->input->post('aadhar'),
                    'gstno'=>$this->input->post('gstno'),
                    'pfcode'=>$this->input->post('pfcode'),
                    'doj'=>$this->input->post('doj'),
                    'security'=>$this->input->post('security'),
                    'pf'=>$this->input->post('pf'),
                    'tds'=>$this->input->post('tds'),
                    'bankac'=>$this->input->post('bankac'),
                    'bankname'=>$this->input->post('bankname'),
                    'amount'=>$this->input->post('amount'),
                    'ifsc'=>$this->input->post('ifsc')
                );
                if($id == ""){
                    if($party == "contractor"){
                        $data1=$this->m->insertdata($table_name,$data);
                    }
                    else{
                        $data1=$this->m->insertrecord($table_name,$data);
                    }
                  }else
                {
                    $data1=$this->m->updatedata($table_name,$data,$id); 
                    $this->m->delete_data('contractor_master',$id); 
                }
                
            
        }elseif($table_name == 'contractor_master'){
            $data = array(
                'c_id'=>$this->input->post('c_id'),
                'batch'=>$this->input->post('bat'),
                'tobacco'=>$this->input->post('tob'),
                'leaves'=>$this->input->post('lea'),
                'blackYarn'=>$this->input->post('black'),
                'whiteyarn'=>$this->input->post('white'),
                'filter'=>$this->input->post('fil')
            );
          
            $data1=$this->m->insertrecord($table_name,$data);
        }
        echo json_encode($data1);
        
    }
    public function statusSet(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $date=$this->input->post('cdate');
        $data1=$this->m->statusSet($table_name,$date,$where);
        echo json_encode($data1);
    }
    public function updatestatusSet(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $data1=$this->m->updatestatusSet($table_name,$where);
        echo json_encode($data1);
    }
    public function updateindex(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $id=$this->input->post('id1');
        $data1=$this->m->updateindex($table_name,$where,$id);
        echo json_encode($data1);
    }
    public function getstate(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $data1=$this->m->getstate($table_name,$where);
        echo json_encode($data1);
    }
    public function showData()
    {   
       	$table_name="con-party_master"; //$this->input->post('table_name');
        $data1=$this->m->showalldata($table_name);
        echo json_encode($data1);	
    }
    public function showallBatch()
    {   
        $table_name=$this->input->post('table_name');
        $id = $this->input->post('id');
        $data1=$this->m->showallBatch($table_name,$id);
        echo json_encode($data1);	
    }
    public function deletedata()
    { 
		$table_name= $this->input->post('table_name');
        $id=$this->input->post('id');
        if($table_name == "contractor_master"){
            $data1=$this->m->delete_data($table_name,$id);
        }else{
            $data1=$this->m->delete_data($table_name,$id);
        }
    	echo json_encode($data1);
    }
  
}
?>