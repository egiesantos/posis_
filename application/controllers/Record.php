<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Record extends CI_Controller
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
		public function departments()
		{
			if (!$this->tank_auth->is_logged_in()) {
				redirect('/auth/login/');
			} else {
				
				//prepare the data to be pass to the layout
		        $data = array(
					'head_view' => 'layouts/header',
					'main_view' => 'records/department_view',
					'foot_view' => 'layouts/footer',
					'main_view_data' => array('user_info' => $this->user_info
											)
				);

				 // load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

			}
		}

		// FOR THE AJAX POST ON DATA TABLE
		public function department_fetch(){


			$columns = array('dept_id', 'dept_alias', 'department_name');
			$fetched = $this->record_model->fetch_records('departments', $columns);

			echo json_encode($fetched);


		}

		// FOR INSERTING A ROW
		public function department_add(){

			// prepare the data to be inserted
			$data = array(
					'dept_alias' => trim(strtoupper($this->input->post('dept_alias'))),
					'department_name' => trim(ucwords($this->input->post('department_name'))),
				);
			

			// use the master_model dynamic insert
			$inserted = $this->master_model->insert_data('departments', $data);

			if (is_numeric($inserted)) {

				// log the action of the user
				log_message('info', 'USER : Insert Department | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );
				
				echo json_encode(array(
						'success' => 'Successfully inserted!',
						'new_id' => $inserted
					));
			} else {
				// return the error message
				echo json_encode(array(
						'error' => $inserted['message']
					));
			}


		}

		// FOR GETTING THE DATA BASED ON THE SELECTED ROW A NDN RETURN TO DISPLAY ON MDOAL
		public function department_view($dept_id){

				
			$dept = $this->master_model->getSpecific('departments', array(
					'join' => FALSE,
					'field' => 'dept_id',
					'value' => $dept_id,
					'order_by' => 'dept_id',
					'order_type' => 'ASC'
				));			

			if ($dept != FALSE) {
					
					echo json_encode($dept->row());

			} else {
				echo json_encode(array(
						'error' => 'No data found!' 
					)
				);
			}


		}

		// FOR UPDATING A ROW
		public function department_update($dept_id){
	

				// initiate parameter
				$params = array(
					'index' => 'dept_id',
					'value' => $dept_id
				);

				// intitiate values to be updated
				// $next_inspection_date = date_format(date_add(date_create($this->input->post('date_acquired')), date_interval_create_from_date_string($this->input->post('inspection_frequency').' days')), 'Y-m-d');
				
				$data = array(
						'dept_alias' => trim(strtoupper($this->input->post('dept_alias'))),
						'department_name' => trim(ucwords($this->input->post('department_name'))),
					);

				$update = $this->master_model->update_data('departments', $params, $data);


				if ($update != 0) {

					// log the action of the user
					log_message('info', 'USER : Update Department | '.$this->user_data['email'].'>>>'.implode(' | ', $data) );
					
					echo json_encode(array(
							'success' => 'Successfully updated!'
						));
				}else{
					echo json_encode(array(
							'error' => 'No changes!' 
						)
					);
				}


		}

		// FOR REMOVING A ROW
		public function department_remove($dept_id){


			$data = array(
				'primary_key' => 'dept_id',
				'key_value' => $dept_id
			);

			$affected = $this->master_model->delete_data('departments', $data);


			if ($affected == TRUE) {

				// log the action of the user
				log_message('info', 'USER : Remove Department | '.$this->user_data['email'].'>>>'.implode(' | ', $data) );
				
				echo json_encode(array(
						'success' => 'Successfully removed!'
					));
			}else{
				echo json_encode(array(
						'error' => $affected
					)
				);
			}

		
		}



		// just other POST functions
		function get_users_by_department($dept_id){

			$users = $this->master_model->custom_query("SELECT * FROM user_info WHERE dept_id = '$dept_id';");

			if ($users != FALSE) {

				$sel_options = '';

                foreach ($users->result() as $row) {
                    if ($row->user_id != $this->user_info['user_id']) {
                        $sel_options .= '<option data-id="' . $row->user_id . '">' . $row->first_name.' '.$row->last_name . '</option>';
                    }
                }

				echo json_encode(array(
						'success' => 'Data Found!',
						'sel_options' => $sel_options
					));

			} else {

				echo json_encode(array(
						'error' => 'Data Not Found!'
					));

			}

		}

		

		//PROFILE MODULES
		public function profile()
		{
			if (!$this->tank_auth->is_logged_in()) {
				redirect('/auth/login/');
			} else {
		        	
		        $barangays = $this->master_model->custom_query("SELECT * FROM barangays");

		        $data = array(
					'head_view' => 'layouts/header',
					'main_view' => 'records/profile_view',
					'foot_view' => 'layouts/footer',
					'main_view_data' => array('user_info' => $this->user_info,
												'barangays' => $barangays
											)
				);

				 // load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

			}
		}

		public function profile_info($id)
		{
			$profile_details = $this->record_model->get_details($id , 'profile');		
			//var_dump($profile_details);
			// if ($profile_details != FALSE) {

			// 	$disability = $this->master_model->custom_query("SELECT * FROM disability WHERE id = ".$profile_details->row()->type_of_disability."");

			// 	$barangay = $this->master_model->custom_query("SELECT * FROM barangays WHERE barangay_id = ".$profile_details->row()->barangay."");

			$barangays = $this->master_model->custom_query("SELECT * FROM barangays ORDER BY barangay_name;");

				$data_fetched = array(
					'firstname'	 					=> $profile_details->row()->firstname,
					'middlename'					=> $profile_details->row()->middlename,
					'lastname'						=> $profile_details->row()->lastname,	
					'suffix'						=> $profile_details->row()->suffix,	
					'civil_status'					=> $profile_details->row()->civil_status,	
					'mobile_no'						=> $profile_details->row()->mobile_no,	
					'email'							=> $profile_details->row()->email,	
					'birthday'						=> $profile_details->row()->birthday,	
					'birth_place_city'				=> $profile_details->row()->birth_place_city,	
					'birth_place_country'			=> $profile_details->row()->birth_place_country,	
					'nationality'					=> $profile_details->row()->nationality,	
					'gender'						=> $profile_details->row()->gender,	
					'education'						=> $profile_details->row()->education,	
					'school'						=> $profile_details->row()->school,	
					'present_address_unit'			=> $profile_details->row()->present_address_unit,	
					'present_address_building'		=> $profile_details->row()->present_address_building,	
					'present_address_no'			=> $profile_details->row()->present_address_no,	
					'present_address_street'		=> $profile_details->row()->present_address_street,	
					'present_address_subdivision'	=> $profile_details->row()->present_address_subdivision,	
					'present_address_barangay'		=> $profile_details->row()->present_address_barangay,	
					'present_address_city'			=> $profile_details->row()->present_address_city,	
					'present_address_province'		=> $profile_details->row()->present_address_province,	
					'present_address_country'		=> $profile_details->row()->present_address_country,
					'present_zip_code'		=> $profile_details->row()->present_zip_code,
					'permanent_address_unit'		=> $profile_details->row()->permanent_address_unit,	
					'permanent_address_building'	=> $profile_details->row()->permanent_address_building,	
					'permanent_address_no'			=> $profile_details->row()->permanent_address_no,	
					'permanent_address_street'		=> $profile_details->row()->permanent_address_street,	
					'permanent_address_subdivision'	=> $profile_details->row()->permanent_address_subdivision,	
					'permanent_address_barangay'	=> $profile_details->row()->permanent_address_barangay,	
					'permanent_address_city'		=> $profile_details->row()->permanent_address_city,	
					'permanent_address_province'	=> $profile_details->row()->permanent_address_province,	
					'permanent_address_country'		=> $profile_details->row()->permanent_address_country,
					'permanent_zip_code'	=> $profile_details->row()->permanent_zip_code,
					'source_of_income'				=> $profile_details->row()->source_of_income,
					'nature_of_work'				=> $profile_details->row()->nature_of_work,
					'occupation'					=> $profile_details->row()->occupation,
					'monthly_income'				=> $profile_details->row()->monthly_income,
					'employer'						=> $profile_details->row()->employer,
					'tin_number'					=> $profile_details->row()->tin_number,
					'sss_number'					=> $profile_details->row()->sss_number,
					'gsis_number'					=> $profile_details->row()->gsis_number,
					'philhealth_number'				=> $profile_details->row()->philhealth_number,
					'pwd_number'					=> $profile_details->row()->pwd_number,
					'senior_number'					=> $profile_details->row()->senior_number,
					'solo_number'					=> $profile_details->row()->solo_number,
					'fourp_number'					=> $profile_details->row()->fourp_number,
					'pya_number'					=> $profile_details->row()->pya_number,
					'member_since'					=> $profile_details->row()->member_since,
					'org_president'					=> $profile_details->row()->org_president,
					'family_members'				=> $profile_details->row()->family_members,
					'registered_voter'				=> $profile_details->row()->registered_voter,
					'philhealth_member'				=> $profile_details->row()->philhealth_member,
					'vulnerable_sector'				=> $profile_details->row()->vulnerable_sector,
					'date_profiled'					=> $profile_details->row()->date_profiled,
					'get_longitude'					=> $profile_details->row()->get_longitude,	
					'get_latitude'					=> $profile_details->row()->get_latitude,	
					'requirement_image_path'		=> $profile_details->row()->requirement_image_path,
					'image_path'					=> $profile_details->row()->image_path,
					'status'						=> $profile_details->row()->status,
				);


				//prepare the data to be pass to the layout
		        $data = array(
					'head_view' => 'layouts/header',
					'main_view' => 'records/profile_info_view',
					'foot_view' => 'layouts/footer',
					'main_view_data' => array('user_info'	=> $this->user_info,
											  'profile'	=> $data_fetched,
											  'barangays' =>$barangays
											)
				);

				 // load the layout/main.php VIEW/ and pass the prepared data
				$this->load->view('layouts/main.php', $data);

				// for uploading image
				if($this->input->post('upload_image')){

					// do an upload script
					$this->upload_image($id, 'record/profile_info/' . $id, 'profile');

				}

				// for uploading image
				if($this->input->post('upload_image_requirement')){

					// do an upload script
					$this->upload_image_requirement($id, 'record/profile_info/' . $id, 'profile');

				}

			// } else {
			// 	redirect( base_url() );
			// }
		
		}

		

		public function profile_fetch($appoval_id){

			if($appoval_id == 4)
			{
				$fetched = $this->master_model->custom_query("SELECT * FROM profile WHERE created_by = ".$this->user_info['user_id']."");
			}
			else
			{
				$fetched = $this->master_model->custom_query("SELECT * FROM profile WHERE status = '$appoval_id'");
			}
			

			echo json_encode($fetched->result());
		}

		public function profile_add()
		{
			// prepare the data to be inserted
			//$fetch_teacher_info = $this->record_model->get_teacher_details($this->session->userdata('user_id'), 'teacher');
			//var_dump($this->user_info['user_id']);

			
			// $barangay = $this->master_model->custom_query("SELECT * FROM barangays WHERE barangay_name = '".$this->input->post('barangay')."'");
			$config['upload_path']          = './files/e_forms/profile';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 30000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            //requirements image upload
            if ( ! $this->upload->do_upload('requirements_image_path'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    
                    var_dump($error);
                    
            }
            else
            {
            		$requirements_data = array('upload_data' => $this->upload->data());

                    //var_dump($requirements_data['upload_data']['file_name']);
            		
            		// profile image upload
            		if ( ! $this->upload->do_upload('image_path'))
		            {
		                    $error = array('error' => $this->upload->display_errors());
		                    
		                    var_dump($error);
		                    
		            }
		            else
		            {
		                    $profile_image_data = array('upload_data' => $this->upload->data());

		                    $barangay_info = $this->master_model->custom_query("SELECT * FROM barangays WHERE barangay_name = '".$this->input->post('present_address_barangay')."'");

		                    
		                    //var_dump($profile_image_data['upload_data']['file_name']);
		                    $data = array(
								'firstname'	 					=> trim($this->input->post('firstname')),
								'middlename'					=> trim($this->input->post('middlename')),
								'lastname'						=> trim($this->input->post('lastname')),	
								'suffix'						=> trim($this->input->post('suffix')),
								'civil_status'					=> trim($this->input->post('civil_status')),	
								'mobile_no'						=> trim($this->input->post('mobile_no')),
								'email'							=> trim($this->input->post('email')),	
								'birthday'						=> trim($this->input->post('birthday')),	
								'birth_place_city'				=> trim($this->input->post('birth_place_city')),	
								'birth_place_country'			=> trim($this->input->post('birth_place_country')),	
								'nationality'					=> trim($this->input->post('nationality')),	
								'gender'						=> trim($this->input->post('gender')),
								'education'						=> trim($this->input->post('education')),	
								'school'						=> trim($this->input->post('school')),	
								'present_address_unit'			=> trim($this->input->post('present_address_unit')),	
								'present_address_building'		=> trim($this->input->post('present_address_building')),	
								'present_address_no'			=> trim($this->input->post('present_address_no')),	
								'present_address_street'		=> trim($this->input->post('present_address_street')),	
								'present_address_subdivision'	=> trim($this->input->post('present_address_subdivision')),
								'present_address_barangay'		=> trim($this->input->post('present_address_barangay')),	
								'present_address_city'			=> trim($this->input->post('present_address_city')),
								'present_address_province'		=> trim($this->input->post('present_address_province')),	
								'present_address_country'		=> trim($this->input->post('present_address_country')),
								'present_zip_code'				=> trim($this->input->post('present_zip_code')),
								'permanent_address_unit'		=> trim($this->input->post('permanent_address_unit')),
								'permanent_address_building'	=> trim($this->input->post('permanent_address_building')),	
								'permanent_address_no'			=> trim($this->input->post('permanent_address_no')),	
								'permanent_address_street'		=> trim($this->input->post('permanent_address_street')),	
								'permanent_address_subdivision'	=> trim($this->input->post('permanent_address_subdivision')),	
								'permanent_address_barangay'	=> trim($this->input->post('permanent_address_barangay')),	
								'permanent_address_city'		=> trim($this->input->post('permanent_address_city')),	
								'permanent_address_province'	=> trim($this->input->post('permanent_address_province')),
								'permanent_address_country'		=> trim($this->input->post('permanent_address_country')),
								'permanent_zip_code'			=> trim($this->input->post('permanent_zip_code')),
								'source_of_income'				=> trim($this->input->post('source_of_income')),
								'nature_of_work'				=> trim($this->input->post('nature_of_work')),
								'occupation'					=> trim($this->input->post('occupation')),
								'monthly_income'				=> trim($this->input->post('monthly_income')),
								'employer'						=> trim($this->input->post('employer')),
								'tin_number'					=> trim($this->input->post('tin_number')),
								'sss_number'					=> trim($this->input->post('sss_number')),
								'gsis_number'					=> trim($this->input->post('gsis_number')),
								'philhealth_number'				=> trim($this->input->post('philhealth_number')),
								'pwd_number'					=> trim($this->input->post('pwd_number')),
								'senior_number'					=> trim($this->input->post('senior_number')),
								'solo_number'					=> trim($this->input->post('solo_number')),
								'fourp_number'					=> trim($this->input->post('fourp_number')),
								'pya_number'					=> trim($this->input->post('pya_number')),
								'member_since'					=> trim($this->input->post('member_since')),
								'org_president'					=> trim($this->input->post('org_president')),
								'family_members'				=> trim($this->input->post('family_members')),
								'registered_voter'				=> trim($this->input->post('registered_voter')),
								'philhealth_member'				=> trim($this->input->post('philhealth_member')),
								'vulnerable_sector'				=> trim($this->input->post('vulnerable_sector')),
								'get_longitude'					=> trim($this->input->post('get_longitude')),	
								'get_latitude'					=> trim($this->input->post('get_latitude')),	
								'requirement_image_path'		=> $requirements_data['upload_data']['file_name'],
								'image_path'					=> $profile_image_data['upload_data']['file_name'],
								'created_by'					=> $this->user_info['user_id'],
								'date_profiled'					=> date('Y-m-d'),
								'date_created'					=> date('Y-m-d h:i:s'),
								'status'						=> '0',
							);

							// // use the master_model dynamic insert
							$inserted = $this->master_model->insert_data('profile', $data);
							

							if (is_numeric($inserted)) {

								//$this->_replace_related_details($pid_no);
								// log the action of the user
								log_message('info', 'USER : Insert Profile | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );
								
								// echo json_encode(array(
								// 		'success' => 'Successfully inserted!',
								// 		'new_id' => $inserted
								// 	));

								redirect('record/profile_info/'.$inserted.'');
							} else {
								// return the error message
								echo json_encode(array(
										'error' => $inserted['message']
									));
							}
		            }
                    
            }
			
		}


		public function profile_view($id){
				
			$profile_details = $this->record_model->get_details($id,'profile');


			if ($profile_details != FALSE) {

				$data = array(
					'firstname'	 					=> $profile_details->row()->firstname,
					'middlename'					=> $profile_details->row()->middlename,
					'lastname'						=> $profile_details->row()->lastname,	
					'suffix'						=> $profile_details->row()->suffix,	
					'civil_status'					=> $profile_details->row()->civil_status,	
					'mobile_no'						=> $profile_details->row()->mobile_no,	
					'email'							=> $profile_details->row()->email,	
					'birthday'						=> $profile_details->row()->birthday,	
					'birth_place_city'				=> $profile_details->row()->birth_place_city,	
					'birth_place_country'			=> $profile_details->row()->birth_place_country,	
					'nationality'					=> $profile_details->row()->nationality,	
					'gender'						=> $profile_details->row()->gender,	
					'education'						=> $profile_details->row()->education,	
					'school'						=> $profile_details->row()->school,	
					'present_address_unit'			=> $profile_details->row()->present_address_unit,	
					'present_address_building'		=> $profile_details->row()->present_address_building,	
					'present_address_no'			=> $profile_details->row()->present_address_no,	
					'present_address_street'		=> $profile_details->row()->present_address_street,	
					'present_address_subdivision'	=> $profile_details->row()->present_address_subdivision,	
					'present_address_barangay'		=> $profile_details->row()->present_address_barangay,	
					'present_address_city'			=> $profile_details->row()->present_address_city,	
					'present_address_province'		=> $profile_details->row()->present_address_province,	
					'present_address_country'		=> $profile_details->row()->present_address_country,
					'present_zip_code'				=> $profile_details->row()->present_zip_code,
					'permanent_address_unit'		=> $profile_details->row()->permanent_address_unit,	
					'permanent_address_building'	=> $profile_details->row()->permanent_address_building,	
					'permanent_address_no'			=> $profile_details->row()->permanent_address_no,	
					'permanent_address_street'		=> $profile_details->row()->permanent_address_street,	
					'permanent_address_subdivision'	=> $profile_details->row()->permanent_address_subdivision,	
					'permanent_address_barangay'	=> $profile_details->row()->permanent_address_barangay,	
					'permanent_address_city'		=> $profile_details->row()->permanent_address_city,	
					'permanent_address_province'	=> $profile_details->row()->permanent_address_province,	
					'permanent_address_country'		=> $profile_details->row()->permanent_address_country,
					'permanent_zip_code'			=> $profile_details->row()->permanent_zip_code,
					'source_of_income'				=> $profile_details->row()->source_of_income,
					'nature_of_work'				=> $profile_details->row()->nature_of_work,
					'occupation'					=> $profile_details->row()->occupation,
					'monthly_income'				=> $profile_details->row()->monthly_income,
					'employer'						=> $profile_details->row()->employer,
					'tin_number'					=> $profile_details->row()->tin_number,
					'sss_number'					=> $profile_details->row()->sss_number,
					'gsis_number'					=> $profile_details->row()->gsis_number,
					'philhealth_number'				=> $profile_details->row()->philhealth_number,
					'pwd_number'					=> $profile_details->row()->pwd_number,
					'senior_number'					=> $profile_details->row()->senior_number,
					'solo_number'					=> $profile_details->row()->solo_number,
					'fourp_number'					=> $profile_details->row()->fourp_number,
					'pya_number'					=> $profile_details->row()->pya_number,
					'member_since'					=> $profile_details->row()->member_since,
					'org_president'					=> $profile_details->row()->org_president,
					'family_members'				=> $profile_details->row()->family_members,
					'registered_voter'				=> $profile_details->row()->registered_voter,
					'philhealth_member'				=> $profile_details->row()->philhealth_member,
					'vulnerable_sector'				=> $profile_details->row()->vulnerable_sector,
					'get_longitude'					=> $profile_details->row()->get_longitude,	
					'get_latitude'					=> $profile_details->row()->get_latitude,	
					'requirement_image_path'		=> $profile_details->row()->requirement_image_path,
					'image_path'					=> $profile_details->row()->image_path,
					'status'						=> $profile_details->row()->status,
				);
					
				echo json_encode($data);

			} else {
				echo json_encode(array(
						'error' => 'No data found!' 
					)
				);
			}
		}

		public function profile_update($id)
		{

			
			
                    $profile_image_data = array('upload_data' => $this->upload->data());

                    $barangay_info = $this->master_model->custom_query("SELECT * FROM barangays WHERE barangay_name = '".$this->input->post('present_address_barangay')."'");

                    $params = array(
						'index' => 'id',
						'value' => $id
					);
                    
                    //var_dump($profile_image_data['upload_data']['file_name']);
                    $data = array(
						'firstname'	 					=> trim($this->input->post('firstname')),
						'middlename'					=> trim($this->input->post('middlename')),
						'lastname'						=> trim($this->input->post('lastname')),	
						'suffix'						=> trim($this->input->post('suffix')),
						'civil_status'					=> trim($this->input->post('civil_status')),	
						'mobile_no'						=> trim($this->input->post('mobile_no')),
						'email'							=> trim($this->input->post('email')),	
						'birthday'						=> trim($this->input->post('birthday')),	
						'birth_place_city'				=> trim($this->input->post('birth_place_city')),	
						'birth_place_country'			=> trim($this->input->post('birth_place_country')),	
						'nationality'					=> trim($this->input->post('nationality')),	
						'gender'						=> trim($this->input->post('gender')),
						'education'						=> trim($this->input->post('education')),	
						'school'						=> trim($this->input->post('school')),	
						'present_address_unit'			=> trim($this->input->post('present_address_unit')),	
						'present_address_building'		=> trim($this->input->post('present_address_building')),	
						'present_address_no'			=> trim($this->input->post('present_address_no')),	
						'present_address_street'		=> trim($this->input->post('present_address_street')),	
						'present_address_subdivision'	=> trim($this->input->post('present_address_subdivision')),
						'present_address_barangay'		=> trim($this->input->post('present_address_barangay')),	
						'present_address_city'			=> 'Baliwag',
						'present_address_province'		=> 'Bulacan',	
						'present_address_country'		=> trim($this->input->post('present_address_country')),
						'present_zip_code'				=> trim($this->input->post('present_zip_code')),
						'permanent_address_unit'		=> trim($this->input->post('permanent_address_unit')),
						'permanent_address_building'	=> trim($this->input->post('permanent_address_building')),	
						'permanent_address_no'			=> trim($this->input->post('permanent_address_no')),	
						'permanent_address_street'		=> trim($this->input->post('permanent_address_street')),	
						'permanent_address_subdivision'	=> trim($this->input->post('permanent_address_subdivision')),	
						'permanent_address_barangay'	=> trim($this->input->post('permanent_address_barangay')),	
						'permanent_address_city'		=> trim($this->input->post('permanent_address_city')),	
						'permanent_address_province'	=> trim($this->input->post('permanent_address_province')),
						'permanent_address_country'		=> trim($this->input->post('permanent_address_country')),
						'permanent_zip_code'			=> trim($this->input->post('permanent_zip_code')),
						'source_of_income'				=> trim($this->input->post('source_of_income')),
						'nature_of_work'				=> trim($this->input->post('nature_of_work')),
						'occupation'					=> trim($this->input->post('occupation')),
						'monthly_income'				=> trim($this->input->post('monthly_income')),
						'employer'						=> trim($this->input->post('employer')),
						'tin_number'					=> trim($this->input->post('tin_number')),
						'sss_number'					=> trim($this->input->post('sss_number')),
						'gsis_number'					=> trim($this->input->post('gsis_number')),
						'philhealth_number'				=> trim($this->input->post('philhealth_number')),
						'pwd_number'					=> trim($this->input->post('pwd_number')),
						'senior_number'					=> trim($this->input->post('senior_number')),
						'solo_number'					=> trim($this->input->post('solo_number')),
						'fourp_number'					=> trim($this->input->post('fourp_number')),
						'pya_number'					=> trim($this->input->post('pya_number')),
						'member_since'					=> trim($this->input->post('member_since')),
						'org_president'					=> trim($this->input->post('org_president')),
						'family_members'				=> trim($this->input->post('family_members')),
						'registered_voter'				=> trim($this->input->post('registered_voter')),
						'philhealth_member'				=> trim($this->input->post('philhealth_member')),
						'vulnerable_sector'				=> trim($this->input->post('vulnerable_sector')),
						'get_longitude'					=> trim($this->input->post('get_longitude')),	
						'get_latitude'					=> trim($this->input->post('get_latitude')),
						'created_by'					=> $this->user_info['user_id'],
						'date_profiled'					=> date('Y-m-d'),
						'date_created'					=> date('Y-m-d h:i:s'),
						'status'						=> '0',
					);

					// use the master_model dynamic insert
					$update = $this->master_model->update_data('profile', $params, $data);
					

					if (is_numeric($update)) {

						//$this->_replace_related_details($pid_no);
						// log the action of the user
						log_message('info', 'USER :Update Profile | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );
						
						// echo json_encode(array(
						// 		'success' => 'Successfully inserted!',
						// 		'new_id' => $inserted
						// 	));

						redirect('record/profile_info/'.$id.'');
					} else {
						// return the error message
						echo json_encode(array(
								'error' => $update['message']
							));
					}
           
		}

		

		public function get_chart_data($id)
		{
			//$result = $this->master_model->custom_query("SELECT facility_name FROM facility");
			$result = $this->master_model->custom_query("SELECT DATE_FORMAT(date_profiled, '%M %d, %Y') date_profiled, COUNT(id) total, date_profiled date_, (SELECT COUNT(id) FROM profile WHERE status NOT IN(0,5,3) AND date_profiled = p.date_profiled AND created_by = '$id') approved, (SELECT COUNT(id) FROM profile WHERE status IN(0,5) AND date_profiled = p.date_profiled) for_approval FROM profile p WHERE created_by = '$id' GROUP BY date_profiled");

			echo json_encode($result->result());
		}

		

		
		// other local functions
		public function upload_image($id, $redirect_to, $table){

			 	$config['upload_path']          = $this->document_path . 'e_forms/profile/';
                $config['allowed_types']        = $this->allowed_types;
                $config['max_size']             = 3000;//$this->max_size; //godaddy has 32mb limit
                $config['encrypt_name'] 		= TRUE;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);


                if ( ! $this->upload->do_upload('image_file'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    // $db_error = array('db_error' => $this->db->error());


                    // $document_id = '0';
                    $this->session->set_flashdata('message', $error['error']);
                    
                }
                else
                {
                	$file_data = array('upload_data' => $this->upload->data());


                	// initiate parameter
					$params = array(
						'index' => 'id',
						'value' => $id
					);

					// intitiate values to be updated
					$data = array(
						'image_path' => $file_data['upload_data']['file_name']
					);

					$update = $this->master_model->update_data($table, $params, $data);

					if ($update != 0) {

						// log the action of the user
						log_message('info', 'USER : Update '.$table.' Image | '.$this->user_data['email'].'>>>' );
						
						
						// set a flashdata
						$this->session->set_flashdata('message', ''); 


					} else {
						// return the error message
						$this->session->set_flashdata('message', 'Image info were not inserted in the Database!'); 
						
					}


                }
				
               	// redirect to the page
				redirect(base_url() . $redirect_to);


		}

		//TRANSACTION MODULE
		public function transaction()
		{

	        $data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'records/transaction_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array('user_info' => $this->user_info,
										)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);
		}

		public function transaction_fetch_profile($data)
		{

			
			$profile = $this->master_model->custom_query("SELECT * FROM profile WHERE rfid = '$data' OR biometrics = '$data'");

			if($profile != FALSE)
			{
				$data_fetched = array(
					'id'							=> $profile->row()->id,
					'firstname'	 					=> $profile->row()->firstname,
					'middlename'					=> $profile->row()->middlename,
					'lastname'						=> $profile->row()->lastname,
					'biometrics'					=> $profile->row()->biometrics,
					'rfid'							=> $profile->row()->rfid,
					'image_path'					=> $profile->row()->image_path
				);

				echo json_encode($data_fetched);
			}
			else
			{
				echo json_encode(array(
						'error' => 'Data not Found! Try Again!',
						//'new_id' => $inserted
					));
			}
			

		}

		public function transaction_offered()
		{

	        $data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'records/transaction_offered_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array('user_info' => $this->user_info,
										)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);
		}

		public function services_fetch()
		{

	        $columns = array('id', 'service_name');
			$fetched = $this->record_model->fetch_records('services', $columns);

			echo json_encode($fetched);
		}

		public function create_template()
		{
			$data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'records/create_template_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array('user_info' => $this->user_info,
										)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);
		}

		// AUDIT TRAIL MODULE
		public function audit_trail(){

			$this->load->helper('directory');

			$log_files = directory_map('./syslogs');

			$data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'records/audit_trail_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array(
										'user_info' => $this->user_info,
										'log_files'	=> $log_files
									)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);
		}

		public function fetch_log_content($log_file_name){
			echo file_get_contents('syslogs/' . $log_file_name );
		}

	}
?>