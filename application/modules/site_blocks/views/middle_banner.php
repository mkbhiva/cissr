				<?php
                foreach($query_mid_banner->result() as $row){
				?>
			
                <section class="ad-content-area text-center no-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img class="img-fluid" src="<?= base_url() ?>assets/images/banners/large/<?= $row->fileName ?>" alt="" />
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </section><!-- Ad content top end -->
    		<?php } ?>