<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finished_product extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Finished_product_model');
		ob_start();	
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="finished_product")
        {
           $data = array(
				'label_id' =>$this->input->post('label_id'),
				'cartons' =>$this->input->post('cartons'),
				'total_bidi' =>$this->input->post('total_bidi'),
                    'date' =>$this->input->post('date'),
                    'ref_id' =>$this->input->post('ref_id')
                    
            );
           
        }
        if($id==""){
                 $data1=$this->Finished_product_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Finished_product_model->updatedata($table_name,$id); 
            $data1=$this->Finished_product_model->insertdata($data,$table_name);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
      // $table_name	= $this->input->post('table_name');
          $table_name='finished_product';  
          $where=$this->input->post('where');
        $data1=$this->Finished_product_model->showalldata($table_name,$where);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Finished_product_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function formdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Finished_product_model->formdata($table_name);
 
         echo json_encode($data1);	

    }
    public function getmaxid()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Finished_product_model->getmaxid($table_name);
 
         echo json_encode($data1);	

    }
    public function editdata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Finished_product_model->editdata($table_name,$id);
        echo json_encode($data1);
    }
    public function filtertoday(){
        $table_name	= $this->input->post('table_name');
       $data1=$this->Finished_product_model->filtertoday($table_name);
       echo json_encode($data1);
    
	   }

	   public function downlpaddb(){
		$this->load->dbutil();

		$prefs = array(     
			'format'      => 'zip',             
			'filename'    => 'my_db_backup.sql'
			);
		
		
		$backup =& $this->dbutil->backup($prefs); 
		
		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'pathtobkfolder/'.$db_name;
		
		$this->load->helper('file');
		write_file($save, $backup); 
		
		
		$this->load->helper('download');
		force_download($db_name, $backup);
	   }
	  
}
