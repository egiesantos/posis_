<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Items Summary</h1>
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
                                    </thead>
                                    <tbody>
                                        <?php if ($item_details != FALSE): ?>
                                            <?php foreach ($item_details as $data): ?>
                                                <tr>
                                                    <td><?php echo $data->c_desc ?></td>
                                                    <td><?php echo $data->common_name ?></td>
                                                    <td><?php echo $data->i_desc ?></td>
                                                    <td><?php echo $data->brand ?></td>
                                                    <td><?php echo $data->size_type ?></td>
                                                    <td><?php echo $data->price ?></td>
                                                    <td><?php echo $data->is_sold ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif ?>
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
        <form class="form-horizontal form-label-left form-vessel" method="post" action = "<?php echo base_url() ?>items/item_summary" autocomplete="off">

            <div class="row">
                <div class="col-12">
                    <label class="control-label" for="date_sold">Date Sold :<span class="required">*</span></label>
                    <input id="date_sold" class="form-control date_sold"  name="date_sold" required="required" type="text">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label class="control-label" for="date_stocked">Date Stocked :<span class="required">*</span></label>
                    <input id="date_stocked" class="form-control date_stocked"  name="date_stocked" required="required" type="text">
                </div>
                
            </div>
            
            <br>
            <div class="row">
                <div class = "col-6"></div>
                <div class="col-3">
                    <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">Close</button>
                </div>
                <div class = "col-3">
                    <button type="submit" class="btn btn-outline-info btn-vessel btn-block" name = "submit">Filter</button>
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

    $('#date_sold, #date_stocked').daterangepicker({
        locale: {
            format: 'YYYY/M/DD'
        }
    });

    myDataTable = $('#data-table').dataTable({
        dom: 'lBfrtip',
        buttons: [
        'excel', 'csv', 'pdf', 'copy', 'print'
        ],
    });
    


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
    
    
  });
</script>