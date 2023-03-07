<?php
$first_bit = $this->uri->segment(1);
$form_location = base_url().$first_bit.'/submit_login';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin Login</title>
	<meta name="description" content="ProtoCom India Admin Login Page">
	<meta name="author" content="ProtoCom India">
	<meta name="keyword" content="ProtoCom India">
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
	
	<style type="text/css">
			body { background: url(<?= base_url() ?>assets/adminfiles/img/bg-login.jpg) !important; }
	</style>	
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="<?= base_url() ?>"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Login to your account</h2>
					<form class="form-horizontal" action="<?= $form_location ?>" method="post">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" value="<?= $username ?>" type="text" placeholder="type Username or Email address"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="pword" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							<?php if($first_bit=="youraccount"){?>
							<label class="remember" for="remember"><input type="checkbox" name="remember" id="remember" />Remember me</label>
							<?php } ?>
							<div class="button-login">	
								<button type="submit" name="submit" value="Submit" class="btn btn-primary">Login</button>
							</div>
                            </fieldset>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3><a href="#">Forgot Password?</a></h3>
					<p>
						Managed &amp; Powered by <a href="#"><img width="25%" src="http://www.protocomindia.com/mykit/images/logo_color.png" title="ProtoCom India"></a>
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	    
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
