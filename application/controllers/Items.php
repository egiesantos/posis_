<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Items extends CI_Controller
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
					'main_view' => 'items/items_view',
					'foot_view' => 'layouts/footer',
					'main_view_data' => array('user_info' => $this->user_info,
												'categories' => ($categories != FALSE)?$categories->result():FALSE
											)
				);

				// load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

			}
		}

		// FOR THE AJAX POST ON DATA TABLE
		public function item_fetch(){

			$items = $this->master_model->custom_query("SELECT c.description AS c_desc,  c.code, i.cat_id, i.common_name, i.description AS i_desc, i.brand, i.size_type, i.price, i.item_id, i.is_sold FROM items i LEFT JOIN categories c ON c.cat_id = i.cat_id WHERE i.is_deleted = 0 ORDER BY i.cat_id ASC");


			if($items != FALSE)
			{
				echo json_encode(array(
						'success' => $items->result()
					)
				);
			}
			else
			{
				echo json_encode(array(
						'error' => 'No items found!'
					)
				);
			}
			
		}

		public function item_add()
        {

        	for ($i=0; $i < $this->input->post('quantity'); $i++) 
        	{ 
        		$data = array(
	        		'cat_id'			=> $this->input->post('cat_id'),
					'common_name' 	=> $this->input->post('common_name'),
					'description' 	=> $this->input->post('description'),
					'brand' 			=> $this->input->post('brand'),
					'size_type' 			=> $this->input->post('size_type'),
					'price' 			=> $this->input->post('price'),
					'date_created' 		=> date('Y-m-d'),
					'created_by' 		=> $this->user_info['user_id'],
					'is_deleted' 		=> 0,
				);

				$inserted = $this->master_model->insert_data('items', $data);

        	}

        	if($i == $this->input->post('quantity'))
			{
				echo json_encode(array(
					'success' => $i,
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
		public function item_view($id){
				
			$data = $this->master_model->getSpecific('items', array(
					'join' => FALSE,
					'field' => 'item_id',
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
		public function item_update($id)
		{
			

			// if($this->input->post('update_all') == 'no')
			// {
				// initiate parameter
				$params = array(
					'item_id'	=> $id
				);

				// intitiate values to be updated
				// $next_inspection_date = date_format(date_add(date_create($this->input->post('date_acquired')), date_interval_create_from_date_string($this->input->post('inspection_frequency').' days')), 'Y-m-d');
				
				$data = array(
						'cat_id'			=> $this->input->post('cat_id'),
						'common_name' 	=> $this->input->post('common_name'),
						'brand' 			=> $this->input->post('brand'),
						'size_type' 			=> $this->input->post('size_type'),
						'price' 			=> $this->input->post('price'),
					);

				$update = $this->master_model->update_data_2('items', $params, $data);

				if ($update != 0) {

					// log the action of the user
					log_message('info', 'USER : Update Item | '.$this->user_data['email'].'>>>'.implode(' | ', $data) );
					
					echo json_encode(array(
							'success' => 'Successfully updated!'
						));
				}else{
					echo json_encode(array(
							'error' => $update['message'] 
						)
					);
				}
			// }
			// else
			// {
			// 	// $update = $this->master_model->custom_query("");
			// }	
			


		}


		// FOR UPDATING A ROW
		public function item_remove($id)
		{
	
			// initiate parameter
			$params = array(
				'item_id'	=> $id
			);

			// intitiate values to be updated
			// $next_inspection_date = date_format(date_add(date_create($this->input->post('date_acquired')), date_interval_create_from_date_string($this->input->post('inspection_frequency').' days')), 'Y-m-d');
			
			$data = array(
					'is_deleted'		=> 1,
					
				);

			$update = $this->master_model->update_data_2('items', $params, $data);

			if ($update != 0) {

				// log the action of the user
				log_message('info', 'USER : Item Removed | '.$this->user_data['email'].'>>>'.implode(' | ', $data) );
				
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


		public function item_summary()
		{
			

			if(!is_null($this->input->post('submit')))
			{
				$date_given = explode(" - ", $this->input->post('date_sold'));
				$date_start = $date_given[0];
				$date_end = $date_given[1];

				$date_stocked_given = explode(" - ", $this->input->post('date_stocked'));
				$date_start_stocked = $date_stocked_given[0];
				$date_end_stocked = $date_stocked_given[1];

				$items_info = $this->master_model->custom_query("SELECT c.cat_id, c.code, c.description, COUNT(i.item_id) total_item, (SELEct COUNT(item_id) FROM items WHERE is_sold = 0 AND cat_id = c.cat_id AND date_sold BETWEEN '$date_start 00:00:00' AND  '$date_end 23:59:59') available, (SELECT COUNT(item_id) FROM items WHERE is_sold = 1 AND cat_id = c.cat_id AND date_sold BETWEEN '$date_start 00:00:00' AND  '$date_end 23:59:59') sold FROM items i LEFT JOIN categories c ON c.cat_id = i.cat_id WHERE i.date_created BETWEEN '$date_start_stocked' AND  '$date_end_stocked' GROUP BY c.cat_id");

			}
			else
			{
				$date_start = date('Y-m-1');
				$date_end = date("Y-m-t", strtotime(date('Y-m')));

				$date_start_stocked = date('Y-m-1');
				$date_end_stocked = date("Y-m-t", strtotime(date('Y-m')));

				$items_info = $this->master_model->custom_query("SELECT c.cat_id, c.code, c.description, COUNT(i.item_id) total_item, (SELEct COUNT(item_id) FROM items WHERE is_sold = 0 AND cat_id = c.cat_id AND date_sold BETWEEN '$date_start 00:00:00' AND  '$date_end 23:59:59') available, (SELECT COUNT(item_id) FROM items WHERE is_sold = 1 AND cat_id = c.cat_id AND date_sold BETWEEN '$date_start 00:00:00' AND  '$date_end 23:59:59') sold FROM items i LEFT JOIN categories c ON c.cat_id = i.cat_id WHERE DATE(i.date_created) BETWEEN '$date_start' AND '$date_end' GROUP BY c.cat_id");

			}
			

	        $data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'items/items_summary',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array('user_info' => $this->user_info,
											'items_info' => ($items_info != FALSE)?$items_info->result():FALSE,
											'date_start' => $date_start,
											'date_end' => $date_end,
											'date_start_stocked' => $date_start_stocked,
											'date_end_stocked' => $date_end_stocked
										)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);
		}



		public function items_summary_details()
		{	


			$item_details = $this->master_model->custom_query("SELECT c.description AS c_desc,  c.code, i.cat_id, i.common_name, i.description AS i_desc, i.brand, i.size_type, i.price, i.item_id, i.is_sold FROM items i LEFT JOIN categories c ON c.cat_id = i.cat_id WHERE i.date_created BETWEEN '".$this->input->get('date_start_stocked')."' AND '".$this->input->get('date_end_stocked')."' AND i.date_sold BETWEEN '".$this->input->get('date_sold_start')."' AND '".$this->input->get('date_sold_end')."' AND i.cat_id = '".$this->input->get('cat_id')."'");


			$data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'items/items_summary_details',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array('user_info' => $this->user_info,
											'item_details' => ($item_details != FALSE)?$item_details->result():FALSE,
											
										)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);
		}


	}
?>