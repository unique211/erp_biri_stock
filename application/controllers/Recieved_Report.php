<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recieved_Report extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Recieved_Report_model','m');
    }
    public function index(){
    }
    public function showData(){
        $table_name='con-party_master';//$this->input->post('table_name');
        $data=$this->m->showData($table_name);
        echo json_encode($data);
    }
    public function getbatch(){
        //'cont_issue_receive';//'2019-04-11';//
        $table_name	= 'cont_issue_receive';//$this->input->post('table_name');
        $where='2019-04-01';//$this->input->post('fdate');
        $data1=$this->m->getbatch($table_name,$where);
        echo json_encode($data1);
    }
}
?>