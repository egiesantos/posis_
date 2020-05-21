<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User extends CI_Controller {



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





        // get all user info > an array

	    $this->user_info = $this->users_model->profile($this->session->userdata('user_id'));



	}







 	public function lists(){

		// get all dropdown values

		//$departments = $this->master_model->custom_query("SELECT * FROM departments ORDER BY department_name;");

		



		//prepare the data to be pass to the layout

        $data = array(

			'head_view' => 'layouts/header',

			'main_view' => 'user/list_view',

			'foot_view' => 'layouts/footer',

			'main_view_data' => array(

					'user_info' => $this->user_info,

					//'departments' => $departments,

					'test_pass' => 'pass'

				)

		);



		 // load the layout/main.php VIEW/ and pass the prepared data

		$this->load->view('layouts/main.php', $data);





	}





	public function list_fetch(){



		$user_id = $this->user_info['user_id'];



		$list = $this->master_model->custom_query("SELECT 

													u.id AS id,

												    u.email AS email,

												    u.last_login AS last_login,

												    CONCAT(ui.first_name, ' ', ui.last_name) AS full_name,

												    rd.serial_number AS serial_number,

												    dpt.department_name AS department_name,

												    u.role AS role_id

												FROM

												    users u

												        LEFT JOIN

												    user_info ui ON u.id = ui.user_id

												    	LEFT JOIN

												    departments dpt ON dpt.dept_id = ui.dept_id

												    	LEFT JOIN

												    registered_devices rd ON rd.user_id = u.id

												WHERE u.id != '$user_id' AND u.banned = 0

												    ORDER BY email ASC;");

		

		if ($list != FALSE) {

			$new_list = array();



			// modify result

			foreach ($list->result() as $row) {

				array_push($new_list, array(

						'id' => $row->id,

						'email' => $row->email,

						'last_login' => $row->last_login,

						'full_name' => $row->full_name,

						'serial_number' => $row->serial_number,

						'department_name' => $row->department_name,

						'role' => $this->config->item('roles')[$row->role_id]

					));

			}

			echo json_encode($new_list);

		} else {

			echo json_encode(array(

					'error' => 'No data found!'

				));

		}

	}



	public function user_add(){



			

		$data = array(

				'password' => $this->tank_auth->create_password($this->input->post('user_pass')),

				'email' => trim($this->input->post('email')),

				'created' => DATE('Y-m-d H:i:s'),

				'last_ip' => $this->input->ip_address(),

				'role' => trim($this->input->post('role_id'))

			);





		// use the master_model dynamic insert

		$insert_user = $this->master_model->insert_data('users', $data);



		if (is_numeric($insert_user)) {



			// log the action of the user

			log_message('info', 'USER : Insert User | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );

			

			// insert on User Info

			$data = array(

				'user_id' => $insert_user,

				'first_name' => trim(strtoupper($this->input->post('first_name'))),

				'last_name' => trim(strtoupper($this->input->post('last_name'))),

				'middle_name' => trim(strtoupper($this->input->post('middle_name'))),

				'dept_id' => trim(strtoupper($this->input->post('dept_id'))),

			);

			// use the master_model dynamic insert

			$insert_info = $this->master_model->insert_data('user_info', $data);





			// insert on registered_devices

			$data = array(

				'user_id' => $insert_user,

				'serial_number' => trim($this->input->post('serial_number'))

			);

			// use the master_model dynamic insert

			$insert_device = $this->master_model->insert_data('registered_devices', $data);





			echo json_encode(array(

					'success' => 'Successfully inserted!',

					'new_id' => $insert_user

				));

		} else {

			// return the error message

			echo json_encode(array(

					'error' => $insert_user['message']

				));

		}





	}



	public function user_remove($id){ //will only ban the user



		// initiate parameter

		$params = array(

			'index' => 'id',

			'value' => $id

		);



		// intitiate values to be updated

		// $next_inspection_date = date_format(date_add(date_create($this->input->post('date_acquired')), date_interval_create_from_date_string($this->input->post('inspection_frequency').' days')), 'Y-m-d');

		

		$data = array(

			'banned' => 1

		);



		$affected = $this->master_model->update_data('users', $params, $data);





		if ($affected == TRUE) {



			// log the action of the user

			log_message('info', 'USER : Ban User | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );

			

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





	public function user_view($id){





			

			$user = $this->master_model->getSpecific('users', array(

					'join' => FALSE,

					'field' => 'id',

					'value' => $id,

					'order_by' => 'id',

					'order_type' => 'ASC'

				));			



			if ($user != FALSE) {

				

				$user_info = $this->master_model->getSpecific('user_info', array(

					'join' => FALSE,

					'field' => 'user_id',

					'value' => $user->row()->id,

					'order_by' => 'user_id',

					'order_type' => 'ASC'

				));



				$department = $this->master_model->getSpecific('departments', array(

					'join' => FALSE,

					'field' => 'dept_id',

					'value' => $user_info->row()->dept_id,

					'order_by' => 'dept_id',

					'order_type' => 'ASC'

				));



				$device = $this->master_model->getSpecific('registered_devices', array(

					'join' => FALSE,

					'field' => 'user_id',

					'value' => $user->row()->id,

					'order_by' => 'user_id',

					'order_type' => 'ASC'

				));

				



				$return_res = array(

						'user_id' => $user_info->row()->user_id,

						'email' => $user->row()->email,

						'user_role' => $this->config->item('roles')[intval($user->row()->role)],

						'first_name' => $user_info->row()->first_name,

						'middle_name' => $user_info->row()->middle_name,

						'last_name' => $user_info->row()->last_name,

						'serial_number' => $device->row()->serial_number,

						'department_name' => $department->row()->department_name

					);

					

					echo json_encode($return_res);



			} else {

				echo json_encode(array(

						'error' => 'No data found!' 

					)

				);

			}







	}



	public function user_update($id){





		// UPDATE THE USER

		// initiate parameter

		$params = array(

			'index' => 'id',

			'value' => $id

		);



		// if password will reset

		if ($this->input->post('reset_pass') == 'YES') {

			

			$data = array(

				'email' => trim($this->input->post('email')),

				'role' => trim($this->input->post('role_id')), 

				'password' => $this->tank_auth->create_password($this->input->post('user_pass'))

			);		



		} else {



			$data = array(

				'email' => trim($this->input->post('email')),

				'role' => trim($this->input->post('role_id'))

			);



		}



		$update_user = $this->master_model->update_data('users', $params, $data);



		// UPDATE THE USER INFO

		// initiate parameter

		$params = array(

			'index' => 'user_id',

			'value' => $id

		);



		$data = array(

			'first_name' => trim(strtoupper($this->input->post('first_name'))),

			'last_name' => trim(strtoupper($this->input->post('last_name'))),

			'middle_name' => trim(strtoupper($this->input->post('middle_name'))),

			'dept_id' => trim(strtoupper($this->input->post('dept_id'))),

		);



		$update_info = $this->master_model->update_data('user_info', $params, $data);





		// UPDATE THE USER REGISTERED DEVICE

		// initiate parameter

		$params = array(

			'index' => 'user_id',

			'value' => $id

		);



		$data = array(

			'serial_number' => trim($this->input->post('serial_number'))

		);



		$update_device = $this->master_model->update_data('registered_devices', $params, $data);



		if ($update_user != 0 OR $update_info != 0 OR $update_device != 0) {



			// log the action of the user

			log_message('info', 'USER : Update User | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );



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



	public function profile(){

		

		$user_id = $this->user_info['user_id'];



		if (!$this->tank_auth->is_logged_in()) {

			redirect('/auth/login/');

		} else {

			

			// check if user info exists

			while (!$this->master_model->custom_query("SELECT * FROM user_info WHERE user_id = '$user_id' ")){



				$data = array(

						'user_id' => $user_id,

						'date_of_birth' => DATE('Y-m-d'),

						'dept_id' => '4'

					);

				

				// use the master_model dynamic insert

				$inserted = $this->master_model->insert_data('user_info', $data);

				

			}



			// get the user info

			$user_data = $this->master_model->custom_query("SELECT 

															    *

															FROM

															    user_info ui

															        LEFT JOIN

															    users u ON ui.user_id = u.id

																	LEFt JOIN

																departments d ON d.dept_id = ui.dept_id

															WHERE

															    u.id = '$user_id'; ");

			

			$departments = $this->master_model->custom_query("SELECT * FROM departments ORDER BY department_name;");



			// add null entry on user_info if info not exist

			if ($user_data == FALSE) {

				

			}



			//prepare the data to be pass to the layout

	        $data = array(

				'head_view' => 'layouts/header',

				'main_view' => 'user/profile_view',

				'foot_view' => 'layouts/footer',

				'main_view_data' => array('user_info' => $this->user_info,

										'user_data' => $user_data,

										'departments' => $departments

										)

			);



			 // load the layout/main.php VIEW/ and pass the prepared data

			$this->load->view('layouts/main.php', $data);



		}



	}



	public function profile_save($user_id){

		if (!$this->tank_auth->is_logged_in()) {

			redirect('/auth/login/');

		} else {

			

			// initiate parameter

			$params = array(

				'index' => 'user_id',

				'value' => $user_id

			);



			// intitiate values to be updated

			$data = array(

				'first_name' => trim(ucfirst($this->input->post('first_name'))),

				'middle_name' => trim(ucfirst($this->input->post('middle_name'))),

				'last_name' => trim(ucfirst($this->input->post('last_name'))),

				'tel_number' => trim($this->input->post('tel_number')),

				'mobile_number' => trim($this->input->post('mobile_number')),

				'date_of_birth' => date_format(date_create($this->input->post('date_of_birth')), 'Y-m-d'),

				'dept_id' => trim($this->input->post('dept_id'))

			);



			$update = $this->master_model->update_data('user_info', $params, $data);





			if ($update != 0) {



				// log the action of the user

				log_message('info', 'USER : Update User Info | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );

				

				$query = "SELECT 

						    *

						FROM

						    user_info ui

						        LEFT JOIN

						    users u ON ui.user_id = u.id

								LEFt JOIN

							departments d ON d.dept_id = ui.dept_id

						WHERE

						    u.id = '$user_id';";



				echo json_encode(array(

						'success' => 'Successfully updated!',

						'row' => $user_info = $this->master_model->custom_query($query)->row()

					));



			}else{

				echo json_encode(array(

						'error' => 'No changes!' 

					)

				);

			}





		}



	}





	public function groups(){

		



		//prepare the data to be pass to the layout

        $data = array(

			'head_view' => 'layouts/header',

			'main_view' => 'user/group_view',

			'foot_view' => 'layouts/footer',

			'main_view_data' => array(

					'user_info' => $this->user_info

				)

		);



		 // load the layout/main.php VIEW/ and pass the prepared data

		$this->load->view('layouts/main.php', $data);





	}



	public function group_fetch(){

		$user_id = $this->user_info['user_id'];



		$list = $this->master_model->custom_query("SELECT 

												    ug.id AS id, ug.group_name AS group_name, ug.date_created AS date_created

												FROM

												    user_groups ug

												WHERE

												    ug.created_by = '$user_id' AND ug.status != '3'

												ORDER BY ug.group_name ASC;");



		// add condition here if you want to display all groups in ADMIN PAGE

		

		if ($list != FALSE) {



			echo json_encode($list->result());



		} else {

			echo json_encode(array(

					'error' => 'No data found!'

				));

		}



	}



	public function group_add(){



		$data = array(

				'group_name' => trim(strtoupper($this->input->post('group_name'))),

				'created_by' => $this->user_info['user_id'],

				'date_created' => DATE('Y-m-d H:i:s'),

				'status' => 1

			);



		// use the master_model dynamic insert

		$insert_group = $this->master_model->insert_data('user_groups', $data);



		if (is_numeric($insert_group)) {



			// log the action of the user

			log_message('info', 'USER : Insert Group | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );

			

			echo json_encode(array(

					'success' => 'Successfully inserted!',

					'new_id' => $insert_group

				));

		} else {

			// return the error message

			echo json_encode(array(

					'error' => $insert_group['message']

				));

		}



	}



	public function group_view($id){





			

			$group = $this->master_model->getSpecific('user_groups', array(

					'join' => FALSE,

					'field' => 'id',

					'value' => $id,

					'order_by' => 'id',

					'order_type' => 'ASC'

				));			



			if ($group != FALSE) {

				

					echo json_encode($group->result());



			} else {

				echo json_encode(array(

						'error' => 'No data found!' 

					)

				);

			}







	}



	public function group_update($id){





		// UPDATE THE USER

		// initiate parameter

		$params = array(

			'index' => 'id',

			'value' => $id

		);



		$data = array(

			'group_name' => trim(strtoupper($this->input->post('group_name')))

		);



		$update = $this->master_model->update_data('user_groups', $params, $data);



		if ($update != 0) {



			// log the action of the user

			log_message('info', 'USER : Update User Group | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );



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



	public function group_remove($id){ 



		// initiate parameter

		$params = array(

			'index' => 'id',

			'value' => $id

		);



		$data = array(

			'status' => '3' //means deleted

		);



		$affected = $this->master_model->update_data('user_groups', $params, $data);



		if ($affected != 0) {



			// log the action of the user

			log_message('info', 'USER : Remove Group | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );

			

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





	public function members($group_id){



		$departments = $this->master_model->custom_query("SELECT * FROM departments ORDER BY department_name;");

		$group = $this->master_model->custom_query("SELECT * FROM user_groups WHERE id = '$group_id' ORDER BY group_name;");



		//prepare the data to be pass to the layout

        $data = array(

			'head_view' => 'layouts/header',

			'main_view' => 'user/member_view',

			'foot_view' => 'layouts/footer',

			'main_view_data' => array(

					'user_info' => $this->user_info,

					'departments' => $departments,

					'group_id' => $group_id,

					'group' => $group->row()

				)

		);



		 // load the layout/main.php VIEW/ and pass the prepared data

		$this->load->view('layouts/main.php', $data);





	}



	public function member_fetch($group_id){



		$user_id = $this->user_info['user_id'];



		$members = $this->master_model->custom_query("SELECT 

													    ugm.id AS id,

													    u.email AS email,

													    CONCAT(ui.first_name, ' ', ui.last_name) AS full_name,

													    u.last_login AS last_login

													FROM

													    user_groups ug

													        LEFT JOIN

													    user_group_members ugm ON ug.id = ugm.group_id

													        INNER JOIN

													    user_info ui ON ugm.user_id = ui.user_id

															LEFT JOIN

														users u ON u.id = ui.user_id

													WHERE

													    ug.created_by = '$user_id' AND ug.id = '$group_id'

													ORDER BY u.email ASC;");

		



		if ($members != FALSE) {



			echo json_encode($members->result());



		} else {

			echo json_encode(array(

					'error' => 'No data found!'

				));

		}

	

	}





	public function member_add(){





		// var_dump($this->input->post('post_values'));



		foreach ($this->input->post('post_values') as $row) {



			// use the master_model dynamic insert

			$insert_member = $this->master_model->insert_data('user_group_members', $row);

			

			// log the action of the user

			log_message('info', 'USER : Insert Group Member | '.$this->user_info['email'].'>>>'.implode(' | ', $row) );

			

		}

		



		if (is_numeric($insert_member)) {



			echo json_encode(array(

					'success' => 'Successfully inserted!',

					'new_id' => $insert_member

				));



		} else {

			// return the error message

			echo json_encode(array(

					'error' => $insert_member['message']

				));

		}



	}





	public function member_remove($id){ 



		$data = array(

			'primary_key' => 'id',

			'key_value' => $id

		);



		$affected = $this->master_model->delete_data('user_group_members', $data);



		if ($affected == TRUE) {



			// log the action of the user

			log_message('info', 'USER : Remove Group Member | '.$this->user_info['email'].'>>>'.implode(' | ', $data) );

			

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







}

