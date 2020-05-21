<!DOCTYPE html>

<html lang="en">



	<head>

        	<meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">

                <title>Point of Sales and Inventory Sytem</title>
                <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
                <!-- Custom fonts for this template-->
                <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                <!-- JQuery DataTable Css -->
                <link href="<?php echo base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
                <!-- Custom styles for this template-->
                <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

                <link href="<?php echo base_url() ?>/assets/jquery-confirm-master/css/jquery-confirm.css" rel="stylesheet" />
                <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>



	</head>



<style type="text/css">
        
</style>


	<body class="nav-md" style = "background-image: url('<?php echo base_url() ?>assets/img/zfc-logo.png'); background-repeat: no-repeat;
  background-size: auto; background-position: -150px, 250px;">


		<?php 

			//$this->load->view('layouts/sys-header');

		?>



							

							<?php 

								if (isset($main_view_data)) {

									$this->load->view($main_view, $main_view_data);

								}else{

									$this->load->view($main_view);

								}

							?>



						

			

	    <?php 

			//$this->load->view('layouts/sys-footer');

		?>



	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>


        <script src="<?php echo base_url() ?>assets/jquery-confirm-master/js/jquery-confirm.js"></script>

        
        <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <!-- <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> -->



	</body>



</html>