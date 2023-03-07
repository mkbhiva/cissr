<section class="featured-post-area no-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 pad-r">
                    <div id="featured-slider" class="owl-carousel owl-theme featured-slider">
                    
                    	<?php
							$this->load->module('timedate');
							foreach($query_slide_1->result() as $row) { 
							$post_page = site_url($post_segments.$row->post_url);
							$category_page = site_url($cat_segments.$row->cat_url);
							$posted_on = $this->timedate->get_nice_date($row->post_date, 'full');
						?>
                        <div class="item" style="background-image:url(assets/images/blog/main/<?= $row->post_img ?>)">
                            <div class="featured-post">
                                <div class="post-content">
                                    <a class="post-cat" href="<?= $category_page ?>"><?= $row->cat_title ?></a>
                                    <h4 class="post-title title-extra-large">
                                        <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                    </h4>
                                    <span class="post-date"><?= $posted_on ?></span>
                                </div>
                            </div><!--/ Featured post end -->
                            
                        </div><!-- Item 1 end -->
                        <?php } ?>

                    </div><!-- Featured owl carousel end-->
                </div><!-- Col 7 end -->

                <div class="col-lg-5 col-md-12 pad-l">
                    <div class="row">
                        <div class="col-md-12">
                        	<?php
								$this->load->module('timedate');
								foreach($query_slide_2->result() as $row) { 
								$post_page = site_url($post_segments.$row->post_url);
								$category_page = site_url($cat_segments.$row->cat_url);
								$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
							?>
                            <div class="post-overaly-style contentTop hot-post-top clearfix">
                                <div class="post-thumb">
                                    <a href="#"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/xlarge/<?= $row->post_img ?>" alt="" /></a>
                                </div>
                                <div class="post-content">
                                    <a class="post-cat" href="<?= $category_page ?>"><?= $row->cat_title ?></a>
                                    <h2 class="post-title title-large">
                                        <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                    </h2>
                                    <span class="post-date"><?= $posted_on ?></span>
                                </div><!-- Post content end -->
                            </div><!-- Post Overaly end -->
                            <?php } ?>
                        </div><!-- Col end -->

                        <div class="col-md-6 pad-r-small">
                        	<?php
								$this->load->module('timedate');
								foreach($query_slide_3->result() as $row) { 
								$post_page = site_url($post_segments.$row->post_url);
								$category_page = site_url($cat_segments.$row->cat_url);
								$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
							?>
                            <div class="post-overaly-style contentTop hot-post-bottom clearfix">
                                <div class="post-thumb">
                                    <a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt="" /></a>
                                </div>
                                <div class="post-content">
                                    <a class="post-cat" href="<?= $category_page ?>"><?= $row->cat_title ?></a>
                                    <h2 class="post-title title-medium">
                                        <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                    </h2>
                                </div><!-- Post content end -->
                            </div><!-- Post Overaly end -->
                            <?php } ?>
                        </div><!-- Col end -->

                        <div class="col-md-6 pad-l-small">
                        	<?php
								$this->load->module('timedate');
								foreach($query_slide_4->result() as $row) { 
								$post_page = site_url($post_segments.$row->post_url);
								$category_page = site_url($cat_segments.$row->cat_url);
								$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
							?>
                            <div class="post-overaly-style contentTop hot-post-bottom clearfix">
                                <div class="post-thumb">
                                    <a href="<?= $post_page ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt="" /></a>
                                </div>
                                <div class="post-content">
                                    <a class="post-cat" href="<?= $category_page ?>"><?= $row->cat_title ?></a>
                                    <h2 class="post-title title-medium">
                                        <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                    </h2>
                                </div><!-- Post content end -->
                            </div><!-- Post Overaly end -->
                            <?php } ?>
                        </div><!-- Col end -->
                    </div>
                </div><!-- Col 5 end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section>
<!-- Trending post end -->