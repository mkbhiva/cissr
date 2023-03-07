
	
	<div class="row">
		<div class="about-ban">
			<img src="images/gallerybanner.jpg" alt="" class="img-responsive">
			</div>
		</div>
	

		
	<div class="row abt-bg">
		<div class="container pd0">
			 <div class="breadcrumbBar">
				<ol class="breadcrumb">
					<li><a href="index.php">HOME</a></li>
					<li class="active">OUR GALLERY</li>
					</ol>
			</div>
		</div>
	</div>



<div class="row mr30">
<div class="container">
		 
		 <div class="gallery_content">
			<div class="clearfix mr30"></div>
			<!-- gallery row -->
            <?php
				$i = 1;
				$num_rows = $query->num_rows();
				if($num_rows == 0){
					echo '<div style="min-height:300px;"><h2 class="mr50">No Record found !!!</h2></div>';
				}
				$this->load->module('timedate');
            	foreach($query->result() as $row){
            		$created_on = $this->timedate->get_nice_date($row->date_created, 'full');
			?>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="gallerypic">
					 <img src="<?= base_url() ?>assets/images/gallery/gallery_title/<?= $row->gallery_img ?>" class="img-responsive" alt="<?= $row->gallery_title ?>" />
					</div>
					<div class="clearfix"></div>
				</div>
								 
				<div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-1">
					<h2><?= $row->gallery_title ?></h2>
					<h6>Created On :  <?= $created_on ?></h6>
					<p><?= $row->gallery_desc ?></p>
					<!-- gallery popup -->
									<div class="gallery">
										<a href="<?= site_url('webgallery/album/'.$row->id) ?>" class="btn btn-primary btn-lg mr50">View Album</a>
									</div>
								<!-- gallery popup// -->
				 </div>
				 <div class="clearfix"></div>
                 <hr/>
             <?php
			 $i++;
			  } ?>    
		 </div>

			<div class="clearfix mr30"></div>
		 </div>
		 <div class="clearfix"></div>
</div>
<div class="clearfix mr30"></div>
</div>
	 
	  