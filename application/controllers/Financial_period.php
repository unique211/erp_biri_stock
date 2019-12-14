<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial_period extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Financial_period_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="financial_period")
        {
           $data = array(
				'fsdate' =>$this->input->post('fsdate'),
				'fedate' =>$this->input->post('fedate'),
				'psdate' =>$this->input->post('psdate'),
                    'pedate' =>$this->input->post('pedate')
            );
           
        }
        if($id==""){
                 $data1=$this->Financial_period_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Financial_period_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Financial_period_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Financial_period_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function chkdata()
    { 
        $table_name	= $this->input->post('table_name');
             
        $data1=$this->Financial_period_model->chkdata($table_name);
        echo json_encode($data1);
    }
}