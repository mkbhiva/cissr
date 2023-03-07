<div class="col-lg-8 col-md-12">
                    <div class="more-news block color-default">
                        <h3 class="block-title"><span>More News</span></h3>

                        <div id="more-news-slide" class="owl-carousel owl-theme more-news-slide">
                            <div class="item">
                        
                        	<?php
									$this->load->module('timedate');
									foreach($query_random_block5_hp->result() as $row) { 
									$post_page = site_url($post_segments.$row->post_url);
									$category_page = site_url($cat_segments.$row->cat_url);
									$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
								?>
                        
                            
                                <div class="post-block-style post-float-half clearfix">
                                    <div class="post-thumb">
                                        <a href="<?= $post_page ?>">
                                            <img class="img-fluid" src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" />
                                        </a>
                                    </div>
                                    <a class="post-cat" href="<?= $category_page ?>"><?= $row->cat_title ?></a>
                                    <div class="post-content">
                                        <h2 class="post-title">
                                            <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="post-author"><a href="#">PM Reporter</a></span>
                                            <span class="post-date"><?= $posted_on ?></span>
                                        </div>
                                        <p><?= strip_tags(character_limiter($row->post_desc, 180)) ?></p>
                                    </div><!-- Post content end -->
                                </div><!-- Post Block style 1 end -->

                                <div class="gap-30"></div>
                                
                                
                            
                            <?php } ?>
							</div><!-- Item 1 end -->
                            
                            
                        </div><!-- More news carousel end -->
                    </div><!--More news block end -->
                </div><!-- Content Col end -->