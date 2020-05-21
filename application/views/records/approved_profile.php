<?php  

    // echo "<h1>this is main view</h1>";


?>


<script src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js" type="text/javascript" ></script>

<div class="page-title">
    <div class="title_left">
        <h3>Manage your records</h3>
    </div>
</div>

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
                
                <a class="btn btn-success add-btn pull-right" href="javascript:void(0);"><span class="glyphicon glyphicon-plus"></span>    Add New</a>
                <a class="btn btn-success pull-right" href="<?php echo base_url() ?>record/paymaya_print_csv"><span class="fa fa-print"></span>    Print Report</a>
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">

                    <table id="data-table" class="display table" cellpadding="0" cellspacing="0" border="0"  width="100%">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>

                    <!-- View/Edit/Add Modal -->
                    <!-- Always hidden if not needed -->
                    <div id="form-modal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Title</h4>
                          </div>
                          <div class="modal-body">

                            <!-- form -->
                            <form class="form-horizontal form-label-left form-vessel" novalidatea>

                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-12 item">
                                        <!-- <label class="" for="pid_no">Person ID <span class="required">*</span></label> -->
                                        <input id="id" class="form-control col-xs-12" data-validate-length-range="1,45" name="id" placeholder=" "  type="text" value="">
                                    </div>
                                </div>

                                <h3>BASIC INFORMATION</h3>
                                <div class="form-group">
                                    <div class="row">
                                        <div class = "container">
                                            <h4>Personal Information</h4>
                                        </div>
                                        <!-- <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="id">ID <span class="required">*</span></label>
                                            <input id="id" class="form-control col-xs-12" data-validate-length-range="1,45" name="id" placeholder="ID" required="required" type="text" value="">
                                        </div> -->
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label class="" for="id">Children ID <span class="required">*</span></label>
                                            <input id="id" class="form-control col-xs-12" data-validate-length-range="3,45" name="id" placeholder="Teacher ID Here" required="required" type="text" value="">
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="firstname">First Name <span class="required">*</span></label>
                                            <input id="firstname" class="form-control col-xs-12" data-validate-length-range="3,45" name="firstname" placeholder="First Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="middlename">Middle Name <span class="required">*</span></label>
                                            <input id="middlename" class="form-control col-xs-12" data-validate-length-range="3,45" name="middlename" placeholder="Middle Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="lastname">Last Name <span class="required">*</span></label>
                                            <input id="lastname" class="form-control col-xs-12" data-validate-length-range="3,45" name="lastname" placeholder="Last Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="suffix">Suffix <span class="required">*</span></label>
                                            <input id="suffix" class="form-control col-xs-12 suffix" data-validate-length-range="3,45" name="suffix" placeholder="Jr/Sr" required="required" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-4 col-xs-12 item">
                                            <label class="" for="marital_status">Marital Status <span class="required">*</span></label>
                                            <input id="marital_status" list = "status-list" class="form-control col-xs-12" data-validate-length-range="3,45" name="marital_status" placeholder="Marital Status" required="required" type="text" value="">
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
                                            <input id="mobile_no" class="form-control col-xs-12 mobile_no" data-validate-length-range="3,45" name="mobile_no" placeholder="Mobile Number" required="required" type="text" value="">
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
                                            <label class="" for="education">Education<span class="required">*</span></label>
                                            <input id="education" class="form-control col-xs-12 education" data-validate-length-range="3,45" name="education" placeholder="Education" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="school">School<span class="required">*</span></label>
                                            <input id="school" class="form-control col-xs-12 school" data-validate-length-range="3,45" name="school" placeholder="School" required="required" type="text" value="">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "container">
                                            <h4>Present Address</h4>
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_unit">Unit/Floor <span class="required">*</span></label>
                                            <input id="present_address_unit" class="form-control col-xs-12 present_address_unit" data-validate-length-range="3,45" name="present_address_unit" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_building">Building <span class="required">*</span></label>
                                            <input id="present_address_building" class="form-control col-xs-12 present_address_building" data-validate-length-range="3,45" name="present_address_building" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_subdivision">Subdivision <span class="required">*</span></label>
                                            <input id="present_address_subdivision" class="form-control col-xs-12 present_address_subdivision" data-validate-length-range="3,45" name="present_address_subdivision" placeholder="Street" required="required" type="text" value="">
                                        </div>
                                         <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_no">House No. <span class="required">*</span></label>
                                            <input id="present_address_no" class="form-control col-xs-12 present_address_no" data-validate-length-range="3,45" name="present_address_no" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_no">Street <span class="required">*</span></label>
                                            <input id="present_address_no" class="form-control col-xs-12 present_address_no" data-validate-length-range="3,45" name="street" placeholder="Street" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_barangay">Barangay <span class="required">*</span></label>
                                            <input id="present_address_barangay" class="form-control col-xs-12 present_address_barangay" data-validate-length-range="3,45" name="present_address_barangay" placeholder="Street" required="required" type="text" value="">
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
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label for="barangay">Barangay <span class="required">*</span></label>
                                            <input id="barangay" list="town-list" class="form-control col-xs-12" data-validate-length-range="2,100" name="barangay" placeholder="Barangay" required="required" type="text" value="">
                                            <?php //var_dump($barangay->result()); ?>
                                            <datalist id="town-list">
                                                <?php if ($barangay != FALSE): ?>
                                                    <?php foreach ($barangay->result() as $row): ?>
                                                        <option><?php echo $row->barangay_name; ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </datalist>
                                        </div> -->

                                    </div>
                                    <div class = "row">
                                        <div class = "container">
                                            <h4>Permanent Address</h4>
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_unit">Unit/Floor <span class="required">*</span></label>
                                            <input id="present_address_unit" class="form-control col-xs-12 present_address_unit" data-validate-length-range="3,45" name="present_address_unit" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_building">Building <span class="required">*</span></label>
                                            <input id="present_address_building" class="form-control col-xs-12 present_address_building" data-validate-length-range="3,45" name="present_address_building" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_subdivision">Subdivision <span class="required">*</span></label>
                                            <input id="present_address_subdivision" class="form-control col-xs-12 present_address_subdivision" data-validate-length-range="3,45" name="present_address_subdivision" placeholder="Street" required="required" type="text" value="">
                                        </div>
                                         <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_no">House No. <span class="required">*</span></label>
                                            <input id="present_address_no" class="form-control col-xs-12 present_address_no" data-validate-length-range="3,45" name="present_address_no" placeholder="Unit/Floor" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_no">Street <span class="required">*</span></label>
                                            <input id="present_address_no" class="form-control col-xs-12 present_address_no" data-validate-length-range="3,45" name="street" placeholder="Street" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-5 col-xs-12 item">
                                            <label class="" for="present_address_barangay">Barangay <span class="required">*</span></label>
                                            <input id="present_address_barangay" class="form-control col-xs-12 present_address_barangay" data-validate-length-range="3,45" name="present_address_barangay" placeholder="Street" required="required" type="text" value="">
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
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label for="barangay">Barangay <span class="required">*</span></label>
                                            <input id="barangay" list="town-list" class="form-control col-xs-12" data-validate-length-range="2,100" name="barangay" placeholder="Barangay" required="required" type="text" value="">
                                            <?php //var_dump($barangay->result()); ?>
                                            <datalist id="town-list">
                                                <?php if ($barangay != FALSE): ?>
                                                    <?php foreach ($barangay->result() as $row): ?>
                                                        <option><?php echo $row->barangay_name; ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </datalist>
                                        </div> -->

                                    </div>
                                    <div class="row">
                                        <div class = "container">
                                            <h4>Other Details</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="source_of_income">Source of Income<span class="required">*</span></label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="Source of Income" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="source_of_income">Nature of Work<span class="required">*</span></label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="Nature of Work" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="source_of_income">Occupation<span class="required">*</span></label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="Occupation" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="source_of_income">Monthly Income<span class="required">*</span></label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="Monthly Income" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="employer">Employer<span class="required">*</span></label>
                                                <input id="employer" class="form-control col-xs-12 employer" data-validate-length-range="3,45" name="employer" placeholder="Monthly Income" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="family_members">Family Members<span class="required">*</span></label>
                                                <input id="family_members" class="form-control col-xs-12 family_members" data-validate-length-range="3,45" name="family_members" placeholder="Monthly Income" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="registered_voter">Registered Voter<span class="required">*</span></label>
                                                <input id="registered_voter" class="form-control col-xs-12 registered_voter" data-validate-length-range="3,45" name="registered_voter" placeholder="Monthly Income" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="philhealth_member">Philhealth Member<span class="required">*</span></label>
                                                <input id="philhealth_member" class="form-control col-xs-12 philhealth_member" data-validate-length-range="3,45" name="philhealth_member" placeholder="" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="vulnerable_sector">Vulnerable Sector<span class="required">*</span></label>
                                                <input id="vulnerable_sector" class="form-control col-xs-12 vulnerable_sector" data-validate-length-range="3,45" name="vulnerable_sector" placeholder="Monthly Income" required="required" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "container">
                                            <h4>ID's</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="source_of_income">Tin ID</label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="Tin ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="source_of_income">SSS ID</label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="SSS ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="gsis_number">GSIS ID</label>
                                                <input id="source_of_income" class="form-control col-xs-12 source_of_income" data-validate-length-range="3,45" name="source_of_income" placeholder="GSIS ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="philhealth_number">Philhealth ID</label>
                                                <input id="philhealth_number" class="form-control col-xs-12 philhealth_number" data-validate-length-range="3,45" name="philhealth_number" placeholder="Philhealth ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="pwd_number">PWD ID</label>
                                                <input id="pwd_number" class="form-control col-xs-12 pwd_number" data-validate-length-range="3,45" name="pwd_number" placeholder="PWD ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="senior_number">Senior ID</label>
                                                <input id="senior_number" class="form-control col-xs-12 senior_number" data-validate-length-range="3,45" name="senior_number" placeholder="Senior ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="solo_number">Solo Parent ID</label>
                                                <input id="solo_number" class="form-control col-xs-12 solo_number" data-validate-length-range="3,45" name="solo_number" placeholder="Solo Parent ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="fourp_number">4P's ID</label>
                                                <input id="fourp_number" class="form-control col-xs-12 fourp_number" data-validate-length-range="3,45" name="fourp_number" placeholder="4P's ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-12 item">
                                                <label class="" for="pya_number">PYA ID</label>
                                                <input id="pya_number" class="form-control col-xs-12 pya_number" data-validate-length-range="3,45" name="pya_number" placeholder="PYA ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="member_since">Member Since</label>
                                                <input id="member_since" class="form-control col-xs-12 member_since" data-validate-length-range="3,45" name="member_since" placeholder="PYA ID" required="required" type="text" value="">
                                            </div>
                                            <div class="col-md-6 col-sm-5 col-xs-12 item">
                                                <label class="" for="org_president">Org President</label>
                                                <input id="org_president" class="form-control col-xs-12 org_president" data-validate-length-range="3,45" name="org_president" placeholder="PYA ID" required="required" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
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
                                    </div>
                                </div> -->
                                
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

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datatables/css/jquery.dataTables.css">

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

    $('.date').datepicker({dateFormat: 'yy-mm-dd'});

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
        $(".btn-vessel").html('Insert'); 

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

            loader('show');

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


    // $(document).on('reset', 'form', function(){
    //     $('input:checkbox').removeAttr('');
    // });
    // other functions


    // fetch the data from the server
    // myDataTable = $('#data-table').dataTable({
    //     "bProcessing": true,
    //         "bServerSide": true,
    //         "sServerMethod": "GET",
    //         "sAjaxSource": "<?php echo base_url() ?>record/profile_fetch",
    //         "aoColumns": [
    //         { "bVisible": false, "bSearchable": true, "bSortable": true },
    //         { "bVisible": true, "bSearchable": true, "bSortable": true },
    //         { "bVisible": true, "bSearchable": true, "bSortable": true },
    //         { "bVisible": true, "bSearchable": true, "bSortable": true },
    //         ],
    //         "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
    //               // object[column_index]
    //               // this will add action buttons for each row of the data

    //               // then will append new column for action links
    //               $('td:eq(2)', nRow).after( $('<td class="action-group">' +
    //                 '<a class="btn btn-info edit-btn my-ttip" href="javascript:void(0);" data-index="' + aData[0] + '" data-toggle="tooltip" data-title="View/Edit" title=""><span class="glyphicon glyphicon-edit"></span></a>' +
    //                 '<a class="btn btn-info my-ttip" href="<?php echo base_url(); ?>record/profile_info/' + aData[0] + '" data-index="' + aData[0] + '" data-toggle="tooltip" data-title="See Details" title=""><span class="glyphicon glyphicon-eye-open"></span></a>' +
    //                 '<a class="btn btn-danger delete-btn my-ttip" href="javascript:void(0);" data-index="' + aData[0] + '" data-toggle="tooltip" data-title="Remove" title=""><span class="glyphicon glyphicon-trash"></span></a>' +
    //                 '</td>') );
    //             }
    // });

    // initialize tooltip
    // $('[data-toggle="tooltip"]').tooltip();   
    
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
                            '<a class="btn btn-info my-ttip" href="<?php echo base_url(); ?>record/profile_info/' + item.id + '" data-index="' + item.user_id + '" data-toggle="tooltip" data-title="See Details" title=""><span class="glyphicon glyphicon-eye-open"></span></a>' +
                            '<a class="btn btn-danger delete-btn my-ttip" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="Remove" title=""><span class="glyphicon glyphicon-trash"></span></a>';

                        teacherDataTable.row.add(['<img class ="img img-responsive img-thumbnail profile-pic" src="<?php echo base_url(); ?>files/e_forms/profile/'+item.image_path +'">' ,item.firstname+' '+item.middlename+' '+item.lastname , item.email, item.mobile_no,actions]);
                        
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

  });
</script>
