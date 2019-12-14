<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_master extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Item_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="item_master")
        {
           $data = array(
				'name' =>$this->input->post('name'),
				'type' =>$this->input->post('type'),
				'unit' =>$this->input->post('unit'),
                    'qty' =>$this->input->post('qty'),
                    'alt_unit' =>$this->input->post('alt_unit'),
                    'alt_qty' =>$this->input->post('alt_qty')
            );
           
        }
        if($id==""){
                 $data1=$this->Item_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Item_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Item_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Item_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
}