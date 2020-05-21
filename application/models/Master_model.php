<?php 



	

	/**

	* 

	*/

	class Master_model extends CI_Model

	{



		

		function get_data($table, $params)

		{



			if (isset($params['searchstring'])) {

				$query = $this->db->limit($params['limit'], $params['offset']);

				$query = $this->db->like('CONCAT('.$params['searchfield'].')', $params['searchstring']);



			}else{

				$query = $this->db->limit($params['limit'], $params['offset']);

			}

			



			$this->db->order_by($params['order_by'], $params['order_type']);

			$query = $this->db->get($table);



			

			if ($query->num_rows() > 0) {

				return $query->result();

			} else {

				return false;

			}



		}





		function all_data($table, $params)

		{



			$this->db->order_by($params['order_by'], $params['order_type']);

			$query = $this->db->get($table);



			

			if ($query->num_rows() > 0) {

				return $query;

			} else {

				return false;

			}



		}



		function count_data($table, $params = null)

		{



			if (isset($params['searchstring'])) {

				// search pattern here

				$query = $this->db->like('CONCAT('.$params['searchfield'].')', $params['searchstring']);

			}

			

			$query = $this->db->get($table);

			

			if ($query->num_rows() > 0) {

				return $query->num_rows;

			}else{

				return 0;

			}



		}





		function getSpecific($table, $params){



			if ($params['join'] == TRUE) {

				// prepare th query

				$this->db->from($table);

				$this->db->join($params['table'], $params['condition']);

				$this->db->where($params['field'], $params['value']);

				$this->db->order_by($params['order_by'], $params['order_type']);



				// finally run the query

				$result = $this->db->get();



			}else{

				$this->db->where($params['field'], $params['value']);

				$this->db->order_by($params['order_by'], $params['order_type']);

				$result = $this->db->get($table);

			}

			



			



			if ($result->num_rows() >= 1) {



				return $result;

			

			} else {

			

				return false;

			

			}





		}





		function getSpecific_2($table, $params){



			if ($params['join'] == TRUE) {

				// prepare th query

				$this->db->from($table);

				$this->db->join($params['table'], $params['join_condition']);

				$this->db->where($params['condition']);

				$this->db->order_by($params['order_by'], $params['order_type']);



				// finally run the query

				$result = $this->db->get();



			}else{

				$this->db->where($params['condition']);

				$this->db->order_by($params['order_by'], $params['order_type']);

				$result = $this->db->get($table);

			}

			



			



			if ($result->num_rows() >= 1) {



				return $result;

			

			} else {

			

				return false;

			

			}





		}





		function callProcedure($procedure, $params){



			$result = $this->db->query('CALL '.$procedure.'('.implode(',', $params).')');



			if ($result->num_rows() >= 1) {



				return $result;

				



			} else {

				

				// while (mysqli_next_result($this->db->conn_id)) {

				// 	if ($result = mysqli_store_result($this->db->conn_id)) {

				// 		mysqli_free_result($result);

				// 	}

				// }

				return false;

			

			}





		}







		function insert_data($table, $data){



			$this->db->insert($table, $data);

			$new_id = $this->db->insert_id();





			if ($this->db->affected_rows() > 0) {

				return $new_id;

			} else {

				return $this->db->error();

				// return FALSE;

			}



			

		}





		function delete_data($table, $params){



			$this->db->where(array(

					$params['primary_key'] => $params['key_value']

				));



			$this->db->delete($table);



			if ($this->db->affected_rows() > 0) {

				return TRUE;

			} else {

				return $this->db->error();

			}



			

		}



		function delete_data_2($table, $params){



			$this->db->where($params);



			$this->db->delete($table);



			if ($this->db->affected_rows() > 0) {

				return TRUE;

			} else {

				return $this->db->error();

			}



			

		}





		public function update_data($table, $params, $data){



			$index = $params['index'];

			$value = $params['value'];



			$this->db->where(array(

					$index => $value

				));



			$this->db->update($table, $data);



			

			if ($this->db->affected_rows() > 0) {

				return $this->db->affected_rows();

			} else {

				if ($this->db->affected_rows() == 0) {

					return $this->db->affected_rows();

				} else {

					return $this->db->error();

				}

				

			}



		}



		public function update_data_2($table, $conditions, $data){ //with multiple conditions



			$this->db->where($conditions);



			$this->db->update($table, $data);



			

			if ($this->db->affected_rows() > 0) {

				return $this->db->affected_rows();

			} else {

				if ($this->db->affected_rows() == 0) {

					return $this->db->affected_rows();

				} else {

					return $this->db->error();

				}

				

			}



		}







		function custom_query($query){



			$result = $this->db->query($query);



			if ($result->num_rows() > 0) {

				return $result;

			} else {

				return FALSE;

			}



		}


		function custom_query_update($query){



			$result = $this->db->query($query);

			if ($result != FALSE) {

				return $result;

			} else {

				return FALSE;

			}



		}



		function custom_query_no_return($query){



			return $this->db->query($query);



		}





		// mini functions start here

		public function min_glueToName($glued, $type){



			$fullname = explode(';', $glued);

			// 0: lastname    1: firstname    2: middlename



			if ((!empty($glued) AND $glued != 'empty') AND (isset($fullname[0]) AND isset($fullname[1]) AND isset($fullname[2])) ) {

				if ($type == 'INITIALS') {

					return substr($fullname[1], 0, 1).'. '.substr($fullname[2], 0, 1).'. '.$fullname[0];

				} else if($type == 'REGULAR'){

					return $fullname[0].', '.$fullname[1].' '.$fullname[2];

				}



			} else {

				return 'empty';

			}

			

		}





		public function ext_year_level($academic_year, $cur_code){

			$year = explode('_', $cur_code);

			$year_ctr = 1;



			for ($i=$year[1]; $i < $year[2]; $i++) { 

				if ($academic_year = ($i . '-' .($i + 1))) {

					return $year_ctr;

				}

				$year_ctr+=1;

			}



			return 'SPECIAL';

		}



		public function getDatesFromRange($startDate, $endDate){

		    $return = array($startDate);

		    $start = $startDate;

		    $i=1;

		    if (strtotime($startDate) < strtotime($endDate))

		    {

		       while (strtotime($start) < strtotime($endDate))

		        {

		            $start = date('Y-m-d', strtotime($startDate.'+'.$i.' days'));

		            $return[] = $start;

		            $i++;

		        }

		    }



		    return $return;

		}



		function timeDiff($firstTime,$lastTime) {



		    $firstTime=strtotime( date("H:i", strtotime($firstTime)) );

		    $lastTime=strtotime( date("H:i", strtotime($lastTime)) );

		    $timeDiff=$lastTime-$firstTime;

		    return $timeDiff;

		}



		public function create_table($table_name, $table_data)

		{



			$try = $this->dbforge->add_field($table_data);

			$try = $this->dbforge->add_key('id', TRUE);

			$try = $this->dbforge->create_table($table_name, TRUE);



			return $table_data;

			

			

			// $fields = $this->dbforge->add_field($table_data);



			// if($fields != FALSE)

			// {

			// 	$create_table = $this->dbforge->create_table($table_name);



			// 	if($create_table != FALSE)

			// 	{

			// 		if($query != FALSE)

			// 		{

			// 			return 'TAble is created';

			// 		}

			// 		else

			// 		{

			// 			return 'May mali';

			// 		}

			// 	}

			// 	else

			// 	{

			// 		return $fields;

			// 	}



			// }

			// else

			// {

			// 	return $fields;

			// }



			



		}

		

	}





?>