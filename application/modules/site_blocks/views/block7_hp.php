
<div>
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:inline-block;width:1138px;height:88px"
     data-ad-client="ca-pub-9883210530102346"
     data-ad-slot="2406544059"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div>
<section class="block-wrapper video-block">
        <div class="container">
            <div class="row">
                <div class="video-tab clearfix">
                    <h2 class="video-tab-title">Watch Now</h2>
                    <div class="row">
                    <div class="col-lg-7 pad-r-0">
                        <div class="tab-content">
                        	
                            <?php
								$i = 1;
                            	foreach($query_block7_hp->result() as $row){
								if($i < 2){
									$active = "active";
								} else {
									$active = "";
								}
								
								if($row->vimg == ''){
									$vdo_img = 'noimg.jpg';
								} else {
									$vdo_img = $row->vimg;	
								}
							
							?>
                        
                            <div class="tab-pane <?= $active ?> animated fadeIn" id="video<?php echo $i ;?>">
                                <div class="post-overaly-style clearfix">
                                   <div class="post-thumb">
                                        <img class="img-fluid" src="<?= base_url() ?>assets/images/gallery/vgallery/thumb/<?= $vdo_img ?>" alt="" />
                                        <a class="popup" href="https://www.youtube.com/embed/<?= $row->vlink ;?>?autoplay=1&amp;loop=1">
                                      <div class="video-icon">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    </a>
                                   </div><!-- Post thumb end -->
                                   <div class="post-content">
                                      <a class="post-cat" href="#">Video</a>
                                      <h2 class="post-title">
                                         <a href="#"><?= $row->htitle ?></a>
                                      </h2>
                                   </div><!-- Post content end -->
                                </div><!-- Post Overaly Article end -->
                            </div><!--Tab pane 1 end-->

                            <?php 
							$i++;
							} ?>

                        </div><!-- Tab content end -->
                    </div><!--Tab col end -->

                    <div class="col-lg-5 pad-l-0">
                        <ul class="nav nav-tabs">
                        	<?php
								$i = 1;
                            	foreach($query_block7_hp->result() as $row){
								if($row->vimg == ''){
									$vdo_img = 'noimg.jpg';
								} else {
									$vdo_img = $row->vimg;	
								}
							?>
                        
                            <li class="nav-item active">
                                <a class="nav-link animated fadeIn" href="#video<?= $i ?>" data-toggle="tab">
                                    <div class="post-thumb">
                                        <img class="img-fluid" src="<?= base_url() ?>assets/images/gallery/vgallery/thumb/<?= $vdo_img ?>" alt="" />
                                   </div><!-- Post thumb end -->
                                    <h3><?= $row->htitle ?></h3>
                                </a>
                            </li>
							<?php 
							$i++;
							} ?>
                        </ul>
                    </div><!--Tab nav col end -->

                    </div>
                </div><!-- Video tab end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section>
    <!-- Video block end -->