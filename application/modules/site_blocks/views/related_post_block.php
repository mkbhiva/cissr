<div class="related-posts block">
						<h3 class="block-title"><span>Related Posts</span></h3>

						<div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">
                        	<?php
								$this->load->module('timedate');
								foreach($query_related_random_post->result() as $row) { 
								$post_page = site_url($post_segments.$row->post_url);
								$category_page = site_url($cat_segments.$cat_url);
								$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
							?>
                        
                        
							<div class="item">
								<div class="post-block-style clearfix">
									<div class="post-thumb">
										<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/medium/<?= $row->post_img ?>" alt="" /></a>
									</div>
									<a class="post-cat" href="<?= $category_page ?>"><?= $row->cat_title ?></a>
									<div class="post-content">
							 			<h2 class="post-title title-medium">
							 				<a href="<?= $post_page ?>"><?= $row->post_title ?></a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">News Editor</a></span>
							 				<span class="post-date"><?= $posted_on ?></span>
							 			</div>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Item 1 end -->

							<?php } ?>
                            
						</div><!-- Carousel end -->

					</div><!-- Related posts end -->