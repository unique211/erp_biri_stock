<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinishPS extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('FinishPS_model');
				
     }
     public function get_master(){
		//$table_name="rate_master";
		$table_name	= $this->input->post('table_name');
		$data=$this->FinishPS_model->data_get($table_name);			
		echo json_encode($data);	
	}

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="purchase_master")
        {
            if ($id=="") {
                $data = array(
                'purchase_id' =>$this->input->post('purchase_id'),
                'sale_id' =>$this->input->post('sales_id'),
                'voucher_date' =>$this->input->post('voucher_date'),
                    'bill_no' =>$this->input->post('billno'),
                    'type' =>$this->input->post('type'),
                    'party_id' =>$this->input->post('party_id'),
                    'bill_date' =>$this->input->post('bill_date'),
                    'sgst' =>$this->input->post('sgst'),
                    'cgst' =>$this->input->post('cgst'),
                    'igst' =>$this->input->post('igst'),
                    'nccd' =>$this->input->post('nccd'),
                    'basic' =>$this->input->post('basic_per'),
                    'total' =>$this->input->post('total'),
                    'truck_no'=>$this->input->post('truck'),
                    'freight'=>$this->input->post('freight')
            );
            }else{
                $data = array(
                    'voucher_date' =>$this->input->post('voucher_date'),
                        'bill_no' =>$this->input->post('billno'),
                        'type' =>$this->input->post('type'),
                        'party_id' =>$this->input->post('party_id'),
                        'bill_date' =>$this->input->post('bill_date'),
                        'sgst' =>$this->input->post('sgst'),
                        'cgst' =>$this->input->post('cgst'),
                        'igst' =>$this->input->post('igst'),
                        'nccd' =>$this->input->post('nccd'),
                        'basic' =>$this->input->post('basic_per'),
                        'total' =>$this->input->post('total'),
                        'truck_no'=>$this->input->post('truck'),
                        'freight'=>$this->input->post('freight')
                );
            } 
        }else if($table_name=="purchase_data"){
            $data = array(
				'purchase_id' =>$this->input->post('purchase_id'),
				'item_id' =>$this->input->post('item_id'),
				'item_batch' =>$this->input->post('item_batch'),
                    'qty' =>$this->input->post('qty'),
                    'alt_qty' =>$this->input->post('alt_qty'),
                    'rate' =>$this->input->post('rate')
                    
            );

        }
        if($id==""){

                 $data1=$this->FinishPS_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->FinishPS_model->updatedata($data,$table_name,$id); 

          $this->FinishPS_model->delete_data("sale_data",$id); 
        }
        echo json_encode($data1);
    }
    public function adddata1()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		 if($table_name=="sale_data"){
            $data = array(
				'sale_id' =>$this->input->post('sale_id'),
				'batch_id' =>$this->input->post('batch_id'),
				'stock' =>$this->input->post('stock'),
                    'qty' =>$this->input->post('qty'),
                    'pack' =>$this->input->post('pack'),
                    'rate' =>$this->input->post('rate')
                    
            );

        }
        
            
                 $data1=$this->FinishPS_model->insertdata1($data,$table_name);
        
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
       $date=$this->input->post('date');
    // $table_name	= "purchase_master";
    // $date="";
  
       if($date==""){
      //  $where= $this->input->post('type');
        $data1=$this->FinishPS_model->showalldata1($table_name);
    
       } else {
        $where= array(
            'voucher_date' =>$this->input->post('date'),
            'type' =>$this->input->post('type')
         );
         $data1=$this->FinishPS_model->showalldata($table_name,$where);
       }
       
       //$where=$this->input->post('where'); 
     // $where="Finish Product";
       // $data1=$this->FinishPS_model->showalldata($table_name,$where);
 
         echo json_encode($data1);	

    }
    public function getcode(){
        $id=$this->input->post('id');
        $data=$this->FinishPS_model->getcode($id);
        echo json_encode($data);
    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->FinishPS_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function filter_batch()
    { 
        $table_name	= $this->input->post('table_name');
        $where=$this->input->post('where');
        
        $data1=$this->FinishPS_model->filter_batch($table_name,$where);
        echo json_encode($data1);
    }
    public function count_row()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->FinishPS_model->count_row($table_name);
 
         echo json_encode($data1);	

    }
    public function getmaxid()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->FinishPS_model->getmaxid($table_name);
 
         echo json_encode($data1);	

    }
    public function getmaxid2()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->FinishPS_model->getmaxid2($table_name);
 
         echo json_encode($data1);	

    }
    function fetch_data()  
    {  
       //  $output = array();  
       $id=$this->input->post('id');
       $table_name=$this->input->post('table_name');
        
         $data = $this->FinishPS_model->fetch_data($id,$table_name);  
      
         echo json_encode($data);  
     }
     public function formdata()
    {   
       $table_name	= $this->input->post('table_name');
       $where=$this->input->post('where');
            
        $data1=$this->FinishPS_model->formdata($table_name,$where);
 
         echo json_encode($data1);	

    }
}