<?php

$old_password = array(

	'name'	=> 'old_password',

	'id'	=> 'old_password',

	'value' => set_value('old_password'),

	'size' 	=> 30,

	'class' => 'form-control'

);

$new_password = array(

	'name'	=> 'new_password',

	'id'	=> 'new_password',

	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),

	'size'	=> 30,

	'class' => 'form-control'

);

$confirm_new_password = array(

	'name'	=> 'confirm_new_password',

	'id'	=> 'confirm_new_password',

	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),

	'size' 	=> 30,

	'class' => 'form-control'

);

?>





<style type="text/css">

	.j-form-change{

		border-radius: 0;

		background-color: #ffffff;

		margin-bottom: 300px;

	}

	.j-form-change table{

		width: 600px;

		margin: 0 auto;

	}

	.j-form-change table td{

		padding: 5px;

	}

	.j-form-change table td input[type="submit"]{

		margin-right: 12px;

	}

</style>


<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Change Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style = "padding: 20px;">
                        <?php echo form_open($this->uri->uri_string(), 'class=""'); ?>
                    		<div class="row">
                    			<div class ="col-md-12">

		                    		<?php echo form_label('Old Password', $old_password['id']); ?>

									<?php echo form_password($old_password); ?>

									<?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?>

		                    	</div>
                    		</div>

                    		<div class="row">
		                    	<div class ="col-md-12">

		                    		<?php echo form_label('New Password', $new_password['id']); ?>

									<?php echo form_password($new_password); ?>

									<?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?>

		                    	</div>
		                    </div>

		                    <div class="row">
		                    	<div class ="col-md-12">

		                    		<?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?>

									<?php echo form_password($confirm_new_password); ?>

									<?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>

		                    	</div>
		                    </div>

		                    <div class = "row" style = "margin-top: 20px;">
		                    	<div class = "col-4"></div>
		                    	<div class = "col-4"></div>
		                    	<div class ="col-md-4">

		                    		<?php echo form_submit('change', 'Submit', 'class="btn btn-outline-info btn-block float-right"'); ?>

		                    	</div>
		                    </div>

	                    	

						<?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		setTimeout(function(){

	        $('.loader').fadeOut();

	    },500);
	});
</script>

<!-- ============================================================== -->

<!-- End Right content here -->

<!-- ============================================================== -->

