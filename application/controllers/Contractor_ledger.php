<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractor_ledger extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Con_ledger_model','m');
    }
    public function index(){
    }
    public function showData(){
        //'con-party_master';//
        $table_name=$this->input->post('table_name');
        $data=$this->m->showData($table_name);
        echo json_encode($data);
    }
    public function getTob(){
        //'con-party_master';//
        $table_name='con-party_master';//$this->input->post('table_name');
        $data=$this->m->getob('16','2019-03-31');
        echo json_encode($data);
    }
    public function getdata(){
        $table_name=$this->input->post('table_name');
        $data=$this->m->getdata($table_name);
        echo json_encode($data);
    }
}
?>