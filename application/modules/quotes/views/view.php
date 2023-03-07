<section class="page-header page-header-modern page-header-background page-header-background-sm parallax overlay overlay-color-dark overlay-show overlay-op-1 my-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url() ?>assets/images/main/about-us/about-us-parallax-1.jpg">
					<div class="container">
						<div class="row my-5">
							<div class="col-md-12 align-self-center text-center">
								<h1 class="text-9 text-color-light custom-secondary-font font-weight-bold my-3">Daily Quotes</h1>
							</div>
						</div>
					</div>
				</section>

				<section class="section section-tertiary section-no-border m-0">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-color-dark">Recent Quote</h2>
							</div>
						</div>
                        <?php
							$this->load->module('timedate');
							foreach($query->result() as $row1){
							$day1 = $this->timedate->get_nice_date($row1->quote_created,'onlydate');
							$month1 = $this->timedate->get_nice_date($row1->quote_created,'onlymonth');
							$year1 = $this->timedate->get_nice_date($row1->quote_created,'onlyyear');
						?>
						<div class="row">
							<div class="col">
								<article class="custom-post-event bg-color-light p-4">
									<div class="post-event-date bg-color-primary custom-xlg-space text-center">
										<span class="month text-uppercase custom-secondary-font text-color-light"><?= $month1 ?></span>
										<span class="day font-weight-bold text-color-light"><?= $day1 ?></span>
										<span class="year text-color-light"><?= $year1 ?></span>
									</div>
									<div class="post-event-content custom-margin-1 pl-2">
										
										<p><h2><?= $row1->quote_desc ?></h2></p>
                                        <h4 class="font-weight-bold text-color-dark">
											<a href="#" class="text-decoration-none custom-secondary-font text-color-dark">
												<?= $row1->quote_text ?>
											</a>
										</h4>
										
									</div>
								</article>
							</div>
						</div>
                        <?php } ?>
					</div>
				</section>

				<section class="section section-no-border bg-color-light m-0">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-color-dark mb-5">Past Quotes</h2>
							</div>
						</div>
						<div class="row">
                        	<?php
							$this->load->module('timedate');
							foreach($query_past->result() as $row2){
							$day2 = $this->timedate->get_nice_date($row2->quote_created,'onlydate');
							$month2 = $this->timedate->get_nice_date($row2->quote_created,'onlymonth');
							$year2 = $this->timedate->get_nice_date($row2->quote_created,'onlyyear');
							?>
							<div class="col-lg-6">
								<article class="custom-post-event bg-color-light custom-sm-margin-bottom-2 mb-5">
									<div class="post-event-date bg-color-primary text-center">
										<span class="month text-uppercase custom-secondary-font text-color-light"><?= $month2 ?></span>
										<span class="day font-weight-bold text-color-light"><?= $day2 ?></span>
										<span class="year text-color-light"><?= $year2 ?></span>
									</div>
									<div class="post-event-content custom-margin-1">
										
										<p><?= $row2->quote_desc ?></p>
                                        <h4 class="font-weight-bold text-color-dark">
											<a href="#" class="text-decoration-none custom-secondary-font text-color-dark">
												<?= $row2->quote_text ?>
											</a>
										</h4>
										
									</div>
									<hr class="solid">
								</article>
							</div>
                            <?php } ?>
						</div>
					</div>
				</section>

				<?php echo Modules::run('site_blocks/_footer_map_block') ;?>