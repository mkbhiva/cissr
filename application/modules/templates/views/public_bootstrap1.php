
<?php

$socialheader = $this->uri->segment(2);

if((!isset($page_title)) OR ($page_title=='')){ 
    $page_title = "The Advocates League welcomes to You";
}

if((!isset($page_keywords)) OR ($page_keywords=='')){
    $page_keywords = "The Advocates League, The Advocates League articles";
}

if((!isset($page_description)) OR ($page_description=='')){
    $page_description = "The Advocates League articles website is for information related to Indian Law";
}


?>



<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title><?= strip_tags($page_title) ?></title>	

		<meta name="keywords" content="<?= strip_tags($page_keywords) ?>">
		<meta name="description" content="<?= strip_tags($page_description) ?>">
		<meta name="author" content="protocomindia.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/theme.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/theme-elements.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/theme-blog.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/rs-plugin/css/navigation.css">
		
		<!-- Demo CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/demos/demo-law-firm.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/skins/skin-law-firm.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">

		<!-- Head Libs -->
		<script src="<?= base_url() ?>assets/vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>

		<div class="body">
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 98, 'stickySetTop': '-98px', 'stickyChangeLogo': false}">
				<div class="header-body border-color-primary border-top-0 box-shadow-none">
					<div class="header-container container z-index-2">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo d-none d-md-block">
										<a href="<?= site_url() ?>">
											<img widthh="243" height="64"  data-sticky-width="112" data-sticky-height="37" data-sticky-top="86" src="<?= base_url() ?>assets/images/law-firm/logo.png">
										</a>
									</div>
                                    <div class="header-logo d-md-none">
										<a href="<?= site_url() ?>">
											<img height="44" src="<?= base_url() ?>assets/images/law-firm/logo.png">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row h-100">
									<ul class="header-extra-info d-flex h-100 align-items-center">
										<li class="align-items-center h-100 py-4 header-border-right pr-4 d-none d-md-inline-flex">
											<div class="header-extra-info-text h-100 py-2">
												<div class="feature-box feature-box-style-2 align-items-center">
													<div class="feature-box-icon">
														<i class="far fa-envelope text-7 p-relative"></i>
													</div>
													<div class="feature-box-info pl-1">
														<label>SEND US AN EMAIL</label>
														<strong><a href="#">info@theadvocatesleague.in</a></strong>
													</div>
												</div>
											</div>
										</li>
										<li class="align-items-center h-100 py-4">
											<div class="header-extra-info-text h-100 py-2">
												<div class="feature-box feature-box-style-2 align-items-center">
													<div class="feature-box-icon">
														<i class="fab fa-whatsapp text-7 p-relative"></i>
													</div>
													<div class="feature-box-info pl-1">
														<label>CALL US NOW</label>
														<strong><a href="#">805-235-1466</a></strong>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="header-nav-bar bg-primary" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'background-color': '#0088cc'}">
						<div class="container">
							<div class="header-row">
								<div class="header-column">
									<div class="header-row">
										<div class="header-column">
											<div class="header-nav header-nav-stripe header-nav-divisor header-nav-force-light-text justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '0px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
                                            
												<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
													<nav class="collapse">
														<ul class="nav nav-pills" id="mainNav">
															<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item active" href="<?= site_url() ?>">
																	Home
																</a>
															</li>
															<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item" href="<?= site_url('aboutus') ?>">
																	About Us
																</a>
															</li>
                                                            <li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item" href="#">
																	For Authors&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
																</a>
                                                                <ul class="dropdown-menu">
                                                                	<li class="dropdown dropdown-full-color dropdown-light">
                                                                    	<a class="dropdown-item" href="underDevelopment.html">
                                                                        Submission Guidelines
                                                                        </a>
                                                                     </li>
                                                                     <li class="dropdownn dropdown-full-color dropdown-light">
                                                                    	<a class="dropdown-item" href="underDevelopment.html">
                                                                        Submit Your Paper
                                                                        </a>
                                                                     </li>
                                                                     <li class="dropdownn dropdown-full-color dropdown-light">
                                                                    	<a class="dropdown-item" href="underDevelopment.html">
                                                                        Check Paper Status
                                                                        </a>
                                                                     </li>
                                                                </ul>
															</li>
															<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item" href="underDevelopment.html">
																	Current Issue
																</a>
															</li>
                                                            <li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item" href="underDevelopment.html">
																	Past Issues
																</a>
															</li>
                                                            <li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item" href="<?= site_url('talteam') ?>">
																	Our Team
																</a>
															</li>
                                                            <li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item" href="underDevelopment.html">
																	Our Research
																</a>
															</li>
															<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item" href="<?= site_url('contactus') ?>">
																	Contact Us
																</a>
															</li>
														</ul>
													</nav>
												</div>
											</div>
										</div>
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				<?php
				if (isset($page_content)) {
					echo nl2br($page_content);
				
					if ($page_url == "") {
						require_once('homepage_content.php');
					} elseif ($page_url == "contactus") {
						echo Modules::run('contactus/_draw_form');
					}
				} elseif (isset($view_file)) {
					$this->load->view($view_module . '/' . $view_file);
				}
				?>
			</div>

			<footer id="footer" class="border-top-0">
				<div class="container py-4">
					<div class="row py-5">
						<div class="col-md-6 mb-4 mb-lg-0">
							<a href="index.html" class="logo pr-0 pr-lg-3 mb-3">
								<img alt="Porto Website Template" src="<?= base_url() ?>assets/images/law-firm/logo-law-firm-footer.png" class="opacity-7 top-auto bottom-10" height="33">
							</a>
							<p class="mt-2 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Phasellus semper scelerisque purus, et semper nisl lacinia sit amet. Praesent venenatis turpis vitae purus semper...</p>
							<p class="mb-0"><a href="#" class="btn-flat btn-xs text-color-light"><strong class="text-2">VIEW MORE</strong><i class="fas fa-angle-right p-relative top-1 pl-2"></i></a></p>
						</div>
						<div class="col-md-3 mb-4 mb-lg-0">
							<h5 class="text-3 mb-3">CONTACT US</h5>
							<ul class="list list-icons list-icons-lg">
								<li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i><p class="m-0">234 Street Name, City Name</p></li>
								<li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i><p class="m-0"><a href="#">805-235-1466</a></p></li>
								<li class="mb-1"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="#">info@theadvocatesleague.in</a></p></li>
							</ul>
						</div>
						<div class="col-md-3">
							<h5 class="text-3 mb-3">FOLLOW US</h5>
							<ul class="header-social-icons social-icons">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright footer-copyright-style-2">
					<div class="container py-2">
						<div class="row py-4">
							<div class="col d-flex align-items-center justify-content-center">
								<p>Copyright © 2020 The Advocate League All Rights Reserved. Developed by <a href="http://protocomindia.com" target="_blank"><img src="http://protocomindia.com/assets/images/logo.png" title="ProtoCom India - A web development Company." width="80"></a></p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/popper/umd/popper.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/common/common.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/vide/jquery.vide.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/vivus/vivus.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?= base_url() ?>assets/js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="<?= base_url() ?>assets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?= base_url() ?>assets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="<?= base_url() ?>assets/js/views/view.contact.js"></script>

		<!-- Demo -->
		<script src="<?= base_url() ?>assets/js/demos/demo-law-firm.js"></script>	
		
		<!-- Theme Custom -->
		<script src="<?= base_url() ?>assets/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?= base_url() ?>assets/js/theme.init.js"></script>




		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->


	</body>
</html>
