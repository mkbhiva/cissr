<div class="widget color-default">
                            <h3 class="block-title"><span>Khaki Connection</span></h3>
                            <div class="list-post-block">
                                <ul class="list-post review-post-list">
                                
                                	<?php
										$this->load->module('timedate');
										foreach($query_random_block6_hp->result() as $row) { 
										$post_page = site_url($post_segments.$row->post_url);
										$category_page = site_url($cat_segments.$row->cat_url);
										$posted_on = $this->timedate->get_nice_date($row->post_date, 'good');
									?>
                                    <li class="clearfix">
                                        <div class="post-block-style post-float clearfix">
                                            <div class="post-thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="<?= base_url() ?>assets/images/blog/thumb/<?= $row->post_img ?>" alt="" />
                                                </a>
                                            </div><!-- Post thumb end -->

                                            <div class="post-content">
                                                <h2 class="post-title">
                                                    <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                                </h2>
                                            </div><!-- Post content end -->
                                        </div><!-- Post block style end -->
                                    </li><!-- Li 1 end -->

  									<?php } ?>

                                </ul><!-- List post end -->
                            </div><!-- List post block end -->
                        </div><!-- Latest Review Widget end -->