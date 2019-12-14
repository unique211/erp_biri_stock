<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tob_Mix extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Tob_mix_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="tobaccomix_master")
        {
           $data = array(
				'date' =>$this->input->post('date'),
				'batch' =>$this->input->post('batch'),
				'unit' =>$this->input->post('unit'),
                    'alt_bag' =>$this->input->post('alt_bag'),
                    'labor_charge' =>$this->input->post('labour_charge')
                    
            );
           
        }
        if($id==""){
                 $data1=$this->Tob_mix_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Tob_mix_model->updatedata($data,$table_name,$id); 
            $this->Tob_mix_model->delete_data("tobaccomix_data",$id); 
         //   $data1=$this->Tob_mix_model->insertdata($data,$table_name);
        }
        echo json_encode($data1);
    }
    public function adddata1()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="tobaccomix_data")
        {
           $data = array(
				'ref_id' =>$this->input->post('ref_id'),
				'batch' =>$this->input->post('batch'),
				'unit' =>$this->input->post('unit'),
                    'alt_bag' =>$this->input->post('alt_bag')                   
                    
            );
           
        }
       
                 $data1=$this->Tob_mix_model->insertdata1($data,$table_name);
          echo json_encode($data1);
    }

    public function showdata()
    {   
      // $table_name	= $this->input->post('table_name');
          $table_name='tobaccomix_master';  
          $where=$this->input->post('where');
        $data1=$this->Tob_mix_model->showalldata($table_name,$where);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Tob_mix_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function formdata()

    {  
         $item="TOBACCO";
         $tobacco_id=$this->Tob_mix_model->tobacco_id($item);
         foreach($tobacco_id as $value){
          $tobacco=$value->id;}
         $where=$tobacco;
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Tob_mix_model->formdata($table_name,$where);
 
         echo json_encode($data1);	

    }
    public function formdata2()

    {  
       
       $table_name	= $this->input->post('table_name');
       $where=$this->input->post('where');    
        $data1=$this->Tob_mix_model->formdata2($table_name,$where);
 
         echo json_encode($data1);	

    }
  
    public function editdata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Tob_mix_model->editdata($table_name,$id);
        echo json_encode($data1);
    }
    public function filtertoday(){
        $table_name	= $this->input->post('table_name');
       $data1=$this->Tob_mix_model->filtertoday($table_name);
       echo json_encode($data1);
    
       }
       function fetch_data()  
       {  
          //  $output = array();  
          $id=$this->input->post('id');
          $table_name=$this->input->post('table_name');
           
            $data = $this->Tob_mix_model->fetch_data($id,$table_name);  
         
            echo json_encode($data);  
        }
}