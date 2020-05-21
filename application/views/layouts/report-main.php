<!DOCTYPE html>
<html lang="en">

	<head>
        <link rel="icon" href="<?php echo base_url() . 'assets/images/BIPS-logo.png'; ?>">
        
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <title> <?php echo $this->config->item('app_name'); ?> </title>

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

        <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

        
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">

        <!-- <link href="<?php echo base_url(); ?>assets/css/style_dark.css" rel="stylesheet" type="text/css"> -->
        <!-- <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script> -->

        <!-- JCONFIRM -->
        <link href="<?php echo base_url(); ?>assets/plugins/jconfirm/jquery-confirm.css" rel="stylesheet" type="text/css">


        <!-- Link to my custom assets -->
        <link href="<?php echo base_url(); ?>assets/css/my-custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/my-custom.js"></script>

        

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
        <div id="wrapper">
        	<?php #$this->load->view($head_view) ?>

        	<?php 

            	if (isset($main_view_data)) {
					$this->load->view($main_view, $main_view_data);
				}else{
					$this->load->view($main_view);
				}
            ?>
        	
        	<?php  #$this->load->view('layouts/sys-footer')?>
        </div>
    </body>


	    


		<script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Notification js -->
        <script src="<?php echo base_url(); ?>assets/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/notifications/notify-metro.js"></script>

        <!-- Counter Up  -->
        <script src="<?php echo base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- circliful Chart -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-circliful/js/jquery.circliful.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- skycons -->
        <script src="<?php echo base_url(); ?>assets/plugins/skyicons/skycons.min.js" type="text/javascript"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

        <!-- Page js  -->
        <script src="<?php echo base_url(); ?>assets/pages/jquery.dashboard.js"></script>

        <!-- Jconfirm -->
        <script src="<?php echo base_url(); ?>assets/plugins/jconfirm/jquery-confirm.js"></script>

         <!-- FORM BUILDER -->
        <script src="<?php echo base_url(); ?>assets/formBuilder/dist/form-builder.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>

        <!-- form validation -->
        <script src="<?php echo base_url(); ?>assets/plugins/validator/validator.js"></script>
	</body>

</html>