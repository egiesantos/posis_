<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Items</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Items</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
                        <div class="header">
                            <div class="row">
                                <div class = "col-12 ">
                                    <br>
                                    <div class="button-container ">
                                        <a class="btn btn-outline-info add-btn float-right" href="javascript:void(0);" style =  "margin-right: 20px; margin-bottom: 20px;"><span class="fa fa-plus"></span> Add User</a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class = "col-12">
                                <table id="data-table" class="table table">
                                    <thead>
                                        <th>Email</th>
                                        <!-- <th>Last Login</th> -->
                                        <th>Full Name</th>
                                        <!-- <th>Registered Device</th> -->
                                        <!-- <th>Department Name</th> -->
                                        <th>Role</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>

                                        <!-- append here -->

                                    </tbody>

                                </table>
                                <br>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>









<div id="form-modal" class="modal fade" role="dialog">

    <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Modal Title</h4>

          </div>

          <div class="modal-body">



            <!-- form -->

            <form class="form-horizontal form-label-left form-vessel" novalidate>



                <div class="form-group">

                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dept_id">Category ID <span class="required">*</span></label> -->

                    <div class="col-md-3 col-sm-3 col-xs-12 item">

                        <input id="user_id" class="form-control col-xs-12" data-validate-length-range="1,45" name="user_id"  type="hidden" value="">

                    </div>

                </div>



                <div class="form-group">

                    <div class="col-md-12 col-xs-12 item">

                        <label class="control-label" for="email">Email <span class="required">*</span></label>

                        <input id="email" class="form-control col-xs-12" data-validate-length-range="3,45" name="email" required="required" type="email" value="@pos.com">
                    </div>

                </div>



                <div class="form-group">

                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="user_role">User's Role <span class="required">*</span></label>

                    <div class="col-md-12 col-sm-12 col-xs-12 item">

                        <select id="user_role" class="form-control col-xs-12" name="user_role" required="required" >

                            <?php for($i = 0; $i < count($this->config->item('roles')); $i++){ ?>

                                <option data-id="<?php echo $i; ?>"><?php echo $this->config->item('roles')[$i]; ?></option>

                            <?php } ?>

                        </select>

                        <input id="role_id" name="role_id" type="hidden" required>

                    </div>

                </div>



                <div class="form-group">

                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first_name">First Name <span class="required">*</span></label>

                    <div class="col-md-12 col-sm-12 col-xs-12 item">

                        <input id="first_name" class="form-control col-xs-12" data-validate-length-range="3,100" name="first_name" required="required" type="text" value="">

                    </div>

                </div>



                <div class="form-group">

                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="middle_name">Middle Name <span class="required">*</span></label>

                    <div class="col-md-12 col-sm-12 col-xs-12 item">

                        <input id="middle_name" class="form-control col-xs-12" data-validate-length-range="3,100" name="middle_name" required="required" type="text" value="">

                    </div>

                </div>



                <div class="form-group">

                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last_name">Last Name <span class="required">*</span></label>

                    <div class="col-md-12 col-sm-12 col-xs-12 item">

                        <input id="last_name" class="form-control col-xs-12" data-validate-length-range="3,100" name="last_name" required="required" type="text" value="">

                    </div>

                </div>



                <div class="form-group" style = "display: none">

                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="serial_number">Registered Device <span class="required">*</span></label>

                    <div class="col-md-12 col-sm-12 col-xs-12 item">

                        <input id="serial_number" class="form-control col-xs-12" data-validate-length-range="3,100" name="serial_number" placeholder="Serial Number" required="required" type="hidden" value="NONE">

                    </div>

                </div>

            

                <div class="form-group" style = "display: none">

                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="department">Department <span class="required">*</span></label>

                    <div class="col-md-12 col-sm-12 col-xs-12 item">

                        <select id="department_name" class="form-control col-xs-12" name="department_name" required="required" >

                            <?php  

                                if ($departments != FALSE) {

                                    foreach ($departments->result() as $row) {

                                        echo '<option data-id="' . $row->dept_id . '">' . $row->department_name . '</option>';

                                    }

                                }

                            ?>

                        </select>

                        <input id="dept_id" name="dept_id" type="hidden" required>

                    </div>

                </div>





                <div class="form-group" id="change-pass-btn-container">

                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="reset-pass">Reset Password</label>

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <select class="form-control" id="reset_pass" name="reset_pass">

                            <option>NO</option>

                            <option>YES</option>

                        </select>

                    </div>

                </div>



                <div class="form-group" id="pass-container">

                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="user_pass">Password <span class="required">*</span></label>

                    <div class="col-md-12 col-sm-12 col-xs-12 item">

                        <input id="user_pass" class="form-control col-xs-12" data-validate-length-range="3,100" name="user_pass" placeholder="" type="password" value="<?php echo $this->config->item('default_password'); ?>">

                        <a href="javascript:void(0);" class="pull-right" id="show-pass">   Show Password</a>

                    </div>

                </div>

                

                <div class="ln_solid"></div>

                

                <div class="row">

                    <div class="col">

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













<script type="text/javascript">

  $(document).ready(function(){



    // initialize the global id

    var id = null;



    $('#dept_id').val($('#department_name').find(':selected').attr('data-id'));

    $('#role_id').val($('#user_role').find(':selected').attr('data-id'));



    fill_table();



    // listen to add-btn

    $(document).on('click', '.add-btn', function(){



        // set the title

        // $('.modal-title').html('Add New User');



        // raise the modal

        $("#form-modal").modal();



        // change the ID of the form based on the action

        $(".form-vessel").attr('id', 'form-add');



        // reset the form

        $('form')[0].reset();



        // change the text on the submit button

        $(".btn-vessel").html('Insert'); 



        $('#pass-container').show();

        $('#change-pass-btn-container').hide();

    });





    // bind the validation to the form submit event -> INSERT

    $(document).on('submit', '#form-add', function(event) {

        

       

            $.post('<?php echo base_url(); ?>' + '/user/user_add', $(this).serialize(), function(data, status){





                if(!data.error){

                    $.alert({

                        theme : 'black',

                        columnClass: 'col-md-6 col-md-offset-3',

                        keyboardEnabled: true,

                        title: 'Hey!',

                        content: data.success,

                        buttons: {

                            confirm: function(){

                               setTimeout(function(){

                                   

                                    // reset the form

                                    $('.form-vessel')[0].reset();

                                    

                                    // redraw the dataTable to see updates

                                    // myDataTable.fnDraw();

                                    fill_table();



                                    

                               }, 800)



                            }

                        }

                        

                    });

                }else{


                    $.dialog({

                        theme: 'black',

                        columnClass: 'col-md-6 col-md-offset-3',

                        title: 'Oops!',

                        content: data.error,

                    });

                }



                console.log(data);

                

            }, 'json'); //json here
        // return false;



        event.preventDefault();

    });

    

    // listen to edit-btn

    $(document).on('click', '.edit-btn', function(){



        // set the title

        $('.modal-title').html('Update record');      



        // change the ID of the form based on the action

        $(".form-vessel").attr('id', 'form-edit'); 



        // reset the form

        $('form')[0].reset();



        // change the text on the submit button

        $(".btn-vessel").html('Update');     



        // fetch the specific record

        id = $(this).attr('data-index');



        $('#change-pass-btn-container').show();



        $.post('<?php echo base_url(); ?>user/user_view/' + id, {'POST': true}, function(data, status){

            if(!data.error){

                // loop through the returned object

                $.each(data, function(key, value){

                    $('#' + key).val(value);

                })



                $('#dept_id').val($('#department_name').find(':selected').attr('data-id'));

                $('#role_id').val($('#user_role').find(':selected').attr('data-id'));



                // raise the modal

                $("#form-modal").modal();

                $('#pass-container').hide();

                

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


            $.post('<?php echo base_url(); ?>' + 'index.php/user/user_update/' + id, $(this).serialize(), function(data, status){



                if(!data.error){

                    $.alert({

                        theme : 'black',

                        columnClass: 'col-md-6 col-md-offset-3',

                        keyboardEnabled: true,

                        title: 'Hey!',

                        content: data.success,

                        buttons: {

                            confirm: function(){

                               setTimeout(function(){

                                    // redraw the dataTable to see updates

                                    // myDataTable.fnDraw();

                                    fill_table();

                               }, 800)

                            }

                        }

                        

                    });

                }else{


                    $.dialog({

                        theme: 'black',

                        columnClass: 'col-md-6 col-md-offset-3',

                        title: 'Oops!',

                        content: data.error,

                    });

                }

                

            }, 'json'); //json here


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

            buttons: {

                cancel: function(){


                },

                confirm: function(){


                    $.post('<?php echo base_url(); ?>user/user_remove/' + id, {'POST': true}, function(data, status){

                        if(!data.error){

                            $.dialog({

                                theme: 'black',

                                columnClass: 'col-md-6 col-md-offset-3',

                                title: 'Hey!',

                                content: data.success

                            });

                            // redraw the dataTable to see updates

                            // myDataTable.fnDraw();

                            fill_table();

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

            }

        });

    });

    

    

    // other listeners

    $(document).on('change', '#department_name', function(){

        

        $('#dept_id').val($('#department_name').find(':selected').attr('data-id'));



    });



     $(document).on('change', '#user_role', function(){

        

        $('#role_id').val($('#user_role').find(':selected').attr('data-id'));



    });



    $(document).on('mouseup mousedown', '#show-pass', function(e){

        if (e.type == 'mousedown') {

            $('#user_pass').attr('type', 'text');

        } else {

            $('#user_pass').attr('type', 'password');

        };



    });





    // other functions

    function fill_table(){


        $.post('<?php echo base_url(); ?>' + 'index.php/user/list_fetch/', $(this).serialize(), function(data, status){

                var actions = null;



                if(!data.error){

                    myDataTable.clear();



                    data.forEach(function(item) { //insert rows



                        actions = '<a class="btn btn-info edit-btn my-ttip btn-sm" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="View/Edit" title=""><span class="fa fa-edit"></span></a>' +

                                '<a class="btn btn-danger delete-btn my-ttip btn-sm" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="Remove" title=""><span class="fa fa-trash"></span></a>';



                        myDataTable.row.add([item.email, /*item.last_login,*/ item.full_name,/* item.serial_number,*/ /*item.department_name,*/ item.role, actions]);

                        

                    })



                    myDataTable.draw();

                    


                }else{

                    // $.dialog({

                    //     theme: 'black',

                    //     columnClass: 'col-md-6 col-md-offset-3',

                    //     title: 'Oops!',

                    //     content: data.error,

                    // });

                }  



                

            }, 'json'); //json here



    }



    // fetch the data from the server

    myDataTable = $('#data-table').DataTable();



    // initialize tooltip

    // $('[data-toggle="tooltip"]').tooltip();   



  });

</script>