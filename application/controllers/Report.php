<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Report_model','m');
    }
    public function index(){
    }
    public function showData(){
        $table_name=$this->input->post('table_name');//'con-party_master';
        $data=$this->m->showData($table_name);
        echo json_encode($data);
    }
    
}
?>