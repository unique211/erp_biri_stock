<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractor_sheet extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Con_sheet_model','m');
    }
    public function index(){
    }
    public function showData(){
        //'con-party_master';//
        $table_name='con-party_master';//$this->input->post('table_name');
        $data=$this->m->showData($table_name);
        echo json_encode($data);
    }
}
?>