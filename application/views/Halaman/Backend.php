<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ALAP Store - Admin Page</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/template/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/template/dist/css/adminlte.min.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/semanticui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/css/dataTables.semanticui.min.css') ?>" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">

				</li>
			</ul>

			<!-- Right navbar links -->

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url(); ?>" class="brand-link elevation-4">
				<img src="<?= base_url(); ?>assets/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">ALAP Store</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->

				<!-- SidebarSearch Form -->

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
						<li class="nav-item user-panel">
							<a href="<?= base_url(); ?>" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Beranda
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('Admin/DataProduk'); ?>" class="nav-link">
								<i class="nav-icon fas fa-tags"></i>
								<p>
									Data Produk
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('Admin/DataPromo'); ?>" class="nav-link">
								<i class="nav-icon fas fa-percent"></i>
								<p>
									Data Promo
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('Admin/Logout'); ?>" class="nav-link">
								<i class="nav-icon fas fa-chevron-circle-left"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">

			</section>

			<!-- Main content -->
			<?php $this->load->view($content); ?>

			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.1.0
			</div>
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?= base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url(); ?>assets/template/dist/js/demo.js"></script>

	<script src="<?= base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- DataTables  & Plugins -->
	<script src="<?= base_url(); ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/jszip/jszip.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<!-- AdminLTE App -->
	<!-- Page specific script -->
	<script>
		$(function() {
			$("#table_produk").DataTable();
			$("#table_promo").DataTable();
		});
	</script>
	<script>
		$(function() {
			bsCustomFileInput.init();
		});
	</script>
</body>

</html>
