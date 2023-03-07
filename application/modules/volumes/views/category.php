<div class="container">
    <div class="row pt-5 pb-4">
    
        <div class="col-lg-9">
    
            <h1 class="mb-0">Volumes</h1>
            <div class="divider divider-primary divider-small mb-4">
                <hr class="mr-auto">
            </div>
            
            <?php
				$n = 1;
				$this->load->module('timedate'); 
				foreach($query->result() as $row){
				$date_created = $this->timedate->get_nice_date($row->volumeDate,'good');
				if($n<4){ 
					$new = "New";
				} else {
					$new = "Old";
				}
			?>
    
            <div class="row mt-2">
                <div class="col">
    
                    <span class="thumb-info thumb-info-side-image thumb-info-no-zoom border mt-2">
                        <span class="thumb-info-caption">
                            <span class="thumb-info-caption-text py-0 px-4">
                                <h3 class="mb-1 mt-2"><a title="" class="text-dark" href="<?= site_url('volumes/view/'.$row->notifi_url) ?>"><?= $row->volumeNo ?></a><?php if($new=='New'){ ?><img src="<?= base_url() ?>assets/images/new.gif" class="img-fluid" alt="" style="width: 80px;"><?php } ?></h3>
                                <span class="post-meta">
                                    <span><?= $date_created ?> </span>
                                </span>
                            </span>
                        </span>
                    </span>
    
                </div>
            </div>
            
    		<?php $n++; } ?>
        </div>
    	<?php echo Modules::run('site_blocks/_sidebar_block') ;?>
    </div>

</div>