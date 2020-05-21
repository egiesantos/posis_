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
                                        Trasaction Offered
                                    </h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Transations</li>
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
                   
                                        <!-- <a class="btn btn-outline-success btn-sm pull-right" href="<?php echo base_url() ?>record/paymaya_print_csv"><span class="fa fa-print"></span></a> -->

                                    <?php endif ?>

                                    <table class = "table" id = "data-table">
                                        <thead>
                                            <tr>
                                                <th>Transaction Name</th>
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
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Title</h4>
                          </div>
                          <div class="modal-body">

                            <form class="form-horizontal form-label-left form-vessel" method = "POST" enctype = "multipart/form-data" action = "<?php echo base_url(); ?>record/profile_add" novalidatea>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 item">
                                            <label class="" for="firstname">Transaction Name<span class="required">*</span></label>
                                            <input id="firstname" class="form-control col-xs-12" data-validate-length-range="2,45" name="firstname" placeholder="Transaction Name" required="required" type="text" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="pull-right">
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
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script> -->
<script type="text/javascript">
    $(document).on('click', '.add-btn', function(){

        // set the title
        $('.modal-title').html('Add New Transaction');

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
                    // loader('hide');
                    // $.dialog({
                    //     theme: 'black',
                    //     columnClass: 'col-md-6 col-md-offset-3',
                    //     title: 'Oops!',
                    //     content: data.error,
                    // });
                    alert(data.error)
                }

                // console.log(data);
                
            }, 'json'); //json here
        }
        // return false;

        event.preventDefault();
    });
    
    fill_table();

    function fill_table(){

        $.post('<?php echo base_url(); ?>' + 'index.php/record/services_fetch/', $(this).serialize(), function(data, status){
                var actions = null;
                //console.log(data.id);
                if(!data.error){

                    myDataTable.clear();

                    data.forEach(function(item) { //insert rows

                        actions = '<a class="btn btn-info edit-btn my-ttip" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="View/Edit" title=""><span class="glyphicon glyphicon-edit"></span></a>' +
                                '<a class="btn btn-danger delete-btn my-ttip" href="javascript:void(0);" data-index="' + item.id + '" data-toggle="tooltip" data-title="Remove" title=""><span class="glyphicon glyphicon-trash"></span></a>';

                        myDataTable.row.add([item.service_name, actions]);
                        
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

                
            }, 'json'); //json here

    }

    myDataTable = $('#data-table').Datatable();

</script>
