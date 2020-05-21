<?php
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => $login_label

);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'form-control',	
	'placeholder' => 'Password'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control',
	'placeholder' => 'Confirmation Code'
);
?>
		
		
		<div class = "col-12">
			<div style = "height: 150px;"></div>
			<div class="row">


				<div class = "col-5">
					
				</div>
				<div class = "col-6">
					<div class = "mx-auto card" >
						<div class="wrapper-page" style = "margin: 20px">
							<div style  = "height: 60px;"></div>
				            <!-- <div class="text-center">
				                <a href="index.html" class="logo-lg"><i class="mdi mdi-radar"></i> <span>BIePS</span> </a>
				            </div> -->

				            <!-- <form class="form-horizontal m-t-20" action="index.html"> -->
				            <?php echo form_open($this->uri->uri_string(),'class="form-horizontal m-t-20"'); ?>
				                

				                <div class="row">
					                <div class="col-md-12">
					                    <label class="control-label" for="email">Email</label>
					                    <?php echo form_input($login); ?>
					                </div>
					            </div>

					            <div class="row">
					                <div class="col-md-12">
					                    <label class="control-label" for="password">Password</label>
					                    <?php echo form_password($password); ?>
					                </div>
					            </div>

				                <!-- <div class="form-group row">
				                    <div class="col-12">
				                        <div class="checkbox checkbox-primary">
				                            <input id="checkbox-signup" type="checkbox">
				                            <label for="checkbox-signup">
				                                Remember me
				                            </label>
				                        </div>

				                    </div>
				                </div> -->

				                <div class="form-group row">
				                    <div class="col-12">
				                       <?php if ($show_captcha): ?>
			                       			<?php if ($use_recaptcha): ?>
			                       				<?php echo $recaptcha_html; ?>
			                       			<?php else: ?>
			                       				<?php echo $recaptcha_html; ?>
			                       			<?php endif ?>
				                       <?php endif ?>

				                    </div>
				                </div>
				                
				                <div class = "row">
				                	<div class = "col-8"></div>
				                    <div class="col-md-4">
				                        <button class="btn btn-outline-info btn-block btn-custom w-md waves-effect waves-light" type="submit">Log In
				                        </button>

				                        <!-- <?php //echo form_submit('submit', 'Log in','class="btn btn-primary btn-custom w-md waves-effect waves-light"'); ?> -->
				                    </div>
				                </div>
				                <div class="form-group text-right m-t-20">
				                	
				                </div>

				            <?php echo form_close(); ?>
				            <!-- </form> -->
				        </div>
					</div>
				</div>

				
			</div><br><br><br><br>
			<div class = "">
				<footer class = "page-footer">&copy ZFV</footer>
			</div>
		</div>
        


   
<style type="text/css">
	html
	{
		height: 100%;
		margin: 0;
		padding: 0;
	}
	body
	{
		margin: 0;
		padding: 0;
		background-image: url('<?php echo base_url() ?>assets/img/hotel_logo.png');
		background-repeat: no-repeat;
		background-size: 1300px 1300px;
		background-position: -200px -350px;
		background-color: #fff;
		height: 100%;
	}
	.image-holder img
	{
		height: 50px;
	}

	.desc-holder p
	{
		margin-top: 10px;
		color: #fff;
		text-align: center

	}

	footer
	{
		position: fixed;
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   color: white;
	   text-align: center;
	   padding-bottom: 20px;
	}

</style>