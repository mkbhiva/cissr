<section class="page-header page-header-modern bg-color-secondary custom-section-padding-3 page-header-lg mb-0">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center text-center">
								<h1 class="text-9 text-color-light custom-secondary-font font-weight-bold mb-1">Blog</h1>
							</div>
						</div>
					</div>
				</section>

				<section class="section section-no-border bg-color-light m-0">
					<div class="container">
						<div class="row custom-negative-margin-2 mb-4">
							<div class="col">
								<div class="custom-event-top-image">
									<div class="countdown custom-newcomers-class custom-newcomers-pos-2 custom-secondary-font custom-box-shadow font-weight-bold text-color-dark clock-one-events text-center" data-plugin-countdown data-plugin-options="{'date': '2019/06/10 12:00:00', 'numberClass': 'font-weight-bold text-color-primary', 'wrapperClass': 'text-color-dark', 'textDay': 'Day', 'textHour': 'Hrs', 'textMin': 'Min', 'textSec': 'Sec', 'uppercase': false}"></div>
									<img src="<?= base_url() ?>assets/images/blog/main/<?= $post_img ?>" alt class="img-fluid custom-border-1 custom-box-shadow" />
								</div>
							</div>
                            <div id="postEnglish"></div>
						</div>
                        <?php
                        $this->load->module('timedate');
						$day = $this->timedate->get_nice_date($post_date,'onlydate');
						$month = $this->timedate->get_nice_date($post_date,'onlymonth');
						$year = $this->timedate->get_nice_date($post_date,'onlyyear');
						?>
						<div class="row">
							<div class="col">
								<article class="custom-post-event bg-color-light">
									<div class="post-event-date bg-color-primary text-center">
										<span class="month text-uppercase custom-secondary-font text-color-light"><?= $month ?></span>
										<span class="day font-weight-bold text-color-light"><?= $day ?></span>
										<span class="year text-color-light"><?= $year ?></span>
									</div>
                                    
									<div class="post-event-content custom-margin-1 mb-4">
										<h2 class="font-weight-bold text-color-dark mb-0"><?= $post_title_en ?></h2>
										<span class="custom-event-infos">
											<ul class="mb-3">
												<li class="text-uppercase">
													<i class="far fa-user"></i>
													Site Administrator
												</li>
                                                <?php 
													if(!$post_desc_hn==''){
												?>
                                                <span style="float:right">
                                                <a href="#postHindi" class="btn btn-primary">
                                                	??????????????? ????????? ????????????
                                                </a>
                                                </span>
                                                
                                                <?php } ?>
											</ul>
										</span>
										<p><?= $post_desc ?></p>
                                        
                                        <?php 
											if(!$post_desc_hn == ''){
										?>
                                        <div id="postHindi"></div>
                                        <br />
                                        <hr />
                                        <br />
                                        <h3 class="font-weight-bold text-color-dark mb-3"><?= $post_title ?></h3>
                                        <span class="custom-event-infos">
											<ul class="mb-3">
												<li class="text-uppercase">
													<i class="far fa-user"></i>
													Site Administrator
												</li>
                                                <span style="float:right">
                                                <a href="#postEnglish" class="btn btn-primary">
                                                	Read in English
                                                </a>
                                                </span>
											</ul>
										</span>
                                        <p align="justify" style="font-size:16px" class="mt-4">
                                        	<?= $post_desc_hn ?>
                                        </p>
                                        <?php } ?>
									</div>
								</article>
							</div>
						</div>
					</div>
				</section>

				<?php echo Modules::run('site_blocks/_footer_map_block') ;?>