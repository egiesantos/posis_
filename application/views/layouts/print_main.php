<!DOCTYPE html>
<html lang="en">

	<head>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	</head>

	<body class="fixed-left">

		<!-- Begin page -->
        <div id="wrapper">
        	<?php $this->load->view($head_view) ?>

        	<?php 

            	if (isset($main_view_data)) {
					$this->load->view($main_view, $main_view_data);
				}else{
					$this->load->view($main_view);
				}
            ?>
        	
        	<?php  //$this->load->view('layouts/sys-footer')?>
        </div>
    </body>
		
	</body>

</html>