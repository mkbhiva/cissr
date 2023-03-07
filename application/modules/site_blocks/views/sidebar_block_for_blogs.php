

<div class="col-lg-3">
              <aside class="sidebar">
                <div class="filters">

                  <h4 class="mb-3">More Articles</h4>
                  <ul class="nav nav-listt flex-column mb-5">
                    <?php
                      foreach ($query_random_blogsx10->result() as $row) {

                        if(!$row->blog_file == ''){
                          $img = $row->blog_file;
                        } else {
                          $img = 'no-blog-jpg.jpg';
                        }

                    ?>
                    <li style="border:1px #ccc solid; margin-bottom:5px;">
                    <a href="<?= site_url('blogs/view/'.$row->blog_url) ?>">
                    	<div class="row">
                        	<div class="col-md-5" style="padding-right:5px">
                            	<img width="100%" src="<?= base_url() ?>assets/images/blogs/small/<?= $img; ?>" alt="<?= $row->blog_title ?>">
                            </div>
                            <div class="col-md-7" style="margin:0px; padding-left:0px">
                            	<div style="margin-left:0px; clear:both"><?= character_limiter($row->blog_title, 45);  ?></div>
                            </div>
                        
                        </div>
                    </a>
                    </li>
                    <?php } ?>
                  </ul>
				

                </div>

                

              </aside>
            </div>