<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raw_IT extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Raw_IT_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="raw_item")
        {
           $data = array(
				'date' =>$this->input->post('date'),
				't_from' =>$this->input->post('t_from'),
				'batch1' =>$this->input->post('batch1'),
                    'b_qty' =>$this->input->post('b_qty'),
                    't_qty' =>$this->input->post('t_qty'),
                    'bags'=>$this->input->post('bags'),
                    't_to' =>$this->input->post('t_to'),
                    'batch2' =>$this->input->post('batch2')
            );
           
        }
        if($id==""){
                 $data1=$this->Raw_IT_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Raw_IT_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
       $where=$this->input->post('where'); 
        $data1=$this->Raw_IT_model->showalldata($table_name,$where);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Raw_IT_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function filtertoday(){
        $table_name	= $this->input->post('table_name');
       $data1=$this->Raw_IT_model->filtertoday($table_name);
       echo json_encode($data1);
    
       }
}