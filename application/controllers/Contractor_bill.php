<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractor_bill extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Conbill_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="con_bill_item")
        {
           $data = array(
			
				'name' =>$this->input->post('qty'),
				'rate' =>$this->input->post('rate')
            );
           
        }
        if($id==""){
                 $data1=$this->Conbill_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Conbill_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Conbill_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Conbill_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
  
    
}
