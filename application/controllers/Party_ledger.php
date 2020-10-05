<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Party_ledger extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Partyledger_model','m');
    }
    public function index(){
    }
    public function showData(){
        //'con-party_master';//
        $table_name=$this->input->post('table_name');
        $data=$this->m->showData1($table_name);
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
	public function getpayinfo(){
		$table_name=$this->input->post('table_name');
		$con=$this->input->post('con');
        $data=$this->m->getinformation($table_name,$con);
        echo json_encode($data);

	}
	public function getpartyinfo(){
	
		$con=$this->input->post('con');
        $data=$this->m->getpartyinformation($con);
        echo json_encode($data);

	}
}
?>
