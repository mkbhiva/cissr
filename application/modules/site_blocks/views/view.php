<div class="container">

<h1><?= $block_title ?></h1>
<p><?= $showing_statement ?></p>

<p><?= $pagination ?></p>
<div class="row">
<?php 
foreach($query->result() as $row){
	$item_page = base_url().$item_segments.$row->item_url;
	?>
<div class="col-sm-2">
<div style="min-height:40px; background:#ccc; padding:2px; margin-bottom:30px; text-align:center">
<a href="<?= $item_page ?>"><img src="<?= base_url() ?>assets/img/item/big/<?= $row->item_pic ?>" class="img-fluid" /></a>
<a href="<?= $item_page ?>"><h5><?= $row->item_title ?></h5></a>
<p><strong><?= $currency_symbol.' '.$row->item_price ?></strong></p>
</div>
</div>
<?php } ?>
</div>
<?= $pagination ?>

</div>