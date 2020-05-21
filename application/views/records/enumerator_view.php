<?php  

    // echo "<h1>this is main view</h1>";


?>


<script src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js" type="text/javascript" ></script>

<div class="page-title">
    <div class="title_left">
        <h3>Manage Enumerators</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
                <ul class="breadcrumb">
                    <li>Enumerators</li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <!-- <a class="btn btn-success add-btn pull-right" href="javascript:void(0);"><span class="glyphicon glyphicon-plus"></span>    Add New</a> -->
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">

                    <table id="data-table" class="display table" cellpadding="0" cellspacing="0" border="0"  width="100%">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Profile Count</th>
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
                                         <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label class="" for="pwd_id">PWD ID <span class="required">*</span></label>
                                            <input id="pwd_id" class="form-control col-xs-12" data-validate-length-range="3,45" name="pwd_id" placeholder="PWD ID" required="required" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label class="" for="firstname">First Name <span class="required">*</span></label>
                                            <input id="firstname" class="form-control col-xs-12" data-validate-length-range="3,45" name="firstname" placeholder="First Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label class="" for="middlename">Middle Name <span class="required">*</span></label>
                                            <input id="middlename" class="form-control col-xs-12" data-validate-length-range="3,45" name="middlename" placeholder="Middle Name" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                                            <label class="" for="lastname">Last Name <span class="required">*</span></label>
                                            <input id="lastname" class="form-control col-xs-12" data-validate-length-range="3,45" name="lastname" placeholder="Last Name" required="required" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 item">
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
                                    </div>
                                     <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label class="" for="gender">Gender <span class="required">*</span></label>
                                            <input id="gender" list = "gender-list" class="form-control col-xs-12" data-validate-length-range="3,45" name="gender" placeholder="Gender" required="required" type="text" value="">
                                            <datalist id = "gender-list">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </datalist>
                                        </div>
                                         <div class="col-md-4 col-sm-4 col-xs-12 item">
                                            <label class="" for="birthday">Birthday <span class="required">*</span></label>
                                            <input id="birthday" class="form-control col-xs-12 date"  name="birthday" placeholder="Birthday" required="required" type="" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12 item">
                                            <label class="" for="type_of_disability">Type of disability <span class="required">*</span></label>
                                            <input id="type_of_disability" list = "disability-list" class="form-control col-xs-12" data-validate-length-range="3,45" name="type_of_disability" placeholder="Type of Disability" required="required" type="text" value="">
                                            <datalist id="disability-list">
                                                <?php if ($disability != FALSE): ?>
                                                    <?php foreach ($disability->result() as $row): ?>
                                                        <option><?php echo $row->disability_name; ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "container">
                                            <h4>Address</h4>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12 item">
                                            <label class="" for="street">Street <span class="required">*</span></label>
                                            <input id="street" class="form-control col-xs-12" data-validate-length-range="3,45" name="street" placeholder="Street" required="required" type="text" value="">
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 item">
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
                                        </div>

                                    </div>
                                    <div class="row">
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

        $.post('<?php echo base_url(); ?>' + 'index.php/record/enumerator_fetch/', {POST: true}, function(data, status){
                var actions = null;

                console.log(data)
                if(!data.error){
                    enumeratorDataTable.clear();

                    data.forEach(function(item) { //insert rows

                        actions =
                            '<a class="btn btn-info my-ttip" href="<?php echo base_url(); ?>record/enumerator_record/' + item.user_id + '" data-index="' + item.user_id + '" data-toggle="tooltip" data-title="See Details" title=""><span class="glyphicon glyphicon-eye-open"></span></a>' 
                            ;

                        enumeratorDataTable.row.add([item.first_name+' '+item.middle_name+' '+item.last_name , item.email, item.profile_count,actions]);
                        
                    })

                    enumeratorDataTable.draw();

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

    enumeratorDataTable = $('#data-table').DataTable({"bSort" : false});

  });
</script>
