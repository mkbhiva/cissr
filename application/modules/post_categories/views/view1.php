<h1><?= $cat_title ?></h1>
<p><?= $showing_statement ?></p>

<?= $pagination ?>

<?php 
foreach($query->result() as $row){
	$post_page = base_url().$post_segments.$row->post_url;
	?>
<div style="min-height:40px; background:#FFC; padding:10px; margin-bottom:30px;">
<a href="<?= $post_page ?>"><h3><?= $row->post_title ?></h3></a>
<p><?= $row->post_desc ?></p>
</div>
<?php } ?>

<?= $pagination ?>