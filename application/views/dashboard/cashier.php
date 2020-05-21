<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">

				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php echo number_format($year, 2) ?></h3>

							<p>Total Sales of <?php echo date('Y') ?></p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6" style = "color: #ccc">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo number_format($month, 2) ?><sup style="font-size: 20px"></sup></h3>

							<p>Total Sales of <?php echo date('F') ?></p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php echo number_format($today, 2) ?></h3>
							<p>Today's Sales (<?php echo date('F d,Y') ?>)</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<!-- <a href="#" lass="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?php echo $transactions ?></h3>

							<p>Total Transactions (<?php echo date('F d,Y') ?>)</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
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
</div>


