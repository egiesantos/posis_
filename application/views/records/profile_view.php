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
                                    <h4 class="page-title">
                                        <?php 
                                            if($this->uri->segment(3) == 5)
                                            {
                                                echo 'Online Profiles';
                                            }
                                         ?>
                                        
                                    </h4>
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
                            <div class = "col-md-12 col-sm-12">
                                <div class="card-box">
                                    <a class="btn btn-outline-success btn-sm add-btn pull-right" href="javascript:void(0);"><span class="fa fa-plus"></span></a>
                                    <?php if (in_array($main_view_data['user_info']['role'], array(1,2))): ?>
                   
                                        <a class="btn btn-outline-success btn-sm pull-right" href="<?php echo base_url() ?>record/paymaya_print_csv"><span class="fa fa-print"></span></a>

                                    <?php endif ?>

                                    <table class = "table" id = "data-table">
                                        <thead>
                                            <tr>
                                                <th>Picture</th>
                                                <th>Fullname</th>
                                                <!-- <th>Email</th> -->
                                                <th>Contact Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
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

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
                <ul class="breadcrumb">
                    <li>Profiles</li>
                    <li><?php //var_dump($user_info['user_id']); ?></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">

                
                    <!-- View/Edit/Add Modal -->
                    <!-- Always hidden if not needed -->
                    <div id="form-modal" class="modal fade" role="dialog" data-keyboard = "false" data-backdrop = "static">
                      <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Title</h4>
                          </div>
                          <div class="modal-body">

                            <!-- form -->
                            <form class="form-horizontal form-label-left form-vessel" method = "POST" enctype = "multipart/form-data" action = "<?php echo base_url(); ?>record/profile_add" novalidatea>

                                <!-- <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-12 item">
                                        <!-- <label class="" for="pid_no">Person ID <span class="required">*</span></label>
                                        <input id="id" class="form-control col-xs-12" data-validate-length-range="1,45" name="id" placeholder=" "  type="text" value="">
                                    </div>
                                </div> -->
                                <center>
                                    <h3>BASIC INFORMATION</h3>
                                    
                                </center>
                                <div class="form-group">
                                    <div class="row">
                                        <div class = "container">
                                            <h4>Personal Information</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="firstname">First Name <span class="required">*</span></label>
                                            <input id="firstname" class="form-control col-xs-12" data-validate-length-range="2,45" name="firstname" placeholder="First Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="middlename">Middle Name <span class="required">*</span></label>
                                            <input id="middlename" class="form-control col-xs-12" data-validate-length-range="2,45" name="middlename" placeholder="Middle Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="lastname">Last Name <span class="required">*</span></label>
                                            <input id="lastname" class="form-control col-xs-12" data-validate-length-range="2,45" name="lastname" placeholder="Last Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="suffix">Suffix</label>
                                            <input id="suffix" class="form-control col-xs-12 suffix" data-validate-length-range="3,45" name="suffix" placeholder="Jr/Sr" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-4 col-xs-12 item">
                                            <label class="" for="civil_status">Marital Status <span class="required">*</span></label>
                                            <input id="civil_status" list = "status-list" class="form-control col-xs-12 civil_status" data-validate-length-range="3,45" name="civil_status" placeholder="Marital Status" required="required" type="text" value="">
                                            <datalist id = "status-list">
                                                <option>Married</option>
                                                <option>Divorced</option>
                                                <option>Widowed</option>
                                                <option>Separated</option>
                                                <option>Single</option>
                                            </datalist>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="birthday">Birthday <span class="required">*</span></label>
                                            <input id="birthday" class="form-control col-xs-12 birthday" data-validate-length-range="3,45" name="birthday" placeholder="Jr/Sr" required="required" type="date" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-3 col-xs-12 item">
                                            <label class="" for="mobile_no">Mobile Number <span class="required">*</span></label>
                                            <input id="mobile_no" class="form-control col-xs-12 mobile_no" data-validate-length-range="3,45" name="mobile_no" placeholder="09---------" required="required" type="number" value="">
                                        </div>
                                        <div class="col-md-6 col-sm-3 col-xs-12 item">
                                            <label class="" for="email">Email <span class="required">*</span></label>
                                            <input id="email" class="form-control col-xs-12 email" data-validate-length-range="3,45" name="email" placeholder="Email" required="required" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="birth_place_city">Birth Place <span class="required">*</span></label>
                                            <input id="birth_place_city" class="form-control col-xs-12 birth_place_city" data-validate-length-range="3,45" name="birth_place_city" placeholder="City" required="required" type="text" value="Baliwag">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label>&nbsp</label>
                                            <input id="birth_place_country" class="form-control col-xs-12 birth_place_country" data-validate-length-range="3,45" name="birth_place_country" placeholder="Country" required="required" type="text" value="Philippines">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="nationality">Nationality<span class="required">*</span></label>
                                            <input id="nationality" class="form-control col-xs-12 nationality" data-validate-length-range="3,45" name="nationality" placeholder="City" required="required" type="text" value="Filipino">
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="nationality">Nationality<span class="required">*</span></label>
                                            <input id="nationality" class="form-control col-xs-12 nationality" data-validate-length-range="3,45" name="nationality" placeholder="City" required="required" type="text" value="Filipino">
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12 item">
                                            <label class="" for="gender">Gender <span class="required">*</span></label>
                                            <input id="gender" list = "gender-list" class="form-control col-xs-12" data-validate-length-range="3,45" name="gender" placeholder="Gender" required="required" type="text" value="">
                                            <datalist id = "gender-list">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </datalist>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="education">Education</label>
                                            <input id="education" class="form-control col-xs-12 education" data-validate-length-range="3,45" name="education" placeholder="Education" type="text" value="" list = "education-list">
                                            <datalist id = "education-list">
                                                <option>Elementary</option>
                                                <option>High School</option>
                                                <option>College</option>
                                                <option>None</option>
                                            </datalist>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="school">School</label>
                                            <input id="school" class="form-control col-xs-12 school" data-validate-length-range="3,45" name="school" placeholder="School" type="text" value="">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "container">
                                            <h4>Present Address</h4>
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_unit">Unit/Floor</label>
                                            <input id="present_address_unit" class="form-control col-xs-12 present_address_unit" data-validate-length-range="3,45" name="present_address_unit" placeholder="Unit/Floor" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_building">Building </label>
                                            <input id="present_address_building" class="form-control col-xs-12 present_address_building" data-validate-length-range="3,45" name="present_address_building" placeholder="Unit/Floor" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_subdivision">Subdivision </label>
                                            <input id="present_address_subdivision" class="form-control col-xs-12 present_address_subdivision" data-validate-length-range="3,45" name="present_address_subdivision" placeholder="Street" type="text" value="">
                                        </div>
                                         <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_no">House No. <span class="required">*</span></label>
                                            <input id="present_address_no" class="form-control col-xs-12 present_address_no" data-validate-length-range="3,45" name="present_address_no" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_street">Street <span class="required">*</span></label>
                                            <input id="present_address_street" class="form-control col-xs-12 present_address_street" data-validate-length-range="3,45" name="present_address_street" placeholder="Street" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_barangay">Barangay <span class="required">*</span></label>
                                            <input id="present_address_barangay" class="form-control col-xs-12 present_address_barangay" data-validate-length-range="3,45" name="present_address_barangay" placeholder="Barangay" required="required" type="text" value="" list = "barangay-list">
                                            <datalist id = "barangay-list">
                                                <?php foreach ($barangays->result() as $row): ?>
                                                    <option><?php echo $row->barangay_name; ?></option>
                                                <?php endforeach ?>
                                            </datalist>
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_city">City <span class="required">*</span></label>
                                            <input id="present_address_city" class="form-control col-xs-12 present_address_city" data-validate-length-range="3,45" name="present_address_city" placeholder="Street" required="required" type="text" value="Baliwag">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_province">Province <span class="required">*</span></label>
                                            <input id="present_address_province" class="form-control col-xs-12 present_address_province" data-validate-length-range="3,45" name="present_address_city" placeholder="Street" required="required" type="text" value="Bulacan">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_country">Country <span class="required">*</span></label>
                                            <input id="present_address_country" class="form-control col-xs-12 present_address_country" data-validate-length-range="3,45" name="present_address_country" placeholder="Street" required="required" type="text" value="Philippines">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_zip_code">Zip Code <span class="required">*</span></label>
                                            <input id="present_zip_code" class="form-control col-xs-12 present_zip_code" data-validate-length-range="3,45" name="present_zip_code" placeholder="Street" required="required" type="text" value="3006">
                                        </div>

                                    </div>
                                    <div class = "row">
                                        <div class = "container">
                                            <h4>Permanent Address</h4>
                                        </div>
                                        <div class="col-md-12 col-sm-5 col-xs-12">
                                            <div class = "btn btn-info copy-present">Copy Present Address</div>
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_unit">Unit/Floor</label>
                                            <input id="permanent_address_unit" class="form-control col-xs-12 permanent_address_unit" data-validate-length-range="3,45" name="permanent_address_unit" placeholder="Unit/Floor" rtype="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_building">Building</label>
                                            <input id="permanent_address_building" class="form-control col-xs-12 permanent_address_building" data-validate-length-range="3,45" name="permanent_address_building" placeholder="Unit/Floor" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_subdivision">Subdivision </label>
                                            <input id="permanent_address_subdivision" class="form-control col-xs-12 permanent_address_subdivision" data-validate-length-range="3,45" name="permanent_address_subdivision" placeholder="Street" type="text" value="">
                                        </div>
                                         <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_no">House No. <span class="required">*</span></label>
                                            <input id="permanent_address_no" class="form-control col-xs-12 permanent_address_no" data-validate-length-range="3,45" name="permanent_address_no" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_street">Street <span class="required">*</span></label>
                                            <input id="permanent_address_street" class="form-control col-xs-12 permanent_address_street" data-validate-length-range="3,45" name="permanent_address_street" placeholder="Street" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_barangay">Barangay <span class="required">*</span></label>
                                            <input id="permanent_address_barangay" class="form-control col-xs-12 permanent_address_barangay" data-validate-length-range="3,45" name="permanent_address_barangay" placeholder="Barangay" required="required" type="text" value="" list = "barangay-list">

                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_city">City <span class="required">*</span></label>
                                            <input id="permanent_address_city" class="form-control col-xs-12 permanent_address_city" data-validate-length-range="3,45" name="permanent_address_city" placeholder="Street" required="required" type="text" value="Baliwag">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_province">Province <span class="required">*</span></label>
                                            <input id="permanent_address_province" class="form-control col-xs-12 permanent_address_province" data-validate-length-range="3,45" name="permanent_address_province" placeholder="Street" required="required" type="text" value="Bulacan">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_address_country">Country <span class="required">*</span></label>
                                            <input id="permanent_address_country" class="form-control col-xs-12 permanent_address_country" data-validate-length-range="3,45" name="permanent_address_country" placeholder="Street" required="required" type="text" value="Philippines">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="permanent_zip_code">Zip Code <span class="required">*</span></label>
                                            <input id="permanent_zip_code" class="form-control col-xs-12 permanent_zip_code" data-validate-length-range="3,45" name="permanent_zip_code" placeholder="Street" required="required" type="text" value="3006">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "container">
                                            <h4>Other Details</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="source_of_income">Source of Income<span class="required">*</span></label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="Source of Income" required="required" type="text" value="" list = "source-of-income-list">
                                                <datalist id = "source-of-income-list">
                                                    <option>Investment</option>
                                                    <option>Employment</option>
                                                    <option>Business</option>
                                                    <option>Allotment</option>
                                                    <option>Remittance</option>
                                                    <option>Inherittance</option>
                                                    <option>Load Proceeds</option>
                                                    <option>Deposits</option>
                                                </datalist>
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="nature_of_work">Nature of Work<span class="required">*</span></label>
                                                <input id="nature_of_work" class="form-control col-xs-12 nature_of_work" data-validate-length-range="3,45" name="nature_of_work" placeholder="Nature of Work" required="required" type="text" value="" list = "nature-of-work-list">
                                                <datalist id = "nature-of-work-list">
                                                    <option>SME Employee</option>
                                                    <option>OFW</option>
                                                    <option>Religious Org and NGO Employee</option>
                                                    <option>Religious Org Member (e.g. Priest and Pastor)</option>
                                                    <option>Gov't Employee (Casual/Co-terminus)</option>
                                                    <option>Housewife/Househusband/Dependent</option>
                                                    <option>Retiree</option>
                                                    <option>Freelance (e.g. Writer and Buy and Sell)</option>
                                                    <option>Professional Practitioner (e.g. Doctors and Engineers)</option>
                                                    <option>Student</option>
                                                </datalist>
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="occupation">Occupation<span class="required">*</span></label>
                                                <input id="occupation" class="form-control col-xs-12 occupation" data-validate-length-range="3,45" name="occupation" placeholder="Occupation" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="monthly_income">Monthly Income<span class="required">*</span></label>
                                                <input id="monthly_income" class="form-control col-xs-12 monthly_income" data-validate-length-range="3,45" name="monthly_income" placeholder="Monthly Income" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="employer">Employer</label>
                                                <input id="employer" class="form-control col-xs-12 employer" data-validate-length-range="3,45" name="employer" placeholder="Employer" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="family_members">Family Members<span class="required">*</span></label>
                                                <input id="family_members" class="form-control col-xs-12 family_members" data-validate-length-range="1,45" name="family_members" placeholder="Family Members" required="required" type="number" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="registered_voter">Registered Voter<span class="required">*</span></label>
                                                <input id="registered_voter" class="form-control col-xs-12 registered_voter" data-validate-length-range="2,45" name="registered_voter" placeholder="Yes/No" required="required" type="text" value="" list = "yes-no-list">
                                                <datalist id = "yes-no-list">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </datalist>
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="philhealth_member">Philhealth Member<span class="required">*</span></label>
                                                <input id="philhealth_member" class="form-control col-xs-12 philhealth_member" data-validate-length-range="2,45" name="philhealth_member" placeholder="Yes/No" required="required" type="text" value="" list = "yes-no-list">

                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="vulnerable_sector">Vulnerable Sector<span class="required">*</span></label>
                                                <input id="vulnerable_sector" class="form-control col-xs-12 vulnerable_sector" data-validate-length-range="2,45" name="vulnerable_sector" placeholder="Vulnerable Sector" required="required" type="text" value="" list = "vulnerable-list">
                                                <datalist id = "vulnerable-list">
                                                    <option>No</option>
                                                    <option>PWD</option>
                                                    <option>Senior</option>
                                                    <option>Solo Parent</option>
                                                    <option>Indigenous People</option>
                                                    <option>4P's</option>
                                                    <option>Toda</option>
                                                    <option>Farmers</option>
                                                    <option>Other</option>
                                                </datalist>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "container">
                                            <h4>ID's</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="tin_number">Tin ID</label>
                                                <input id="tin_number" class="form-control col-xs-12 tin_number" data-validate-length-range="3,45" name="tin_number" placeholder="Tin ID" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="sss_number">SSS ID</label>
                                                <input id="sss_number" class="form-control col-xs-12 sss_number" data-validate-length-range="3,45" name="sss_number" placeholder="SSS ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="gsis_number">GSIS ID</label>
                                                <input id="gsis_number" class="form-control col-xs-12 gsis_number" data-validate-length-range="3,45" name="gsis_number" placeholder="GSIS ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="philhealth_number">Philhealth ID</label>
                                                <input id="philhealth_number" class="form-control col-xs-12 philhealth_number" data-validate-length-range="3,45" name="philhealth_number" placeholder="Philhealth ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="pwd_number">PWD ID</label>
                                                <input id="pwd_number" class="form-control col-xs-12 pwd_number" data-validate-length-range="3,45" name="pwd_number" placeholder="PWD ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="senior_number">Senior ID</label>
                                                <input id="senior_number" class="form-control col-xs-12 senior_number" data-validate-length-range="3,45" name="senior_number" placeholder="Senior ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="solo_number">Solo Parent ID</label>
                                                <input id="solo_number" class="form-control col-xs-12 solo_number" data-validate-length-range="3,45" name="solo_number" placeholder="Solo Parent ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="fourp_number">4P's ID</label>
                                                <input id="fourp_number" class="form-control col-xs-12 fourp_number" data-validate-length-range="3,45" name="fourp_number" placeholder="4P's ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="pya_number">PYA ID</label>
                                                <input id="pya_number" class="form-control col-xs-12 pya_number" data-validate-length-range="3,45" name="pya_number" placeholder="PYA ID"  type="text" value="">
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="member_since">Member Since</label>
                                                <input id="member_since" class="form-control col-xs-12 member_since" data-validate-length-range="3,45" name="member_since" placeholder="Member Since"  type="text" value="">
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="org_president">Org President</label>
                                                <input id="org_president" class="form-control col-xs-12 org_president" data-validate-length-range="3,45" name="org_president" placeholder="Org President"  type="text" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="get_longitude">Longitude</label>
                                                <input id="get_longitude" class="form-control col-xs-12 get_longitude" data-validate-length-range="3,45" name="get_longitude" placeholder="120.----"  type="text" value="">
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="get_latitude">Latitude</label>
                                                <input id="get_latitude" class="form-control col-xs-12 get_latitude" data-validate-length-range="3,45" name="get_latitude" placeholder="14.----"  type="text" value="">
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                    
                                    <!-- <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label for="city">City/Municipal <span class="required">*</span></label>
                                            <input id="city" list="town-list" class="form-control col-xs-12" data-validate-length-range="2,100" name="city" placeholder="" required="required" type="text" value="Baliuag">
                                            <datalist id="town-list">
                                                <?php if ($town != FALSE): ?>
                                                    <?php foreach ($town->result() as $row): ?>
                                                        <option><?php echo $row->town_name; ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </datalist>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label for="province">Province <span class="required">*</span></label>
                                            <input id="province" list="province-list" class="form-control col-xs-12" data-validate-length-range="2,100" name="province" placeholder="" required="required" type="text" value="Bulacan">
                                            <datalist id="province-list">
                                                <?php if ($province != FALSE): ?>
                                                    <?php foreach ($province->result() as $row): ?>
                                                        <option><?php echo $row->name; ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </datalist>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label for="region">Region <span class="required">*</span></label>
                                            <input id="region" list="province-list" class="form-control col-xs-12" data-validate-length-range="1,100" name="region" placeholder="" required="required" type="text" value="3">
                                            <datalist id="province-list">
                                                <?php if ($province != FALSE): ?>
                                                    <?php foreach ($province->result() as $row): ?>
                                                        <option><?php echo $row->name; ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </datalist>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="row">
                                    <div class = "container">
                                        <h4>Images</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-5 col-xs-12 item">
                                            <label class="" for="requirements_image_path">Requirements Photo</label>
                                            <input id="requirements_image_path" class="form-control col-xs-12 requirements_image_path" name="requirements_image_path" type="file" value="" required="required">
                                        </div>
                                        <div class="col-md-6 col-sm-5 col-xs-12 item">
                                            <label class="" for="image_path">Profile Photo</label>
                                            <input id="image_path" class="form-control col-xs-12 image_path" name="image_path" type="file" required="required">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                
                                <div class="form-group">
                                    <div class="col-md-3 col-md-offset-9 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-offset-9">
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
            </div>
        </div>
    </div>
</div>
<?php //var_dump($fetch_teacher_info); ?>
<?php #echo date_format(date_add(date_create('10/27/2016'), date_interval_create_from_date_string('1 days')), 'Y-m-d'); ?>

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datatables/css/jquery.dataTables.css"> -->

<style type="text/css">
/*css here*/
div.alert{
    display: none;
}
#form-modal .modal-dialog{
    -width: 90%;
}
.well{
    border-radius: 0;

}
#child-name-list{
    /*margin-left: 10px;*/
}

.append-list{
    list-style-type: none;
}

.append-list li{
    padding: 5px;
}
.append-list li:hover{
    background-color: rgba(200,100,100,0.5);
    color: #ffffff;
}


.profile-pic
{
    height: 80px;
    width: 80px;
}
</style>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $('#id').hide();
    // initialize the global id
    var id = null;

    $('#facility_id').hide();

    //$('.date').datepicker({dateFormat: 'yy-mm-dd'});

    //$('#id').hide();
    
    // listen to add-btn
    $(document).on('click', '.add-btn', function(){

        // set the title
        $('.modal-title').html('Add New Record');

        // raise the modal
        $("#form-modal").modal();

        // change the ID of the form based on the action
        $(".form-vessel").attr('id', 'form-add');

        // reset the form
        $('form')[0].reset();

        // change the text on the submit button
        $(".btn-vessel").html('Submit'); 

        $('.append-list').html('');
    });


    // bind the validation to the form submit event -> INSERT
    $(document).on('submit', '#form-add', function(event) {
        
        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        // check if submit is true
        if (submit){
            //console.log($(this).serialize())
            //loader('show');

            $.post('<?php echo base_url(); ?>' + '/record/profile_add', $(this).serialize(), function(data, status){
                //console.log(data);
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
                               
                                // reset the form
                                $('form')[0].reset();
                                // redraw the dataTable to see updates
                                myDataTable.fnDraw();

                                
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

                // console.log(data);
                
            }, 'json'); //json here
        }
        // return false;

        event.preventDefault();
    });
    
    // listen to edit-btn
    $(document).on('click', '.edit-btn', function(){

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
        id = $(this).attr('data-index');

        

        $.post('<?php echo base_url(); ?>record/profile_view/' + id, {'POST': true}, function(data, status){
            console.log(data);
            if(!data.error){
    
                // $('#child-name-list').html('');
                // $('#child-age-list').html('');
                // $('#child-occupation-list').html('');

                // $('#org-name-list').html('');
                // $('#org-position-list').html('');

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

    // bind the validation to the form submit event -> UPDATE
    $(document).on('submit', '#form-edit', function(event) {

        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        // check if submit is true
        if (submit){

            loader('show');

            $.post('<?php echo base_url(); ?>' + 'index.php/record/children_update/' + id, post_values(), function(data, status){
                
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
                                // redraw the dataTable to see updates
                                myDataTable.fnDraw();
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



    // listen to delete-btn -> DELETE
    $(document).on('click', '.delete-btn', function(){
        
        var id = $(this).attr('data-index');

        $.confirm({
            theme : 'black',
            columnClass: 'col-md-6 col-md-offset-3',
            keyboardEnabled: true,
            autoClose: 'cancel|6000',
            title: 'Wait!',
            content: 'Are you sure you want to delete this record ?',
            cancel: function(){
                loader('hide');
            },
            confirm: function(){
                loader('hide');
                $.post('<?php echo base_url(); ?>record/children_remove/' + id, {'POST': true}, function(data, status){
                    if(!data.error){
                        console.log('pumasok');
                        $.dialog({
                            theme: 'black',
                            columnClass: 'col-md-6 col-md-offset-3',
                            title: 'Hey!',
                            content: data.success
                        });
                        // redraw the dataTable to see updates
                        myDataTable.fnDraw();
                    }else{
                        $.dialog({
                            theme: 'black',
                            columnClass: 'col-md-6 col-md-offset-3',
                            title: 'Oops!',
                            content: data.error,
                        });
                    }
                }, 'json');

            }
        });
    });

   
    
    fill_table();

    function fill_table(){
        var approval_id = '<?php echo $this->uri->segment(3); ?>';

        $.post('<?php echo base_url(); ?>' + 'index.php/record/profile_fetch/' + approval_id, {POST: true}, function(data, status){
                var actions = null;

                console.log(data)
                if(!data.error){
                    teacherDataTable.clear();

                    data.forEach(function(item) { //insert rows


                        actions = //'<a class="btn btn-info edit-btn my-ttip" href="javascript:void(0);" data-index="' + item.user_id + '" data-toggle="tooltip" data-title="View/Edit" title=""><span class="glyphicon glyphicon-edit"></span></a>' +
                            '<a class="btn btn-info my-ttip" href="<?php echo base_url(); ?>record/profile_info/' + item.id + '" data-index="' + item.user_id + '" data-toggle="tooltip" data-title="See Details" title=""><span class="glyphicon glyphicon-eye-open"></span></a>' 
                            // +
                            // '<a class="btn btn-danger delete-btn my-ttip" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="Remove" title=""><span class="glyphicon glyphicon-trash"></span></a>';

                        teacherDataTable.row.add(['<img class ="img rounded-circle img-thumbnail profile-pic" src="<?php echo base_url(); ?>files/e_forms/profile/'+item.image_path +'">' ,item.firstname+' '+item.middlename+' '+item.lastname , /*item.email,*/ item.mobile_no,actions]);
                        
                    })

                    teacherDataTable.draw();

                }else{
                    loader('hide');
                    // $.dialog({
                    //     theme: 'black',
                    //     columnClass: 'col-md-6 col-md-offset-3',
                    //     title: 'Oops!',
                    //     content: data.error,
                    // });
                }  

                
            },'json'); //json here
        
    }

    teacherDataTable = $('#data-table').DataTable({"bSort" : false});

    $(document).on('click', '.copy-present', function(){

        $('.permanent_address_unit').val($('.present_address_unit').val());
        $('.permanent_address_building').val($('.present_address_building').val());
        $('.permanent_address_subdivision').val($('.present_address_subdivision').val());
        $('.permanent_address_no').val($('.present_address_no').val());
        $('.permanent_address_street').val($('.present_address_street').val());
        $('.permanent_address_barangay').val($('.present_address_barangay   ').val());
    });
  });
</script>
