<!DOCTYPE html>
<html lang="en">

<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>ProtoCom India Admin Panel</title>
	<meta name="description" content="ProtoCom Admin Panel">
	<meta name="author" content="ProtoCom India">
	<meta name="keyword" content="ProtoCom, Protocom india">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?= base_url() ?>assets/adminfiles/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/adminfiles/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?= base_url() ?>assets/adminfiles/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?= base_url() ?>assets/adminfiles/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="<?= base_url() ?>assets/adminfiles/css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="<?= base_url() ?>assets/adminfiles/css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->




</head>

<body>
	<?php
	if (isset($sort_this)) {
		require_once('sort_this_code.php');
	}
	?>
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo site_url('dashboard/home'); ?>"><span><img style="padding:2px 0;" src="http://www.protocomindia.com/mykit/images/logo.png" width="130"> admin panel</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">

						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Admin
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
									<span>Account Settings</span>
								</li>
								<li><a href="<?= base_url() ?>piapcontrol/logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

	<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?= base_url() ?>dashboard"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>





						<li>
							<a href="<?= base_url() ?>teams/manage">
								<i class="icon-edit"></i>
								<span class="hidden-tablet"> Manage Team</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url() ?>members/manage">
								<i class="icon-edit"></i>
								<span class="hidden-tablet"> Manage Members</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url() ?>siteforms/manage">
								<i class="icon-edit"></i>
								<span class="hidden-tablet"> Manage Forms</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url() ?>notices/manage">
								<i class="icon-edit"></i>
								<span class="hidden-tablet"> Manage Notices</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url() ?>hostelstat/manage">
								<i class="icon-edit"></i>
								<span class="hidden-tablet"> Hostel Statics</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url() ?>hostelstudents/manage">
								<i class="icon-edit"></i>
								<span class="hidden-tablet"> Hostel Students</span>
							</a>
						</li>

					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">


				<?php if (isset($view_file)) {
					$this->load->view($view_module . '/' . $view_file);
				} ?>



			</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
	</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://www.protocomindia.com">Admin templates</a></li>
				<li><a href="http://www.protocomindia.com">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; <?php echo date('Y'); ?> <a href="http://www.protocomindia.com" target="_new" alt="ProtoCom India">ProtoCom India</a></span>

		</p>

	</footer>

	<!-- start: JavaScript-->

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery-1.9.1.min.js"></script>
	<script src="<?= base_url() ?>assets/adminfiles/js/jquery-migrate-1.0.0.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery-ui-1.10.0.custom.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.ui.touch-punch.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/modernizr.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/bootstrap.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.cookie.js"></script>

	<script src='<?= base_url() ?>assets/adminfiles/js/fullcalendar.min.js'></script>

	<script src='<?= base_url() ?>assets/adminfiles/js/jquery.dataTables.min.js'></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/excanvas.js"></script>
	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.flot.js"></script>
	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.flot.pie.js"></script>
	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.flot.stack.js"></script>
	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.flot.resize.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.chosen.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.uniform.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.cleditor.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.noty.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.elfinder.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.raty.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.iphone.toggle.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.uploadify-3.1.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.gritter.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.imagesloaded.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.masonry.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.knob.modified.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/jquery.sparkline.min.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/counter.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/retina.js"></script>

	<script src="<?= base_url() ?>assets/adminfiles/js/custom.js"></script>
	<!-- end: JavaScript-->

</body>

</html>