<div class="col-lg-3 col-sm-12 footer-widget widget-categories">
    <h3 class="widget-title">Hot Categories</h3>
    <ul>
    	<?php foreach($query_cat_post->result() as $row) {
			$cat_url = site_url($cat_segments.$row->cat_url);
			
			?>
        <li>
            <a href="<?= $cat_url ?>"><span class="catTitle"><?= $row->cat_title ?></span><span class="catCounter"> (<?= $row->tot_post ?>)</span></a>
        </li>
        <?php } ?>
    </ul>
    
</div><!-- Col end -->