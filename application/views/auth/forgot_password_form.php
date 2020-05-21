<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Email'
);
?>


<div class="row j-login-row">

	<div class="col-md-12 col-sm-12 col-xs-12" id="form-container">
		
		<?php echo form_open($this->uri->uri_string(),'class="j-form-signin"'); ?>
			<div class="form-badge">
				<!-- System Icon here -->
			</div>	
			<?php echo ($this->session->flashdata('message') != null)?
			'<div class="alert alert-success">' . $this->session->flashdata('message') . '</div>':''; ?>
			<div class="alert alert-danger" style="<?php echo (validation_errors() != '')?'display:block':'display:none';?>">
			  <?php echo validation_errors(); ?>
			  <?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
			</div>

			<?php if ($this->session->flashdata('message') == null): ?>
				<h3>Forgot Password</h3>
				<p style="font-size:12px; text-align:center;">Enter your email</p>

				<table style="width: 100%">
					<tr>
						<td class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>
							<?php echo ($this->session->flashdata('message') == null) ? form_input($login): ''; ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<?php echo ($this->session->flashdata('message') == null) ? form_submit('reset', 'Get a new password','class="btn btn-success btn-block"') : ''; ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<?php echo anchor('/auth/login/', 'Back to Login','class="pull-right back-anchor"');?>
						</td>
					</tr>
				</table>
			<?php endif ?>
				
		<?php echo form_close(); ?>
	</div>

</div>