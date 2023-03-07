<div class="container">
    <div class="row pt-5 pb-4">
    
        <div class="col-lg-9">
    
            <h1 class="mb-0">Interviews</h1>
            <div class="divider divider-primary divider-small mb-4">
                <hr class="mr-auto">
            </div>
            
            <?php
				$this->load->module('timedate'); 
				foreach($query->result() as $row){
				$date_created = $this->timedate->get_nice_date($row->interview_date,'good');
                $desc = character_limiter(strip_tags($row->interview_desc), 150);
			?>
    
            <div class="row mt-2">
                <div class="col">
    
                    <span class="thumb-info thumb-info-side-image thumb-info-no-zoom border mt-2">
                        <span class="thumb-info-side-image-wrapper p-2">
                            <a href="<?= site_url('interviews/view/'.$row->interview_url) ?>">
                                <img src="<?= base_url() ?>assets/images/interviews/small/<?= $row->interview_file; ?>" class="img-fluid" alt="<?= $row->interview_title ?>">
                            </a>
                        </span>
                        <span class="thumb-info-caption">
                            <span class="thumb-info-caption-text py-0 px-4">
                                <h3 class="mb-1 mt-2"><a class="text-dark" href="<?= site_url('interviews/view/'.$row->interview_url) ?>"><?= $row->interview_title ?> </a></h3>
                                <span class="post-meta">
                                    <span><?= $date_created ?> | By <a href="#"><?= $row->interview_author ?></a> | <?= $row->interview_authordesc ?></span>
                                </span>
                                <p class="text-3 px-0 px-md-3" align="justify"><?= $desc; ?></p>
                                <a class="mt-3" href="<?= site_url('interviews/view/'.$row->interview_url) ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                            </span>
                        </span>
                    </span>
    
                </div>
            </div>
            
    		<?php } ?>
        </div>
    	<?php 

        $segmentlink = $this->uri->segment(1);

        if($segmentlink=='interviews'){
            echo Modules::run('site_blocks/_sidebar_block_for_interviews');
         } else {
            echo Modules::run('site_blocks/_sidebar_block');
         } ?>
    </div>

</div>