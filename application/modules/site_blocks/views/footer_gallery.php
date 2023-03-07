<div class="col-lg-3 col-sm-12 footer-widget">
						<h3 class="widget-title">Post Gallery</h3>
						<div class="gallery-widget">
                        
    						<?php
                            foreach($query_footer_gallery->result() as $row){
							?>                    
							<a href="#"><img class="img-fluid" src="<?= base_url() ?>assets/images/gallery/galleryphotos/thumb/<?= $row->photo_img ?>" alt="" /></a>
                            <?php } ?>
							
						</div>
					</div><!-- Col end -->