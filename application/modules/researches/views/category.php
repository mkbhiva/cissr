<div class="container">
    <div class="row pt-5 pb-4">
    
        <div class="col-lg-9">
    
            <h1 class="mb-0"><?= $vol_title ?></h1>
            <div class="divider divider-primary divider-small mb-4">
                <hr class="mr-auto">
            </div>
            
            <?php
				$this->load->module('timedate'); 
				foreach($query->result() as $row){
				$date_created = $this->timedate->get_nice_date($row->research_date,'good');
			?>
    
            <div class="row mt-2">
                <div class="col">
    
                    <span class="thumb-info thumb-info-side-image thumb-info-no-zoom border mt-2">
                        <span class="thumb-info-side-image-wrapper p-0 d-none d-md-block">
                            <a title="" href="<?= site_url('researches/view/'.$row->research_url) ?>">
                                <img src="<?= base_url() ?>assets/images/law-firm/blog/blog-law-firm-2.jpg" class="img-fluid" alt="" style="width: 80px;">
                            </a>
                        </span>
                        <span class="thumb-info-caption">
                            <span class="thumb-info-caption-text py-0 px-4">
                                <h3 class="mb-1 mt-2"><a title="" target="_blank" class="text-dark" href="<?= base_url('assets/pdf/researches/'.$row->research_file) ?>"><?= $row->research_title ?> </a></h3>
                                <span class="post-meta">
                                    <span>By <a href="#"><?= $row->research_author ?></a> | Co-Author : <?= $row->research_coauthor ?> <br><?= $date_created ?> | <i class="fas fa-file-pdf"></i> <!-- Page <?= $row->research_pages ?>--></span>
                                </span>
                            </span>
                        </span>
                    </span>
    
                </div>
            </div>
            
    		<?php } ?>
        </div>
    	<?php echo Modules::run('site_blocks/_sidebar_block_for_volumes') ;?>
    </div>

</div>