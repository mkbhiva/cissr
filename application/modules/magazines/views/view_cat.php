<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="#">Home</a></li>
     					<li>Magazines</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing category-style2">
						<h3 class="block-title"><span>Magazines</span></h3>

						

						<div class="post-block-style post-list clearfix">
							<div class="row">
                            	<?php
								$i = 1;
							foreach($query->result() as $row){
							$pdf_page = base_url().'assets/pdf/magazines/'.$row->fileName;
							  
								
						?>
                            
								<div class="col-lg-6 col-md-6">
                                	<div style="padding:10px; border:#999 1px solid; margin-bottom:40px;">
									<div class="post-thumbd thumb-float-style">
										<a href="<?= $pdf_page ?>" target="_new">
											<img class="img-fluid" src="<?= base_url() ?>assets/pdf/magazines/coverpage/coverp1.jpg" alt="" />
										</a>
									</div>
                                    <div>
                                    	<p style="font-size:16px; font-weight:bold;" align="center"><?= $row->title ?></p>
                                    </div>
                                    </div>
								</div>
                                <!-- Img thumb col end -->
								<?php 
								$i++;
								} ?>
								
                                <!-- Post col end -->
							</div><!-- 1st row end -->
						</div><!-- 1st Post list end -->
                        
                        

						


					</div><!-- Block Technology end -->
                    

					<div class="paging">
                    <?=  $pagination ?>
		            <ul class="pagination">
		              
		              <li>
		              	<span class="page-numbers"><?=  $showing_statement ?></span>
		              </li>
		            </ul>
	          	</div>


				</div><!-- Content Col end -->

				<?php echo Modules::run('site_blocks/_sidebar_block') ;?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->