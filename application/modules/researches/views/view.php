<?php 
$this->load->module('timedate');
$date_created = $this->timedate->get_nice_date($research_date,'good'); 
$day = $this->timedate->get_nice_date($research_date,'onlydate');
$month = $this->timedate->get_nice_date($research_date,'onlymonth');
?>

<div class="container">
					<div class="row pt-5">

						<div class="col-lg-9">

							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post">

									<div class="post-date">
										<span class="day"><?= $day ?></span>
										<span class="month"><?= $month ?></span>
									</div>

									<div class="post-content">

										<h1><?= $research_title ?></h1>

										<div class="divider divider-primary divider-small mb-4">
											<hr class="mr-auto">
										</div>
										
										<div class="post-meta">
											<span><i class="far fa-calendar-alt"></i> <a href="#"><?= $date_created ?></a> </span>
                                            <span><i class="far fa-user"></i> By <a href="#"><?= $research_author ?></a> </span>
                                            <span><i class="fas fa-medal"></i> <a href="#"><?= $research_coauthor ?></a> </span>
										</div>

										<img src="<?= base_url() ?>assets/images/law-firm/blog/blog-law-firm-2.jpg" class="img-fluid float-left mb-1 mt-2 mr-4" alt="" style="width: 195px;">

										<p><?= $research_desc ?></p>


									</div>
								</article>

							</div>

						</div>
                        <?php echo Modules::run('site_blocks/_sidebar_block') ;?>

					</div>

				</div>