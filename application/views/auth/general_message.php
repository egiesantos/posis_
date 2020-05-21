<!DOCTYPE html>

<html lang="en">



	<head>
		<link rel="icon" href="<?php echo base_url() . 'assets/images/BIPS-logo.png'; ?>">
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	    <!-- Meta, title, CSS, favicons, etc. -->

	    <meta charset="utf-8">

	    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	    <meta name="viewport" content="width=device-width, initial-scale=1">



	    <title> <?php echo $this->config->item('app_name'); ?> </title>



	    <!-- Bootstrap core CSS -->



	    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">



	    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css" rel="stylesheet">

	    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">



	    <!-- Custom styling plus plugins -->

	    <link href="<?php echo base_url(); ?>assets/css/style_dark.css" rel="stylesheet">

	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/maps/jquery-jvectormap-2.0.3.css" />

	    <link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet" />

	    <link href="<?php echo base_url(); ?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />



	    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

	    <script src="<?php echo base_url(); ?>assets/js/nprogress.js"></script>



	    <!--[if lt IE 9]>

	        <script src="../assets/js/ie8-responsive-file-warning.js"></script>

	        <![endif]-->



	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	    <!--[if lt IE 9]>

	          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	        <![endif]-->



	    <!-- Jquery Confirm -->

	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-confirm/jquery-confirm.css">

	    <script src="<?php echo base_url(); ?>assets/js/jquery-confirm/jquery-confirm.js"></script>



	     <!-- Link to my custom assets -->

	    <link href="<?php echo base_url(); ?>assets/css/my-custom.css" rel="stylesheet">

	    <script src="<?php echo base_url(); ?>assets/js/my-custom.js"></script>



	</head>





	<body class="nav-md">



	    <div class="container body">



	        <div class="main_container">



			

				<div class="container-fluid">

					

					<!--bootstrap is 12 column grid system-->



					<div class="row-fluid">

						<div class="col-xs-12">



							<?php $this->load->view('layouts/header-alt') ?>



						</div>

					</div>



					<div class="row-fluid">

						

						<div class="col-xs-6 col-xs-offset-3">

							<div class="form-badge"  style="margin-top:100px;margin-bottom:20px;">

								<!-- <span class="fa fa-bell fa-sm"></span> -->

							</div>	

							<?php echo $message; ?>



						</div>



					</div>



					<div class="row-fluid">

						<div class="col-xs-12">

							

							<?php $this->load->view('layouts/footer-alt') ?>



						</div>

					</div>







				</div>





			<!-- Load Custom UI Components -->

			<?php $this->load->view('ui/progress-bar') ?>

	        </div> <!-- end of main_container-->



	    </div> <!-- end of container body -->



	    <script type="text/javascript">

		    $(document).ready(function(){

		    	$('#loader').hide();

		    });

	    </script>

	    

	</body>



</html>

