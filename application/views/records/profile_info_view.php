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
                                    <h4 class="page-title"><?php echo $profile['firstname']."'s Profile"; ?></h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="text-center card-box">
                                    <div class="member-card">
                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" class="rounded-circle img-thumbnail" alt="profile-image">
                                        </div>

                                        <div class="">
                                            <h5 class="m-b-5"><?php echo $profile['firstname'] . ' ' . $profile['lastname'] ; ?></h5>
                                            <p class="text-muted"><?php echo $profile['occupation'] ?></p>
                                        </div>

                                        <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Follow</button>
                                        <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Message</button>

                                        
                                        <div class="text-left m-t-40">
                                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo $profile['firstname'] . ' ' . $profile['lastname'] ; ?></span></p>

                                            <p class="text-muted font-13"><strong>Age :</strong><span class="m-l-15"><?php $age = date_diff(date_create($profile['birthday']), date_create(date('Y-m-d'))); echo $age->format('%y')?></span></p>

                                            <p class="text-muted font-13"><strong>Birthday :</strong><span class="m-l-15"><?php echo date("F j, Y", strtotime($profile['birthday'])) ;?></span></p>

                                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15"><?php echo $profile['mobile_no'];?></span></p>
                                            <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15"><?php echo $profile['present_address_barangay'].' ,'.$profile['present_address_city'];?></span></p>
                                        </div>

                                        <ul class="social-links list-inline m-t-30">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                                            </li>
                                        </ul>

                                    </div>

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->


                            <!-- TIMELINE START -->
                            <div class="col-lg-8 col-xl-9">
                                
                                <div class="">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="timeline">
                                                    <article class="timeline-item alt">
                                                        <div class="text-right">
                                                            <div class="time-show first">
                                                                <a href="#" class="btn btn-primary w-lg">Today</a>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item alt">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow-alt"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-danger">1 hour ago</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item ">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-success">2 hours ago</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>consectetur adipisicing elit. Iusto, optio, dolorum <a href="#">John deon</a> provident rerum aut hic quasi placeat iure tempora laudantium </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item alt">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow-alt"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-primary">10 hours ago</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>3 new photo Uploaded on facebook fan page</p>
                                                                    <div class="album">
                                                                        <a href="#">
                                                                            <img alt="" src="assets/images/small/img1.jpg">
                                                                        </a>
                                                                        <a href="#">
                                                                            <img alt="" src="assets/images/small/img2.jpg">
                                                                        </a>
                                                                        <a href="#">
                                                                            <img alt="" src="assets/images/small/img3.jpg">
                                                                        </a>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-purple">14 hours ago</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Outdoor visit at California State Route 85 with John Boltana &
                                                                        Harry Piterson regarding to setup a new show room.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item alt">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow-alt"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-muted">19 hours ago</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span>
                                                                        Lorem ipsum dolor sit amet consiquest dio</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>

                                                    <article class="timeline-item alt">
                                                        <div class="text-right">
                                                            <div class="time-show">
                                                                <a href="#" class="btn btn-primary w-lg">Yesterday</a>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-warning">07 January 2016</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Montly Regular Medical check up at Greenland Hospital by the
                                                                        doctor <span><a href="#"> Johm meon </a></span>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item alt">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow-alt"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-primary">07 January 2016</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Download the new updates of Ubold admin dashboard</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>

                                                    <article class="timeline-item">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-success">07 January 2016</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Jonatha Smith added new milestone <span><a class="blue" href="#">crishtian</a></span>
                                                                        Lorem ipsum dolor sit amet consiquest dio</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="timeline-item alt">
                                                        <div class="text-right">
                                                            <div class="time-show">
                                                                <a href="#" class="btn btn-primary w-lg">Last Month</a>
                                                            </div>
                                                        </div>
                                                    </article>

                                                    <article class="timeline-item alt">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow-alt"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-muted">31 December 2015</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Download the new updates of Ubold admin dashboard</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>

                                                    <article class="timeline-item">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    <span class="arrow"></span>
                                                                    <span class="timeline-icon"></span>
                                                                    <h4 class="text-danger">16 Decembar 2015</h4>
                                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                                    <p>Jonatha Smith added new milestone <span><a href="#">prank</a></span>
                                                                        Lorem ipsum dolor sit amet consiquest dio</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>

                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                                </div>
                            </div> 
                            <!-- end row -->


                        </div> <!-- end col -->


                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->

                <footer class="footer">
                    2016 - 2017 © Minton <span class="hide-phone">- Coderthemes.com</span>
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



    <div class="clearfix"></div>
    <!--  -->
    <div class="row" id="encode-container">
           <!--   -->
        <div class = "col-md-2 briefer">
            <!-- <div class="col-md-2 col-sm-2 col-xs-2 briefer"> -->
                

                <?php $this->load->view('records/profile_basic_info_view'); ?>
                
                <?php if (in_array($main_view_data['user_info']['role'], array(1,2))): ?>
                    <?php if ($profile['status'] == 1): ?>
                        <div class = "btn btn-default btn-block disabled"><span class = "fa fa-thumbs-up"></span> Approved</div>
                    <?php endif ?>
                    <?php if ($profile['status'] == 0): ?>
                        <div class = "btn btn-success btn-block btn-approve"><span class = "fa fa-thumbs-up"></span> Approve</div>
                    <?php endif ?>
                    <?php if ($profile['status'] == 5): ?>
                        <div class = "btn btn-success btn-block btn-approve"><span class = "fa fa-thumbs-up"></span> For Approval</div>
                    <?php endif ?>
                <?php endif ?>
                <?php if (in_array($main_view_data['user_info']['role'], array(0))): ?>
                    <?php if ($profile['status'] == 1): ?>
                        <div class = "btn btn-default btn-block disabled"><span class = "fa fa-thumbs-up"></span> Approved</div>
                    <?php endif ?>
                    <?php if ($profile['status'] == 0): ?>
                        <div class = "btn btn-danger btn-block disabled"><span class = "fa fa-thumbs-up"></span> For Approval</div>
                    <?php endif ?>
                    <?php if ($profile['status'] == 5): ?>
                        <div class = "btn btn-danger btn-block disabled"><span class = "fa fa-thumbs-up"></span> For Approval</div>
                    <?php endif ?>
                <?php endif ?>
                <div class="btn btn-info pull-right" data-index = "<?php echo $this->uri->segment(3) ?>">
                    <span class = "fa fa-edit btn-edit"></span>
                </div>
                <div class="btn btn-danger pull-right">
                    <span class = "fa fa-times"></span>
                </div>
            <!-- </div> -->
        </div>
        <div class = "col-md-10">
                <div class="x_title">
                    
                </div>
                <div class="x_content">

                    <div id="exTab2" class=""> 
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a  href="#personal_info" data-toggle="tab">Personal Information</a>
                            </li>
                            <li class="">
                                <a  href="#paymaya_details" data-toggle="tab">Address Details</a>
                            </li>
                            <li class="">
                                <a  href="#other_details" data-toggle="tab">Other Details</a>
                            </li>
                            <li class="">
                                <a  href="#requirements" data-toggle="tab">Requirements</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal_info">
                                <?php $this->load->view('records/profile_details');?>
                            </div>
                            <div class="tab-pane " id="paymaya_details">
                                <?php $this->load->view('records/address_details');?>
                            </div>
                            <div class="tab-pane " id="other_details">
                                <?php $this->load->view('records/other_details');?>
                            </div>
                            <div class="tab-pane " id="requirements">
                                <div class = "well">
                                    <form action="" id="form-upload-image-2" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_file" class = "form-control">
                                        <button type="submit" class="btn btn-success form-control" name="upload_image_requirement" value="upload" ><i class="fa fa-upload"></i>  Upload New Image</button>
                                    </form>
                                </div>
                                <div class = "">
                                    <center>
                                        <img src="<?php echo base_url() ?>files/e_forms/profile/<?php echo $profile['requirement_image_path'] ?>" class = "img img-responsive img-thumbnail">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
        </div>
    </div>
    <div class="row">
        <div class=" well col-md-12 col-sm-12 col-xs-12">
            <div class="title_left">
                <h3>Other Related Profile</h3>
            </div>
            <br>
            <table class = "table table-hover" id = "data-table">
                <thead>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

<div style = "display: none">

    <a class="btn btn-secondary waves-effect birthday-notif" href="javascript:;" onclick="$.Notification.notify('success','bottom left','Happy Birthday', 'Greet them a Happy Birthday. A 300 credit is added to their account.')">Right</a>

    <a class="btn btn-secondary waves-effect credit-add-notif" href="javascript:;" onclick="$.Notification.notify('info','bottom left','Success', 'Credit has been added to this account. This credit is good for two weeks.')">Right</a>

</div>


<script type="text/javascript">
    
    $(document).on('click', '.btn-edit', function(){

        // set the title
        $('.modal-title').html('Update record');   

        $("#form-modal").modal();
        // change the ID of the form based on the action
        $(".form-vessel").attr('id', 'form-edit'); 

        // reset the form
        $('form')[0].reset();


        // change the text on the submit button
        $(".btn-vessel").html('Update');

        // fetch the specific record
        id = '<?php echo $this->uri->segment(3) ?>';

        

        $.post('<?php echo base_url(); ?>record/profile_view/' + id, {'POST': true}, function(data, status){
            console.log(data);
            if(!data.error){
    

                // loop through the returned object
                $.each(data, function(key, value){
                    $('#' + key).val(value);
                })

                // compute age

                // raise the modal
                $("#form-modal").modal();
                
                // console.log(data);
            }else{
                $.dialog({
                    theme: 'black',
                    columnClass: 'col-md-6 col-md-offset-3',
                    title: 'Oops!',
                    content: data.error,
                });
            }
        }, 'json'); //json here
    })


    $(document).ready(function(){


        // BIRTHDAY CHECKING
        if('<?php echo date('m-d', strtotime($profile['birthday'])) ?>' == '<?php echo date("m-d") ?>')
        {
            $('.birthday-notif').trigger('click');
        }

        if('<?php $age = date_diff(date_create($profile['birthday']), date_create(date('Y-m-d'))); echo $age->format('%y')?>' >= 60)
        {
            setTimeout(function(){
                $('.credit-add-notif').trigger('click');
            },1000)
            
        }
    });
    
</script>
