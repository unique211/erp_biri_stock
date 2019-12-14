<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct(){
        parent::__construct();
		
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $this->load->model('Crudmodel');
        $this->load->model('Settingsmodel');
    }
	public function updateindex(){
        $table_name= $this->input->post('table_name');
        $where=$this->input->post('where'); 
        $id=$this->input->post('id1');
        $data1=$this->Settingsmodel->updateindex($table_name,$where,$id);
        echo json_encode($data1);
    }
	public function save_settings(){ 
		$data1 = "";
			$id	= $this->input->post('id');
			$table_name	= $this->input->post('table_name');
			//$table_name = "document_master";
			 $data="";
		if($table_name=="role_master")
		{
			$data = array(
				'name' => $this->input->post('name'),
				'date' => $this->input->post('date'),
				'status' => $this->input->post('status'),
				
				
			);
			
		}else if($table_name=="packingbatch"){
			$data = array(
				'name' => $this->input->post('name'),
				'lablenm' => $this->input->post('labelname'),
				'ratio1' => $this->input->post('ratio1'),
				'ratio2' => $this->input->post('ratio2'),
				'ratio3' => $this->input->post('ratio3'),
				'openingcurtn' => $this->input->post('opening_cartun'),
				'asalbidi' => $this->input->post('asalbidi'),
				'chantbidi' => $this->input->post('chantbidi'),
			
				
				
			);
		}else if($table_name=="packingbatchdetails"){
			$data = array(
				'pid' => $this->input->post('pid'),
				'itemid' => $this->input->post('itemid'),
				'qty' => $this->input->post('qty'),
				'unit' => $this->input->post('unit'),
				
			
				
				
			);
		}


		if($id==""){
			$data1=$this->Crudmodel->data_insert($data,$table_name);		
			}
		else{
			$data1=$this->Crudmodel->data_update($data,$table_name,"id",$id);
			if($table_name=='packingbatch'){
				$data=$this->Crudmodel->data_delete('packingbatchdetails',"pid",$id);
			}
			}
		
        echo json_encode($data1);	
	}
	
	public function get_master(){
		//$table_name="rate_master";
		$table_name	= $this->input->post('table_name');
		$data=$this->Crudmodel->data_get($table_name);			
		echo json_encode($data);	
	}

	public function get_master_where(){
		$table_name	= $this->input->post('table_name');
		$where	= $this->input->post('where');
		
		
		//file_put_contents('./log_'.date("j.n.Y").'.txt',$where, FILE_APPEND);
		$data=$this->Crudmodel->data_get_where($table_name,$where);
		//print_r($data);
		
				echo json_encode($data);
		
	}
	public function get_subcategory(){
		$table_name	= $this->input->post('table_name');
		$where	= $this->input->post('where');
		$data=$this->Crudmodel->data_get_where($table_name,$where);
        echo json_encode($data);	
	}

	public function delete_master(){
		$id	= $this->input->post('id');
		
		$table_name	= $this->input->post('table_name');
		if($table_name=='packingbatch'){
			$data=$this->Crudmodel->data_delete('packingbatchdetails',"pid",$id);
		}
		$data=$this->Crudmodel->data_delete($table_name,"id",$id);
		
			
        echo json_encode($data);	
	}
	

	public function doc_upload()
	{
		$this->load->helper("file");	
		$this->load->library("upload");
		$id=$this->input->post('id');
		//echo json_encode($id);
		$size='';
		if($id == 'filename'){
			$size=$_FILES['filename']['size'];	
		}else if($id == 'docupload'){
			$size=$_FILES['docupload']['size'];	
		}
		
		if ($size > 0){
			$this->upload->initialize(array( 
		       "upload_path" => './assets/documents/',
		       "overwrite" => FALSE,
		       "max_filename" => 300,
		       "remove_spaces" => TRUE,
//		       "allowed_types" => 'jpg|jpeg|png|gif',
		       "allowed_types" => '*',
		       "max_size" => 1024*10,
		    ));
			
			 // if (!$this->upload->do_upload('attachreg_certy')) {
		   if (!$this->upload->do_upload($id)) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}

		    $data = $this->upload->data();
			$path = $data['file_name'];
			
			echo json_encode($path);	
		}else{
			//echo json_encode($id);	
			echo "no file"; 
		}
}

public function doc_delete()
	{
		$file_directory = "./assets/documents/";
		$file_name = $this->input->post('doc');
		 unlink( $file_directory . $file_name);
		 echo '1';
	}
	
}
