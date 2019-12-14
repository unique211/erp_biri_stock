<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate_master extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Rate_master_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="rate_master")
        {
           $data = array(
                    'fdate' =>$this->input->post('fdate'),
                    'sdate' =>$this->input->post('sdate'),
				    'batch' =>$this->input->post('batch'),
				    'leaves' =>$this->input->post('leaves'),
                    'tobacco' =>$this->input->post('tobacco'),
                    'lbag' =>$this->input->post('lbag'),
				    'tbag' =>$this->input->post('tbag'),
                    'bl_sutta' =>$this->input->post('bl_sutta'),
                    'wh_sutta' =>$this->input->post('wh_sutta'),
                    'dise' =>$this->input->post('dise'),
                    'filter' =>$this->input->post('filter')
            );
           
        }
        if($id==""){
                 $data1=$this->Rate_master_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Rate_master_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Rate_master_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Rate_master_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function chkdata()
    { 
        $table_name	= $this->input->post('table_name');
        $fdate=$this->input->post('fdate');
        $sdate=$this->input->post('sdate');
        $batch=$this->input->post('batch');
        
        
        $data1=$this->Rate_master_model->selectdata($table_name,$fdate,$sdate,$batch);
        echo json_encode($data1);
    }
}