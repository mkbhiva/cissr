<section class="page-header page-header-modern page-header-background page-header-background-sm parallax overlay overlay-color-dark overlay-show overlay-op-1 my-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url() ?>assets/images/main/about-us/about-us-parallax-1.jpg">
					<div class="container">
						<div class="row my-5">
							<div class="col-md-12 align-self-center text-center">
								<h1 class="text-9 text-color-light custom-secondary-font font-weight-bold mb-1">Blog</h1>
							</div>
						</div>
					</div>
				</section>

				<section class="section section-no-border bg-color-light m-0">
					<div class="container">
						<div class="row justify-content-center">
                        <?php
							$this->load->module('timedate'); 
							foreach($query->result() as $row){
							$post_page = site_url($post_segments.$row->post_url);
							$category_page = site_url($cat_segments.$cat_url);
							$posted_on = $this->timedate->get_nice_date($row->post_date,'good2');
						?>
							<div class="col-lg-4 mb-4">
								<article class="custom-post-blog">
									<span class="thumb-info custom-thumb-info-2">
										<span class="thumb-info-wrapper">
											<a href="<?= $post_page ?>">
												<img src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt class="img-fluid" />
											</a>
										</span>
										<span class="thumb-info-caption custom-box-shadow">
											<span class="thumb-info-caption-text">
												<h4 class="font-weight-bold mb-4">
													<a href="<?= $post_page ?>" class="text-decoration-none custom-secondary-font text-color-dark">
														<?= $row->post_title_en ?> - <?= $row->id ?>
													</a>
												</h4>
												<p><?= strip_tags(character_limiter($row->post_desc, 160)) ?></p>
											</span>
											<span class="custom-thumb-info-post-infos text-center">
												<ul>
													<li class="text-uppercase">
														<i class="icon-calendar icons"></i>
														<?= $posted_on ?>
													</li>
													<li class="text-uppercase">
														<i class="icon-user icons"></i>
														Site Admin
													</li>
												</ul>
											</span>
										</span>
									</span>
								</article>
							</div>
                            
                         <?php } ?>
						</div>
					</div>
				</section>
                
                <div class="container">
                <div class="row">
                    <div class="col">
                        <?= $pagination ?>
                    </div>
                </div>
                </div>
                
                

				<?php echo Modules::run('site_blocks/_footer_map_block') ;?>