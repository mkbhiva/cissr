
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_IN/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php
		
		$this->load->module('timedate');
		$posted_on = $this->timedate->get_nice_date($member_name, 'cool2');
		echo Modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
?>



	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					
					<div class="single-post">
						
						<div class="post-title-area">
							<a class="post-cat" href="<?= site_url($cat_segments.$cat_url) ?>"><?= $cat_title ?></a>
							<h2 class="post-title">
				 				<?= $member_name ?>
				 			</h2>
				 			<div class="post-meta">
								<span class="post-author">
									By <a href="#">News Editor</a>
								</span>
								<span class="post-date"><i class="fa fa-clock-o"></i> <?= $posted_on ?></span>
                                <!--
								<span class="post-hits"><i class="fa fa-eye"></i> 21</span>
                                -->
								<span class="post-comment"><i class="fa fa-comments-o"></i>
								<a href="#" class="comments-link"><span>01</span></a></span>
							</div>
						</div><!-- Aothor title end -->

						<div class="post-content-area">
							<div class="post-media post-featured-image">
								<img src="<?= base_url() ?>assets/images/blog/main/<?= $member_img ?>" class="img-fluid" alt="<?= $member_name ?>">
							</div>
							<div class="entry-content">
								<p><?= $member_desc ?></p>

							</div><!-- Entery content end -->


							<div class="share-items clearfix">
   							<ul class="post-social-icons unstyled">
   								<li class="whatsapp">
   									<a href="whatsapp://send?text=<?= site_url($post_segments.$post_url) ?>" data-action="share/whatsapp/share">
   									<i class="fa fa-whatsapp"></i> <span class="ts-social-title">Whatsapp</span></a>
   								</li>
   								<li class="facebook">
   									<div class="fb-share-buttonn" data-href="<?= site_url($post_segments.$post_url) ?>" data-layout="button" data-size="large" data-mobile-iframe="true">
   										<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url($post_segments.$post_url) ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
   											<i class="fa fa-facebook"></i> <span class="ts-social-title">Facebook</span>
   										</a>
   									</div>
   								</li>
   								<li class="twitter">
   									<a href="https://twitter.com/share?url=<?= site_url($post_segments.$post_url) ?>&amp;text=<?php echo $member_name ;?>&amp;hashtags=policemedia, PoliceMediaNEWS" target="_blank">
   									<i class="fa fa-twitter"></i> <span class="ts-social-title">Twitter</span></a>
   								</li>
   								<li class="gplus">
   									<a href="https://plus.google.com/share?url=<?= site_url($post_segments.$post_url) ?>" target="_blank">
   									<i class="fa fa-google-plus"></i> <span class="ts-social-title">Google +</span></a>
   								</li>
   								<li class="pinterest">
   									<a href="#">
   									<i class="fa fa-pinterest"></i> <span class="ts-social-title">Pinterest</span></a>
   								</li>
   							</ul>
   						</div><!-- Share items end -->

						</div><!-- post-content end -->
					</div><!-- Single post end -->


					<div class="author-box">
						<div class="author-img pull-left">
							<img src="<?= base_url() ?>assets/images/author.png" alt="">
						</div>
						<div class="author-info">
							PM Editor, New Delhi
							<h3>Razon Khan</h3>
							<p class="author-url">Police Media News</p>
							<div class="authors-social">

                    </div>
						</div>
					</div> <!-- Author box end -->
                    
					<?php echo Modules::run('site_blocks/_related_post_block', $cat_url) ;?>
                    
                    

					


					<!-- Comments form end -->

				</div><!-- Content Col end -->

				<?php echo Modules::run('site_blocks/_sidebar_block') ;?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->