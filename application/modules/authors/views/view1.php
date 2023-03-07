<?php
		
		$this->load->module('timedate');
		$posted_on = $this->timedate->get_nice_date($author_name, 'cool2');
		echo Modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
?>



	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					
					<div class="single-post">
						
						<div class="post-title-area">
							<a class="post-cat" href="<?= site_url($cat_segments.$cat_url) ?>"><?= $cat_title ?></a>
							<h2 class="post-title">
				 				<?= $author_name ?>
				 			</h2>
				 			<div class="post-meta">
								<span class="post-author">
									By <a href="#">News Editor <?= $cat_url ?></a>
								</span>
								<span class="post-date"><i class="fa fa-clock-o"></i> <?= $posted_on ?></span>
                                <!--
								<span class="post-hits"><i class="fa fa-eye"></i> 21</span>
                                -->
								<span class="post-comment"><i class="fa fa-comments-o"></i>
								<a href="#" class="comments-link"><span>01</span></a></span>
							</div>
						</div><!-- Aothor title end -->

						<div class="post-content-area">
							<div class="post-media post-featured-image">
								<img src="<?= base_url() ?>assets/images/blog/lifestyle/health5.jpg" class="img-fluid" alt="<?= $author_name ?>">
							</div>
							<div class="entry-content">
								<p><?= $author_desc ?></p>

							</div><!-- Entery content end -->


							<div class="share-items clearfix">
   							<ul class="post-social-icons unstyled">
   								<li class="facebook">
   									<a href="#">
   									<i class="fa fa-facebook"></i> <span class="ts-social-title">Facebook</span></a>
   								</li>
   								<li class="twitter">
   									<a href="#">
   									<i class="fa fa-twitter"></i> <span class="ts-social-title">Twitter</span></a>
   								</li>
   								<li class="gplus">
   									<a href="#">
   									<i class="fa fa-google-plus"></i> <span class="ts-social-title">Google +</span></a>
   								</li>
   								<li class="pinterest">
   									<a href="#">
   									<i class="fa fa-pinterest"></i> <span class="ts-social-title">Pinterest</span></a>
   								</li>
   							</ul>
   						</div><!-- Share items end -->

						</div><!-- post-content end -->
					</div><!-- Single post end -->


					<?php echo Modules::run('site_blocks/_related_post_block', $cat_url) ;?>
                    
                    

					
                    <!-- Aothor comment start -->
					<div id="comments" class="comments-area block">
						<h3 class="block-title"><span>03 Comments</span></h3>

						<ul class="comments-list">
							<li>
								<div class="comment">
									<img class="comment-avatar pull-left" alt="" src="<?= base_url() ?>assets/images/blog/user1.png">
									<div class="comment-body">
										<div class="meta-data">
											<span class="comment-author">Michelle Aimber</span>
											<span class="comment-date pull-right">January 17, 2017 at 1:38 pm</span>
										</div>
										<div class="comment-content">
										<p>High Life tempor retro Truffaut. Tofu mixtape twee, assumenda quinoa flexitarian aesthetic artisan vinyl pug. Chambray et Carles Thundercats cardigan actually, magna bicycle rights.</p></div>
										<div class="text-left">
											<a class="comment-reply" href="#">Reply</a>
										</div>	
									</div>
								</div><!-- Comments end -->

								<ul class="comments-reply">
									<li>
										<div class="comment">
											<img class="comment-avatar pull-left" alt="" src="<?= base_url() ?>assets/images/blog/user2.png">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author">Genelia Dusteen</span>
													<span class="comment-date pull-right">January 17, 2017 at 1:38 pm</span>
												</div>
												<div class="comment-content">
												<p>Farm-to-table selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate cardigan banjo.</p></div>
												<div class="text-left">
													<a class="comment-reply" href="#">Reply</a>
												</div>	
											</div>
										</div><!-- Comments end -->
									</li>
								</ul><!-- comments-reply end -->
									<div class="comment last">
										<img class="comment-avatar pull-left" alt="" src="<?= base_url() ?>assets/images/blog/user1.png">
										<div class="comment-body">
											<div class="meta-data">
												<span class="comment-author">Michelle Aimber</span>
												<span class="comment-date pull-right">January 17, 2017 at 1:38 pm</span>
											</div>
											<div class="comment-content">
											<p>VHS Wes Anderson Banksy food truck vero. Farm-to-table selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate cardigan banjo.</p></div>
											<div class="text-left">
												<a class="comment-reply" href="#">Reply</a>
											</div>	
										</div>
									</div><!-- Comments end -->
							</li><!-- Comments-list li end -->
						</ul><!-- Comments-list ul end -->
					</div>
                    <!-- Aothor comment end -->

					<div class="comments-form">
						<h3 class="title-normal">Leave a comment</h3>

						<form role="form">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control required-field" id="message" placeholder="Your Comment" rows="10" required></textarea>
									</div>
								</div><!-- Col end -->

								<div class="col-md-12">
									<div class="form-group">
										<input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required>
									</div>
								</div><!-- Col end -->

								<div class="col-md-12">
									<div class="form-group">
										<input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<input class="form-control" placeholder="Your Website" type="text" required>
									</div>
								</div>
							</div><!-- Form row end -->
							<div class="clearfix">
								<button class="comments-btn btn btn-primary" type="submit">Aothor Comment</button> 
							</div>
						</form><!-- Form end -->
					</div><!-- Comments form end -->

				</div><!-- Content Col end -->

				<?php echo Modules::run('site_blocks/_sidebar_block') ;?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->