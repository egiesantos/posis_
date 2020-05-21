<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Config extends CI_Controller
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
		public function categories()
		{
			if (!$this->tank_auth->is_logged_in()) {
				redirect('/auth/login/');
			} else {
				
				//prepare the data to be pass to the layout
		        $data = array(
					'head_view' => 'layouts/header',
					'main_view' => 'config/categories',
					'foot_view' => 'layouts/footer',
					'main_view_data' => array('user_info' => $this->user_info,
											)
				);

				// load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

			}
		}

		// FOR THE AJAX POST ON DATA TABLE
		public function category_fetch(){

			$columns = array('cat_id', 'code', 'description');

			$fetched = $this->record_model->fetch_records('categories', $columns, TRUE, 
					array(
						'is_deleted'	=> 0,

			));

			echo json_encode($fetched);
			
		}

		public function category_add()
        {
            $data = array(
        		'code'			=> $this->input->post('code'),
				'description' 	=> $this->input->post('description'),
				'remarks' 			=> $this->input->post('remarks'),
				'date_created' 		=> date('Y-m-d'),
				'created_by' 		=> $this->user_info['user_id'],
				'is_deleted' 		=> 0,
			);

			$inserted = $this->master_model->insert_data('categories', $data);
			
			if(is_numeric($inserted))
			{
				echo json_encode(array(
					'success' => 'Category Added!',
				));
			}
			else
			{
				echo json_encode(array(
					'error' => $inserted['message'],
				));
			}
        }

        

        // FOR GETTING THE DATA BASED ON THE SELECTED ROW A NDN RETURN TO DISPLAY ON MDOAL
		public function category_view($id){
				
			$data = $this->master_model->getSpecific('categories', array(
					'join' => FALSE,
					'field' => 'cat_id',
					'value' => $id,
					'order_by' => 'cat_id',
					'order_type' => 'ASC'
				));			

			if ($data != FALSE) {
					
					echo json_encode($data->row());

			} else {
				echo json_encode(array(
						'error' => 'No data found!' 
					)
				);
			}


		}


		// FOR UPDATING A ROW
		public function category_update($id)
		{
	
			// initiate parameter
			$params = array(
				'cat_id'	=> $id
			);

			// intitiate values to be updated
			// $next_inspection_date = date_format(date_add(date_create($this->input->post('date_acquired')), date_interval_create_from_date_string($this->input->post('inspection_frequency').' days')), 'Y-m-d');
			
			$data = array(
					'code'			=> $this->input->post('code'),
					'description' 	=> $this->input->post('description'),
					'remarks' 			=> $this->input->post('remarks'),
				);

			$update = $this->master_model->update_data_2('categories', $params, $data);

			if ($update != 0) {

				// log the action of the user
				log_message('info', 'USER : Update Room | '.$this->user_data['email'].'>>>'.implode(' | ', $data) );
				
				echo json_encode(array(
						'success' => 'Successfully updated!'
					));
			}else{
				echo json_encode(array(
						'error' => $update['message'] 
					)
				);
			}


		}


		// FOR UPDATING A ROW
		public function category_remove($id)
		{
	
			// initiate parameter
			$params = array(
				'cat_id'	=> $id
			);

			// intitiate values to be updated
			// $next_inspection_date = date_format(date_add(date_create($this->input->post('date_acquired')), date_interval_create_from_date_string($this->input->post('inspection_frequency').' days')), 'Y-m-d');
			
			$data = array(
					'is_deleted'		=> 1,
					
				);

			$update = $this->master_model->update_data_2('categories', $params, $data);

			if ($update != 0) {

				// log the action of the user
				log_message('info', 'USER : Remove Room | '.$this->user_data['email'].'>>>'.implode(' | ', $data) );
				
				echo json_encode(array(
						'success' => 'Successfully removed!'
					));
			}else{
				echo json_encode(array(
						'error' => 'No changes!' 
					)
				);
			}

		}


	}
?>