<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Users_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

	function profile($user_id){
		$query_string = "SELECT 
							u.email AS email,
							u.username AS username,
							u.id AS user_id,
							u.role AS role,
							ui.dept_id AS dept_id,
							ui.first_name AS first_name,
							ui.middle_name AS middle_name,
							ui.last_name AS last_name
						FROM users u
						LEFT JOIN user_info ui ON u.id = ui.user_id	
		  				WHERE u.id = {$user_id}";
		 $query = $this->db->query($query_string);
		 $data = $query->row_array();
		 return $data;
	}




}