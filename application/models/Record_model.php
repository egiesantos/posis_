<?php 

	
	/**
	* 
	*/
	class Record_model extends CI_Model
	{


		function fetch_records($table, $columns, $filter_flag=NULL, $filter_condition=NULL)
		{
					 
			/* Array of database columns which should be read and sent back to DataTables. Use a space where
	         * you want to insert a non-database field (for example a counter or static image)
	         */
	        $aColumns = $columns;
	        
	        // DB table to use
	        $sTable = $table;
	        //
	    
	        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
	        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
	        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
	        $iSortingCols = $this->input->get_post('iSortingCols', true);
	        $sSearch = $this->input->get_post('sSearch', true);
	        $sEcho = $this->input->get_post('sEcho', true);
	    
	        // Paging
	        if(isset($iDisplayStart) && $iDisplayLength != '-1')
	        {
	            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
	        }
	        
	        // Ordering
	        if(isset($iSortCol_0))
	        {
	            for($i=0; $i<intval($iSortingCols); $i++)
	            {
	                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
	                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
	                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
	    
	                if($bSortable == 'true')
	                {
	                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
	                }
	            }
	        }
	        
	        /* 
	         * Filtering
	         * NOTE this does not match the built-in DataTables filtering which does it
	         * word by word on any field. It's possible to do here, but concerned about efficiency
	         * on very large tables, and MySQL's regex functionality is very limited
	         */
	        if(isset($sSearch) && !empty($sSearch))
	        {	
	            for($i=0; $i<count($aColumns); $i++)
	            {
	                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
	                
	                // Individual column filtering
	                if(isset($bSearchable) && $bSearchable == 'true')
	                {
	                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
	                    // Select Data
				        if ($filter_flag) {
				        	$this->db->where($filter_condition);
				        }
	                }
	            }
	        }
	        
	        // Select Data
	        if ($filter_flag) {
	        	$this->db->where($filter_condition);
	        }

	        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
	        $rResult = $this->db->get($sTable);
	        
	    
	        // Data set length after filtering
	        $this->db->select('FOUND_ROWS() AS found_rows');
	        $iFilteredTotal = $this->db->get()->row()->found_rows;
	    
	        // Total data set length
	        $iTotal = $this->db->count_all($sTable);
	    
	        // Output
	        $output = array(
	            'sEcho' => intval($sEcho),
	            'iTotalRecords' => $iTotal,
	            'iTotalDisplayRecords' => $iFilteredTotal,
	            'aaData' => array()
	        );
	        
	        foreach($rResult->result_array() as $aRow)
	        {
	            $row = array();
	            
	            foreach($aColumns as $col)
	            {
	                $row[] = $aRow[$col];
	            }
	    
	            $output['aaData'][] = $row;
	        }
	    
	        return $output;
		}


		

		function check_device_serial($device_serial, $email){

	    	$query_string = "SELECT 
							    *
							FROM
							    registered_devices rd LEFT JOIN users u ON rd.user_id = u.id
							WHERE
							    rd.banned = 0
									AND rd.serial_number = '$device_serial'
							        AND u.email = '$email';";
			$query = $this->db->query($query_string);
			$data = $query->result_array();
		 	return $data;


	    }

	    function get_details($id, $table)
	    {
	    	$result = $this->db->query("SELECT * FROM $table WHERE id = ".$id."");

			if ($result->num_rows() > 0) {
				return $result;
			} else {
				return FALSE;
			}
	    }


	} //end of class


?>