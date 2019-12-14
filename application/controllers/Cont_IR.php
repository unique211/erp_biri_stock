<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cont_IR extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Cont_IR_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
	   
		if($table_name=="cont_issue_receive")
        {
           $data = array(
                    'date' =>$this->input->post('date'),
                    'cont_name' =>$this->input->post('cont_name'),
                    'checker_name' =>$this->input->post('checker_name'),
                    'batch1' =>$this->input->post('batch1'),
                    'asal_bidi' =>$this->input->post('asal_bidi'),
                    'chant_bidi_pcs' =>$this->input->post('chant_bidi_pcs'),
                    'chant_bidi_kgs' =>$this->input->post('chant_bidi_kgs'),
                    'wages' =>$this->input->post('wages'),
                    'qlty' =>$this->input->post('qlty'),
                    'tob_wt' =>$this->input->post('tob_wt'),
                    'batch2' =>$this->input->post('batch2'),
                    'tob' =>$this->input->post('tob'),
                    'tob_bag' =>$this->input->post('tob_bag'),
                    'leaves' =>$this->input->post('leaves'),
                    'leaves_bag' =>$this->input->post('leaves_bag'),
                    'bl_yarn' =>$this->input->post('bl_yarn'),
                    'wh_yarn' =>$this->input->post('wh_yarn'),
                    'filter' =>$this->input->post('filter'),
                    'disc' =>$this->input->post('disc'),
                    'cartons' =>$this->input->post('cartons'),
				
           );
           
        }
        if($id==""){
                 $data1=$this->Cont_IR_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Cont_IR_model->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Cont_IR_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Cont_IR_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function fetch_tobacco(){
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');

        $data1=$this->Cont_IR_model->fetch_tobacco($table_name,$id);
        echo json_encode($data1);

    }
    public function filterdate(){
        //'cont_issue_receive';//'2019-04-11';//
        $table_name	= $this->input->post('table_name');
        $where=$this->input->post('where');
        $data1=$this->Cont_IR_model->filterdate($table_name,$where);
        echo json_encode($data1);
    }
    public function filtertoday(){
        $table_name	= $this->input->post('table_name');
        //$where=$this->input->post('where');
        $data1=$this->Cont_IR_model->filtertoday($table_name);
        echo json_encode($data1);
    }
    public function getbatch(){
        //'cont_issue_receive';//'2019-04-11';//
        $table_name	= $this->input->post('table_name');
        $where=$this->input->post('where');
        $data1=$this->Cont_IR_model->getbatch($table_name,$where);
        echo json_encode($data1);
    }
}