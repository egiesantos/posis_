<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Your Profile</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Minton</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                    <!-- a class="btn btn-success add-btn pull-right" href="javascript:void(0);"><span class="glyphicon glyphicon-plus"></span>    Add New</a> -->
           
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
		
						<div class="form-group col-md-12">
				        	<div class="">
				        		<label class="control-label">FULL NAME : </label>
					        	<label class="control-label"><span class="" id="d-first_name"><?php echo $main_view_data['user_data']->row('first_name').' '.$main_view_data['user_data']->row('middle_name').' '.$main_view_data['user_data']->row('last_name'); ?></span></label>
					        </div>
					    </div>

					    <div class="form-group col-md-12">
					    	<div class="">
					        	<label class="control-label">DATE OF BIRTH : </label>
					        
					        	<label class="control-label"><span class="val"  id="d-date_of_birth"><?php echo $main_view_data['user_data']->row('date_of_birth'); ?></span></label>
					        </div>
					    </div>

					    <div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12 item">
					        	<label class="control-label col-xs-12">CONTACT INFORMATION : </label>
					        </div>

					        <div class="col-md-3 col-sm-3 col-xs-12">
					        	<label class="control-label col-xs-12"><span class="val"  id="d-tel_number"><?php echo $main_view_data['user_data']->row('tel_number'); ?></span></label>
					        </div>

					        <div class="col-md-3 col-sm-3 col-xs-12 item">
					        	<label class="control-label col-xs-12"><span class="val"  id="d-mobile_number"><?php echo $main_view_data['user_data']->row('mobile_number'); ?></span></label>
					        </div>

					        <div class="col-md-3 col-sm-3 col-xs-12 item">
					        	<label class="control-label col-xs-12"><span class="val"  id="d-email"><?php echo $main_view_data['user_data']->row('email'); ?></span></label>
					        </div>
					    </div>

					    

					    <div class="form-group">
					    	<div class="col-md-3 col-sm-3 col-xs-12 item">
					        	<label class="control-label col-xs-12">DEPARTMENT : </label>
					        </div>

					        <div class="col-md-3 col-sm-3 col-xs-12">
					        	<label class="control-label col-xs-12"><span class="val"  id="d-department_name"><?php echo $main_view_data['user_data']->row('department_name'); ?></span></label>
					        </div>
					    </div>

					    <div class="form-group">
					    	<div class="col-xs-12 item">
								<a href="javascript:void(0);" class="edit-btn btn btn-success" data-index="<?php echo $main_view_data['user_data']->row('user_id'); ?>"><span class="fa fa-wrench"></span> Update Profile</a>
					        </div>
					    </div>

                	</div>
                </div>
            </div>  
        </div>
        <!-- end container -->
    </div>
    <!-- end content -->

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<div class="row">



	<!-- View/Edit/Add Modal -->
	<!-- Always hidden if not needed -->
	<div id="form-modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Update your Profile</h4>
	      </div>
	      <div class="modal-body">

	        <!-- form -->
	        <form id="form-edit" class="form-horizontal form-label-left form-vessel" novalidate>

	           	<div class="form-group">
			        <div class="col-md-4 col-sm-4 col-xs-12 item">
			        	<label class="" for="first_name">First Name <span class="required">*</span></label>
			        	<input id="first_name" class="form-control col-xs-12" data-validate-length-range="2,45" name="first_name" placeholder="First Name"  type="text" value="<?php echo $main_view_data['user_data']->row('first_name'); ?>">
			        </div>

			        <div class="col-md-4 col-sm-4 col-xs-12 item">
			        	<label class="" for="middle_name">Middle Name <span class="required">*</span></label>
			        	<input id="middle_name" class="form-control col-xs-12" data-validate-length-range="2,45" name="middle_name" placeholder="Middle Name"  type="text" value="<?php echo $main_view_data['user_data']->row('middle_name'); ?>">
			        </div>

			        <div class="col-md-4 col-sm-4 col-xs-12 item">
			        	<label class="" for="last_name">Last Name <span class="required">*</span></label>
			        	<input id="last_name" class="form-control col-xs-12" data-validate-length-range="2,45" name="last_name" placeholder="Last Name"  type="text" value="<?php echo $main_view_data['user_data']->row('last_name'); ?>">
			        </div>
			    </div>

			    
				<div class="form-group">
			        <div class="col-md-4 col-sm-4 col-xs-12">
		                <label class="" for="tel_number">Telephone Number<span class="required"></span></label>
			        	<input id="tel_number" class="form-control col-xs-12" data-validate-length-range="2,45" name="tel_number" placeholder="Telephone Number"  type="text" value="<?php echo $main_view_data['user_data']->row('tel_number'); ?>">
			        </div>

			        <div class="col-md-4 col-sm-4 col-xs-12 item">
			        	<label class="" for="mobile_number">Mobile Number <span class="required">*</span></label>
			        	<input id="mobile_number" class="form-control col-xs-12" data-validate-length-range="2,45" name="mobile_number" placeholder="Mobile Numner"  type="text" value="<?php echo $main_view_data['user_data']->row('mobile_number'); ?>">
			        </div>

			        <div class="col-md-4 col-sm-4 col-xs-12 item">
			        	<label class="" for="email">Email <span class="required">*</span></label>
			        	<input id="email" class="form-control col-xs-12" data-validate-length-range="2,45" name="email" placeholder="Email"  type="email" value="<?php echo $main_view_data['user_data']->row('email'); ?>" readonly>
			        </div>
			    </div>


			    <div class="form-group">
			        <div class="col-md-4 col-sm-4 col-xs-12">
		                <label class="" for="date_of_birth">Date of Birth <span class="required">*</span></label>
			        	<input id="date_of_birth" class="form-control col-xs-12 date" data-validate-length-range="2,45" name="date_of_birth" placeholder=""  type="text" value="<?php echo date_format(date_create($main_view_data['user_data']->row('date_of_birth')), 'Y-m-d'); ?>">
			        </div>

			        <div class="col-md-8 col-sm-8 col-xs-12">
		                <label class="" for="department_list">Department <span class="required">*</span></label>
			        	<select id="department_list" class="form-control col-xs-12" data-validate-length-range="2,45" name="department_list">
			        	<?php if ($departments != FALSE): ?>
			        		<?php foreach ($departments->result() as $row): ?>
			        			<option data-index="<?php echo $row->dept_id; ?>" <?php if($row->dept_id == $user_data->row()->dept_id){ echo "selected"; } ?>><?php echo $row->department_name ?></option>
			        		<?php endforeach ?>
			        	<?php endif ?>
			        	</select>
			        	<input id="dept_id" name="dept_id" type="hidden">
			        </div>

			    </div>


	            
	            <div class="ln_solid"></div>
	            
	            <div class="form-group">
	                <div class="col-md-4 col-md-offset-8 col-sm-4 col-sm-offset-8 col-xs-4 col-xs-offset-8">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                    <button id="send" type="submit" class="btn btn-primary btn-vessel">Submit</button>
	                </div>
	            </div>
	        </form>
	        <!-- /form  -->

	      </div>
	      <div class="modal-footer">                          
	        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
	      </div>
	    </div>

	  </div>
	</div>

</div>

<script type="text/javascript">
	
	$(document).ready(function(){
	
		$('.date').datepicker();
		var id = null;

    	$('#dept_id').val($('#department_list').find(':selected').attr('data-index'));
	    


		 // listen to edit-btn
	    $(document).on('click', '.edit-btn', function(){
	    	// raise the modal
            $("#form-modal").modal();
	      	
	        id = $(this).attr('data-index');

	    })


	    $(document).on('change', '#department_list', function(){
	    	$('#dept_id').val($('#department_list').find(':selected').attr('data-index'));
	    });

	    $(document).on('submit', '#form-edit', function(event) {

	        var submit = true;
	        // evaluate the form using generic validaing
	        if (!validator.checkAll($(this))) {
	            submit = false;
	        }


	        // check if submit is true
	        if (submit){

	            loader('show');

	            $.post('<?php echo base_url(); ?>' + 'index.php/user/profile_save/' + id, $(this).serialize(), function(data, status){

	                if(!data.error){
	                    $.alert({
	                        theme : 'black',
	                        columnClass: 'col-md-6 col-md-offset-3',
	                        keyboardEnabled: true,
	                        title: 'Hey!',
	                        content: data.success,
	                        confirm: function(){
	                           loader('hide');
	                           setTimeout(function(){
	                                
	                                // loop through the returned object
					                $.each(data.row, function(key, value){
					                    $('#d-' + key).text(value);

					                    // console.log(key + '---' + value);
					                })

	                           }, 800)
	                        }
	                    });
	                }else{
	                    loader('hide');
	                    $.dialog({
	                        theme: 'black',
	                        columnClass: 'col-md-6 col-md-offset-3',
	                        title: 'Oops!',
	                        content: data.error,
	                    });
	                }
	                
	            }, 'json'); //json here
	        }
	        // return false;

	        event.preventDefault();
	    });


	});

</script>
<style type="text/css">
	input{
		text-align: center;
	}
	.val{
		color: black;
		/*font-size: 20px;*/
	}
	.form-group{
		padding-top: 10px;
		padding-bottom: 10px;
	}


	.j-body{
		margin-bottom: 20px;
		height: 500px;
		background-color: #ffffff;
	}

</style>

