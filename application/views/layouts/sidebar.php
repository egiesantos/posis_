<style type="text/css">
	.nav-item a .sub-menu
	{
		text-indent: 50px;
	}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link" style = "">
		<img src="<?php echo base_url() ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><?php echo $this->config->item('app_alias'); ?></span>
	</a>

<!-- Sidebar -->
	<div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
		<div class="os-resize-observer-host">
			<div class="os-resize-observer observed"></div>
		</div>
		<div class="os-size-auto-observer">
			<div class="os-resize-observer observed"></div>
		</div>
		<div class="os-content-glue"></div>
		<div class="os-padding"></div>
		<div class="os-viewport os-viewport-native-scrollbars-invisible"></div>

		<div class="os-content">

			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?php echo base_url() ?>assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block"><?php echo ucfirst(strtolower($main_view_data['user_info']['first_name'])).' '.ucfirst(strtolower($main_view_data['user_info']['last_name']));?></a>
				</div>
			</div>

		<!-- Sidebar Menu -->
			<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
				
				

				<?php if (in_array($main_view_data['user_info']['role'], array(0))): ?>
					<li class="nav-item">
						<a href="<?php echo base_url() ?>" class="nav-link">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url() ?>cashier" class="nav-link">
							<i class="nav-icon fas fa-calculator"></i>
							<p>Cashiering Module</p>
						</a>
					</li>
				<?php endif ?>

				<?php if (in_array($main_view_data['user_info']['role'], array(1,2))): ?>
					<li class="nav-item">
						<a href="<?php echo base_url() ?>" class="nav-link">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-laptop"></i>
							<p>Items<i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url() ?>items/" class="nav-link">
									<!-- <i class="far fa-circle nav-icon"></i> -->
									<p  class = "sub-menu">	Manage Items</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon ion ion-stats-bars"></i>
							<p>Reports<i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url() ?>transactions/" class="nav-link">
									<!-- <i class="far fa-circle nav-icon"></i> -->
									<p  class = "sub-menu">	Transactions</p>
								</a>
								<a href="<?php echo base_url() ?>items/item_summary" class="nav-link">
									<!-- <i class="far fa-circle nav-icon"></i> -->
									<p  class = "sub-menu">	Items Summary</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-cog"></i>
							<p>Configurations<i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url() ?>config/categories" class="nav-link">
									<!-- <i class="far fa-circle nav-icon"></i> -->
									<p class = "sub-menu">	Categories</p>
								</a>
							</li>
							
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url() ?>user/lists" class="nav-link">
							<i class="nav-icon fas fa-user"></i>
							<p>Manage User</p>
						</a>
					</li>

				<?php endif ?>
				<!-- <li class="nav-item has-treeview menu-open">
					
					
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="./index.html" class="nav-link active">
							<i class="far fa-circle nav-icon"></i>
							<p>Dashboard v1</p>
						</a>
						</li>
						<li class="nav-item">
							<a href="./index2.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Dashboard v2</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./index3.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Dashboard v3</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="pages/widgets.html" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>Widgets<span class="right badge badge-danger">New</span></p>
					</a>
				</li> -->

				

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>