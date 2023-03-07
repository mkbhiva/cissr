<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 p-0">
                            <section class="sectionn section-primary match-height border-0" style="background-image: url(<?= base_url() ?>assets/images/patterns/fancy.jpg);">
                                <div class="row justify-content-end ml-lg-5 pt-5">
                                    <div class="col-half-section col-half-section-right" style="max-width:95% !important">
                                        <h2 class="mb-0">Testimonials</h2>
                                        <div class="divider divider-light divider-small mb-4">
                                            <hr class="mr-auto">
                                        </div>

                                        <div class="owl-carousel owl-theme mb-0" data-plugin-options="{'items': 3, 'margin': 10, 'autoplay': true,'loop': true, 'nav': false, 'dots': true}">
                                        
                                        	<?php
												$this->load->module('timedate'); 
												foreach($query->result() as $row){
													
													if($row->tphoto == ''){
														$timg = 'no-img.jpg';
													} else {
														$timg = $row->tphoto;
													}

											?>
                                            <div>
                                                <div class="testimonial testimonial-style-3 testimonial-trasnparent-background testimonial-alternarive-font">
                                                    <blockquote class="text-light">
                                                        <p align="justify" class="text-light"><?= $row->tdesc ?></p>
                                                    </blockquote>
                                                    <div class="testimonial-author">
                                                        <div class="testimonial-author-thumbnail">
                                                            <img src="<?= base_url() ?>assets/images/testimonial/<?= $timg ?>" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <p><strong><?= $row->tname ?></strong><span class="text-light"><?= $row->tplace ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>

                                        </div>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>