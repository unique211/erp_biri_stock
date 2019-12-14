<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_wise_stock extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Batch_wise_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
        
		if($table_name=="batch_wise_stock")
        {
           $data = array(
				'item' =>$this->input->post('item'),
				'batch' =>$this->input->post('batch'),
				'qty' =>$this->input->post('qty'),
                    'alt_unit' =>$this->input->post('alt_unit'),
                    'alt_qty' =>$this->input->post('alt_qty')
            );
           
        }
        if($id==""){
               $where = array(
                    'item' =>$this->input->post('item'),
                    'batch' =>$this->input->post('batch')
               );
               $query1=$this->Batch_wise_model->selectdata($table_name,$where);
              if($query1==0){
                   $table_name="raw_batch_master";
                   $where=$this->input->post('batch');
                   $query2=$this->Batch_wise_model->selectdata2($table_name,$where);
                   if($query2==0){
                         $data= array(
                              'batch' =>$this->input->post('batch')
                         );
                         $data1=$this->Batch_wise_model->insertdata($data,$table_name);

                         $table_name="batch_wise_stock";
                         $data = array(
                              'item' =>$this->input->post('item'),
                              'batch' =>$this->input->post('batch'),
                              'qty' =>$this->input->post('qty'),
                              'alt_unit' =>$this->input->post('alt_unit'),
                              'alt_qty' =>$this->input->post('alt_qty')
                         );
      
                         $data1=$this->Batch_wise_model->insertdata($data,$table_name);  
                   }
                   else{
                         $table_name="batch_wise_stock";
                         $data = array(
                              'item' =>$this->input->post('item'),
                              'batch' =>$this->input->post('batch'),
                              'qty' =>$this->input->post('qty'),
                              'alt_unit' =>$this->input->post('alt_unit'),
                              'alt_qty' =>$this->input->post('alt_qty')
                         );

                         $data1=$this->Batch_wise_model->insertdata($data,$table_name);
                   }
                  

              }
              else{
               $data1="404";
                 
              }
               
              
        
        }else
        {
          
            $data1=$this->Batch_wise_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Batch_wise_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Batch_wise_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function fetch_qty(){
          $table_name	= $this->input->post('table_name');
          $table_name2	= $this->input->post('table_name2');
          $id=$this->input->post('id');

          $data1=$this->Batch_wise_model->fetch_qty($table_name,$table_name2,$id);
        echo json_encode($data1);

    }
}