<?php 
$this->load->module('timedate');
$date_created = $this->timedate->get_nice_date($volumeDate,'good'); 
$day = $this->timedate->get_nice_date($volumeDate,'onlydate');
$month = $this->timedate->get_nice_date($volumeDate,'onlymonth');
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

										<h1><?= $volumeNo ?></h1>

										<div class="divider divider-primary divider-small mb-4">
											<hr class="mr-auto">
										</div>
										
										<div class="post-meta">
											<span><i class="far fa-calendar-alt"></i> <a href="#"><?= $date_created ?></a> </span>
										</div>

										

										<p><?= $issueNo ?></p>
                                        
                                        <?php if(!$notifi_file=='') { ?>
										<p><a target="_blank" href="<?= base_url() ?>assets/pdf/volumes/<?= $notifi_file ?>"><img src="<?= base_url() ?>assets/images/dowonloadpdf1.png" width="150" /></a></p>
										<?php } ?>	
									</div>
								</article>

							</div>

						</div>
                        <?php echo Modules::run('site_blocks/_sidebar_block') ;?>

					</div>

				</div>