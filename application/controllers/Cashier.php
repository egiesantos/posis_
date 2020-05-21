<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Cashier extends CI_Controller
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

				$items = $this->master_model->custom_query("SELECT i.item_id, i.common_name, i.description, i.brand, i.size_type , c.description as category, COUNT(i.item_id) as stock, i.price FROM items i LEFT JOIN categories c ON c.cat_id = i.cat_id WHERE i.is_sold = 0 GROUP BY i.common_name, i.description, i.brand, i.price");

				//prepare the data to be pass to the layout
		        $data = array(
					'head_view' => 'layouts/header',
					'main_view' => 'cashier/cashiering_module',
					'foot_view' => 'layouts/footer',
					'main_view_data' => array('user_info' => $this->user_info,
												'categories' => ($categories != FALSE)?$categories->result():FALSE,
												'items' => ($items != FALSE)?$items->result():FALSE
											)
				);

				// load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

			}
		}


		public function save_transaction()
		{
			$collected_data = $this->input->post('collected_data');


			$item_id = array();

			$transaction_data = array(
        		'total'				=> $collected_data[0]['transaction_total'],
				'date_created' 		=> date('Y-m-d H:i:s'),
				'created_by' 		=> $this->user_info['user_id'],
				'is_deleted' 		=> 0,
			);

			$insert_transaction = $this->master_model->insert_data('transactions', $transaction_data);
			
			if(is_numeric($insert_transaction))
			{	

				$counter = 0;

				foreach ($collected_data as $data) 
				{

					// setting item id for update
					$item_info = $this->master_model->custom_query("SELECT * FROM items WHERE item_id = '".$data['item_id']."'");

					$item_data['common_name'] = $item_info->row()->common_name;
					$item_data['description'] = $item_info->row()->description;
					$item_data['brand'] = $item_info->row()->brand;
					$item_data['price'] = $item_info->row()->price;


					$name = $item_data['common_name'].$item_data['description'].$item_data['brand'].$item_data['price'];


					$get_item_info[$name] = $this->master_model->custom_query("SELECT item_id FROM items WHERE common_name = '".$item_data['common_name']."' AND description = '".$item_data['description']."' AND brand = '".$item_data['brand']."' AND price = '".$item_data['price']."' AND is_sold = 0 LIMIT ".$data['item_quantity']."");


					foreach ($get_item_info[$name]->result() as $item) 
					{
						array_push($item_id, $item->item_id);
					}

					// setting item id for update end


					$transaction_info_data = array(
		        		'transaction_id'	=> $insert_transaction,
		        		'common_name'		=> $data['item_name'],
		        		'price'				=> $data['item_price'],
		        		'quantity'			=> $data['item_quantity'],
					);

					$insert_transaction_info = $this->master_model->insert_data('transaction_info', $transaction_info_data);

					if(is_numeric($insert_transaction_info))
					{
						$counter++;
					}
					else
					{
						echo json_encode(array(
							'error' => $insert_transaction_info['message'],
						));
					}
				}

				if($counter == count($collected_data))
				{
					$update_item_to_sold = $this->master_model->custom_query_update("UPDATE items SET is_sold = 1, date_sold = '".date('Y-m-d H:i:s')."' WHERE item_id IN(".str_replace(['[', ']', '"'], '', json_encode($item_id)).")");


					if($update_item_to_sold != FALSE)
					{
						echo json_encode(array(
							'success' => 'Transaction Complete!',
							'transaction_id' => $insert_transaction
						));
					}
					else
					{
						echo json_encode(array(
							'error' => $update_item_to_sold['message'],
						));
					}
				}
			}
			else
			{
				echo json_encode(array(
					'error' => $insert_transaction['message'],
				));
			}

		}


		public function print_receipt($transaction_id)
		{

			$transaction = $this->master_model->custom_query("SELECT * FROM transactions WHERE id = '$transaction_id'");
			$transaction_info = $this->master_model->custom_query("SELECT * FROM transaction_info WHERE transaction_id = '$transaction_id'");

			$user = $this->master_model->custom_query("SELECT * FROM user_info WHERE user_id = '".$transaction->row()->created_by."'");
			//prepare the data to be pass to the layout
	        $data = array(
				'head_view' => 'layouts/header-alt',
				'main_view' => 'cashier/print_receipt',
				'foot_view' => 'layouts/footer-alt',
				'main_view_data' => array('user_info' => $this->user_info,
											'transactions' => ($transaction != FALSE)?$transaction->result():FALSE,
											'transaction_info' => ($transaction_info != FALSE)?$transaction_info->result():FALSE,
											'user' => ($user != FALSE)?$user->result():FALSE
										)
			);

			// load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);
		}
	}