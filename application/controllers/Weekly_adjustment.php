<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weekly_adjustment extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('WA_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="weekly_adjustment")
        {
           $data = array(
				'entry_date' =>$this->input->post('entry_date'),
				'to_date' =>$this->input->post('to_date'),
				'qty' =>$this->input->post('qty')
            );
           
        }
        if($id==""){
                 $data1=$this->WA_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->WA_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->WA_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->WA_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
  
    
}