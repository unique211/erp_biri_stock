<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker_master extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Checker_model');
				
    }
    public function updateindex(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $id=$this->input->post('id1');
        $data1=$this->Checker_model->updateindex($table_name,$where,$id);
        echo json_encode($data1);
    }
    public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="checker_master")
        {
           $data = array(
				'name' =>$this->input->post('name'),
				'mobile' =>$this->input->post('mobile'),
				'address' =>$this->input->post('address'),
                    'short_code' =>$this->input->post('short_code')
           );
           
        }
        if($id==""){
                 $data1=$this->Checker_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Checker_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Checker_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Checker_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
}