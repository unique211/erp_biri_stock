<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cont_adj extends CI_Controller
{
    function __construct(){
	    parent:: __construct();
		$this->load->model('Cont_adj_model');
    }
    public function adddata()
    { 
        $table_name= $this->input->post('table_name');
		$id=$this->input->post('id');
        $data1="";
        $data="";
		if($table_name=="cont_adj")
        {
           $data = array(
                'date' =>$this->input->post('date'),
                'contractor' =>$this->input->post('contractor'),
                'batch' =>$this->input->post('batch'),
                'tobacco' =>$this->input->post('tobacco'),
                'leaves' =>$this->input->post('leaves'),
                'bl_yarn' =>$this->input->post('bl_yarn'),
                'wh_yarn' =>$this->input->post('wh_yarn'),
                'filter' =>$this->input->post('filter'),
                'tobacco_amt' =>$this->input->post('tobacco1'),
                'leaves_amt' =>$this->input->post('leaves1'),
                'bl_yarn_amt' =>$this->input->post('bl_yarn1'),
                'wh_yarn_amt' =>$this->input->post('wh_yarn1'),
                'filter_amt' =>$this->input->post('filter1')
            );
        }
        if($id==""){
            $data1=$this->Cont_adj_model->insertdata($data,$table_name);
        }
        else
        {
            $data1=$this->Cont_adj_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }
    public function showdata()
    {   
        $table_name	= $this->input->post('table_name');
        $data1=$this->Cont_adj_model->showalldata($table_name);
        echo json_encode($data1);	
    }
    public function filterdate(){
        $table_name	= $this->input->post('table_name');
        $where=$this->input->post('where');
        $data1=$this->Cont_adj_model->filterdate($table_name,$where);
        echo json_encode($data1);
    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        $data1=$this->Cont_adj_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function fetch_batch(){
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        $data1=$this->Cont_adj_model->fetch_batch($table_name,$id);
        echo json_encode($data1);
    }
    public function filtertoday(){
        $table_name	= $this->input->post('table_name');
        $data1=$this->Cont_adj_model->filtertoday($table_name);
        echo json_encode($data1);
    }
    public function showCustomer(){
       // $table_name=$this->input->post('table_name');//'con-party_master';
        $data=$this->Cont_adj_model->showData();
        echo json_encode($data);
    }
}