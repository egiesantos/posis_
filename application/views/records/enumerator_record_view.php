<?php  

    // echo "<h1>this is main view</h1>";


?>


<script src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js" type="text/javascript" ></script>

<div class="page-title">
    <div class="title_left">
        
        <h3><?php echo $main_view_data['enumerator_info'][0]->first_name.' '.$main_view_data['enumerator_info'][0]->last_name?> Records</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
                <!-- <ul class="breadcrumb">
                    <li>Enumerators</li>
                </ul>
                <div class="clearfix"></div> -->
            </div>
            <div class="x_content">
                
                <!-- CHART SECTION -->
                <div class = "well">
                     <canvas id="myChart" width="400" height="160"></canvas>
                </div>
                <div class = "well col-md-12 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <a class = "btn btn-info pull-right" href = "<?php echo base_url() ?>record/enumerator_print_csv/<?php echo $this->uri->segment(3) ?>" style = "margin-bottom: 20px"><span class = "fa fa-download"></span> Download CSV</a>
                    </div>
                    <div class="table-responsive">
                         
                        <table id="chart-table" class="display table" cellpadding="0" cellspacing="0" border="0"  width="100%">
                            <thead>
                                <tr>
                                    <th>Date Profiled</th>
                                    <th>Total</th>
                                    <th>Approved</th>
                                    <th>For Approval</th>
                                    <th>Computed Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class = "well col-md-12 col-sm-12 col-xs-12 ">

                    <div class="table-responsive">
                        <table id="data-table" class="display table" cellpadding="0" cellspacing="0" border="0"  width="100%">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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

    
        fill_table();

        function fill_table(){

        var id = '<?php echo $this->uri->segment(3) ?>';

        $.post('<?php echo base_url(); ?>' + 'index.php/record/enumerator_record_fetch/'+ id, {POST: true}, function(data, status){
                var actions = null;

                //console.log(data)
                if(!data.error){
                    enumeratorDataTable.clear();

                    data.forEach(function(item) { //insert rows

                        actions =
                            '<a class="btn btn-info my-ttip" href="<?php echo base_url(); ?>record/profile_info/' + item.id + '" data-index="' + item.user_id + '" data-toggle="tooltip" data-title="See Details" title=""><span class="glyphicon glyphicon-eye-open"></span></a>' 
                            ;

                        enumeratorDataTable.row.add([item.firstname+' '+item.middlename+' '+item.lastname , item.email, item.mobile_no,actions]);
                        
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

    chart_table();

    function chart_table()
    {

        var id = '<?php echo $this->uri->segment(3) ?>';

        $.post('<?php echo base_url(); ?>' + 'index.php/record/get_chart_data/'+id, {POST: true}, function(data, status){
                var actions = null;

                //console.log(data)
                if(!data.error){
                    chartDataTable.clear();

                    data.forEach(function(item) { //insert rows


                        actions =
                            '<a class="btn btn-info my-ttip" href="<?php echo base_url(); ?>record/daily_record/' + item.date_ + '?id='+id+'" data-index="' + item.date_ + '" data-toggle="tooltip" data-title="See Details" title=""><span class="glyphicon glyphicon-eye-open"></span></a>' 
                            ;
                        
                        var computed_salary = item.approved*18;
                        var for_approval = item.total-item.approved;

                        console.log(item.approved);

                        chartDataTable.row.add([item.date_profiled, item.total, item.approved, for_approval, computed_salary ,actions]);
                        
                    })

                    chartDataTable.draw();

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

    chartDataTable = $('#chart-table').DataTable({"bSort" : false});

    get_chart_data();

    function get_chart_data()
    {
        var id = '<?php echo $this->uri->segment(3) ?>'
        $.ajax({
            url: "<?php echo base_url(); ?>record/get_chart_data/"+ id,
            method: "GET",
            success: function(data) {


                //console.log(data);
                var result = JSON.parse(data)
                var date = [];
                var total = [];
                var colors = ['#1abc9c','#2ecc71','#3498db','#9b59b6','#16a085','#27ae60','#2980b9','#8e44ad','#f1c40f','#e67e22','#e74c3c','#ecf0f1','#f39c12','#d35400','#c0392b','#bdc3c7','#F9690E','#1abc9c','#2ecc71','#3498db','#9b59b6','#16a085','#27ae60','#2980b9','#8e44ad','#f1c40f','#e67e22','#e74c3c','#ecf0f1','#f39c12','#d35400','#c0392b','#bdc3c7','#F9690E','#1abc9c','#2ecc71']

                for(var i in result)
                {
                    date.push(result[i].date_profiled);
                    total.push(result[i].total);
                };
                
                //console.log(total);
                
                var data = {
                    datasets: [{
                        labels: date,
                        label: 'Daily Profile Chart',
                        data: total,
                        //backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: '#1abc9c',
                        backgroundColor: 'rgba(75,192,192,0)'

                    }],
                   
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: date
                };
                // Get the context of the canvas element we want to select
                var ctx = $("#myChart").get(0).getContext("2d");

                var myPieChart = new Chart(ctx,{
                    type: 'line',
                    data: data
                });
            }
            });
    }

    // $('#download-csv').click(function(){
    //     $.post('<?php echo base_url(); ?>' + 'index.php/record/enumerator_print_csv/', {POST: true}, function(data, status){

    //             if(!data.error){
                    

    //             }else{
    //                 loader('hide');
    //                 // $.dialog({
    //                 //     theme: 'black',
    //                 //     columnClass: 'col-md-6 col-md-offset-3',
    //                 //     title: 'Oops!',
    //                 //     content: data.error,
    //                 // });
    //             }  

                
    //         },'json'); //json here
    // });

    

});

    
</script>
