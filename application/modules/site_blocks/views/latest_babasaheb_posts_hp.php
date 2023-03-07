<!-- BEGIN .home-block -->
							<div class="home-block">
								<div class="main-title" style="border-left: 4px solid #1985e1">
									<a href="<?= site_url($cat_segments.'Dr-BR-Amabedkar') ?>" class="right button" style="background: #1985e1; color: #1985e1;">और लेख पढ़ें</a>
									<h2>नवीनतम लेख बाबासाहेब श्रेणी से</h2>
									<span>Most recent articles from Babasaheb Category</span>
								</div>

								<!-- BEGIN .category-default-block -->
								<div class="category-default-block paragraph-row">
                                
                                
									<?php
                                    foreach($query_latest_babasaheb_posts_1->result() as $row){
                                    $post_page = site_url($post_segments.$row->post_url);
									$category_page = site_url($cat_segments.$row->cat_url);
									?>
									<!-- BEGIN .column6 -->
									<div class="column6">
                                    		<div class="item-main">
											<div class="item-header">
												<a href="<?= $post_page ?>" class="image-hover"><img src="<?= base_url() ?>assets/images/post_img/main/<?= $row->post_img ?>" alt="" width="100%" /></a>
											</div>
											<div class="item-content">
												<div class="content-category">
													<a href="<?= $category_page ?>" style="color: <?= $row->cat_class ?>;"><?= $row->cat_title ?></a>
												</div>
												<h3><a href="<?= $post_page ?>"><?= $row->post_title.' '.$row->id ?></a></h3>
												<p align="justify"><?= character_limiter($row->post_desc, 200) ?></p>
												<a href="<?= $post_page ?>" class="read-more-link">और पढ़ें<i class="fa fa-angle-double-right"></i></a>
											</div>
										</div>
                                        									<!-- END .column6 -->
									</div>
                                    
                                    <?php } ?>
									
									
									

									<!-- BEGIN .column6 -->
									<div class="column6 smaller-articles">
                                    	<?php
											foreach($query_latest_babasaheb_posts_5->result() as $row){
											$post_page = site_url($post_segments.$row->post_url);
										?>
                                    
                                     		<div class="item">
											<div class="item-header">
												<a href="<?= $post_page ?>" class="image-hover"><img src="<?= base_url() ?>assets/images/post_img/tiny/<?= $row->post_img ?>" alt="बाबा साहब का वर्गोन्मुख सिद्धांत" /></a>
											</div>
											<div class="item-content">
												<h3><a href="<?= $post_page ?>" style="text-align:justify"><?= $row->post_title.' '.$row->id ?> - <?= character_limiter($row->post_desc, 50) ?></a></h3>
												<a href="<?= $post_page ?>" class="read-more-link">और पढ़ें<i class="fa fa-angle-double-right"></i></a>
											</div>
										</div>
										
                                        <?php } ?>								
																				
									<!-- END .column6 -->
									</div>

								<!-- END .category-default-block -->
								</div>

							<!-- END .home-block -->
							</div>	