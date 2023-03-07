<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="#">Home</a></li>
     					<li>Videos</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing category-style2">
						<h3 class="block-title"><span>Videos</span></h3>

						<?php
							foreach($query->result() as $row){
							$video_page = site_url('videogallery/view/'.$row->id);
							$vimage = $row->vimg;
							if($vimage==''){
								$vimage = "noimg.jpg";
							}
							  
								
						?>

						<div class="post-block-style post-list clearfix">
							<div class="row">
								<div class="col-lg-5 col-md-6">
									<div class="post-thumb thumb-float-style">
										<a href="<?= $video_page ?>">
											<img class="img-fluid" src="<?= base_url() ?>assets/images/gallery/vgallery/thumb/<?= $vimage ?>" alt="" />
										</a>
									</div>
								</div><!-- Img thumb col end -->

								<div class="col-lg-7 col-md-6">
									<div class="post-content">
							 			<h2 class="post-title title-large">
							 				<a href="<?= $video_page ?>"><?= $row->htitle ?></a>
							 			</h2>
							 			<div class="post-meta">
							 				<!--
							 				<span class="post-comment pull-right"><i class="fa fa-comments-o"></i>
											<a href="#" class="comments-link"><span>03</span></a>
											</span>
											-->
							 			</div>
							 			<p><?= strip_tags(character_limiter($row->description, 230)) ?></p>
                                        <p><a class="btn btn-danger" href="<?= $video_page ?>"><i class="fa fa-play"></i> Watch Video</a></p>
						 			</div><!-- Post content end -->
								</div><!-- Post col end -->
							</div><!-- 1st row end -->
						</div><!-- 1st Post list end -->
                        
                        <?php } ?>

						


					</div><!-- Block Technology end -->
                    

					<div class="paging">
                    <?=  $pagination ?>
		            <ul class="pagination">
		              
		              <li>
		              	<span class="page-numbers"><?=  $showing_statement ?></span>
		              </li>
		            </ul>
	          	</div>


				</div><!-- Content Col end -->

				<?php echo Modules::run('site_blocks/_sidebar_block') ;?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->