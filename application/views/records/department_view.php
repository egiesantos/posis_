
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
                        <h4 class="page-title">Manage Departments</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="button-container">
                            <a class="btn btn-outline-success btn-sm add-btn pull-right" href="javascript:void(0);"><span class="fa fa-plus"></span> Add New</a>
                        </div>

                        <br>
                        <!-- <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"> -->
                            <table id="data-table" class="table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Abbreviation</th>
                                        <th>Department Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        <!-- </div> -->
                    </div>
                </div>
            </div> <!-- end row -->

            
        </div>
        <!-- end container -->
    </div>
    <!-- end content -->

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


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
                    <input id="dept_id" class="form-control col-xs-12" data-validate-length-range="1,45" name="dept_id"  type="hidden" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="dept_alias">Abbreviation <span class="required">*</span></label>
                <div class="col-md-12 col-sm-12 col-xs-12 item">
                    <input id="dept_alias" class="form-control col-xs-12" data-validate-length-range="3,45" name="dept_alias" required="required" type="text" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="department_name">Department Name <span class="required">*</span></label>
                <div class="col-md-12 col-sm-12 col-xs-12 item">
                    <input id="department_name" class="form-control col-xs-12" data-validate-length-range="3,100" name="department_name" required="required" type="text" value="">
                </div>
            </div>
            
            <div class="ln_solid"></div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        <button id="send" type="submit" class="btn btn-primary btn-vessel pull-right">Submit</button>
                    </div>
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



<style type="text/css">
/*css here*/
</style>

<script type="text/javascript">
  $(document).ready(function(){

    // initialize the global id
    var id = null;

    
    // listen to add-btn
    $(document).on('click', '.add-btn', function(){

        // set the title
        $('.modal-title').html('Add New Department');

        // raise the modal
        $("#form-modal").modal();

        // change the ID of the form based on the action
        $(".form-vessel").attr('id', 'form-add');

        // reset the form
        $('form')[0].reset();

        // change the text on the submit button
        $(".btn-vessel").html('Insert'); 

        // enable to primary key textbox
        $('#dept_id').removeAttr('readonly');

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

            $.post('<?php echo base_url(); ?>' + '/record/department_add', $(this).serialize(), function(data, status){


                if(!data.error){
                    $.alert({
                        theme : 'black',
                        columnClass: 'col-md-6 col-md-offset-3',
                        keyboardEnabled: true,
                        title: 'Hey!',
                        content: data.success,
                        buttons: {
                          confirm: function(){
                               loader('hide');
                               setTimeout(function(){
                                   
                                    // reset the form
                                    $('.form-vessel')[0].reset();
                                    // redraw the dataTable to see updates
                                    myDataTable.fnDraw();

                                    
                               }, 800)

                            }  
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
                
            },'json'); //json here
        }
        // return false;

        event.preventDefault();
    });
    
    // listen to edit-btn
    $(document).on('click', '.edit-btn', function(){
        loader('show');
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

        $.post('<?php echo base_url(); ?>record/department_view/' + id, {'POST': true}, function(data, status){
            if(!data.error){
                loader('hide');

                // loop through the returned object
                $.each(data, function(key, value){
                    $('#' + key).val(value);
                })

                // raise the modal
                $("#form-modal").modal();
                
                // disable to primary key textbox
                $('#dept_id').attr('readonly','readonly');
                
                console.log(data);
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

            $.post('<?php echo base_url(); ?>' + 'index.php/record/department_update/' + id, $(this).serialize(), function(data, status){

                if(!data.error){
                    $.alert({
                        theme : 'black',
                        columnClass: 'col-md-6 col-md-offset-3',
                        keyboardEnabled: true,
                        title: 'Hey!',
                        content: data.success,
                        buttons: {
                            confirm: function(){
                               loader('hide');
                               setTimeout(function(){
                                    // redraw the dataTable to see updates
                                    myDataTable.fnDraw();
                               }, 800)
                            }
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
            buttons: {
                cancel: function(){
                    loader('hide');
                },
                confirm: function(){
                    loader('hide');
                    $.post('<?php echo base_url(); ?>record/department_remove/' + id, {'POST': true}, function(data, status){
                        if(!data.error){
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
            }
            
        });
    });
    
    
    // other listeners

    // other functions

    // fetch the data from the server
    myDataTable = $('#data-table').dataTable({
        "bProcessing": true,
            "bServerSide": true,
            "sServerMethod": "GET",
            "sAjaxSource": "<?php echo base_url() ?>record/department_fetch",
            "aoColumns": [
            { "bVisible": true, "bSearchable": true, "bSortable": true },
            { "bVisible": true, "bSearchable": true, "bSortable": true },
            { "bVisible": true, "bSearchable": true, "bSortable": true }
            ],
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                  // object[column_index]
                  // this will add action buttons for each row of the data

                  // then will append new column for action links
                  $('td:eq(2)', nRow).after( $('<td class="action-group">' +
                    '<a class="btn btn-info edit-btn my-ttip" href="javascript:void(0);" data-index="' + aData[0] + '" data-toggle="tooltip" data-title="View/Edit" title=""><span class="fa fa-edit"></span></a>' +
                    '<a class="btn btn-danger delete-btn my-ttip" href="javascript:void(0);" data-index="' + aData[0] + '" data-toggle="tooltip" data-title="Remove" title=""><span class="fa fa-trash"></span></a>' +
                    '</td>') );
                }
    });

    // initialize tooltip
    // $('[data-toggle="tooltip"]').tooltip();   
    

   

  });
</script>
