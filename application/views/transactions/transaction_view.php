<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaction List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id = "grand_total_text">0</h3>

                            <p>Total Income (<span id = "date"><?php  echo date("F j, Y", strtotime(date("y-m-d"))).'-'.date("F j, Y", strtotime(date("y-m-d"))); ?></span>)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-12" style = "color: #ccc">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id = "total_transactions">0<sup style="font-size: 20px"></sup></h3>

                            <p>Total Transactions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->
                
            </div>
            <!-- /.row -->
            <!-- Main row -->
                <div class="row">

                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
                </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
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
                                        <a class="btn btn-outline-info filter-btn float-right" href="javascript:void(0);" style =  "margin-right: 20px; margin-bottom: 20px;"><span class="fa fa-filter"></span> Filter Transactions</a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class = "col-12">
                                <table class = "table table" id = "data-table" style = "width: 100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>Total</th>
                                        <th>Date</th>
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

            
            <div class="row">
                <div class="col-6">
                    <label class="control-label" for="date_start">Date Start:<span class="required">*</span></label>
                    <input id="date_start" class="form-control date_start"  name="date_start" required="required" type="date">
                </div>
                <div class="col-6">
                    <label class="control-label" for="date_end">Date End<span class="required">*</span></label>
                    <input id="date_end" class="form-control date_end"  name="date_end" type="date">
                </div>
            </div>
            
            <br>
            <div class="row">
            	<div class = "col-6"></div>
            	<div class="col-3">
                    <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">Close</button>
                </div>
                <div class = "col-3">
                	<button type="submit" class="btn btn-outline-info btn-vessel btn-block">Filter</button>
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

    myDataTable = $('#data-table').DataTable({
        dom: 'lBfrtip',
        buttons: [
        'excel', 'csv', 'pdf', 'copy', 'print'
        ],
    });
    
    // loader('hide', '');


    // initialize the global id
    var id = null;
    
    // listen to add-btn
    $(document).on('click', '.filter-btn', function(){

        // set the title
        // $('.modal-title').html('Add New File');

        // raise the modal
        $("#form-modal").modal();

        // change the ID of the form based on the action
        $(".form-vessel").attr('id', 'form-filter');

        // reset the form
        $('.form-vessel')[0].reset();

        // change the text on the submit button
        $(".btn-vessel").html('Filter'); 

    });


    $(document).on('submit', '#form-filter', function(){

        event.preventDefault();

        loader('show', 'Fetching data. Please wait!');

        $.post('<?php echo base_url() ?>transactions/transaction_fetch', {date_start: $('#date_start').val()+' 00:00:00', date_end: $('#date_end').val()+' 23:59:59'}, function(data, status){

            var actions = null;
            var grand_total = 0;

            if(!data.error){

                

                myDataTable.clear();

                $('#total_transactions').text(data.total);

                data.success.forEach(function(item) { //insert rows

                    actions = 
                        '<a href="<?php echo base_url() ?>cashier/print_receipt/'+item.id+'" target = "_blank" class="btn btn-outline-info edit-btn btn-sm"><span class = "fa fa-receipt"></span></a>'
                        ;

                    grand_total += parseFloat(item.total);

                    myDataTable.row.add([ item.id, item.total, item.date_created,actions]);
                    
                });

                $('#grand_total_text').text(grand_total.toFixed(2));

                myDataTable.draw();
                

                 $('#data-table tbody').append(
                            '<tr>'+
                                '<td><b>Grand Total: </b></td>'+
                                '<td><b>'+grand_total+'</b></td>'+
                                '<td></td>'+
                                '<td></td>'+
                            '</tr>'
                        );
                loader('hide', '');

            }else{

                $.dialog({
                    theme: 'black',
                    columnClass: 'col-md-6 col-md-offset-3',
                    title: 'Oops!',
                    content: 'No data on selected date!',
                });

                loader('hide', '');
            }  

        }, 'json');


    });

    
    fill_table();

    function fill_table(){


        var today = '<?php echo date('Y-m-d') ?>';
        var grand_total = 0;

        $.post('<?php echo base_url(); ?>' + 'transactions/transaction_fetch/', {date_start: today, date_end: today},  function(data, status){

                var actions = null;
                var grand_total = 0;

                if(!data.error){

                    myDataTable.clear();

                    $('#total_transactions').text(data.total);


                    data.success.forEach(function(item) { //insert rows

                        actions =   
                        	'<a href="<?php echo base_url() ?>cashier/print_receipt/'+item.id+'" class="btn btn-outline-info edit-btn btn-sm"><span class = "fa fa-receipt"></span></a>'
                            ;

                    
                        myDataTable.row.add([ item.id, item.total, item.date_created,actions]);
                        
                        grand_total += parseFloat(item.total);

                    });


                    $('#grand_total_text').text(grand_total.toFixed(2));
                    
                    myDataTable.draw();

                    $('#data-table tbody').append(
                            '<tr>'+
                                '<td><b>Grand Total: </b></td>'+
                                '<td><b>'+grand_total.toFixed(2)+'</b></td>'+
                                '<td></td>'+
                                '<td></td>'+
                            '</tr>'
                        );
                    
                    loader('hide');



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