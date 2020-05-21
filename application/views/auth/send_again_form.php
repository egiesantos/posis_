<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>

<div class="row j-login-row">

	<div class="col-md-12 col-sm-12 col-xs-12" id="form-container">
		
		<?php echo form_open($this->uri->uri_string(),'class="j-form-signin"'); ?>
			<div class="form-badge">
				<!-- System Icon here -->
			</div>	
			
			<table>
				<tr>
					<td><?php echo form_label('Email Address', $email['id']); ?></td>
					<td><?php echo form_input($email); ?></td>
					<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
				</tr>
			</table>
			<?php echo form_submit('send', 'Send', 'class="btn btn-success btn-block"'); ?>
				
		<?php echo form_close(); ?>
	</div>

</div>