<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Transactions extends CI_Controller
	{
		public $user_data;
		
		function __construct()
		{
			parent::__construct();

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('tank_auth');
			$this->lang->load('tank_auth');
			$this->load->dbforge();
			$this->load->model('record_model');
			$this->load->model('master_model');

	        if (!$this->tank_auth->is_logged_in()) redirect('auth/login/');
	        // $this->load->model('users_model');

	        // get all user info > an array
	        $this->user_info = $this->users_model->profile($this->session->userdata('user_id'));

			$this->allowed_types = $this->config->item('allowed_types');

			// define upload path
			$this->document_path = 'files/';

		}

		// FOR DISPLAYING THE MAIN CRUD PAGE
		public function index()
		{
			if (!$this->tank_auth->is_logged_in()) {
				redirect('/auth/login/');
			} else {
				

				$categories = $this->master_model->custom_query("SELECT * FROM categories WHERE is_deleted = 0 ORDER BY description ASC");
				//prepare the data to be pass to the layout
		        $data = array(
					'head_view' => 'layouts/header',
					'main_view' => 'transactions/transaction_view',
					'foot_view' => 'layouts/footer',
					'main_view_data' => array('user_info' => $this->user_info,
												'categories' => ($categories != FALSE)?$categories->result():FALSE
											)
				);

				// load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

			}
		}

		public function transaction_fetch()
		{
			$transactions = $this->master_model->custom_query("SELECT * FROM transactions WHERE date_created BETWEEN '".$this->input->post('date_start')." 00:00:00' AND '".$this->input->post('date_end')." 23:59:59'");


			if($transactions != FALSE)
			{
				echo json_encode(array(
					'success' => $transactions->result(),
					'total' => count($transactions->result())
				));
			}
			else
			{
				echo json_encode(array(
					'error' => 'No DATA on selected date!'
				));
			}

		}


	}
?>