<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daybookrep extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Daybookrepmodel','m');
    }
    public function index(){
    }
    public function showData(){
				$table_name='con-party_master';//this->input->post('table_name');
				$date=$this->input->post('fromdate');
        $data=$this->m->getconissuedata($table_name,$date);
        echo json_encode($data);
    }
}
?>
