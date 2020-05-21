<?php  

	// echo "<h1>this is main view</h1>";


?>


<script src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js" type="text/javascript" ></script>


<div class="page-title">
    <div class="title_left">
        <h3>Manage Groups</h3>
    </div>
</div>

<?php #echo $this->input->ip_address(); ?>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
                <ul class="breadcrumb">
                    <li>Groups</li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <a class="btn btn-success add-btn pull-right" href="javascript:void(0);"><span class="glyphicon glyphicon-plus"></span>    Add New</a>
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">

                    <table id="data-table" class="display table" cellpadding="0" cellspacing="0" border="0"  width="100%">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- append here -->
                        </tbody>
                    </table>

                    <!-- View/Edit/Add Modal -->
                    <!-- Always hidden if not needed -->
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
                                        <input id="id" class="form-control col-xs-12" data-validate-length-range="1,45" name="id"  type="hidden" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="group_name">Group Name <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12 item">
                                        <input id="group_name" class="form-control col-xs-12" data-validate-length-range="3,45" name="group_name" required="required" type="text" value="">
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
            </div>
        </div>
    </div>
</div>
<?php #echo date_format(date_add(date_create('10/27/2016'), date_interval_create_from_date_string('1 days')), 'Y-m-d'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datatables/css/jquery.dataTables.css">
<style type="text/css">
.alert, #messages{
    display: none;
}
textarea{
    resize: vertical;
}

#data-table thead th:first-child{
    /*background-color: green;*/
}
</style>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    // initialize the global id
    var id = null;

    fill_table();

    // listen to add-btn
    $(document).on('click', '.add-btn', function(){

        // set the title
        $('.modal-title').html('Add New Group');

        // raise the modal
        $("#form-modal").modal();

        // change the ID of the form based on the action
        $(".form-vessel").attr('id', 'form-add');

        // reset the form
        $('form')[0].reset();

        // change the text on the submit button
        $(".btn-vessel").html('Insert'); 
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

            $.post('<?php echo base_url(); ?>' + '/user/group_add', $(this).serialize(), function(data, status){


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
                                $('.form-vessel')[0].reset();
                                
                                // redraw the dataTable to see updates
                                // myDataTable.fnDraw();
                                fill_table();

                                
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

                console.log(data);
                
            }, 'json'); //json here
        }
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

        $.post('<?php echo base_url(); ?>user/group_view/' + id, {'POST': true}, function(data, status){
            if(!data.error){
                // loop through the returned object
                $.each(data[0], function(key, value){
                    $('#' + key).val(value);
                    // console.log(value);
                })

                // raise the modal
                $("#form-modal").modal();
                
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

            $.post('<?php echo base_url(); ?>' + 'index.php/user/group_update/' + id, $(this).serialize(), function(data, status){

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
                                // myDataTable.fnDraw();
                                fill_table();
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
                $.post('<?php echo base_url(); ?>user/group_remove/' + id, {'POST': true}, function(data, status){
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

        $.post('<?php echo base_url(); ?>' + 'index.php/user/group_fetch/', $(this).serialize(), function(data, status){
                var actions = null;

                if(!data.error){
                    myDataTable.clear();

                    data.forEach(function(item) { //insert rows

                        actions = '<a class="btn btn-info edit-btn my-ttip" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="View/Edit" title=""><span class="glyphicon glyphicon-edit"></span></a>' +
                                '<a class="btn btn-info member-btn my-ttip" href="<?php echo base_url(); ?>user/members/' + item.id + '" data-toggle="tooltip" data-title="Members" title=""><span class="glyphicon glyphicon-list"></span></a>' +
                                '<a class="btn btn-danger delete-btn my-ttip" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="Remove" title=""><span class="glyphicon glyphicon-trash"></span></a>';

                        myDataTable.row.add([item.group_name, item.date_created, actions]);
                        
                    })

                    myDataTable.draw();


                }else{
                    loader('hide');
                    // $.dialog({
                    //     theme: 'black',
                    //     columnClass: 'col-md-6 col-md-offset-3',
                    //     title: 'Oops!',
                    //     content: data.error,
                    // });
                }  

                console.log(data);
                
            }, 'json'); //json here

    }

    // fetch the data from the server
    myDataTable = $('#data-table').DataTable();

    // initialize tooltip
    // $('[data-toggle="tooltip"]').tooltip();   
    

   

  });
</script>