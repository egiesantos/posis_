<?php  

	// echo "<h1>this is main view</h1>";


?>


<script src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js" type="text/javascript" ></script>


<div class="page-title">
    <div class="title_left">
        <h3><?php echo $group->group_name; ?></h3>
    </div>
</div>

<?php #echo $this->input->ip_address(); ?>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
                <ul class="breadcrumb">
                    <li><a class="active" href="<?php echo base_url(); ?>user/groups">Groups</a></li>
                    <li>Members</li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <a class="btn btn-success add-btn pull-right" href="javascript:void(0);"><span class="glyphicon glyphicon-plus"></span>    Add Members</a>
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">

                    <table id="data-table" class="display table" cellpadding="0" cellspacing="0" border="0"  width="100%">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Last Login</th>
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
                                    <div class="col-md-5 col-sm-5 col-xs-12 item">
                                        <label class="control-label" for="dept-list">Choose recipients </label>

                                        <select id="dept-list" class="form-control col-xs-12" name="dept-list">
                                            <?php 
                                                if ($departments != FALSE) {
                                                    foreach ($departments->result() as $row) {
                                                        echo '<option data-id="' . $row->dept_id . '">' . $row->department_name . '</option>';
                                                    }
                                                }
                                            ?>
                                        </select>

                                        <select id="choose-list" class="form-control col-xs-12 sel-list" name="choose-list" multiple>
                                            <!-- append here -->
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="text-align:center;">
                                        <br>
                                        <label class="control-label" for="received_by">Pick </label>
                                        <br>
                                        <a href="javascript:void(0);" class="btn btn-default pick-user"><i class="fa fa-arrow-right"></i></a>
                                        
                                        <br>

                                        <label class="control-label" for="received_by">Remove </label>
                                        <br>
                                        <a href="javascript:void(0);" class="btn btn-default remove-user"><i class="fa fa-arrow-left"></i></a>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12 item">
                                        <label class="control-label" for="recipient-list">List of</label>
                                        <br>
                                        <label class="control-label" for="recipient-list">Members To Add </label>
                                        <select id="recipient-list" class="form-control col-xs-12 sel-list" name="recipient-list" required="required" multiple>
                                            
                                        </select>
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

#recipient-list, #choose-list{
    margin-top: 10px;
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
    var group_id = '<?php echo $group_id; ?>';

    get_users_by_department($('#dept-list').find(':selected').attr('data-id'));
    fill_table();   

    // listen to add-btn
    $(document).on('click', '.add-btn', function(){

        // set the title
        $('.modal-title').html('Add New User');

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

            var post_values = [];

            $("#recipient-list > option").each(function() {
                post_values.push(
                        {
                            'group_id' : group_id,
                            'user_id' : $(this).attr('data-id')
                        }
                    );
            });

            $.post('<?php echo base_url(); ?>' + '/user/member_add', {'post_values' : post_values}, function(data, status){


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
                $.post('<?php echo base_url(); ?>user/member_remove/' + id, {'POST': true}, function(data, status){
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
    
    

    $(document).on('click', '.pick-user', function(){
        var option = ($('#choose-list').find(':selected'));

        $('#recipient-list').append(option);
    });

    $(document).on('click', '.remove-user', function(){
        var option = ($('#recipient-list').find(':selected'));

        $('#choose-list').append(option);
    });




    $(document).on('change', '#dept-list', function(){
        var dept_id = $(this).find(':selected').attr('data-id');

        get_users_by_department(dept_id);


    });


    function get_users_by_department(dept_id){

        $('#choose-list').html('');

        loader('show');

        $.post('<?php echo base_url(); ?>' + 'index.php/record/get_users_by_department/' + dept_id, {'post' : 'TRUE'}, function(data, status){

            if(!data.error){
                loader('hide');
                
                $('#choose-list').append(data.sel_options);
                // console.log(data.sel_options);
            }else{
                loader('hide');
                console.log(data.error);
            }

            
        }, 'json'); //json here

    } 


    // other functions
    function fill_table(){

        $.post('<?php echo base_url(); ?>' + 'index.php/user/member_fetch/' + group_id, $(this).serialize(), function(data, status){
                var actions = null;

                if(!data.error){
                    myDataTable.clear();

                    data.forEach(function(item) { //insert rows

                        actions = '<a class="btn btn-danger delete-btn my-ttip" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="Remove" title=""><span class="glyphicon glyphicon-trash"></span></a>';
                                

                        myDataTable.row.add([item.email, item.full_name, item.last_login, actions]);
                        
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