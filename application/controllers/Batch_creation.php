<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_creation extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Batch_creation_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="batch_master")
        {
           $data = array(
				'batch' =>$this->input->post('batch'),
				'leaves' =>$this->input->post('leaves'),
				'tobacco' =>$this->input->post('tobacco'),
                    'bl_sutta' =>$this->input->post('bl_sutta'),
                    'wh_sutta' =>$this->input->post('wh_sutta'),
                    'filter' =>$this->input->post('filter')
            );
           
        }
        if($id==""){
                 $data1=$this->Batch_creation_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Batch_creation_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Batch_creation_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Batch_creation_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function updateindex(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $id=$this->input->post('id1');
        $data1=$this->Batch_creation_model->updateindex($table_name,$where,$id);
        echo json_encode($data1);
    }
}