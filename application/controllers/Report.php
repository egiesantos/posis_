<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Report extends CI_Controller
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
			
	        // get all user info > an array
	        $this->user_info = $this->users_model->profile($this->session->userdata('user_id'));

	        // get all user info > an array
	        $this->user_info = $this->users_model->profile($this->session->userdata('user_id'));

			$this->allowed_types = $this->config->item('allowed_types');

			// define upload path
			$this->document_path = 'files/';

		}

		public function index()
		{	
			$department_id = $this->user_info['dept_id'];
			$is_admin = $this->is_admin();

			$additional_coditions = '';
			if (!$is_admin) {
				$additional_coditions .= "AND d.dept_id = " . $department_id;
			}

			$department_forms = array();

			$departments = $this->master_model->custom_query("SELECT * FROM departments d ORDER BY department_name;");
			if ($departments != FALSE) {
				foreach ($departments->result() as $row) {
					$department_id = $row->dept_id;
					$result = $this->master_model->custom_query("SELECT * FROM forms f
																	LEFT JOIN users u ON u.id = f.user_id
																	LEFT JOIN user_info ui ON ui.user_id = u.id
																	LEFT JOIN departments d ON ui.dept_id = d.dept_id
																WHERE 1=1 AND is_deleted = 0 AND f.dept_id = '$department_id'
																{$additional_coditions}
																ORDER BY ui.dept_id;");

					if ($result != FALSE) {
						$department_forms[] = array(
							'department' => $row->department_name, 
							'forms' => ($result != FALSE) ? $result->result() : $result
						);
					}
				}
			}
			
			//prepare the data to be pass to the layout
	        $data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'reports/main_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array(
						'user_info' => $this->user_info,
						'department_forms' => (!empty($department_forms)) ? $department_forms : FALSE
					)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);

		}


		public function filter($form_id){

			$form = $this->master_model->custom_query("SELECT 
													    *
													FROM
													    forms f
													    LEFT JOIN form_details fd ON fd.form_id = f.form_id
													WHERE is_deleted = 0
													AND f.form_id = '$form_id';");

			//prepare the data to be pass to the layout
	        $data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'reports/filter_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array(
						'user_info' => $this->user_info,
						'form_id'	=> $form_id,
						'form'		=> ($form != FALSE) ? $form->result() : $form
					)
			);

			 // load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);

		}

		public function filter_data($form_id){
			// var_dump($this->input->post());
			set_time_limit(0);

			// get the form details first
			$form = $this->master_model->custom_query("SELECT 
													    *
													FROM
													    forms f
													    LEFT JOIN form_details fd ON fd.form_id = f.form_id
													WHERE is_deleted = 0
													AND f.form_id = '$form_id';");

			// check first if form details were created
			// if ($form == FALSE) {
			// 	echo "FORM DETAILS NOT FOUND!";
			// 	exit();
			// }


			// CREATE THE QUERY
			// create the fields for individual fields
			$individual_fields = array(
						'i.individual_id',
						'i.first_name',
						'i.middle_name',
						'i.last_name',
						'i.nick_name',
						'i.email',
						'i.sex',
						'i.birth_date',
						'i.birth_place',
						'i.telephone',
						'i.cellphone',
						'i.civil_status',
						'i.citizenship',
						'i.religion'
					);

			// create the fields for form fields
			$form_fields = array();
			if ($form != FALSE) {
				$form_table_name = $form->row()->table_name;
				$join = 'RIGHT JOIN ' . $form_table_name . ' f ON f.individual_id = i.individual_id';
				$create_log = 'YEAR(f.date_created) year_created, 
						MONTHNAME(f.date_created) month_created';
				$order_fields = 'f.date_created';

				if ($form->row()->element_data) {
					foreach (json_decode($form->row()->element_data) as $element) {
						if (!in_array($element->type, array('header', 'button', 'hidden', 'file', 'files', 'paragraph'))){
							array_push($form_fields, '`f`.`'.$element->name.'`');
						}
					}
				}
			} else if ($form_id == 0) {
				$join = '';
				$create_log = 'YEAR(i.created) year_created, 
						MONTHNAME(i.created) month_created';
				$order_fields = 'i.created';
			} else {
				echo "FORM DETAILS NOT FOUND!";
				exit();
			}
			

			$select_fields = implode(',', array_merge($individual_fields, $form_fields));
			$query = "SELECT 
						{$select_fields},
						{$create_log}
					FROM 
						individuals i
						{$join}"; // append condition on this query

			$filter_arr = array();

			/* ========================== INDIVIDUALS ========================*/
			// append the condition for individual fields
			foreach ($individual_fields as $field) {
				$post_field = str_replace('i.', '', $field);
				if (!empty(trim($this->input->post($post_field)))) {
					array_push($filter_arr, $field . " LIKE '%" . trim($this->input->post($post_field)) . "%'");
				}
			}
			/* ========================== INDIVIDUALS ========================*/


			/* ========================== FORMS ========================*/
			// append the condition for form fields
			foreach ($form_fields as $field) {
				$post_field = str_replace('`', '', $field);
				if (!empty(trim($this->input->post($post_field)))) {
					array_push($filter_arr, "f." . $field . " LIKE '%" . trim($this->input->post($post_field)) . "%'");
				}
			}
			/* ========================== FORMS ========================*/




			// append all conditions
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

			// append the sorting order
			$query .= " ORDER BY {$order_fields}, i.first_name, i.middle_name, i.last_name ASC;";

			// echo $query;
			// run the query
			$data = $this->master_model->custom_query($query);

			// check first if the user wants to download the CSV file
			if ($this->input->post('submit_type') == 'DOWNLOAD') {
				if ($data!=FALSE) {
					$this->download_csv($data->result());
				}
			}
	
			//prepare the data to be pass to the layout
	        $data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'reports/filter_result_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array(
						'user_info' => $this->user_info,
						'form_id'	=> $form_id,
						'form'		=> ($form != FALSE) ? $form->result() : $form,
						'data'		=> ($data != FALSE) ? $data->result() : $data
					)
			);

			// load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/main.php', $data);

		}



		public function generate_graph($form_id){

			// get the form details first
			$form = $this->master_model->custom_query("SELECT 
													    *
													FROM
													    forms f
													    LEFT JOIN form_details fd ON fd.form_id = f.form_id
													WHERE is_deleted = 0
													AND f.form_id = '$form_id';");

			// check first if form details were created
			if ($form == FALSE) {
				if ($form_id == 0) {
					$form_table_name = '';
					$join_clause = '';
				} else {
					echo "FORM DETAILS NOT FOUND!";
					exit();
				}
			} else {
				$form_table_name = $form->row()->table_name;
				$join_clause = 'RIGHT JOIN ' . $form_table_name . ' f ON f.individual_id = i.individual_id';
			}

			$color_set = $this->config->item('colors');
			$colors = array();
			foreach ($color_set as $key => $value) {
				array_push($colors, $value);
			}

			// convert the json_data to PHP Array
			$data = json_decode($this->input->post('json_data'));
			$x_axes = $this->input->post('x_axis');
			// var_dump($x_axes);
			// var_dump($data);
			// echo '--' . $this->input->post('json_data') . '--';

			$labels_group = array();
			$datasets_group = array();
			foreach ($x_axes as $x_axis) {
				$transition_type = $this->input->post('transition_type');
				$year_start = $this->input->post('year_start');
				$year_end = $this->input->post('year_end');
				// echo  $x_axis;
				// var_dump($data);

				// select all distinct values for the selected x_axis field
				$distincts = $this->master_model->custom_query("SELECT 
										DISTINCT({$x_axis}) item
									FROM 
										individuals i
										{$join_clause};");

				$labels = array();
				if ($distincts != FALSE) {
					foreach ($distincts->result() as $distinct) {
						array_push($labels, $distinct->item);
					}	
				}

				

				/****/
			 	$datasets = array();

				if ($transition_type == 'MONTHLY') {
					$months = array(
						'JANUARY', 'FEBRUARY', 'MARCH', 'APRIL',
						'MAY', 'JUNE', 'JULY', 'AUGUST',
						'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER');

					for ($year=$year_start; $year <= $year_end; $year++) { 
						foreach ($months as $month) {
							
							// create the array that will store the counts
							foreach ($labels as $label) {
								$count[$label] = 0;
							}

							if ($data != 'FALSE') {
								foreach ($data as $key => $datum) {
									// echo $datum->year_created . '=' . $year . '==';
									// echo $datum->month_created . '=' . $month . '<br>';
									
									if (strtoupper($datum->year_created) == strtoupper($year) AND strtoupper($datum->month_created) == strtoupper($month)) {
										// echo $datum->$where_field . '-' . $where_value . '<br>';
										// echo $key;
										// echo "TRUE";
										foreach ($labels as $label) {
											if ($datum->$x_axis == $label) {
												$count[$label]+=1;
											}
										}

									}
									
								}
							}

							// var_dump($count);
							// create an indexed array for the values
							$values = array();
							$data_color = array();
							foreach ($count as $key => $value) {
								array_push($values, $value);

								shuffle($colors);
								array_push($data_color, '#' . $colors[3]);
							}


							$dataset = array(
				            	'label'				=> '# of Individuals per ' . ucwords(str_replace('_', ' ', $x_axis)) . ' | ' . $month . ' ' . $year,
				            	'data'				=> $values,
				            	'borderWidth'		=> 1,
			            		'backgroundColor'	=> $data_color
				            );
				            array_push($datasets, $dataset);

						}
					}

				} else if($transition_type == 'ANNUALLY') {
					for ($year=$year_start; $year <= $year_end; $year++) { 
						// create the array that will store the counts
						foreach ($labels as $label) {
							$count[$label] = 0;
						}

						if ($data != 'FALSE') {
							foreach ($data as $key => $datum) {
								// echo $datum->year_created . '=' . $year . '==';
								// echo $datum->month_created . '=' . $month . '<br>';
								
								if (strtoupper($datum->year_created) == strtoupper($year)) {
									// echo $datum->$where_field . '-' . $where_value . '<br>';
									// echo $key;
									// echo "TRUE";
									foreach ($labels as $label) {
										if ($datum->$x_axis == $label) {
											$count[$label]+=1;
										}
									}

								}
								
							}
						}

						// var_dump($count);
						// create an indexed array for the values
						$values = array();
						$data_color = array();
						foreach ($count as $key => $value) {
							array_push($values, $value);

							shuffle($colors);
							array_push($data_color, '#' . $colors[3]);
						}


						$dataset = array(
			            	'label'			=> '# of Individuals per ' . ucwords(str_replace('_', ' ', $x_axis)) . ' | ' . $year,
			            	'data'			=> $values,
			            	'borderWidth'	=> 1,
			            	'backgroundColor'	=> $data_color
			            );
			            array_push($datasets, $dataset);
					}
				} else {
					// create the array that will store the counts
					foreach ($labels as $label) {
						$count[$label] = 0;
					}

					if ($data != 'FALSE') {
						foreach ($data as $key => $datum) {
							// echo $datum->$where_field . '-' . $where_value . '<br>';
							// echo $key;
							// echo "TRUE";
							foreach ($labels as $label) {
								if ($datum->$x_axis == $label) {
									$count[$label]+=1;
								}
							}
						}
					}

					// var_dump($count);
					// create an indexed array for the values
					$values = array();
					// var_dump($count);

					$data_color = array();
					foreach ($count as $key => $value) {
						array_push($values, $value);

						shuffle($colors);
						array_push($data_color, '#' . $colors[3]);
					}

					$dataset = array(
		            	'label'			=> '# of Individuals per ' . ucwords(str_replace('_', ' ', $x_axis)),
		            	'data'			=> $values,
		            	'borderWidth'	=> 1,
			            'backgroundColor'	=> $data_color
		            );
		            array_push($datasets, $dataset);
				}

	            
				/****/
				
				array_push($labels_group, $labels);
				// var_dump($datasets);
				array_push($datasets_group, $datasets);

				// reset the count array
				$count = array();

			} // end of loop through x_axes

			
          	// var_dump($datasets_group);

			

			//prepare the data to be pass to the layout
	        $data = array(
				'head_view' => 'layouts/header',
				'main_view' => 'reports/generate_graph_view',
				'foot_view' => 'layouts/footer',
				'main_view_data' => array(
						'user_info' 		=> $this->user_info,
						'form_id'			=> $form_id,
						'form'				=> ($form != FALSE) ? $form->row() : $form,
						'data'				=> $data,
						'labels_group'		=> $labels_group,
						'datasets_group'	=> $datasets_group,
						'x_axes'			=> $x_axes
						// 'values'		=> $values,
						// 'graph_title'	=> '# of Individuals'
					)
			);

			// load the layout/main.php VIEW/ and pass the prepared data
			$this->load->view('layouts/report-main.php', $data);

		}












		private function is_admin(){
			
			if ($this->user_info['role'] == 2) {
				return TRUE;
			} else if($this->user_info['role'] == 1){
				return FALSE;
			} else {
				return FALSE;
			}

		}


		private function download_csv($data){
 			
	        $field_names = array();
 			// var_dump($data);
 			foreach ($data[0] as $key => $value) {
 				array_push($field_names, $key);
 			}
	        // create headers
 			foreach ($field_names as $row) {
		        $datax['header'][]	= ucwords(str_replace('_', ' ', $row));
 			}

	        foreach($data as $key => $dat){
		       	$dat = json_decode(json_encode($dat), true);

		       	foreach ($field_names as $row) {
			        $datax[$key][] = $dat[$row];
		       	}

		    }

		    // var_dump($datax);
		    $this->convert_to_csv($datax, 'data_as_csv.csv', ',');
		    exit;

		}


		private function convert_to_csv($input_array, $output_file_name, $delimiter)
	    {
		    $temp_memory = fopen('php://memory', 'w');

		    // loop through the array
		    foreach ($input_array as $line) {
			    // use the default csv handler
			    fputcsv($temp_memory, $line, $delimiter);
		    }

		    fseek($temp_memory, 0);

		    // modify the header to be CSV format
		    header('Content-Type: application/csv');
		    header('Content-Disposition: attachement; filename="' . $output_file_name . '";');

		    // output the file to be downloaded
		    fpassthru($temp_memory);
	    }



	}
?>