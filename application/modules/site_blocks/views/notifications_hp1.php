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
                                            $this->load->module('timedate'); 
                                            foreach($query->result() as $row){
                                            $date_created = $this->timedate->get_nice_date($row->notifi_date,'good');
                                        ?>
                                        
                                        <div style="border:1px solid #333; padding:7px; height:55px;">
                                            <div style="width:10%; float:left; margin-right:10px;">
                                                <div style=" font-size:10px; font-weight:800;  border:1px solid brown; border-radius: 5px; width:35px; line-height:15px; padding:3px; text-align:center;">21 Mar</div>
                                            </div>
                                            <div style="width:90%; line-height:18px;">
                                                <a class="notificationhp" href="#"><?= $row->notifi_title ?> <img src="<?= base_url() ?>assets/images/new.gif" class="img-fluid" alt="" style="width: 50px;"></a>
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                        
                                        
                                </div>
                                
 </div>