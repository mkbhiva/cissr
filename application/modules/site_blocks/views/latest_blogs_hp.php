<div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="mt-4 mb-0">Latest Blog</h2>
                            <div class="divider divider-primary divider-small divider-small-center mb-4">
                                <hr>
                            </div>
                            <p align="right"><a href="<?= site_url('blogs/listing'); ?>" class="btn btn-primary mb-3">More Blog</a></p>
                        </div>
                    </div>
                    <div class="row">
                    	<?php
							$this->load->module('timedate'); 
							foreach($query->result() as $row){
							$date_created = $this->timedate->get_nice_date($row->blog_date,'good');
							$desc = character_limiter(strip_tags($row->blog_desc), 170);
							
							if(!$row->blog_file == ''){
								$img = $row->blog_file;
							} else {
								$img = 'no-blog-jpg.jpg';
							}

						?>
                        <div class="col-lg-4">

                            <span class="thumb-info thumb-info-side-image thumb-info-no-zoom border mb-5">
                                <span class="thumb-info">
                                    <a href="<?= site_url('blogs/view/'.$row->blog_url) ?>">
                                        <img src="<?= base_url() ?>assets/images/blogs/small/<?= $img; ?>" class="img-fluid" alt="<?= $row->blog_title ?>">
                                    </a>
                                </span>
                                <span class="thumb-info-caption">
                                    <span class="thumb-info-caption-text py-0 px-4">
                                        <h2 class="mb-3 mt-3"><a class="text-dark" href="<?= site_url('blogs/view/'.$row->blog_url) ?>"><?= $row->blog_title ?></a></h2>
                                        <span class="post-meta">
                                            <span><?= $date_created; ?> | <a href="#"><?= $row->blog_author; ?></a></span>
                                        </span>
                                        <p align="justify" class="text-3 pt-0"><?= $desc; ?></p>
                                        <a class="mt-3" href="<?= site_url('blogs/view/'.$row->blog_url) ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </span>
                                </span>
                            </span>

                        </div>
                        <?php } ?>
                    </div>
                </div>