<!-- <<<<<<<<<<<<<<<<<<<< New Arrivals Area Start >>>>>>>>>>>>>>>>>>>> -->
<section class="new_arrivals_area section_padding_100 clearfix">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section_heading new_arrivals">
<h5>New Arrivals</h5>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="new_arrivals_slides">
<?php
foreach($query->result() as $row) {	
$item_page = site_url($item_segments.$row->item_url);
if($row->item_pic == ''){
		$product_img = "no_image.jpg";
	} else {
		$product_img = $row->item_pic;
	}
if($row->item_was_price==0){
	$was_price = '';
} else {
	$was_price = '<span>'.$currency_symbol.' '.$row->item_was_price.'</span>';
}
?>
<!-- Singel Arrivals Slide Start -->
<div class="single_arrivals_slide">
    <div class="product_image">
        <!-- Product Image -->
        <a href="<?= $item_page ?>">
        <img class="normal_img" src="<?= base_url() ?>assets/img/item/small/<?= $product_img ?>" alt="<?= $row->item_title ?>">
        <img class="hover_img" src="<?= base_url() ?>assets/img/item/small/<?= $product_img ?>" alt="<?= $row->item_title ?>">
        </a>

        <!-- Product Badge -->
        <div class="product_badge">
            <?php if($row->sale_offer != 0 ) { ?>
            <span class="badge-offer">-<?= $row->sale_offer ?>%</span>
            <?php } ?>
        </div>
        <!-- Wishlist -->
        <div class="product_wishlist">
            <a href="#" target="_blank"><i class="pe-7s-like"></i></a>
        </div>
        <!-- Compare -->
        <div class="product_compare">
            <a href="#" target="_blank"><i class="pe-7s-graph3"></i></a>
        </div>
        <!-- Add to cart -->
        <div class="product_add_to_cart">
            <a href="<?= base_url() ?>store_basket/quick_add_to_basket/<?= $row->id ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</a>
        </div>
        <!-- Quick View -->
        <div class="product_quick_view">
            <a href="<?= $item_page ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
        </div>
    </div>
    <!-- Product Description -->
    <div class="product_description">
        <h5><a href="<?= $item_page ?>"><?= $row->item_title ?></a></h5>
        <h6><?= $currency_symbol.' '.$row->item_price ?> <?= $was_price ?></h6>
    </div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</section>
<!-- <<<<<<<<<<<<<<<<<<<< New Arrivals Area End >>>>>>>>>>>>>>>>>>>> -->