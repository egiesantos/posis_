<div class = "x_content">
	<div class = "col-md-12">
		<!-- <div class="col-md-3">
			<div class="panel panel-default">
				<div class = "panel-heading">Graph</div>
				<div class="panel-body">
					<canvas id="myChart" width="50" height="50"></canvas>
				</div>
			</div>
		</div>
		<div class = "col-md-3">
			<div class="panel panel-default">
				<div class = "panel-heading">sample</div>
				<div class="panel-body">
					<canvas id="myChart2" width="50" height="50"></canvas>
				</div>
			</div>
		</div>
		<div class = "col-md-">
			<div class="panel panel-default">
				<div class = "panel-heading">sample</div>
				<div class="panel-body">
					<canvas id="myChart3" width="50" height="50"></canvas>
				</div>
			</div>
		</div> -->
		
        <div>
        	<div class = "col-md-12">
			<div class="panel panel-default">
				<div class = "panel-heading">Table</div>
				<div class="panel-body">
					<div class = "table-responsive">
						<table class="table table-responsive e-table" style = "max-height: 50px">
		                    <thead class = "">
		                        <tr>
		                            <th>Barangay</th>
		                            <th>Total</th>
		                            <th>Male</th>
		                            <th>Female</th>
		                            <th>Minor</th>
		                            <th>Legal Age</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	<?php //var_dump($maleFemale->result()); ?>
		                    	<?php foreach ($maleFemale->result() as $row): ?>
		                    		<tr>
			                    		<td><?php echo $row->barangay_name ?></td>
			                    		<td><?php echo $row->total ?></td>
			                    		<td><?php echo $row->male ?></td>
			                    		<td><?php echo $row->female ?></td>
			                    		<td><?php echo $row->minor ?></td>
			                    		<td><?php echo $row->legalAge ?></td>
			                    		<td><a class = "btn btn-info" id = "view" href = "<?php echo base_url() ?>admin/report_barangay/<?php  echo $row->barangay_id;?>"><span class = "glyphicon glyphicon-eye-open"></a></button></td>
			                    	</tr>
		                    	<?php endforeach ?>
		                    </tbody>
		                </table>
					</div>
				</div>
			</div> 
        </div>
        </div>
	</div>

	
</div>

<style type="text/css">
	.e-table
	{
		height: 30px !important; 
		overflow-y: scroll
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		

		$.ajax({
		url: "<?php echo base_url(); ?>admin/get_chart_data",
		method: "GET",
		success: function(data) {

			var item = JSON.parse(data);
			var color = ['#1abc9c','#2ecc71','#3498db','#9b59b6','#16a085','#27ae60','#2980b9','#8e44ad','#f1c40f','#e67e22','#e74c3c','#ecf0f1','#f39c12','#d35400','#c0392b','#bdc3c7','#F9690E','#1abc9c','#2ecc71','#3498db','#9b59b6','#16a085','#27ae60','#2980b9','#8e44ad','#f1c40f','#e67e22','#e74c3c','#ecf0f1','#f39c12','#d35400','#c0392b','#bdc3c7','#F9690E','#1abc9c','#2ecc71'];
			var barangay = [];
			var total = [];

			for(var i in item)
			{
				barangay.push(item[i].barangay_name);
				total.push(item[i].total);
			};

			console.log(total)
			
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'doughnut',
			    data: {
			        labels: barangay,
			        datasets: [{
			            label: '# of Votes',
			            data: total,
			            backgroundColor: color,
			        }],

			    },{
			    	labels: barangay,
			        datasets: [{
			            label: '# of Votes',
			            data: total,
			            backgroundColor: color,
			        }],
			    }
			    options: {
			        legend: {
			            display: false
			        },
			        tooltips: {
			            enabled: true
			        }
			    }
			});
			
		}
		});

	});
</script>