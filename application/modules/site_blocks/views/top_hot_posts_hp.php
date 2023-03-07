<div class="trending-bar d-md-block d-lg-block d-none">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="trending-title">Breaking News</h3>
					<div id="trending-slide" class="owl-carousel owl-theme trending-slide">
                    	
						<?php
							$this->load->module('timedate');
							foreach($query_hot_posts->result() as $row) { 
							$post_page = site_url($post_segments.$row->post_url);
						?>
						<div class="item">
						   <div class="post-content">
						      <h2 class="post-title title-small">
						         <a href="<?= $post_page ?>"><strong><?= strip_tags($row->post_title) ?></strong></a>
						      </h2>
						   </div><!-- Post content end -->
						</div><!-- Item 1 end -->
                        <?php } ?>
                        
                    </div><!-- Carousel end -->
				</div><!-- Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</div><!--/ Trending end -->