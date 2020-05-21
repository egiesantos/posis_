<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Email'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Password'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Confirm Password'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>



<div class="row j-login-row">

	<div class="col-md-12 col-sm-12 col-xs-12" id="form-container">
			
		
		<?php echo form_open($this->uri->uri_string(),'class="j-form-signin"'); ?>
			
			<div class="form-badge">
				<!-- System icon here -->
			</div>

			<?php echo ($this->session->flashdata('message') != null)?
			'<div class="alert alert-success">' . $this->session->flashdata('message') . '</div>':''; ?>
			<div class="alert alert-danger" style="<?php echo (validation_errors() != '' OR isset($errors['email']))?'display:block':'display:none';?>">
			  <?php echo validation_errors();?>
			  <?php echo isset($errors['email'])?$errors['email']:''; ?>
			</div>
			<?php if($this->session->flashdata('message') == null):?>
			
			<h3>Register now</h3>
			<p style="font-size:12px; text-align:center;">Fill in the form below to get instant access</p>
			<div class="divider"></div>
			
			<table style="width: 100%" >
				<?php if ($use_username) { ?>
				<tr>
					<td><?php echo form_input($username); ?></td>
					<td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="3">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa-sm"></i></span>
							<?php echo form_input($email); ?>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-unlock-alt fa-lg"></i></span>
							<?php echo form_password($password); ?>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
							<?php echo form_password($confirm_password); ?>
						</div>
					</td>
				</tr>

				<?php if ($captcha_registration) {
					if ($use_recaptcha) { ?>
				<tr>
					<td colspan="3">
						<div id="recaptcha_image"></div>
					</td>
				</tr>

				<tr>
					<td>
						<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
					</td>
					<td colspan="3" style="padding:5px;">
						<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
						<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
					</td>
				</tr>

				<tr>
					<td colspan="3">
						<div class="recaptcha_only_if_image">Enter the words above</div>
						<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
					</td>
				</tr>

				<tr>
					<td colspan="3"><input type="text" style="width:100%;" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
				</tr>

				<tr>
					<td style="color: red;" colspan="3"><?php echo form_error('recaptcha_response_field'); ?></td>
					<?php echo $recaptcha_html; ?>
				</tr>

				<?php } else { ?>
				<tr>
					<td colspan="3">
						<p>Enter the code exactly as it appears:</p>
						<?php echo $captcha_html; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
					<td><?php echo form_input($captcha); ?></td>
					<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
				</tr>
				<?php }
				} ?>

				<tr>
					<td colspan="3">
						<?php echo form_submit('register', 'Register','class="btn btn-success btn-block"'); ?>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<?php echo anchor('/auth/login/', 'Back to Login','class="pull-right back-anchor"');?>
					</td>
				</tr>
			</table>
			<?php endif;?>
		<?php echo form_close(); ?>
	</div>

</div>