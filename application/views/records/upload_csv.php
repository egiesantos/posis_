
	<form method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="submit" value="Submit">
	</form>


<?php 

	$connect = mysqli_connect('paymaya.baliwag.gov.ph','baliwags_paymaya', 'baliwag123!@#', 'baliwags_paymaya_db');

	if(isset($_POST['submit']))
	{
		if($_FILES['file']['name'])
		{
			$filename = explode('.', $_FILES['file']['name']);

			if($filename[1] == 'csv')
			{
				$handle = fopen($_FILES['file']['tmp_name'], 'r');

				$counter = 1;

				while ($data = fgetcsv($handle)) 
				{
					// $pwd_id = mysqli_real_escape_string($connect, $data[0]);
					// $firstname = mysqli_real_escape_string($connect, $data[1]);

					//var_dump($data);
					$query = "INSERT INTO `profile`(`id`, `firstname`, `middlename`, `lastname`, `suffix`, `civil_status`, `mobile_no`, `email`, `birthday`, `birth_place_city`, `birth_place_country`, `nationality`, `gender`, `education`, `school`, `present_address_unit`, `present_address_building`, `present_address_no`, `present_address_street`, `present_address_subdivision`, `present_address_barangay`, `present_address_city`, `present_address_province`, `present_address_country`, `present_zip_code`,`permanent_address_unit`, `permanent_address_building`, `permanent_address_no`, `permanent_address_street`, `permanent_address_subdivision`, `permanent_address_barangay`, `permanent_address_city`, `permanent_address_province`, `permanent_address_country`, `permanent_zip_code`, `source_of_income`, `nature_of_work`, `occupation`, `monthly_income`, `employer`, `tin_number`, `sss_number`, `gsis_number`, `philhealth_number`, `pwd_number`, `senior_number`, `solo_number`, `fourp_number`, `pya_number`, `member_since`, `org_president`, `family_members`, `registered_voter`, `philhealth_member`, `vulnerable_sector`, `get_longitude`, `get_latitude`, `requirement_image_path`, `image_path`, `created_by`, `date_profiled`, `approved_by`, `status`, `date_created`) VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."','".$data[10]."','".$data[11]."','".$data[12]."','".$data[13]."','".$data[14]."','".$data[15]."','".$data[16]."','".$data[17]."','".$data[18]."','".$data[19]."','".$data[20]."','".$data[21]."','".$data[22]."','".$data[23]."','".$data[24]."','".$data[25]."','".$data[26]."','".$data[27]."','".$data[28]."','".$data[29]."','".$data[30]."','".$data[31]."','".$data[32]."','".$data[33]."','".$data[34]."','".$data[35]."','".$data[36]."','".$data[37]."','".$data[38]."','".$data[39]."','".$data[40]."','".$data[41]."','".$data[42]."','".$data[43]."','".$data[44]."','".$data[45]."','".$data[46]."','".$data[47]."','".$data[48]."','".$data[49]."','".$data[50]."','".$data[51]."','".$data[52]."','".$data[53]."','".$data[54]."','".$data[55]."','".$data[56]."','".$data[57]."','".$data[58]."','".$data[59]."','".date('y-m-d')."','".$data[61]."','".$data[62]."','".date('Y-m-d h:i:s')."')";


					//echo $query;
					if(mysqli_query($connect, $query))
					{

						echo '<br>';
						echo '['.$counter.']'.' ok';
						echo '<br>';
					}
					else
					{
						var_dump(mysqli_error($connect));
						echo '<br>';
						echo $data[1];
						echo '<br>';
						echo '<br>';
						
					}
					$counter++;
				}

				fclose($handle);

				
			}
		}
	}
 ?>