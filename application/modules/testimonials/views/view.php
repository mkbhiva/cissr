<div class="container">
    <div class="row pt-5 pb-4">
    
        <div class="col-lg-9">
    
            <h1 class="mb-0">Testimonials</h1>
            <div class="divider divider-primary divider-small mb-4">
                <hr class="mr-auto">
            </div>
            
            <?php
				$this->load->module('timedate'); 
				foreach($query->result() as $row){
				$date_created = $this->timedate->get_nice_date($row->tdate,'full');
				
				if($row->tphoto==''){
					$timg = 'no-img.jpg';
				}else {
					$timg = $row->tphoto;
				}
			?>
    
            <div class="row mt-2">
                <div class="col">
    
                    <span class="thumb-info thumb-info-side-image thumb-info-no-zoom border mt-2">
                        <span class="thumb-info-side-image-wrapper p-0">
                            <a href="#">
                                <img src="<?= base_url() ?>assets/images/testimonial/<?= $timg; ?>" class="img-fluid img-thumbnail" alt="<?= $row->tname ?>" style="width: 130px;">
                            </a>
                        </span>
                        <span class="thumb-info-caption">
                            <span class="thumb-info-caption-text py-0 px-4">
                                <h3 class="mb-1 mt-2"><a class="text-dark" href="#"><?= $row->tname ?> </a></h3>
                                <span class="post-meta">
                                    <span><a href="#"><?= $row->tplace ?></a></span>
                                </span>
                                <p class="text-3 px-0 px-md-3"><?= $row->tdesc; ?></p>
                            </span>
                        </span>
                    </span>
    
                </div>
            </div>
            
    		<?php } ?>
        </div>

         
         <?php // echo Modules::run('site_blocks/_sidebar_block_for_blogs'); ?>
    </div>

</div>

