<div class="main-nav clearfix">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg col">
					<div class="site-nav-inner float-left">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <!-- End of Navbar toggler -->

						<div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav">
								<li class="nav-item dropdown active">
									<a href="<?= site_url() ?>">Home </a>
								</li>

								<li>
									<a href="<?= site_url('news/articles/Smart-Policing') ?>">Smart Policing</a>
								</li>
                                
                                <li>
									<a href="<?= site_url('news/articles/Encounter') ?>">Encounter</a>
								</li>
                                
                                <li>
									<a href="<?= site_url('news/articles/Crime') ?>">Crime</a>
								</li>
                                
                                <li>
									<a href="<?= site_url('news/articles/Transfer') ?>">Transfer</a>
								</li>
                                
                                <li>
									<a href="<?= site_url('news/articles/Officer-Column') ?>">Officer Column</a>
								</li>
                                
                                <li>
									<a href="<?= site_url('news/articles/Super-Cop') ?>">Super Cop</a>
								</li>
                                
                                <li>
									<a href="<?= site_url('news/articles/Khaki-Connection') ?>">Khaki Connection</a>
								</li>

								<li class="nav-item dropdown">
									<a href="#" class="nav-link" data-toggle="dropdown">Others <i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?= site_url('news/articles/Others') ?>">Other News</a></li>
										<li><a href="<?= site_url('videogallery/view_cat') ?>">Video Gallery</a></li>
										<li><a href="<?= site_url('magazines/magList') ?>">Our Magazines</a></li>

									</ul>
								</li>

								

 							</ul><!--/ Nav ul end -->
						</div><!--/ Collapse end -->

					</div><!-- Site Navbar inner end -->
				</nav><!--/ Navigation end -->

				<div class="nav-search">
					<span id="search"><i class="fa fa-search"></i></span>
				</div><!-- Search end -->
				<form action="<?= base_url() ?>searchbox" method="get" enctype="text">
				<div class="search-block" style="display: none;">
					<input type="text" name="searchinput" class="form-control" placeholder="Type what you want and enter">
					<span class="search-close">&times;</span>
				</div><!-- Site search end -->
				</form>
			</div><!--/ Row end -->
		</div><!--/ Container end -->

	</div>
    <!-- Menu wrapper end -->