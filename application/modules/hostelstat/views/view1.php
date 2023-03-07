<section class="page-header page-header-modern page-header-background page-header-background-sm parallax overlay overlay-color-dark overlay-show overlay-op-1 my-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url() ?>assets/images/main/about-us/about-us-parallax-1.jpg">
					<div class="container">
						<div class="row my-5">
							<div class="col-md-12 align-self-center text-center">
								<h1 class="text-9 text-color-light custom-secondary-font font-weight-bold my-3">Benificary Speaks</h1>
							</div>
						</div>
					</div>
				</section>

				<section class="section section-tertiary section-no-border m-0">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-color-dark">Recent Expressions</h2>
							</div>
						</div>
                        <?php foreach($query->result() as $row) { ?>
						<div class="row">
                        	<div class="col-lg-2 col-sm-2 bg-color-lightt p-4">
                            	<img src="<?= base_url() ?>assets/images/testimonial/<?= $row->tphoto ?>" class="img-fluid  rounded-circle" alt="" />
                            </div>
							<div class="col-lg-10 col-sm-10">
								<article class="custom-post-event bg-color-light p-4">
									<div class="post-event-content custom-marginn-1 pll-2">
										<h4 class="font-weight-bold text-color-dark">
											<a href="#" class="text-decoration-none custom-secondary-font text-color-dark">
												<?= $row->tname ?> - <span class="badge badge-secondary"><?= $row->tplace ?></span>
											</a>
										</h4>
										<p><?= $row->tdesc ?></p>
										
									</div>
								</article>
							</div>
						</div>
                        <hr />
					<?php } ?>
					</div>
				</section>

				<?php echo Modules::run('site_blocks/_footer_map_block') ;?>