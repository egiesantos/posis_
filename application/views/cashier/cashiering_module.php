<style type="text/css">

    @font-face {
        font-family: seven_segment;
        src: url('<?php echo base_url() ?>assets/DJB_Get_Digital.ttf');
    }
	.card
	{
		padding: 20px;
	}

    .total
    {
        background-color: #000;
        text-align: right;
        font-family: seven_segment;
        font-size: 50px;
        color: #00c0ef; 
    }
</style>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cashiering Module</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">

				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Cashiering Module</li>
				</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->


	<section class="content">
        <div class="container-fluid">
            <div class="row">
            	<div class = "col-4">
                    <div class = "card total" id = "total">
                        0.00
                    </div>
            		<div class = "card">
                        
            			<table class = "table table" id = "item-list">
            				<thead>
            					<th>Item</th>
            					<th>Price</th>
            					<th>Quantity</th>
            					<th></th>
            				</thead>
                            <tbody>
                                
                            </tbody>
            			</table>

                        <div class = "col-12">
                            <button class = "btn btn-success btn-block" id = "save-btn"> Submit <span class = "fa fa-arrow-right"></span></button>
                        </div>
            		</div>
            	</div>
                <div class="col-8">
                	<div class="card" style = "padding: 20px">
        				<h4>Items List</h4>

        				<table class = "table table-hover" id="data-table">
        					<thead>
        						<th>Common Name</th>
        						<th>Description</th>
        						<th>Brand</th>
        						<th>Size</th>
        						<th>Category</th>
        						<th>Stock</th>
        						<th>Amount</th>
        						<th>Action</th>
        					</thead>

        					<?php if ($items != FALSE): ?>
        						<?php foreach ($items as $item): ?>
        							<tr id = "<?php echo str_replace([' ','.'], '', $item->common_name.$item->description.$item->brand.$item->size_type.$item->category. $item->price) ?>" data-id = "<?php echo $item->item_id ?>">
        								<td id = "<?php echo str_replace([' ','.'], '', $item->common_name.$item->description.$item->brand.$item->size_type.$item->category. $item->price) ?>_name"><?php echo $item->common_name; ?></td>
        								<td><?php echo $item->description; ?></td>
        								<td><?php echo $item->brand; ?></td>
        								<td><?php echo $item->size_type; ?></td>
        								<td><?php echo $item->category; ?></td>
        								<td id = "<?php echo str_replace([' ','.'], '', $item->common_name.$item->description.$item->brand.$item->size_type.$item->category. $item->price) ?>_stack"><?php echo $item->stock; ?></td>
        								<td id = "<?php echo str_replace([' ','.'], '', $item->common_name.$item->description.$item->brand.$item->size_type.$item->category. $item->price) ?>_price"><?php echo $item->price; ?></td>
        								<td id = "<?php echo str_replace([' ','.'], '', $item->common_name.$item->description.$item->brand.$item->size_type.$item->category. $item->price) ?>_button">
                                            <button class = "btn btn-outline-primary btn-sm" id = "add-item"><span class = "fa fa-plus"></span></button></td>
        							</tr>
        						<?php endforeach ?>
        					<?php endif ?>
        				</table>
					</div>
    			</div>
    		</div>
        		
        	
        </div>
    </section>

</div>


<script type="text/javascript">
	$(document).ready(function(){

        $('#data-table').dataTable();
        // add item
        $(document).on('click', '#add-item', function(){

            var id = $(this).parent().parent().attr('id'); // 

            var item_id =  $(this).parent().parent().attr('data-id');

            if($('#item-list >tbody >tr').length == 0) //if item does not exist in the  item list
            {
                $('#item-list tbody').append(
                    '<tr id = "'+id+'" data-id = "'+item_id+'">'+
                        '<td id = "item_list_name">'+$('#'+id+'_name').text()+'</td>'+
                        '<td id = "item_list_price"><input type="text" name = "item_list_price_text" class = "form-control item_list_price_text" value="'+$('#'+id+'_price').text()+'" readonly></td>'+
                        '<td id = "item_list_quantity"><input type="number" name="item_list_quantity_text" class="form-control item_list_quantity_text" value="1" readonly></td>'+
                        '<td><button class = "btn btn-danger btn-sm" id = "remove-btn"><span class = "fa fa-times"></span></button></td>'+
                    '</tr>'
                );
                
                if(parseInt($('#'+id+'_stack').text()) > 1)
                {
                    $($('#'+id+'_stack').text(parseInt($('#'+id+'_stack').text())-1));
                }
                else
                {
                    $(this).attr('disabled', 'disabled');

                    $('#'+id+'_stack').text('0');
                }
                
            }
            else //if item exist in the  item list
            {   

                var id_checker = 0;

                $('#item-list tbody tr').each(function(){

                    if(id == $(this).attr('id'))
                    {      

                        id_checker += 1;

                    }

                });

                if(id_checker != 0)
                {
                    $('#item-list tbody #'+id+' #item_list_price .item_list_price_text').val((parseFloat($('#item-list tbody #'+id+' #item_list_price .item_list_price_text').val())+parseFloat($('#'+id+'_price').text())).toFixed(2));


                    $('#item-list tbody #'+id+' #item_list_quantity .item_list_quantity_text').val(parseFloat($('#item-list tbody #'+id+' #item_list_quantity .item_list_quantity_text').val())+parseFloat(1));
                }
                else
                {
                    $('#item-list tbody').append(
                        '<tr id = "'+id+'"  data-id = "'+item_id+'">'+
                            '<td id = "item_list_name">'+$('#'+id+'_name').text()+'</td>'+
                            '<td id = "item_list_price"><input type="text" name = "item_list_price_text" class = "form-control item_list_price_text" value="'+$('#'+id+'_price').text()+'" readonly></td>'+
                            '<td id = "item_list_quantity"><input type="number" name="item_list_quantity_text" class="form-control item_list_quantity_text" value="1" readonly></td>'+
                            '<td><button class = "btn btn-danger btn-sm" id = "remove-btn"><span class = "fa fa-times"></span></button></td>'+
                        '</tr>'
                    );
                }

                if(parseInt($('#'+id+'_stack').text()) > 1)
                {
                    $($('#'+id+'_stack').text(parseFloat($('#'+id+'_stack').text())-1));
                    
                }
                else
                {
                    $(this).attr('disabled', 'disabled');

                    $('#'+id+'_stack').text('0');
                }

            }

            total();
        }); 

		// remove item on selected item table
		$(document).on('click', '#remove-btn', function(){
			

            var id =  $(this).parent().parent().attr('id');

            var remaining_stack = $('#data-table tbody #'+id+' #'+id+'_stack').text();
            var selected_item = $('#item-list tbody #'+id+' #item_list_quantity .item_list_quantity_text').val();
            var total_stack = parseFloat(remaining_stack)+parseFloat(selected_item);

            $('#data-table tbody #'+id+' #'+id+'_stack').text(total_stack);

            
            $(this).parent().parent().remove();

            total();

            $('#data-table tbody #'+id+' #'+id+'_button #add-item').attr('disabled', false);
		});



        $(document).on('click', '#save-btn', function(){


            
      
            if($('#item-list >tbody >tr').length == 0)
            {
                $.alert({
                    theme: 'black',
                    title: 'Oops!',
                    content: 'Select item first!'
                });
            }
            else
            {   
                loader('show', 'Saving data. Please wait!');
                var id = '#item-list tbody tr';
                var collected_data = [];


                $('#item-list tbody tr').each(function(){

                    var  tr_id = $(this).attr('id');

                    var values = {
                        'item_id' : $(this).attr('data-id'),
                        'item_name' : $('#'+tr_id+' #item_list_name').text(),
                        'item_price' : $('#'+tr_id+' #item_list_price .item_list_price_text').val(),
                        'item_quantity' : $('#'+tr_id+' #item_list_quantity .item_list_quantity_text').val(),
                        'transaction_total' : $('#total').text()
                    }

                    collected_data.push(values);

                });

                var data_to_pass = {
                    'collected_data' : collected_data
                };

                $.post('<?php echo base_url() ?>cashier/save_transaction', data_to_pass, function(data, status){

                    if(!data.error)
                    {
                        $.dialog({
                            theme: 'black',
                            title: 'Yey!',
                            content: data.success
                        });

                        window.open('<?php echo base_url() ?>cashier/print_receipt/'+ data.transaction_id, '_blank');

                        setTimeout(function(){
                            location.reload();
                        }, 800)
                        
                    }
                    else
                    {
                        $.alert({
                            theme: 'black',
                            title: 'Oops!',
                            content: data.error
                        });
                    }

                }, 'json');

            }
            

        });


        function total()
        {

            var grand_total = 0;

            $('#item_list_price .item_list_price_text').each(function(){

                grand_total += parseFloat($(this).val());

            });

            $('#total').text(grand_total.toFixed(2));
        }

	});
</script>