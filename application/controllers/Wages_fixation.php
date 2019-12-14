<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wages_fixation extends CI_Controller
{
    function __construct(){
	    parent:: __construct();
		$this->load->model('Wages_fixation_model');
				
    }
    public function updateindex(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $id=$this->input->post('id1');
        $data1=$this->m->updateindex($table_name,$where,$id);
        echo json_encode($data1);
    }
    public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="wages_fixation")
        {
           $data = array(
				'name' =>$this->input->post('name'),
				'wages' =>$this->input->post('wages'),
				'bonus' =>$this->input->post('bonus'),
                    'handling' =>$this->input->post('handling'),
                    'pf' =>$this->input->post('pf'),
                    'tds' =>$this->input->post('tds'),
                    'chat_biri' =>$this->input->post('chat_biri'),
                    'com_date' =>$this->input->post('com_date'),
                    'commition' =>$this->input->post('commition')
            );
           
        }
        if($id==""){
                 $data1=$this->Wages_fixation_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Wages_fixation_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Wages_fixation_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Wages_fixation_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
}