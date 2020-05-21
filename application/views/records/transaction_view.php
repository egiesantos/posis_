<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
        	<div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">
                            Search Profile
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Minton</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class = "col-md-6 col-sm-12 col-md-offset-3">
                    <div class="card-box">
                    	<div class="thumb-xl member-thumb m-b-10 center-block ">
                    		<center>
                    			<img src="<?php echo base_url() ?>assets/images/users/default.jpg" class="rounded-circle img-thumbnail profile_image" alt="profile-image" style = "height: 138px; width: 138px;">
                    			<h4 style = "margin-top: 10px;" class = "profile_name">Search Profile Here</h4>
                    		</center>

                        </div>
                        <form class="form-horizontal" role="form" method = "POST">
                            <div class="form-group row">
                                <div class="col-12" style = "margin-top: 10px;">
                                    <input type="text" name = "bio-frid" class="form-control data" placeholder = "Search Profile" style = "text-align: center">
                                </div>
                                <div class="col-10" style = "margin-top: 10px;">
                                	<button class = "btn btn-outline-info btn-block" id = "search-profile">Search</button>
                                	
                                </div>
                                <div class="col-2" style = "margin-top: 10px;">
                                	<a class = "btn btn-outline-danger btn-block btn-proceed" href = ""><span class = "fa fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('click', '#search-profile', function(){

			var data = $('.data').val();
			$.post('<?php echo base_url(); ?>' + '/record/transaction_fetch_profile/' + data, $(this).serialize(), function(data, status){

	                if(!data.error){
	                    //alert(data.image_path);
	                    
	                    $('.profile_image').attr('src', '<?php echo base_url() ?>assets/images/users/'+data.image_path);
	                    $('.profile_name').text(data.firstname+' '+data.middlename+' '+data.lastname);
	                    $('.btn-proceed').attr('href', '<?php echo base_url(); ?>record/profile_info/'+data.id);
	                }
	                else
	                {
	                    $.alert({
	                    	icon: 'fa fa-exclamation-triangle',
	                        theme: 'black',
	                        columnClass: 'col-md-6 col-md-offset-3',
	                        title: 'Oooops!',
	                        content: data.error,
	                    });
	                    //alert(data.error)
	                }
	                
	            }, 'json'); //json here
	        // return false;

	        event.preventDefault();

		});


	});
</script>