<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouchar extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Vouchar_model','m');
    }
    public function index(){

    }
    public function addData(){
        $table_name=$this->input->post('table_name');
        $id=$this->input->post('id');
        $data='';
        $data1='';
        $type=$this->input->post('type');
        if($table_name=="information"){
            $data = array(
                'refid' =>$this->input->post('refid'),
                'name' =>$this->input->post('name'),
                'amount' =>$this->input->post('amount'),
                'remark' =>$this->input->post('remark')
            );   
            $data1=$this->m->insertdata($data,$table_name);
        }elseif($table_name=="vouchar"){
            $data = array(
                'date' =>$this->input->post('date'),
                'type' =>$type,
                'from' =>$this->input->post('from'),
                'to' =>$this->input->post('to'),
                'amount' =>$this->input->post('amount'),
                'remark' =>$this->input->post('remark')
            ); 
            if($id==""){
                if($type=="Contractor"){
                    $data1=$this->m->insertrecord($data,$table_name);
                }else{
                    $data1=$this->m->insertdata($data,$table_name);
                }
            }
            else{
                    $data1=$this->m->updatedata($data,$table_name,$id);
                    if($type=="Contractor"){
                        $this->m->delete_data('information',$id); 
                    }
            }  
        }
        
        echo json_encode($data1);
    }
    public function showData(){
        $table_name=$this->input->post('table_name');
		$id=$this->input->post('id');
		
		
        $data=$this->m->showalldata($table_name,$id);
        echo json_encode($data);
    }
    public function showDataInfo(){
        $table_name=$this->input->post('table_name');
        $id=$this->input->post('id');
        $data=$this->m->showDataInfo($table_name,$id);
        echo json_encode($data);
    }
    public function deletedata()
    { 
		$table_name= $this->input->post('table_name');
        $id=$this->input->post('id');
        $data1=$this->m->delete_data($table_name,$id);
    	echo json_encode($data1);
    }
    public function getname(){
        $table_name=$this->input->post('table_name');
        $data=$this->m->getname($table_name);
        echo json_encode($data);
    }
    public function getnamebywhere(){
        $table_name=$this->input->post('table_name');
        $data=$this->m->getnamebywhere($table_name);
        echo json_encode($data);
    }
    public function getparty(){
        $table_name=$this->input->post('table_name');
        $data=$this->m->getparty($table_name);
        echo json_encode($data);
    }
}
?>
