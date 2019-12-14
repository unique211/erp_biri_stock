<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rg12A extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Rg12Amodel','m');
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
    public function getsumofitem(){
     $fidate=$this->input->post('fdate');
     $cudate=$this->input->post('cdate');
     /*$fidate='2019-06-15';
     $cudate='2019-06-30';*/
      $data=$this->m->getdateitemsum($fidate,$cudate);
     
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