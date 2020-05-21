<h4>Basic Information</h4>

<div class="row">
	<div class="col-md-2 col-xs-12"><label>Full Name</label></div>
	<div class="col-md-6 col-xs-12"><?php echo $profile['firstname'].' '.$profile['middlename'].' '.$profile['lastname'].' '.$profile['suffix']; ?></div>
</div>
<div class="row">
	<div class="col-md-2 col-xs-12"><label>Birthday</label></div>
	<div class="col-md-3 col-xs-12"><?php echo date('F d, Y',strtotime($profile['birthday'])); ?></div>
	<div class="col-md-2 col-xs-12"><label>Gender</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['gender']; ?></div>
</div>
<div class="row">
	<div class="col-md-2 col-xs-12"><label>Mobile No</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['mobile_no']; ?></div>
</div>
<div class="row">
	<div class="col-md-2 col-xs-12"><label>Email</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['email']; ?></div>
</div>
<div class="row">
	<div class="col-md-2 col-xs-12"><label>Birth Place</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['birth_place_city'].' '.$profile['birth_place_country']; ?></div>
	<div class="col-md-2 col-xs-12"><label>Civil Status</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['civil_status']; ?></div>
</div>
<div class="row">
	<div class="col-md-2 col-xs-12"><label>Nationality</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['nationality']; ?></div>
</div>
<div class="row">
	<div class="col-md-2 col-xs-12"><label>Educational Attainment</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['education']; ?></div>
	<div class="col-md-2 col-xs-12"><label>School</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['school']; ?></div>
</div>
<div class="row">
	<div class="col-md-2 col-xs-12"><label>Family Members</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['family_members']; ?></div>
</div>
<br>
<div class="row">
	<div class="col-md-3 col-xs-12"><label>Vulnerable Sector</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['vulnerable_sector']; ?></div>
	<div class="col-md-3 col-xs-12"><label>Registered Voter</label></div>
	<div class="col-md-3 col-xs-12"><?php echo $profile['registered_voter']; ?></div>
</div>
<div class="row">
	<div class="col-md-3 col-xs-12"><label>Date Profiled</label></div>
	<div class="col-md-3 col-xs-12"><?php echo date("F j, Y", strtotime($profile['date_profiled'])) ; ?></div>
</div>

<style type="text/css">
	.center{
		text-align: center;
	}

	.sub_content{
		font-weight: bold;
		font-size: 11px;
		color: #a2a7a6;
		margin-top: 8px;
	}
</style>