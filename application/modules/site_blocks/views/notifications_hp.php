<div class="col-lg-4 mb-4 mb-lg-0">
                                <div class="row">
                                     <div class="col-6">
                                        <h2 class="mb-0">Notifications </h2>
                                     </div>
                                     
                                     <div class="col-6" align="right">
                                        <a href="<?= site_url('notifications/listing') ?>"><h2 class="mb-0"><span style="font-size:14px; border-radius: 12px; color:#FFF; background-color:#CFA968; padding:5px 15px;">View All</span></h2></a>
                                     </div>
                                    
                                </div>
                                
                            
                            
                                
                                <div class="divider divider-primary divider-small mb-4">
                                    <hr class="mr-auto">
                                </div>
                                
                                <div class="ex3">
                                        	<?php
                                                $n = 1;
												$this->load->module('timedate'); 
												foreach($query->result() as $row){
												$date_created = $this->timedate->get_nice_date($row->notifi_date,'good');
												$day = $this->timedate->get_nice_date($row->notifi_date,'onlydate');
												$month = $this->timedate->get_nice_date($row->notifi_date,'onlymonth');
                                                if($n<4){ 
                                                    $new = "New";
                                                } else {
                                                    $new = "Old";
                                                }
											?>
                                            
                                            <li>
                                            
                                            <span style=" font-size:10px; font-weight:800;  border:1px solid brown; border-radius: 5px; line-height:28px; padding:5px; margin-right:5px; text-align:center;"><?= $day.' '.$month ?></span>
                                            <a  href="<?= site_url('notifications/view/'.$row->notifi_url) ?>"><?= $row->notifi_title ?> 
                                                <?php if($new=='New'){ ?><img src="<?= base_url() ?>assets/images/new.gif" class="img-fluid" alt="" style="width: 50px;"><?php } ?>
                                            </a>
                                            
                                            </li>
                                            
											<?php $n++; } ?>
                                            
                                </div>
                                
 </div>