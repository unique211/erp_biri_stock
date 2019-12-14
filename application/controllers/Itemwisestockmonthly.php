<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemwisestockmonthly extends CI_Controller
{
    function __construct(){
		parent:: __construct();
		$this->load->model('Itemwisemonthlymodel','m');
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
   
      $data=$this->m->getsumofbidisales($fidate,$cudate);
     
      echo json_encode($data);
    }
    public function recevidedata(){
      $fdate=$this->input->post('fdate');
      $cdate=$this->input->post('cdate');
     
       $data=$this->m->getdateitemsum($fdate,$cdate);
 
       echo json_encode($data);
     }
     public function getfinicialyearwisedata(){
        $fidate=$this->input->post('currentyeardate');
        $cudate=$this->input->post('nextyeardate');
        $item_name=$this->input->post('item_name');
       /* $fidate='2019-04-01';
        $cudate='2020-03-30';
        $item_name='1';*/
         $data=$this->m->getsumofbidisales($fidate,$cudate,$item_name);
        
         echo json_encode($data);
     }
     public function getdropdown(){
        $table_name=$this->input->post('table_name');
        $where=$this->input->post('where');
       /* $fidate='2018-04-01';
        $cudate='2019-03-30';*/
         $data=$this->m->get_dropdown($table_name,$where);
        
         echo json_encode($data);
     }
     public function getfinicialmonthwise(){
        $fidate=$this->input->post('startdate');
        $cudate=$this->input->post('enddate');
        $item_name=$this->input->post('item_name');
        /* $fidate='2019-07-01';
        $cudate='2019-07-30';
        $item_name='1';*/
         $data=$this->m->get_finicialmonthwisedata($fidate,$cudate,$item_name);
        
         echo json_encode($data);
     }
     public function getfinucialdatewise(){
        $fidate=$this->input->post('startdate');
        $cudate=$this->input->post('enddate');
        $item_name=$this->input->post('item_name');
        /* $fidate='2019-07-01';
        $cudate='2019-07-30';
        $item_name='1';*/
         $data=$this->m->get_finicialdatewise($fidate,$cudate,$item_name);
        
         echo json_encode($data);
     }
    
}
?>