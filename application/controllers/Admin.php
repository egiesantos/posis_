<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $user_info = array();	
	protected $user_id = 0;	

	function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('record_model');
		$this->load->model('master_model');

        if (!$this->tank_auth->is_logged_in()) redirect('auth/login/');
        // $this->load->model('users_model');

        $this->user_info = $this->users_model->profile($this->session->userdata('user_id'));
        // get records related to the user so dashboard decision will work

	}


	public function index(){
		redirect('admin/dashboard');
	}

	public function dashboard(){
		
		switch ($this->user_info['role']) {
			case '0':
				$this->cashier();
				break;
			case '1':
				$this->_dashboard_1();
				break;
			case '2':
				$this->_dashboard_1();
				break;
			case '3':
				$this->_dashboard_1();
				break;
			default:
				# code...
				break;
		}

	}


	private function cashier(){


		$year = $this->master_model->custom_query("SELECT SUM(total) AS total FROM transactions WHERE YEAR(date_created) = '".date('Y')."'");
		$month = $this->master_model->custom_query("SELECT SUM(total) AS total FROM transactions WHERE MONTH(date_created) = '".date('m')."'");
		$today = $this->master_model->custom_query("SELECT SUM(total) AS total FROM transactions WHERE DATE(date_created) = '".date('Y-m-d')."'");
		$transactions = $this->master_model->custom_query("SELECT COUNT(id) AS total FROM transactions WHERE DATE(date_created) = '".date('Y-m-d')."'");


		//prepare the data to be pass to the layout
        $data = array(
			'head_view' => 'layouts/header',
			'main_view' => 'dashboard/cashier',
			'foot_view' => 'layouts/footer',
			'main_view_data' => array(
				'user_info' => $this->user_info,
				'year' => ($year != FALSE)?$year->row()->total:'0',
				'month' => ($month != FALSE)?$month->row()->total:'0',
				'today' => ($today != FALSE)?$today->row()->total:'0',
				'transactions' => ($transactions != FALSE)?$transactions->row()->total:'0'
			)
		);
		
        // load the layout/main.php VIEW/ and pass the prepared data
		$this->load->view('layouts/main.php', $data);
		
		
	}


	private function _dashboard_1(){

		$year = $this->master_model->custom_query("SELECT SUM(total) AS total FROM transactions WHERE YEAR(date_created) = '".date('Y')."'");
		$month = $this->master_model->custom_query("SELECT SUM(total) AS total FROM transactions WHERE MONTH(date_created) = '".date('m')."'");
		$today = $this->master_model->custom_query("SELECT SUM(total) AS total FROM transactions WHERE DATE(date_created) = '".date('Y-m-d')."'");
		$transactions = $this->master_model->custom_query("SELECT COUNT(id) AS total FROM transactions WHERE DATE(date_created) = '".date('Y-m-d')."'");

		//prepare the data to be pass to the layout
        $data = array(
			'head_view' => 'layouts/header',
			'main_view' => 'welcome',
			'foot_view' => 'layouts/footer',
			'main_view_data' => array(
				'user_info' => $this->user_info,
				'year' => ($year != FALSE)?$year->row()->total:'0',
				'month' => ($month != FALSE)?$month->row()->total:'0',
				'today' => ($today != FALSE)?$today->row()->total:'0',
				'transactions' => ($transactions != FALSE)?$transactions->row()->total:'0'
			)
		);
		
        // load the layout/main.php VIEW/ and pass the prepared data
		$this->load->view('layouts/main.php', $data);
		
		
	}

}
