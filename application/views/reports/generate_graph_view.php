
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->        
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/chart.min.js"></script>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">See Filter Result</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/index">List of Forms for Filtering</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/filter/<?php echo $form_id; ?>">Filter Data</a></li>
                            <li class="breadcrumb-item active">Generated Graph</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div> -->
            
            <div class="row">
                <div class="col-6 mx-auto" align="center">
                    <h3><?php echo $this->config->item('report-titles')[0]; ?></h3>
                    <h4><?php echo $this->config->item('report-titles')[1];; ?></h4>
                    <h4><?php echo $this->config->item('report-titles')[2];; ?> for </h4>
                    <h4><?php echo ($form != FALSE) ? $form->form_title : 'Individuals'; ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mx-auto">

                    <div class="">
                        <script type="text/javascript">
                            var charts = [];
                        </script>
                        <?php $chart_counter = 0; ?>
                        <?php foreach ($labels_group as $labels): ?>
                            
                            <div id="myChart_<?php echo $chart_counter; ?>">
                                <div class="pull-right">
                                    <select class="form-control chart-type" data-chart-name="myChart_<?php echo $chart_counter; ?>" data-ctx="generated-chart-<?php echo $chart_counter; ?>">
                                        <option value="bar">BAR</option>
                                        <option value="line">LINE</option>
                                        <option value="radar">RADAR</option>
                                        <option value="doughnut">DOUGHNUT</option>
                                    </select>
                                    <label class="chart-labels"><?php echo json_encode($labels); ?></label>
                                    <label class="chart-datasets"><?php echo json_encode($datasets_group[$chart_counter]); ?></label>
                                </div>
                                <canvas id="generated-chart-<?php echo $chart_counter; ?>" width="400" height="100"></canvas>
                                <table class="table table-striped">
                                    <?php #echo '<pre>' . var_dump($datasets_group[$chart_counter]) . '</pre>'; ?>
                                    <thead>
                                        <tr>
                                            <th>Field Value</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <?php $idx = 0; ?>
                                    <?php foreach ($labels as $label): ?>
                                        <tr>
                                            <td><?php echo $label; ?></td>
                                            <td><?php echo $datasets_group[$chart_counter][0]['data'][$idx]; ?></td>
                                        </tr>
                                        <?php $idx+=1; ?>
                                    <?php endforeach ?>
                                </table>
                            </div>

                            <div class="dropdown-divider"></div>

                            <script type="text/javascript">
                                $(document).ready(function(){
                                    
                                    var ctx = $("#generated-chart-<?php echo $chart_counter; ?>");

                                    charts['myChart_' + <?php echo $chart_counter; ?>] = myChart_<?php echo $chart_counter; ?> = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: $.parseJSON('<?php echo json_encode($labels); ?>'),
                                            // datasets: [{
                                            //     label: '<?php #echo $graph_title; ?>',
                                            //     data: $.parseJSON('<?php #echo json_encode($values); ?>'),
                                            //     // backgroundColor: [
                                            //     //     'rgba(255, 99, 132, 0.2)'
                                            //     // ],
                                            //     // borderColor: [
                                            //     //     'rgba(255,99,132,1)'
                                            //     // ],
                                            //     borderWidth: 1
                                            // }],
                                            datasets: $.parseJSON('<?php echo json_encode($datasets_group[$chart_counter]); ?>')
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero:true
                                                    }
                                                }]
                                            }
                                        }
                                    });


                                })
                            </script>

                        <?php $chart_counter+=1; ?>
                        <?php endforeach ?>

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






<style type="text/css">
/*css here*/
.table-responsive{
    /*overflow-x: scroll;*/
    min-height: 500px;
}
.button-container{
    margin-bottom: 15px;
}

.chart-labels, .chart-datasets{
    color: #ffffff;
    display: none;
}

@media print{
    body{
        zoom: 0.6;
    }
}
</style>


<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change', '.chart-type', function(){
            var chart_name = $(this).attr('data-chart-name');
            var chart_ctx = $(this).attr('data-ctx');

            var chart_labels = $(this).parent().parent().find('.chart-labels').text();
            var chart_datasets = $(this).parent().parent().find('.chart-datasets').text();

            var chart_type = $(this).val();
            var ctx = $("#" + chart_ctx);

            charts[chart_name].destroy();
            $('#' + chart_ctx).html('');

            if (chart_type == 'bar') {

                charts[chart_name] = new Chart(ctx, {
                    type: chart_type,
                    data: {
                        labels: $.parseJSON(chart_labels),
                        datasets: $.parseJSON(chart_datasets)
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });

            } else if (chart_type == 'line'){

                charts[chart_name] = new Chart(ctx, {
                    type: chart_type,
                    data: {
                        labels: $.parseJSON(chart_labels),
                        datasets: $.parseJSON(chart_datasets)
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });

            } else if (chart_type == 'radar'){

                charts[chart_name] = new Chart(ctx, {
                    type: chart_type,
                    data: { 
                        labels: $.parseJSON(chart_labels),
                        datasets: $.parseJSON(chart_datasets)
                    },
                    options: {
                        scale: {
                            // Hides the scale
                            display: false
                        }
                    }
                });

            } else if (chart_type == 'doughnut'){

                charts[chart_name] = new Chart(ctx, {
                    type: chart_type,
                    data: { 
                        labels: $.parseJSON(chart_labels),
                        datasets: $.parseJSON(chart_datasets)
                    }
                });

            }
            

            // chart_name.destroy();
            // alert(chart_type);
        });


        $(document).on('click', '#download', function(){
            $('#submit_type').val('DOWNLOAD');
            $('#filter_form').submit();
        });

        $(document).on('click', '#search', function(){
            $('#submit_type').val('SUBMIT');
            $('#filter_form').submit();
        });

         // listen to add-btn
        $(document).on('click', '.graph-btn', function(){

            // raise the modal
            $("#form-modal").modal();

        });

    });
</script>
