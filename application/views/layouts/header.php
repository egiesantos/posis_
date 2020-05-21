<nav class="main-header navbar navbar-expand navbar-white navbar-light" style = "background-color: #00c0ef;">

	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<!-- <li class="nav-item d-none d-sm-inline-block">
			<a href="index3.html" class="nav-link">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="#" class="nav-link">Contact</a>
		</li> -->
	</ul>


<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Messages Dropdown Menu -->
		<!-- <li class="nav-item dropdown show">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-comments"></i>
				<span class="badge badge-danger navbar-badge">3</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<a href="#" class="dropdown-item">
				
				<div class="media">
					<img src="<?php echo base_url() ?>assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
					<div class="media-body">
					<h3 class="dropdown-item-title">Brad Diesel<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
					</h3>
					<p class="text-sm">Call me whenever you can...</p>
					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
					</div>
				</div>
				
				</a>

				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					
					<div class="media">
						<img src="<?php echo base_url() ?>assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
							John Pierce
							<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">I got your message bro</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					
				</a>

				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					
					<div class="media">
						<img src="<?php echo base_url() ?>assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
							Nora Silvester
							<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">The subject goes here</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
			</div>
		</li> -->


		<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">

				<i class="fas fa-angle-down right"></i>
				<!-- <span class="badge badge-warning navbar-badge">15</span> -->
			</a>

			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header"> &nbsp</span>
				<!-- <div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
				<i class="fas fa-user mr-2"></i> Profile
				<span class="float-right text-muted text-sm">3 mins</span>
				</a> -->
				<div class="dropdown-divider"></div>
				<a href="<?php echo base_url() ?>auth/change_password" class="dropdown-item">
				<i class="fas fa-key mr-2"></i> Password
				<!-- <span class="float-right text-muted text-sm">12 hours</span> -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="<?php echo base_url() ?>auth/logout" class="dropdown-item">
				<i class="fas fa-sign-out-alt mr-2"></i> Logout
				<!-- <span class="float-right text-muted text-sm">2 days</span> -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer"> &nbsp</a>
			</div>
		</li>
		
	</ul>
</nav>