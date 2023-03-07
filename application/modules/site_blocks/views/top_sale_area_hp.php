<!-- <<<<<<<<<<<<<<<<<<<< Best Rated/Onsale/Top Sale Product Area Start >>>>>>>>>>>>>>>>>>>> -->
<section class="best_rated_onsale_top_sellares section_padding_100_70">
<div class="container">
<div class="row">
<div class="col-12">
<div class="tabs_area">
<!-- Tabs -->
<ul class="nav nav-tabs" role="tablist" id="product-tab">
    <li class="nav-item">
        <a href="#top-sellers" class="nav-link active" data-toggle="tab" role="tab">Top Sellers</a>
    </li>
    <li class="nav-item">
        <a href="#best-rated" class="nav-link" data-toggle="tab" role="tab">Best Rated</a>
    </li>
    <li class="nav-item">
        <a href="#on-sale" class="nav-link" data-toggle="tab" role="tab">On Sale</a>
    </li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade show active" id="top-sellers">
        <div class="top_sellers_area">

            <div class="row">
            	<?php 
				foreach($query_top_seller->result() as $row){
				$item_page = site_url($item_segments.$row->item_url);
				
				if($row->item_pic == ''){
						$product_img = "no_image.jpg";
					} else {
						$product_img = $row->item_pic;
					}
				if($row->item_was_price==0){
					$was_price = '';
				} else {
					$was_price = '';
				}
				?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_top_sellers"><a href="<?= $item_page ?>">
                        <div class="top_seller_image">
                                <img src="<?= base_url() ?>assets/img/item/small/<?= $product_img ?>" alt="<?= $row->item_title ?>">
                        </div></a>
                        <div class="top_seller_desc">
                            <h5><?= character_limiter($row->item_title, 23) ?></h5>
                            <h6><?= $currency_symbol.$row->item_price ?>  <?= $was_price ?></h6>
                            <div class="top_seller_product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>

                            <!-- Wishlist -->
                            <div class="ts_product_wishlist">
                                <a href="<?= base_url() ?>cart" target="_blank"><i class="pe-7s-like"></i></a>
                            </div>
                            <!-- Compare -->
                            <div class="ts_product_compare">
                                <a href="<?= $item_page ?>"><i class="pe-7s-graph3"></i></a>
                            </div>
                            <!-- Add to cart -->
                            <div class="ts_product_add_to_cart">
                                <a href="<?= base_url() ?>"><i class="pe-7s-cart"></i></a>
                            </div>
                            <!-- Quick View -->
                            <div class="ts_product_quick_view">
                                <a href="<?= $item_page ?>" data-target="#quickview"><i class="pe-7s-look"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="best-rated">

        <div class="best_rated_area">
            <div class="row">
            	<?php 
				foreach($query_best_rated->result() as $row){
                $item_page = site_url($item_segments.$row->item_url);
				
				if($row->item_pic == ''){
						$product_img = "no_image.jpg";
					} else {
						$product_img = $row->item_pic;
					}
				if($row->item_was_price==0){
					$was_price = '';
				} else {
					$was_price = '';
				}

				?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_top_sellers"><a href="<?= $item_page ?>">
                        <div class="top_seller_image">
                            <img src="<?= base_url() ?>assets/img/item/big/<?= $product_img ?>" alt="<?= $row->item_title ?>">
                        </div></a>
                        <div class="top_seller_desc">
                            <h5><?= character_limiter($row->item_title, 23) ?></h5>
                            <h6><?= $currency_symbol.$row->item_price ?>  <?= $was_price ?></h6>
                            <div class="top_seller_product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>

                            <!-- Wishlist -->
                            <div class="ts_product_wishlist">
                                <a href="<?= base_url() ?>cart" target="_blank"><i class="pe-7s-like"></i></a>
                            </div>
                            <!-- Compare -->
                            <div class="ts_product_compare">
                                <a href="<?= $item_page ?>"><i class="pe-7s-graph3"></i></a>
                            </div>
                            <!-- Add to cart -->
                            <div class="ts_product_add_to_cart">
                                <a href="<?= base_url() ?>"><i class="pe-7s-cart"></i></a>
                            </div>
                            <!-- Quick View -->
                            <div class="ts_product_quick_view">
                                <a href="<?= $item_page ?>" data-target="#quickview"><i class="pe-7s-look"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="on-sale">
        <div class="on_sale_area">
            <div class="row">
            	<?php 
				foreach($query_on_sale->result() as $row){
                $item_page = site_url($item_segments.$row->item_url);
				
				if($row->item_pic == ''){
						$product_img = "no_image.jpg";
					} else {
						$product_img = $row->item_pic;
					}
				if($row->item_was_price==0){
					$was_price = '';
				} else {
					$was_price = '';
				}
				?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_top_sellers"><a href="<?= $item_page ?>">
                        <div class="top_seller_image">
                            <img src="<?= base_url() ?>assets/img/item/big/<?= $product_img ?>" alt="<?= $row->item_title ?>">
                        </div></a>
                        <div class="top_seller_desc">
                            <h5><?= character_limiter($row->item_title, 23) ?></h5>
                            <h6><?= $currency_symbol.$row->item_price ?>  <?= $was_price ?></h6>
                            <div class="top_seller_product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>

                            <!-- Wishlist -->
                            <div class="ts_product_wishlist">
                                <a href="<?= base_url() ?>cart" target="_blank"><i class="pe-7s-like"></i></a>
                            </div>
                            <!-- Compare -->
                            <div class="ts_product_compare">
                                <a href="<?= $item_page ?>"><i class="pe-7s-graph3"></i></a>
                            </div>
                            <!-- Add to cart -->
                            <div class="ts_product_add_to_cart">
                                <a href="<?= base_url() ?>"><i class="pe-7s-cart"></i></a>
                            </div>
                            <!-- Quick View -->
                            <div class="ts_product_quick_view">
                                <a href="<?= $item_page ?>" data-target="#quickview"><i class="pe-7s-look"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- <<<<<<<<<<<<<<<<<<<< Best Rated/Onsale/Top Sale Product Area End >>>>>>>>>>>>>>>>>>>> -->