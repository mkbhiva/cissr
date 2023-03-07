<div class="latest-news block color-red">
						<h3 class="block-title"><span>Latest News</span></h3>
						<div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">
                        
							<div class="item">
								<ul class="list-post">
                                	<?php
										$this->load->module('timedate');
										foreach($query_latest_posts1->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?>
									<div class="gap-30"></div>

									<?php
										$this->load->module('timedate');
										foreach($query_latest_posts2->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?><!-- Li end -->
								</ul><!-- List post 1 end -->

							</div><!-- Item 1 end -->

							<div class="item">

								<ul class="list-post">
									<?php
										$this->load->module('timedate');
										foreach($query_latest_posts3->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?><!-- Li end -->

									<div class="gap-30"></div>

									<?php
										$this->load->module('timedate');
										foreach($query_latest_posts4->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?><!-- Li end -->
								</ul><!-- List post 2 end -->
								
							</div><!-- Item 2 end -->

							<div class="item">

								<ul class="list-post">
									<?php
										$this->load->module('timedate');
										foreach($query_latest_posts5->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?><!-- Li end -->

									<div class="gap-30"></div>

									<?php
										$this->load->module('timedate');
										foreach($query_latest_posts6->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?><!-- Li end -->
								</ul><!-- List post 3 end -->
								
							</div><!-- Item 3 end -->

							<div class="item">
								<ul class="list-post">
									<?php
										$this->load->module('timedate');
										foreach($query_latest_posts7->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?><!-- Li end -->

									<div class="gap-30"></div>

									<?php
										$this->load->module('timedate');
										foreach($query_latest_posts8->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
									<li class="clearfix">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/small/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" /></a>
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
									</li><!-- Li end -->
									<?php } ?><!-- Li end -->
								</ul><!-- List post 4 end -->
								
							</div><!-- Item 4 end -->
                            
						</div><!-- Latest News owl carousel end-->
					</div><!--- Latest news end -->

					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle"
					     style="display:inline-block;width:730px;height:90px"
					     data-ad-client="ca-pub-9883210530102346"
					     data-ad-slot="9624642805"></ins>
					<script>
					     (adsbygoogle = window.adsbygoogle || []).push({});
					</script>