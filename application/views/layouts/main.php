<!DOCTYPE html>

<html lang="en">



	<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Point of Sales and Inventory System</title>

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/icons.css">

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- DATATABLES -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.css">
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />



        <!-- DATE PICKER -->
        <link href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />


        <!-- JCONFIRM -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jconfirm/jquery-confirm.css">

        <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/my-custom.js"></script>
	</head>

    <style type="text/css">
        
        .sidebar
        {
            overflow: hidden;
        }

        .lds-ellipsis {
          display: inline-block;
          position: relative;
          width: 80px;
          height: 80px;
          z-index: 99999999;
          margin-top: 3.5in;
        }
        .lds-ellipsis div {
          position: absolute;
          top: 33px;
          width: 20px;
          height: 20px;
          border-radius: 50%;
          background: #00c0ef;
          animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
          left: 8px;
          animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
          left: 8px;
          animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
          left: 32px;
          animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
          left: 56px;
          animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes lds-ellipsis1 {
          0% {
            transform: scale(0);
          }
          100% {
            transform: scale(1);
          }
        }
        @keyframes lds-ellipsis3 {
          0% {
            transform: scale(1);
          }
          100% {
            transform: scale(0);
          }
        }
        @keyframes lds-ellipsis2 {
          0% {
            transform: translate(0, 0);
          }
          100% {
            transform: translate(24px, 0);
          }
        }


        .loader
        {
            opacity:0.6;
            background-color:#fff;
            position:fixed;
            width:100%;
            height:100%;
            top:0px;
            left:0px;
            z-index:100000;
        }

    </style>
    <body class="sidebar-mini layout-fixed" style="height: auto;">
        <div class = "loader">
            <center>
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <br>
                <small class = "text-default" id = "loader-message">Loading page...</small>
            </center>

        </div>
        
        <!-- Page Wrapper -->
        <div class="wrapper">

            <?php $this->load->view($head_view) ?>

            <?php  $this->load->view('layouts/sidebar')?>

            <?php 

                if (isset($main_view_data)) {

                    $this->load->view($main_view, $main_view_data);

                }else{

                    $this->load->view($main_view);

                }

            ?>
            

        </div>
        <!-- End of Page Wrapper -->

    </body>

    <script type="text/javascript">

      loader('show', 'Loading Page...');
      loader('hide', '');

    </script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="<?php echo base_url() ?>assets/js/adminlte.js"></script>

    <script src="<?php echo base_url() ?>assets/js/pages/dashboard.js"></script>

    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>

    <!-- Required datatable js -->

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>


        <!-- DATE RANGE  PICKER -->
        <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
        

        <!-- Responsive examples -->

    <!-- JCONFIRM -->
    <script src="<?php echo base_url() ?>assets/plugins/jconfirm/jquery-confirm.js"></script>
</html>