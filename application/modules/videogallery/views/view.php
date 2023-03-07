

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="<?= site_url() ?>">Home</a></li>
                        <li><a href="<?= site_url('videogallery/view_cat') ?>">Videos</a></li>
     					<li><?= $htitle ?></li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					
					<div class="single-post">

						<div class="post-title-area">
							<a class="post-cat" href="<?= site_url('videogallery/view_cat') ?>">Videos</a>
							<h2 class="post-title">
				 				<?= $htitle ?>
				 			</h2>
				 			
						</div><!-- Post title end -->

						<div class="post-content-area">
							<div class="entry-content">
								<div class="post-media post-video">
									<div class="embed-responsive">
										<!-- Change the url -->
										<iframe src="https://www.youtube.com/embed/<?= $vlink ?>?rel=0&amp;title=0&amp;showinfo=0&amp;byline=0&amp;controls=0&amp;portrait=0&amp;color=8aba56" width="500" height="281" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
									</div>
								</div><!-- Media end -->

								


								<blockquote><?= $description ?></blockquote>
                                
                                <p align="right"><a class="btn btn-danger" href="<?= site_url('videogallery/view_cat') ?>">Return Back to Videos</a></p>

								

							</div><!-- Entery content end -->


						</div><!-- post-content end -->
					</div><!-- Single post end -->

				</div><!-- Content Col end -->

				<?php echo Modules::run('site_blocks/_sidebar_block') ;?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

