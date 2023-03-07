<style>

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.containerr {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 40px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  margin-right:16px;
  color: white;
  font-weight: bold;
  font-size: 40px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
	
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
			<div class="clearfix "></div>
			<!-- gallery row -->
            <div class="col-md-2 col-sm-2">
            </div>
            
            
            <div class="col-md-8 col-sm-8 col-xs-12 containerr">
              	 <h2 style="text-align:center"><?= $page_title ?></h2>
				<div class="mr20"></div>
            	<?php
				$i = 1;
				$num_rows = $query->num_rows();
                foreach($query->result() as $row){
				?>	
              <div class="mySlides">
                <div class="numbertext"><?= $i ?> / <?= $num_rows ?></div>
                <img src="<?= base_url() ?>assets/images/gallery/galleryphotos/<?= $row->photo_img ?>" style="width:100%">
              </div>
              <?php
			  	$i++;
			   } ?>
            
                
              <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
              <a class="next" onclick="plusSlides(1)"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
            
              <div class="caption-container">
                <p id="caption"></p>
              </div>
            
              <div class="row">
              	<?php
				$i = 1;
                foreach($query->result() as $row){
				?>
              
                <div class="column">
                  <img class="demo cursor" src="<?= base_url() ?>assets/images/gallery/galleryphotos/<?= $row->photo_img ?>" style="width:100%" onclick="currentSlide(<?= $i ?>)" alt="<?= $row->photo_img ?>">
                </div>
				<?php
				$i++;
				 } ?>
              </div>
            </div>
            
            
            
            

    		<div class="col-md-2 col-sm-2">
            </div>
		 </div>

			<div class="clearfix mr30"></div>
		 </div>
		 <div class="clearfix"></div>
</div>
<div class="clearfix mr30"></div>
<P align="center"><a href="<?= site_url('webgallery') ?>" class="btn btn-primary">Back to Main</a></P>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
	 
	  