<!--- Featured Tab startet -->
                    <div class="featured-tab color-blue">
                        <h3 class="block-title"><span>Smart Policing</span></h3>
                        

                        <div class="tab-content">
                          <div class="tab-pane active animated fadeInRight" id="tab_a">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                
                                	<?php
										$this->load->module('timedate');
										foreach($query_latest_posts_cat6x1->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
                                    
                                    <div class="post-block-style clearfix">
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
                                                    <span class="post-author"><a href="#">News Editor</a></span>
                                                    <span class="post-date"><?= $posted_on ?></span>
                                                </div>
                                                <p><?= strip_tags(character_limiter($row->post_desc, 180)) ?></p>
                                            </div><!-- Post content end -->
                                        </div><!-- Post Block style end -->
                                        
                                    <?php } ?>
                                </div><!-- Col end -->

                                <div class="col-lg-6 col-md-6">
                                	
                                
                                    <div class="list-post-block">
                                            <ul class="list-post">
                                            
                                            	<?php
													$this->load->module('timedate');
													foreach($query_latest_posts_cat6x4->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$category_page = site_url($cat_segments.$row->cat_url);
													$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
												?>
                                    
                                                <li class="clearfix">
                                                    <div class="post-block-style post-float clearfix">
                                                        <div class="post-thumb">
                                                            <a href="<?= $post_page ?>">
                                                                <img class="img-fluid" src="<?= base_url() ?>assets/images/blog/thumb/<?= $row->post_img ?>" alt="<?= $row->post_title ?>" />
                                                            </a>
                                                        </div><!-- Post thumb end -->

                                                        <div class="post-content">
                                                            <h2 class="post-title title-small">
                                                                <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
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
                                        
                                       
                                </div><!-- List post Col end -->
                            </div><!-- Tab pane Row 1 end -->
                          </div><!-- Tab pane 1 end -->

   
                        </div><!-- tab content -->
                    </div>
                    <!-- Interrogation Tab end -->