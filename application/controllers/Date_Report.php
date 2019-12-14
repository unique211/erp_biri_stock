<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date_Report extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Date_Report_model','m');
    }
    public function index(){
    }
    public function showData(){
        $table_name='con-party_master';//this->input->post('table_name');
        $data=$this->m->showData($table_name);
        echo json_encode($data);
    }
}
?>