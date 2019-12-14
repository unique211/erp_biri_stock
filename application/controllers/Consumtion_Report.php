<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumtion_Report extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Consumtion_Report_model','m');
    }
    public function index(){
    }
    public function showData(){
        $table_name='con-party_master';//$this->input->post('table_name');
        $data=$this->m->showData($table_name);
        echo json_encode($data);
    }
    public function getbatch(){
        //'cont_issue_receive';//'2019-04-11';//'2019-04-01';//
        $table_name	= 'cont_issue_receive';//$this->input->post('table_name');
        $data1=$this->m->getbatch($table_name);
        echo json_encode($data1);
    }
}
?>