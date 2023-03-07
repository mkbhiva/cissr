<section class="page-header page-header-modern bg-color-secondary page-header-lg mb-0">
					<div class="container">
						<div class="row my-4">
							<div class="col-md-12 align-self-center text-center">
								<h1 class="text-9 text-color-light custom-secondary-font font-weight-bold my-4">Events</h1>
							</div>
						</div>
					</div>
				</section>

				<?php echo Modules::run('site_blocks/_next_event_block') ;?>

				<section class="section section-no-border bg-color-light m-0">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-color-dark mb-3">Past Events</h2>
							</div>
						</div>
						<div class="row">
                        	<?php
								$this->load->module('timedate'); 
								foreach($query->result() as $row){
								$day = $this->timedate->get_nice_date($row->event_dated,'onlydate');
								$month = $this->timedate->get_nice_date($row->event_dated,'onlymonth');
								$year = $this->timedate->get_nice_date($row->event_dated,'onlyyear');
							?>
							<div class="col-lg-6">
								<article class="custom-post-event bg-color-light mb-4 mb-lg-0">
									<div class="post-event-date bg-color-primary text-center">
										<span class="month text-uppercase custom-secondary-font text-color-light"><?= $month ?></span>
										<span class="day font-weight-bold text-color-light"><?= $day ?></span>
										<span class="year text-color-light"><?= $year ?></span>
									</div>
									<div class="post-event-content custom-margin-1">
										<span class="custom-event-infos">
											<ul>
												<li>
													<i class="far fa-clock"></i>
													<?= $row->event_time ?>
												</li>
												<li class="text-uppercase">
													<i class="fas fa-map-marker-alt"></i>
													<?= $row->event_location ?>
												</li>
											</ul>
										</span>
										<h4 class="font-weight-bold text-color-dark">
											<a href="<?= site_url('ourevents/view/'.$row->id) ?>" class="text-decoration-none custom-secondary-font text-color-dark">
												<?= $row->name ?>
											</a>
										</h4>
										<p align="justify"><?= strip_tags(character_limiter($row->eventdesc, 150)) ?></p>
									</div>
									<hr class="solid">
								</article>
							</div>
							
                            <?php } ?>
                            
						</div>
					</div>
				</section>
                
                <div class="container">
                <div class="row">
                    <div class="col">
                        <?= $pagination ?>
                    </div>
                </div>
                </div>

				<?php echo Modules::run('site_blocks/_footer_map_block') ;?>