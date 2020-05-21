<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Viewing extends CI_Controller
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

	        // get all user info > an array
	        //$this->user_info = $this->users_model->profile($this->session->userdata('user_id'));

			$this->allowed_types = $this->config->item('allowed_types');

			// define upload path
			$this->document_path = 'files/';

		}

		public function profile_view()
		{

				//prepare the data to be pass to the layout
		        $data = array(
					'head_view' => 'layouts/header-alt',
					'main_view' => 'viewing/viewing_profile',
					'foot_view' => 'layouts/footer'
				);

				 // load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

		}
	}
?>