<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contiloe extends CI_Controller {

	   function  __construct(){
        parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//		$this->load->model('Demomodel');

set_time_limit(0);
	 }
	public function index()
	{
		if(isset($this->session->userid)){
				$this->session->unset_userdata('userid');  	
				$this->session->unset_userdata('role');  	
				$this->session->unset_userdata('username');  	
				$this->session->unset_userdata('user_id');  	
				$this->session->unset_userdata('refid');  	
		}
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Login ";
		$title['active_menu'] = "";
		$this->load->view('login',$title);
	}

	public function logincheck()
	{	
		        $this->load->model('Loginmodel');
				$data= $this->Loginmodel->check_login();
			     echo json_encode($data);
	}

	public function dashboard()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = "Dashboard";
		$title['active_menu'] = "d";
		$this->load->view('index',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}

	}
	
	
	public function companyManagement()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Company Management ";
		$title['active_menu'] = "s";
		$this->load->view('company_management',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	
	public function userManagement()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " User Management ";
		$title['active_menu'] = "s";
		$this->load->view('user_management',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function roleMaster()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Role Master ";
		$title['active_menu'] = "s";
		$this->load->view('roll_type',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function contractor_partyMaster()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Ledger Creation ";
		$title['active_menu'] = "m";
		$this->load->view('contractor_partyMaster',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function Item()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Item ";
		$title['active_menu'] = "m";
		$this->load->view('Item',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function batchwisestock()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Batch Wise Stock ";
		$title['active_menu'] = "m";
		$this->load->view('Batch_Wise_Stock',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function wagesfixation()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Wages Fixation ";
		$title['active_menu'] = "m";
		$this->load->view('wages_fixation',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function batchcreation()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Batch Creation ";
		$title['active_menu'] = "m";
		$this->load->view('batch_creation',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function checker_master()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Checker Master ";
		$title['active_menu'] = "m";
		$this->load->view('checker_master',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function ratemaster()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Rate Master ";
		$title['active_menu'] = "m";
		$this->load->view('rate_master',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function packingbatch_lable()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Packing Batch/Lable ";
		$title['active_menu'] = "m";
		$this->load->view('packing_batch',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function lablewisepackingitem()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Lable Wise Packing Item ";
		$title['active_menu'] = "m";
		$this->load->view('lable_wise_packing_item',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function weekly_received_adjustment()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Weekly Received Adjustment ";
		$title['active_menu'] = "u";
		$this->load->view('weekly_adjustment',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function financial_and_period()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Financial & Period ";
		$title['active_menu'] = "u";
		$this->load->view('financial&period',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function cont_issue()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Contractor Issue Receive ";
		$title['active_menu'] = "t";
		$this->load->view('cont_issue',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function cont_adj()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Contractor Adjustment ";
		$title['active_menu'] = "t";
		$this->load->view('cont_adj',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function voucher_entry()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Voucher Entry ";
		$title['active_menu'] = "t";
		$this->load->view('voucher_entry',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function finished_product()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Finished Product ";
		$title['active_menu'] = "t";
		$this->load->view('finished_product',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function Raw_pur_sales()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Raw Item Purchase & Sales ";
		$title['active_menu'] = "t";
		$this->load->view('Raw_PS',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function Raw_trancefer()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Raw Item Transfer ";
		$title['active_menu'] = "t";
		$this->load->view('raw_item',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function finish_pro_sell()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Finish Product Sale ";
		$title['active_menu'] = "t";
		$this->load->view('Finish_PS',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function Tobacco_Mixing()
	{
		if(isset($this->session->userid)){
		$title['title_name'] = " dbstock ";
		$title['title_name1'] = " Tobacco Mixing ";
		$title['active_menu'] = "t";
		$this->load->view('tobacco_mix',$title);
			}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function Contractor_report(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = " Contractor Trial Report ";
			$title['active_menu'] = "r";
			$this->load->view('Cotractor_report',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function DatewiseReport(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = " Date Wise Report ";
			$title['active_menu'] = "r";
			$this->load->view('DatewiseReport',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function contractor_sheet(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = "Wages Report ";
			$title['active_menu'] = "r";
			$this->load->view('ContractorSheet',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function contractor_ledger(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = " Contractor Ledger ";
			$title['active_menu'] = "r";
			$this->load->view('ContractorLedger',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function issue(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = " Issue Report ";
			$title['active_menu'] = "r";
			$this->load->view('issuereport',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function recieved(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = " Recieved Report ";
			$title['active_menu'] = "r";
			$this->load->view('recievedreport',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function consumtion(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = " Consumtion Report ";
			$title['active_menu'] = "r";
			$this->load->view('consumtion',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function item_wisereport(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = "RG-12A";
			$title['active_menu'] = "r";
			$this->load->view('rg12A',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function bidi_sales_monthly(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = "Bidi Sales Monthly";
			$title['active_menu'] = "r";
			$this->load->view('bidisalesmonthly',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function itemwise_stock_monthly(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = "ItemWise Stock Monthly";
			$title['active_menu'] = "r";
			$this->load->view('itemwisestockmonthly',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function centralexciseer(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = "Central Excise ER-1";
			$title['active_menu'] = "r";
			$this->load->view('centralexciseer',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
	public function contractorpayment(){
		if(isset($this->session->userid)){
			$title['title_name'] = " dbstock ";
			$title['title_name1'] = "Contractor Payment List";
			$title['active_menu'] = "r";
			$this->load->view('contractorpaymentrep',$title);
		}
		else{
			redirect(base_url('dbstock'));
		}
	}
}
