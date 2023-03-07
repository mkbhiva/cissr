<div class="news-block news-popular"><h2 class="title">Popular News</h2><div id="carousel-popular25" class="carousel slide"><ol class="carousel-indicators"><li data-target='#carousel-popular25' data-slide-to='0' class='active'></li>
                                        <li data-target='#carousel-popular25' data-slide-to='1'></li>
                                        <li data-target='#carousel-popular25' data-slide-to='2'></li>
                                        <li data-target='#carousel-popular25' data-slide-to='3'></li>
                                    </ol>
                                    
                                    <div class="carousel-inner">
                                    
                                    
                                     
                                    			<div class="item active"><div class="row">
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_1->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                        		<div class="col-sm-6 col-primary">
                                        	<div class="item-inner">
                                            	<div class="entry-image"><a href="<?= $post_page ?>">
                                                <img width="296" height="164" src="<?= base_url() ?>assets/images/blog/medium/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                
                                                <div class="overlay">
                                                <a class="btn btn-primary btn-sm" href="<?= $post_page ?>">View Details</a>
                                                </div></div>
                                                
                                                <div class="entry-content">
                                                <h3 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h3>
                                                </div></div></div>
                                                
                                                <?php } ?>
                                                
                                                
                                            
                                                <div class="col-sm-6 col-secondary">
                                                
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_2->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                                
                                                <div class="media">
                                                <div class="pull-left">
                                                <a href="<?= $post_page ?>"><img width="64" height="64" src="<?= base_url() ?>assets/images/blog/thumb/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                </div>
                                                
                                                <div class="media-body">
                                                <h4 class="entry-title">
                                                <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                                </h4>
                                                
                                                <div class="entry-meta small">
                                                	<i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?>
                                                </div>
                                                
                                                </div>
                                                </div>
                                                
                                                <?php } ?>
                                                     
                                                 </div>
                                                
                                                </div></div>
                                                
                                                <div class="item "><div class="row">
                                                
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_3->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                        		<div class="col-sm-6 col-primary">
                                        	<div class="item-inner">
                                            	<div class="entry-image"><a href="<?= $post_page ?>">
                                                <img width="296" height="164" src="<?= base_url() ?>assets/images/blog/medium/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                
                                                <div class="overlay">
                                                <a class="btn btn-primary btn-sm" href="<?= $post_page ?>">View Details</a>
                                                </div></div>
                                                
                                                <div class="entry-content">
                                                <h3 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h3>
                                                </div></div></div>
                                                
                                                <?php } ?>
                                                
                                                <div class="col-sm-6 col-secondary">
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_4->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                                
                                                <div class="media">
                                                <div class="pull-left">
                                                <a href="<?= $post_page ?>"><img width="64" height="64" src="<?= base_url() ?>assets/images/blog/thumb/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                </div>
                                                
                                                <div class="media-body">
                                                <h4 class="entry-title">
                                                <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                                </h4>
                                                
                                                <div class="entry-meta small">
                                                	<i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?>
                                                </div>
                                                
                                                </div>
                                                </div>
                                                
                                                <?php } ?>
                                                
                                                </div>
                                                
                                                </div></div>
                                                
                                                <div class="item "><div class="row">
                                                
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_5->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                        		<div class="col-sm-6 col-primary">
                                        	<div class="item-inner">
                                            	<div class="entry-image"><a href="<?= $post_page ?>">
                                                <img width="296" height="164" src="<?= base_url() ?>assets/images/blog/medium/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                
                                                <div class="overlay">
                                                <a class="btn btn-primary btn-sm" href="<?= $post_page ?>">View Details</a>
                                                </div></div>
                                                
                                                <div class="entry-content">
                                                <h3 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h3>
                                                </div></div></div>
                                                
                                                <?php } ?>
                                                
                                                <div class="col-sm-6 col-secondary">
                                                
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_6->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                                
                                                <div class="media">
                                                <div class="pull-left">
                                                <a href="<?= $post_page ?>"><img width="64" height="64" src="<?= base_url() ?>assets/images/blog/thumb/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                </div>
                                                
                                                <div class="media-body">
                                                <h4 class="entry-title">
                                                <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                                </h4>
                                                
                                                <div class="entry-meta small">
                                                	<i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?>
                                                </div>
                                                
                                                </div>
                                                </div>
                                                
                                                <?php } ?>
                                                
                                                </div>
                                                
                                                </div></div>
                                                
                                                <div class="item "><div class="row">
                                                
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_7->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                        		<div class="col-sm-6 col-primary">
                                        	<div class="item-inner">
                                            	<div class="entry-image"><a href="<?= $post_page ?>">
                                                <img width="296" height="164" src="<?= base_url() ?>assets/images/blog/medium/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                
                                                <div class="overlay">
                                                <a class="btn btn-primary btn-sm" href="<?= $post_page ?>">View Details</a>
                                                </div></div>
                                                
                                                <div class="entry-content">
                                                <h3 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h3>
                                                </div></div></div>
                                                
                                                <?php } ?>
                                                
                                                <div class="col-sm-6 col-secondary">
                                                
                                                <?php
													$this->load->module('timedate');
													foreach($query_random_post_8->result() as $row) { 
													$post_page = site_url($post_segments.$row->post_url);
													$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
													$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
												?>
                                                
                                                
                                                <div class="media">
                                                <div class="pull-left">
                                                <a href="<?= $post_page ?>"><img width="64" height="64" src="<?= base_url() ?>assets/images/blog/thumb/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/></a>
                                                </div>
                                                
                                                <div class="media-body">
                                                <h4 class="entry-title">
                                                <a href="<?= $post_page ?>"><?= $row->post_title ?></a>
                                                </h4>
                                                
                                                <div class="entry-meta small">
                                                	<i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?>
                                                </div>
                                                
                                                </div>
                                                </div>
                                                
                                                <?php } ?>
                                                
                                                </div>
                                                
                                                </div></div>
                                                
                                                
                                      </div></div></div>