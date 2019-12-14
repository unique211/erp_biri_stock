<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidisalesmonthly extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Bidisalesmonthlymodel','m');
    }
    public function index(){
    }
    public function showData(){
        $table_name=$this->input->post('table_name');//'con-party_master';
        $data=$this->m->showData($table_name);
        echo json_encode($data);
    }
    public function getfinacialdate(){
     
        $data=$this->m->getdatefsdate();
        echo json_encode($data);
    }
    public function getsumofbidisales(){
     $fidate=$this->input->post('currentyear');
     $cudate=$this->input->post('nextyear');
    /* $fidate='2018-04-01';
     $cudate='2019-03-30';*/
      $data=$this->m->getsumofbidisales($fidate,$cudate);
     
      echo json_encode($data);
    }
    public function recevidedata(){
      $fdate=$this->input->post('fdate');
      $cdate=$this->input->post('cdate');
     
       $data=$this->m->getdateitemsum($fdate,$cdate);
 
       echo json_encode($data);
     }
    
}
?>