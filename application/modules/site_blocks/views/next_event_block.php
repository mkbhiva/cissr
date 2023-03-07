<section class="section section-tertiary section-no-border m-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <h2 class="text-color-dark font-weight-bold">Next Event</h2>
                                <?php 
								$this->load->module('timedate');
								foreach($query_for_next->result() as $row) { 
								$dated = $this->timedate->get_nice_date($row->event_dated,'cool2');
								
								?>
                                <article class="thumb-info custom-thumb-info custom-box-shadow">
                                    <span class="thumb-info-wrapper">
                                        <a href="<?= site_url('ourevents/view/'.$row->id) ?>">
                                            <img src="<?= base_url() ?>assets/images/eventsimg/main/<?= $row->event_image ?>" alt class="img-fluid" />
                                        </a>
                                    </span>
                                    <span class="thumb-info-caption">
                                        
                                        <span class="custom-event-infos">
                                            <ul>
                                                <li>
                                                    <i class="far fa-calendar-alt"></i>
                                                    <?= $dated ?>
                                                </li>
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
                                        <span class="thumb-info-caption-text">
                                            <h4 class="font-weight-bold mb-2">
                                                <a href="<?= site_url('ourevents/view/'.$row->id) ?>" class="text-decoration-none custom-secondary-font text-color-dark">
                                                    <?= $row->name ?>
                                                </a>
                                            </h4>
                                            <p align="justify"><?= strip_tags(character_limiter($row->eventdesc, 150)) ?></p>
                                        </span>
                                    </span>
                                </article>
                                <?php } ?>
                                
                            </div>
                            <div class="col-lg-6">
                                <h2 class="text-color-dark font-weight-bold">Upcoming Event</h2>
                                <?php
									$this->load->module('timedate'); 
									foreach($query_for_upcoming->result() as $row){
									$day = $this->timedate->get_nice_date($row->event_dated,'onlydate');
									$month = $this->timedate->get_nice_date($row->event_dated,'onlymonth');
									$year = $this->timedate->get_nice_date($row->event_dated,'onlyyear');
								?>
                                <article class="custom-post-event">
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
                                        <h4 class="font-weight-bold">
                                            <a href="<?= site_url('ourevents/view/'.$row->id) ?>" class="text-decoration-none custom-secondary-font text-color-dark"><?= $row->name ?></a>
                                        </h4>
                                        <p align="justify"><?= strip_tags(character_limiter($row->eventdesc, 150)) ?></p>
                                    </div>
                                </article>
                                <hr class="solid">
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </section>