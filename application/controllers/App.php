<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class App extends CI_Controller
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

	        // if (!$this->tank_auth->is_logged_in()) redirect('auth/login/');
	        // $this->load->model('users_model');

	        // get all user info > an array
	        // $this->user_info = $this->users_model->profile($this->session->userdata('user_id'));

			// $this->allowed_types = $this->config->item('allowed_types');

			// define upload path
			$this->document_path = 'assets/images/individuals/';

		}


		/* =======================================  RECEIPTS RECIEVE MODULES ============================================ */


		// LOGIN FOR MOBILE APP
		public function login()
		{	
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			
			$user_info = $this->master_model->custom_query("SELECT * FROM users WHERE email = '$email' LIMIT 1;");

			echo json_encode($user_info->result());
			// // check if email exists
			// if ($user_info != FALSE) {

			// 	// GET USER PASSWORD ONDATABASE
			// 	$stored_pass = $user_info->row()->password;
			// 	$user_id = $user_info->row()->id;

			// 	// PASSWORD CHECKER
			// 	$user = $this->tank_auth->check_password($password, $stored_pass);

			// 	$user_data = $this->master_model->custom_query("SELECT * FROM user_info WHERE user_id = '$user_id'");


			// 	if ($user != FALSE)
			// 	{
			// 		echo json_encode(array(
			// 			'success' 	=> 'You will be redirected!',
			// 			'user_fullname'		=> ($user_data!=FALSE)?$user_data->row()->first_name.' '.$user_data->row()->last_name: FALSE,
			// 			'user_id'		=> ($user_id!=FALSE)?$user_data->row()->user_id: FALSE 
			// 		));
			// 	}
			// 	else
			// 	{
			// 		echo json_encode(array(
			// 			'error' => 'Login Failed!'
			// 		));
			// 	}

			// }

		}


		public function fetch_individual()
		{
			$individuals = $this->master_model->custom_query("SELECT * FROM individuals LIMIT 100");

			if($individuals != FALSE)
			{
				echo json_encode(
					array(
						'success' => $individuals->result(),
					)
				);
			}
			else
			{
				echo json_encode(
					array(
						'error' => 'No individual found!',
					)
				);
			}
		}

		public function search_individual()
		{

			$query = $this->master_model->custom_query("SELECT individual_id, first_name, middle_name, last_name FROM individuals ");

			if (!empty(trim($this->input->post('first_name')))) {
				array_push($filter_arr, "first_name LIKE '%" . trim($this->input->post('first_name')) . "%'");
			}

			if (!empty(trim($this->input->post('middle_name')))) {
				array_push($filter_arr, "middle_name LIKE '%" . trim($this->input->post('middle_name')) . "%'");
			}

			if (!empty(trim($this->input->post('last_name')))) {
				array_push($filter_arr, " LIKE '%" . trim($this->input->post('last_name')) . "%'");
			}

			
			// append the conditions
			if (count($filter_arr) != 0) {
				for ($i=0; $i < count($filter_arr); $i++) { 

					if ($i == 0) {
						$query .= ' WHERE ';
					}

					$query .= ' ' . $filter_arr[$i];

					if ($i < (count($filter_arr) - 1)) {
						$query .= ' AND ';
					}


				}
			}


			echo $query;
		}

		public function upload_individual()
		{
			echo json_encode($this->input->post('individual_info'));
		}

		public function upload_img()
		{
			move_uploaded_file($_FILES['file']['tmp_name'], $this->document_path . $_FILES['file']['name']);
		}
	}