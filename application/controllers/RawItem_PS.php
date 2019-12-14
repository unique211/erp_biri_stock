<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RawItem_PS extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('RawItem_PS_model');
				
    }
    public function insert(){
        $table_name= $this->input->post('table_name');
        //$id=$this->input->post('id');
        $data1="";
        $data="";
		if($table_name=="raw_batch_master")
        {
            $data = array(
                'batch' =>$this->input->post('bname'),
                );
            $data1=$this->RawItem_PS_model->insertdata1($data,$table_name);
        }
        echo json_encode($data1);
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
                    'total' =>$this->input->post('total'),
                    'truck_no' =>$this->input->post('truck'),
                    'freight' =>$this->input->post('freight')
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
                        'total' =>$this->input->post('total'),
                        'truck_no' =>$this->input->post('truck'),
                        'freight' =>$this->input->post('freight')
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

                 $data1=$this->RawItem_PS_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->RawItem_PS_model->updatedata($data,$table_name,$id); 

          $this->RawItem_PS_model->delete_data("purchase_data",$id); 
        }
        echo json_encode($data1);
    }
    public function adddata1()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		 if($table_name=="purchase_data"){
            $data = array(
				'purchase_id' =>$this->input->post('purchase_id'),
				'item_id' =>$this->input->post('item_id'),
				'item_batch' =>$this->input->post('item_batch'),
                    'qty' =>$this->input->post('qty'),
                    'alt_qty' =>$this->input->post('alt_qty'),
                    'rate' =>$this->input->post('rate')
                    
            );

        }
        
            
                 $data1=$this->RawItem_PS_model->insertdata1($data,$table_name);
        
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
       $where=$this->input->post('where'); 
    
        $data1=$this->RawItem_PS_model->showalldata($table_name,$where);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->RawItem_PS_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function filter_batch()
    { 
        $table_name	= $this->input->post('table_name');
        $where=$this->input->post('where');
        
        $data1=$this->RawItem_PS_model->filter_batch($table_name,$where);
        echo json_encode($data1);
    }
    public function count_row()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->RawItem_PS_model->count_row($table_name);
 
         echo json_encode($data1);	

    }
    public function getmaxid()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->RawItem_PS_model->getmaxid($table_name);
 
         echo json_encode($data1);	

    }
    public function getmaxid2()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->RawItem_PS_model->getmaxid2($table_name);
 
         echo json_encode($data1);	

    }
    function fetch_data()  
    {  
       //  $output = array();  
       $id=$this->input->post('id');
       $table_name=$this->input->post('table_name');
        
         $data = $this->RawItem_PS_model->fetch_data($id,$table_name);  
      
         echo json_encode($data);  
    }
    public function getcode(){
        $id=$this->input->post('id');
        $data=$this->RawItem_PS_model->getcode($id);
        echo json_encode($data);
    }
    
}