<section class="block-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="block color-dark-blue">
                        <h3 class="block-title"><span>Super Cop</span></h3>
                        <?php
							$this->load->module('timedate');
							foreach($query_block_4_hp_cat3x1_1->result() as $row) { 
							$post_page = site_url($post_segments.$row->post_url);
							$category_page = site_url($cat_segments.$row->cat_url);
							$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
						?>
                        <div class="post-overaly-style clearfix">
                            <div class="post-thumb">
                                <a href="<?= $post_page ?>">
                                    <img class="img-fluid" src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt="" />
                                </a>
                            </div>
                            
                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date"><?= $posted_on ?></span>
                                </div>
                            </div><!-- Post content end -->
                        </div><!-- Post Overaly Article end -->
                        <?php } ?>

                        <div class="list-post-block">
                            <ul class="list-post">
                            
                            	<?php
									$this->load->module('timedate');
									foreach($query_block_4_hp_cat3x3_1->result() as $row) { 
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
                    </div><!-- Block end -->
                </div><!-- Smart Policing Col end -->

                <div class="col-lg-4">
                    <div class="block color-aqua">
                        <h3 class="block-title"><span>Transfer</span></h3>
                        <?php
							$this->load->module('timedate');
							foreach($query_block_4_hp_cat3x1_2->result() as $row) { 
							$post_page = site_url($post_segments.$row->post_url);
							$category_page = site_url($cat_segments.$row->cat_url);
							$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
						?>
                        <div class="post-overaly-style clearfix">
                            <div class="post-thumb">
                                <a href="<?= $post_page ?>">
                                    <img class="img-fluid" src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt="" />
                                </a>
                            </div>
                            
                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date"><?= $posted_on ?></span>
                                </div>
                            </div><!-- Post content end -->
                        </div><!-- Post Overaly Article end -->
                        <?php } ?>

                        <div class="list-post-block">
                            <ul class="list-post">
                            
                            	<?php
									$this->load->module('timedate');
									foreach($query_block_4_hp_cat3x3_2->result() as $row) { 
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
                    </div><!-- Block end -->
                </div><!-- Smart Policing Col end -->
                
                <div class="col-lg-4">
                    <div class="block color-violet">
                        <h3 class="block-title"><span>Encounter</span></h3>
                        <?php
							$this->load->module('timedate');
							foreach($query_block_4_hp_cat3x1_3->result() as $row) { 
							$post_page = site_url($post_segments.$row->post_url);
							$category_page = site_url($cat_segments.$row->cat_url);
							$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
						?>
                        <div class="post-overaly-style clearfix">
                            <div class="post-thumb">
                                <a href="<?= $post_page ?>">
                                    <img class="img-fluid" src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt="" />
                                </a>
                            </div>
                            
                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date"><?= $posted_on ?></span>
                                </div>
                            </div><!-- Post content end -->
                        </div><!-- Post Overaly Article end -->
                        <?php } ?>

                        <div class="list-post-block">
                            <ul class="list-post">
                            
                            	<?php
									$this->load->module('timedate');
									foreach($query_block_4_hp_cat3x3_3->result() as $row) { 
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
                    </div><!-- Block end -->
                </div><!-- Smart Policing Col end -->

                

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- 2nd block end -->