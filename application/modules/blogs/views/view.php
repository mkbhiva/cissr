<?php 
$this->load->module('timedate');
$date_created = $this->timedate->get_nice_date($blog_date,'good'); 
$day = $this->timedate->get_nice_date($blog_date,'onlydate');
$month = $this->timedate->get_nice_date($blog_date,'onlymonth');
?>

<div class="container">
					<div class="row pt-5">

						<div class="col-lg-9">

							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post">

									<div class="post-date">
										<span class="day"><?= $day ?></span>
										<span class="month"><?= $month ?></span>
									</div>

									<div class="post-content">

										<h1><?= $blog_title ?></h1>

										<div class="divider divider-primary divider-small mb-4">
											<hr class="mr-auto">
										</div>
                                        
                                        
										
										<?php if(!$blog_file==''){?>
										<img src="<?= base_url() ?>assets/images/blogs/main/<?= $blog_file; ?>" class="img-fluid float-right mb-1 mt-2 ml-4 img-thumbnail" width="100%" alt="<?= $blog_title ?>">
										<?php } ?>
                                        <div class="post-meta">
											<span><i class="far fa-calendar-alt"></i> <a href="#"><?= $date_created ?></a> </span>
                                            <span><i class="far fa-user"></i> By <a href="#"><?= $blog_author ?></a> </span>
                                            <span><i class="fas fa-medal"></i> <a href="#"><?= $blog_authordesc ?></a> </span>
										</div>
										<p align="justify"><?= $blog_desc ?></p>
                                        
                                        <span class="thumb-info-social-icons mt-5 pb-0 blogsocial float-rightt">
                                    	<span style="font-size:13px; font-weight:600; padding-right:5px;">Share this articles : </span>
										<a class="d-blockk d-sm-none" href="whatsapp://send?text=<?= site_url('blogs/view/'.$blog_url) ?>" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i><span>Whatsapp</span></a>
                                        
										<span class="fb-share-buttonn" data-href="<?= site_url('blogs/view/'.$blog_url) ?>" data-layout="button" data-size="large" data-mobile-iframe="false">
   										<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url('blogs/view/'.$blog_url) ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                        <i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                                        </span>
                                        
                                        
										<a href="https://twitter.com/share?url=<?= site_url('blogs/view/'.$blog_url) ?>&amp;text=<?php echo $blog_title ;?>&amp;hashtags=theadvocatesleague, theadvocatesleague" target="_blank"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                                        
										<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= site_url('blogs/view/'.$blog_url) ?>" target="_blank"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                                        
                                    </span>
                                    
                                    
									</div>
                                    
                                    
								</article>
                                
                                

							</div>

						</div>
                        <?php  echo Modules::run('site_blocks/_sidebar_block_for_blogs') ;?>

					</div>

				</div>