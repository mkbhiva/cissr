<div class="row">
	<div class="col-sm-6"> 
    	<div class="news-block news-latest layout-default">
        	<h2 class="title">Latest from Lord Buddha</h2>
            <?php
				$this->load->module('timedate');
				foreach($query_latest_buddha_posts_1->result() as $row) { 
				$post_page = site_url($post_segments.$row->post_url);
				$category_page = site_url($cat_segments.$row->cat_url);
				$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
				$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
			?>
            <div class="primary">
            <div class="entry-image">
            <a href="#"><img width="400" height="222" src="<?= base_url() ?>assets/images/blog/400x222/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt=""/>
            </a>
            <div class="overlay">
                	<a class="btn btn-primary btn-sm" href="<?= $post_page ?>">View Details</a>
            </div>
            </div>
                <h3 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h3>
            <div class="entry-meta small"><i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?></div>
            </div>
            
            <?php } ?>
            <?php
				$this->load->module('timedate');
				foreach($query_latest_buddha_posts_3->result() as $row) { 
				$post_page = site_url($post_segments.$row->post_url);
				$category_page = site_url($cat_segments.$row->cat_url);
				$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
				$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
			?>
            
            <div class="secondary"><h4 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h4><div class="entry-meta small"><i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?></div></div>
            
            <?php } ?>
            
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
            <div class="primary">
            	<div class="entry-image">
                	<a href="<?= $post_page ?>">
                	<img width="400" height="222" src="<?= base_url() ?>assets/images/blog/400x222/<?= $row->post_img ?>" class="img-responsive wp-post-image" alt="<?= $row->post_title ?>"/>
                    </a>
                <div class="overlay">
                	<a class="btn btn-primary btn-sm" href="<?= $post_page ?>">View Details</a>
                </div>
                </div>
                <h3 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h3>
                <div class="entry-meta small"><i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?></div>
                </div>
            <?php } ?>
            <?php
				$this->load->module('timedate');
				foreach($query_latest_babasaheb_posts_3->result() as $row) { 
				$post_page = site_url($post_segments.$row->post_url);
				$category_page = site_url($cat_segments.$row->cat_url);
				$posted_time = $this->timedate->get_nice_date($row->post_date, 'onlytime');
				$posted_date = $this->timedate->get_nice_date($row->post_date, 'mini');
			?>
            
            <div class="secondary"><h4 class="entry-title"><a href="<?= $post_page ?>"><?= $row->post_title ?></a></h4><div class="entry-meta small"><i class="fa fa-clock-o"></i> <?= $posted_time ?> <i class="fa fa-calendar"></i> <?= $posted_date ?></div></div>
            <?php } ?>
            
            </div></div> </div>