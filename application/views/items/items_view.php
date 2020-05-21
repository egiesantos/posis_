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
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class = "col-12 ">
                                    <br>
                                    <div class="button-container ">
                                        <a class="btn btn-outline-info add-btn float-right" href="javascript:void(0);" style =  "margin-right: 20px; margin-bottom: 20px;"><span class="fa fa-plus"></span> Add Item</a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class = "col-12">
                                <table class = "table table" id = "data-table" style = "width: 100%">
                                    <thead>
                                        <th>Category</th>
                                        <th>Common Name</th>
                                        <th>Description</th>
                                        <th>Brand</th>
                                        <th>Size/Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
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


<!-- View/Edit/Add Modal -->
<!-- Always hidden if not needed -->
<div id="form-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

        <!-- form -->
        <form class="form-horizontal form-label-left form-vessel" method="post">

            <input id="item_id" class="form-control item_id"  name="item_id" type="hidden">
            <div class="row">
                <div class="col-12">
                    <label class="control-label" for="cat_id">Category:<span class="required">*</span></label>
                    <select class = "form-control" id = "cat_id" name = "cat_id">
                        <?php if ($categories != FALSE): ?>
                            <?php foreach ($categories as $category): ?>
                                <option value = "<?php echo $category->cat_id?>"><?php echo $category->description.' ['.$category->code.']' ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label class="control-label" for="common_name">Common Name:<span class="required">*</span></label>
                    <input id="common_name" class="form-control common_name"  name="common_name" required="required" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="control-label" for="description">Description<span class="required">*</span></label>
                    <input id="description" class="form-control description"  name="description" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="control-label" for="brand">Brand:</label>
                    <input id="brand" class="form-control brand"  name="brand" type="text">
                </div>
                <div class="col-6">
                    <label class="control-label" for="size_type">Size/Type:</label>
                    <input id="size_type" class="form-control  size_type"  name="size_type" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="control-label" for="price">Price:</label>
                    <input id="price" class="form-control price"  name="price" type="text" required>
                </div>
                <div class="col-6" id = "quantity_row">
                    <label class="control-label" for="quantity">Quantity:</label>
                    <input id="quantity" class="form-control quantity"  name="quantity" type="number" required>
                </div>
                <!-- <div class="col-6" id = "update_all_row">
                    <label class="control-label" for="price">Update All:</label>
                    <select class = "form-control" id = "update_all" name = "update_all">
                        <option value = "no">No</option>
                        <option value = "yes">Yes</option>
                    </select>
                </div> -->
            </div>
            <br>
            <div class="row">
            	<div class = "col-6"></div>
            	<div class="col-3">
                    <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">Close</button>
                </div>
                <div class = "col-3">
                	<button type="submit" class="btn btn-outline-info btn-vessel btn-block">Submit</button>
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

    myDataTable = $('#data-table').DataTable();
    
    // loader('hide', '');


    // initialize the global id
    var id = null;
    
    // listen to add-btn
    $(document).on('click', '.add-btn', function(){

        // set the title
        // $('.modal-title').html('Add New File');

        // raise the modal
        $("#form-modal").modal();

        // change the ID of the form based on the action
        $(".form-vessel").attr('id', 'form-add');

        // reset the form
        $('.form-vessel')[0].reset();

        // change the text on the submit button
        $(".btn-vessel").html('Insert'); 

        $('#update_all_row').hide();
        $('#quantity_row').show();

        $('#quantity').attr('required', 'required');
    });

    $(document).on('submit', '#form-add', function(){

    	event.preventDefault();
 
        loader('show', 'Adding Data...');

    	$.post('<?php echo base_url() ?>items/item_add',$(this).serialize(), function(data, status){

    		if(!data.error)
    		{
    			$.dialog({
		            theme: 'black',
		            columnClass: 'col-md-6 col-md-offset-3',
		            title: 'Hey!',
		            content: 'Total Item(s) Added: '+ data.success,
		        });

                $("#form-modal").modal('hide');

                fill_table();

                loader('hide', '');
    		}
    		else
    		{
    			$.dialog({
		            theme: 'black',
		            columnClass: 'col-md-6 col-md-offset-3',
		            title: 'Oops!',
		            content: data.error,
		        });
    		}

    	}, 'json');


    });

    
    // listen to edit-btn
    $(document).on('click', '.edit-btn', function(){

        loader('show', 'Fetching Data...');


        // set the title
        // $('.modal-title').html('Update record');      

        // change the ID of the form based on the action
        $(".form-vessel").attr('id', 'form-edit'); 

        // reset the form
        $('form')[0].reset();

        // change the text on the submit button
        $(".btn-vessel").html('Update');     

        $('.file-holder').hide();
        // fetch the specific record


        $('#quantity_row').hide();
        $('#update_all_row').show();

        $('#quantity').removeAttr('required');

        id = $(this).attr('data-id');

        $.post('<?php echo base_url(); ?>items/item_view/' + id, {'POST': true}, function(data, status){
            

            if(!data.error){

                // loop through the returned object
                $.each(data, function(key, value){
                    $('#' + key).val(value);
                })

                // raise the modal
                $("#form-modal").modal();

                loader('hide', '');
                // disable to primary key textbox
                // $('#dept_id').attr('readonly','readonly');
                
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

            loader('show', 'Updating Data...');

            var id = $('#item_id').val();

            $.post('<?php echo base_url(); ?>items/item_update/' + id, $(this).serialize(), function(data, status){

                if(!data.error){
                    $.alert({
                        theme : 'black',
                        columnClass: 'col-md-6 col-md-offset-3',
                        keyboardEnabled: true,
                        title: 'Hey!',
                        content: data.success,
                        buttons: {
                            confirm: function(){

                               fill_table();

                               $("#form-modal").modal('hide');

                               loader('hide', '');
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

        event.preventDefault();
    });


    // listen to delete-btn -> DELETE
    $(document).on('click', '.remove-btn', function(){
        
        var id = $(this).attr('data-id');

        loader('show', 'Removing Data');

        $.confirm({
            theme : 'black',
            columnClass: 'col-md-6 col-md-offset-3',
            keyboardEnabled: true,
            autoClose: 'cancel|6000',
            title: 'Wait!',
            content: 'Are you sure you want to delete this record ?',
            buttons: {
                cancel: function(){
                    loader('hide', '');
                },
                confirm: function(){

                    $.post('<?php echo base_url(); ?>items/item_remove/' + id, {'POST': true}, function(data, status){
                        if(!data.error){
                            $.dialog({
                                theme: 'black',
                                columnClass: 'col-md-6 col-md-offset-3',
                                title: 'Hey!',
                                content: data.success
                            });
                            // redraw the dataTable to see updates
                            
                            fill_table();

                            loader('hide', '');
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



    // myDataTable = $('#data-table').dataTable({
    //     "bProcessing": true,
    //     "bServerSide": true,
    //     "sServerMethod": "GET",
    //     "sAjaxSource": "<?php echo base_url() ?>config/category_fetch/",
    //     "aoColumns": [
    //     { "bVisible": false, "bSearchable": true, "bSortable": true },
    //     { "bVisible": true, "bSearchable": true, "bSortable": true },
    //     { "bVisible": true, "bSearchable": true, "bSortable": true },
    //     ],

    //     "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {

    //           // $('td:eq(0)', nRow).after( $('<td class="action-group">' +

    //           //   aData[2] + ' ' + aData[3] + ' ' + aData[4] + '</td>') );

    //           // $.post('<?php echo base_url() ?>individual/check_tags/'+aData[0], {POST:true}, function(data, status){
                    

    //           //       $('td:eq(5)', nRow).after('<td>'+data+'</td>');
    //           // })

    //           $('td:eq(1)', nRow).after( $('<td class="action-group">' +
                    
    //                 '<button type="button" class="btn btn-outline-info btn-sm edit-btn" data-id = '+aData[0]+' style  = "margin-right: 2px;"><span class = "fa fa-edit"></span> </button>' +
    //                 '<button type="button" class="btn btn-outline-danger btn-sm remove-btn" data-id = '+aData[0]+'><span class = "fa fa-trash"></span> </button>' +  
    //             + '</td>') );

    //         }

    // });

    
    fill_table();

    function fill_table(){

        $.post('<?php echo base_url(); ?>' + 'items/item_fetch/', {},  function(data, status){

                console.log(data);
                var actions = null;
                var status = null;

                if(!data.error){

                    myDataTable.clear();

                    data.success.forEach(function(item) { //insert rows

                        actions = 
                        	'<button type="button" data-id = "'+item.item_id+'" class="btn btn-outline-info edit-btn btn-sm"><span class = "fa fa-edit"></span></button>'+
                        	'<button type="button" data-id = "'+item.item_id+'" class="btn btn-outline-danger remove-btn btn-sm"><span class = "fa fa-trash"></span></button>'
                            ;

                        if(item.is_sold == 1)
                        {
                            status = "<span style = 'color: green'> Sold </span>";
                        }
                        else
                        {
                            status = "<span style = 'color: red'> Available </span>";
                        }

                        myDataTable.row.add([ item.c_desc+' ['+item.code+']', item.common_name, item.i_desc, item.brand, item.size_type, item.price, status,actions]);
                        
                    });

                    myDataTable.draw();
                    
                    // loader('hide');

                }else{
                    // $.dialog({
                    //     theme: 'black',
                    //     columnClass: 'col-md-6 col-md-offset-3',
                    //     title: 'Oops!',
                    //     content: data.error,
                    // });
                }  

                
            },'json'); //json here

        }
        
        
    
  });
</script>