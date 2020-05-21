<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('master_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			

			redirect('/admin/dashboard/');

		}
	}

	function clear_login_attempts(){
		// error_reporting(0);
		if($this->master_model->custom_query_no_return("TRUNCATE TABLE login_attempts;")) {
			echo "<script>alert('Login Attempts has been reset! Try to login again.'); location.href = '" . base_url() . "';</script>";
		} else {
			echo "<h1>UNABLE TO TRUNCATE!!!</h1>";
		};
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */