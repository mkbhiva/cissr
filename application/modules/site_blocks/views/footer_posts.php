					<div class="col-lg-3 col-sm-12 footer-widget">
						<h3 class="widget-title">Trending Now</h3>
						<div class="list-post-block">
							<ul class="list-post">
                            
                            	<?php
									$this->load->module('timedate');
									foreach($query_footer_posts->result() as $row) { 
									$post_page = site_url($post_segments.$row->post_url);
									$category_page = site_url($cat_segments.$row->cat_url);
									$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
								?>
                            
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="<?= $post_page ?>">
												<img class="img-fluid" src="<?= base_url() ?>assets/images/blog/thumb/<?= $row->post_img ?>" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="<?= $post_page ?>"><?= character_limiter($row->post_title, 40) ?></a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date"><?= $posted_on ?></span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
                                
                                <?php } ?>

                                
							</ul><!-- List post end -->
						</div><!-- List post block end -->
						
					</div><!-- Col end -->