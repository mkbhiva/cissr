<div class="row">
	<div class="col-sm-6"> 
    	<div class="news-block news-latest layout-default">
        	<h2 class="title">NFL</h2>
            <div class="primary">
            <div class=0"entry-image">
            <a href="#"><img width="400" height="222" src="<?= base_url() ?>assets/images/blog/400x222/33-1-400x222.jpg" class="img-responsive wp-post-image" alt=""/>
            </a>
            <div class="overlay">
            <a class="btn btn-primary btn-sm" href="#">View Details</a>
            </div>
            </div>
            <h3 class="entry-title"><a href="#">Could Luis Suarez&#039;s desire to win a World Cup</a></h3>
            <div class="entry-meta small"><i class="fa fa-clock-o"></i> 10:20 am <i class="fa fa-calendar"></i> 25 Nov 2013</div>
            </div>
            
            <div class="secondary">
            <h4 class="entry-title"><a href="#">McNulty: Arsenal&#039;s draw shows need to goal.</a></h4>
            	<div class="entry-meta small"><i class="fa fa-clock-o"></i> 10:13 am <i class="fa fa-calendar"></i> 25 Nov 2013</div>
            </div>
            
            </div></div>
            
            
            <div class="col-sm-6"> 
            <div class="news-block news-latest layout-default"><h2 class="title">Latest from Babasaheb</h2>
            <?php
				$this->load->module('timedate');
				foreach($query_latest_babasaheb_posts_1->result() as $row) { 
				$post_page = site_url($post_segments.$row->post_url);
				$category_page = site_url($cat_segments.$row->cat_url);
				$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
				$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
			?>
            <div class="primary"><div class="entry-image"><a href="https://demo.themeum.com/wordpress/sportsline/deliver-sucker-punch-but-still-need-a-striker/"><img width="400" height="222" src="<?= base_url() ?>assets/images/blog/400x222/42-1-400x222.jpg" class="img-responsive wp-post-image" alt="" srcset="<?= base_url() ?>assets/images/blog/400x222/42-1-400x222.jpg 400w, <?= base_url() ?>assets/images/blog/thumb/42-1-300x167.jpg 300w, <?= base_url() ?>assets/images/blog/thumb/42-1-768x426.jpg 768w, <?= base_url() ?>assets/images/blog/thumb/42-1-682x380.jpg 682w, <?= base_url() ?>assets/images/blog/thumb/42-1-296x164.jpg 296w, <?= base_url() ?>assets/images/blog/medium/42-1-medium.jpg 280w, <?= base_url() ?>assets/images/blog/thumb/42-1.jpg 800w" sizes="(max-width: 400px) 100vw, 400px" /></a><div class="overlay"><a class="btn btn-primary btn-sm" href="https://demo.themeum.com/wordpress/sportsline/deliver-sucker-punch-but-still-need-a-striker/">View Details</a></div></div><h3 class="entry-title"><a href="https://demo.themeum.com/wordpress/sportsline/deliver-sucker-punch-but-still-need-a-striker/">Deliver sucker-punch but still need a striker</a></h3><div class="entry-meta small"><i class="fa fa-clock-o"></i> 1:29 pm <i class="fa fa-calendar"></i> 25 Nov 2013</div></div>
            <?php } ?>
            <?php
				$this->load->module('timedate');
				foreach($query_latest_babasaheb_posts_3->result() as $row) { 
				$post_page = site_url($post_segments.$row->post_url);
				$category_page = site_url($cat_segments.$row->cat_url);
				$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
				$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
			?>
            
            <div class="secondary"><h4 class="entry-title"><a href="https://demo.themeum.com/wordpress/sportsline/mauris-volutpat-euismod-dui-auctor-pretium-odio-pulv/">Mauris volutpat euismod dui, auctor pretium odio pulv.</a></h4><div class="entry-meta small"><i class="fa fa-clock-o"></i> 10:03 am <i class="fa fa-calendar"></i> 25 Nov 2013</div></div>
            <?php } ?>
            
            </div></div> </div>