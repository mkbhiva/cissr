<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<!--  Basic Page Needs -->
	<meta charset="UTF-8" />
	<title>
		Meghwal Vikas Samiti, Alwar</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/fab.jpg">
	<link rel="apple-touch-icon" href="apple-touch-icon.html" />

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/flexslider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/font-awesome-ie7.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/keyframes.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/grid.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/meanmenu.css" />

	<!-- Scripts -->
	<script type='text/javascript' src='<?= base_url() ?>assets/js/jquery.min.js'></script>

	<script src="<?= base_url() ?>assets/js/base.js"></script>

	<!-- Scripts for plugins -->
	<script src="<?= base_url() ?>assets/js/jquery.fitvids.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.meanmenu.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.flexslider-min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.inview.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.scrollParallax.min.js"></script>


</head>

<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_IN/sdk.js#xfbml=1&version=v15.0" nonce="RWu7ADMy"></script>
	<div id="page">

		<!-- Toolbar -->
		<div id="toolbar">
			<div class="container_16">
				<div class="grid_16">
					<div style="display:flex; justify-content:space-between; align-items:center;">
						<ul>
							<li class="phone">
								<a href="#">
									<i class="fa fa-mobile"></i> : +91 9950999473, 9999699001
								</a>
							</li>
						</ul>

						<ul>

							<li class="share">
								<a href="#"><i class="fa fa-facebook"></i>
								</a>
							</li>

							<li class="share">
								<a href="#"><i class="fa fa-twitter"></i>
								</a>
							</li>

							<li class="share">
								<a href="#"><i class="fa fa-instagram"></i>
								</a>
							</li>

							<li class="share">
								<a href="#"><i class="fa fa-youtube"></i>
								</a>
							</li>

							<li class="donate"><a href="<?= site_url('donate') ?>">Donate <i class="fa fa-tint"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /#toolbar -->

		<header id="branding" class="site-header" role="banner">
			<div id="sticky_navigation">
				<div class="container_16">
					<hgroup class="fleft grid_6">
						<div style="display:flex; align-items:center">
							<img width="60" src="<?= base_url() ?>assets/images/logo.png" alt="MVS Logo">
							<div id="site-title">
								<a href="<?= site_url() ?>" title="Meghwal Vikas Samiti, Alwar" rel="home"><strong>Meghwal Vikas Samiti Alwar</strong></a>
							</div>
						</div>

					</hgroup>

					<nav role="navigation" class="site-navigation main-navigation grid_10" id="site-navigation">
						<div class="menu-main-menu-container">
							<ul id="menu-main-menu" class="nav-menu">

								<li class="menu-item "><a href="<?= site_url() ?>">समिति संबंधी</a>
									<ul class="sub-menu">
										<li class="menu-item">
											<a href="<?= site_url('aboutus') ?>">समिति का परिचय</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('mvsteam/district') ?>">जिला कार्यकारिणी</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('mvsteam/blockmember') ?>">ब्लोक कार्यकारिणी</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('members/lifetime') ?>">आजीवन समिति सदस्य</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('members/general') ?>">समिति सदस्य</a>
										</li>

									</ul>
								</li>
								<li class="menu-item "><a href="<?= site_url('expenses') ?>">वित्त संबंधी</a></li>

								<li class="menu-item ">
									<a href="<?= site_url() ?>">दानदाताओ की सूची</a>
									<ul class="sub-menu">
										<li class="menu-item">
											<a href="<?= site_url('donationlist/hosteldonation') ?>">छात्रावास निर्माण</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('donationlist/firstpratibha') ?>">प्रथम प्रतिभा सम्मान समारोह वर्ष 2008</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('donationlist/secondpratibha') ?>">द्वितीय प्रतिभा सम्मान समारोह वर्ष 2009</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('donationlist/fourthpratibha') ?>">चतुर्थ प्रतिभा सम्मान समारोह</a>
										</li>

										<li class="menu-item">
											<a href="<?= site_url('donationlist/groupmarriage') ?>">सामुहिक विवाह 2012</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('donationlist/firstsouvenir') ?>">प्रथम स्मरिका 2012</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('donationlist/bigdonation') ?>">5000 से अधिक दान की सूची</a>
										</li>
									</ul>
								</li>

								<li class="menu-item ">
									<a href="<?= site_url() ?>">गैलरी</a>
									<ul class="sub-menu">
										<li class="menu-item">
											<a href="<?= site_url('newspaper') ?>">समाचार गैलरी</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('photogallery') ?>">फोटो गैलरी</a>
										</li>
									</ul>
								</li>

								<li class="menu-item ">
									<a href="<?= site_url() ?>">छात्रावास</a>
									<ul class="sub-menu">
										<li class="menu-item">
											<a href="<?= site_url('hostels/boys') ?>">श्री बाबा गरीबनाथ छात्रावास</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('hostels/girls') ?>">बालिका छात्रावास</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('notices/allhostel') ?>">सूचनाएं</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('hostelstudents/studentapply') ?>">छात्रावास के लिए ऑनलाइन आवेदन</a>
										</li>
									</ul>
								</li>

								<li class="menu-item ">
									<a href="<?= site_url('siteforms') ?>">फार्म</a>
								</li>

								<li class="menu-item ">
									<a href="<?= site_url() ?>">महत्वपूर्ण सूचनाएं</a>
									<ul class="sub-menu">
										<li class="menu-item">
											<a href="<?= site_url('notices/administration') ?>">प्रशासनिक सूचनाएं</a>
										</li>
										<li class="menu-item">
											<a href="<?= site_url('notices/mvsmeet') ?>">कार्यकरणी सूचनाएं</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
					<!-- .site-navigation .main-navigation -->
					<div class="grid_16 mob-nav"></div>
					<div class="clear"></div>
				</div>
			</div>
		</header>
		<!-- #masthead .site-header -->

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

		<!-- Footer -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div id="tertiary" class="sidebar-container" role="complementary">
				<div class="container_16">

					<!-- First Widget Area -->
					<div class="grid_5">
						<aside id="meta-0" class="widget widget_adress">
							<h3>हमसे संपर्क करें</h3>

							<address class="vcard">
								<div style="padding-left:30px;">
									<img width="90" src="<?= base_url() ?>assets/images/logo.png" alt="MVS Logo">
								</div>
								<p class="org vcard">
									<a class="url fn org" href="<?= site_url() ?>">Meghwal Vikas Samiti</a><br>
									<span class="street-address">2, Tijara Rd, Shivaji Park, </span><br>
									<span class="region">Alwar, Rajasthan 301001</span><br>
									<span>
										<i class="fa fa-mobile"></i>
										: +91 9950999473, 9999699001 <br>
										<i class="fa fa-envelope-o"></i>
										: mailmvsalwar@gmail.com
									</span>
								<p>
							</address>

						</aside>
					</div>

					<!-- Second Widget Area -->
					<div class="grid_5">
						<aside id="meta-1" class="widget widget_meta">
							<h3>महत्वपूर्ण </h3>
							<ul>
								<li><a href="<?= site_url('newspaper') ?>">समाचार पत्रों का संग्रह</a></li>
								<li><a href="<?= site_url('photogallery') ?>">फोटो गैलरी</a></li>
								<li><a href="<?= site_url('expenses') ?>">आय व्यय का विवरण</a></li>
								<li><a href="<?= site_url('mvsteam/yuvamember') ?>">युवा प्रकोष्ठ</a></li>
							</ul>
						</aside>
					</div>


					<!-- Forth Widget Area -->
					<div class="grid_5">
						<aside id="meta-3" class="widget widget_meta">
							<h3>हमसे फेसबुक पर जुड़े :</h3>
							<div class="fb-page" data-href="https://www.facebook.com/protocom.india24/" data-tabs="timeline" data-width="" data-height="180" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
								<blockquote cite="https://www.facebook.com/protocom.india24/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/protocom.india24/">ProtoCom India</a></blockquote>
							</div>
						</aside>
					</div>

					<div class="clear"></div>
				</div>
			</div>


			<!-- Site Info -->
			<div class="site-info">
				<div class="container_16">

					<!-- CopyRight -->
					<div class="grid_8">
						<p class="copy">Copyright © 2013,
							Meghwal Vikas Samiti. All Rights reserved. </p>
					</div>

					<!-- Design By -->
					<div class="grid_8">
						<div class="clear"></div>
						<div class="fright" style="display:flex; flex-direction:row; justify-content:flex-evenly; align-items:center">
							<p class="copy mleft">
								Designed &amp; Developed by &nbsp;
							</p>
							<a class="fright" href="<?= site_url() ?>">
								<img style='vertical-align:middle;' src="https://protocomindia.com/assets/images/logo.png" width="60" alt="ProtoCom India">
							</a>

						</div>
					</div>

					<div class="clear"></div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon .site-footer -->

	</div>
	<!-- /#page -->
</body>

</html>