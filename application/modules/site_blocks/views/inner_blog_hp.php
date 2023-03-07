<section class="section section-no-border bg-color-light m-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-sm-8">
                <h2 class="font-weight-bold">Inner Blog</h2>
            </div>
        </div>
        <div class="row justify-content-center">
        	<?php
				$this->load->module('timedate'); 
				foreach($query->result() as $row){
				$post_page = site_url($post_segments.$row->post_url);
				$category_page = site_url($cat_segments."/Care-Treatment");
				$posted_on = $this->timedate->get_nice_date($row->post_date,'good2');
			?>
            <div class="col-md-10 col-lg-4 mb-4 mb-lg-0">
                <article class="custom-post-blog">
                    <span class="thumb-info custom-thumb-info-2">
                        <span class="thumb-info-wrapper">
                            <a href="<?= site_url() ?>">
                                <img src="<?= base_url() ?>assets/images/blog/large/<?= $row->post_img ?>" alt class="img-fluid" />
                            </a>
                        </span>
                        <span class="thumb-info-caption custom-box-shadow">
                            <span class="thumb-info-caption-text">
                                <h4 class="font-weight-bold mb-4">
                                    <a href="<?= $post_page ?>" class="text-decoration-none custom-secondary-font text-color-dark">
                                        <?= $row->post_title_en ?>
                                    </a>
                                </h4>
                                <p align="justify"><?= strip_tags(character_limiter($row->post_desc, 160)) ?></p>
                            </span>
                            <span class="custom-thumb-info-post-infos text-center">
                                <ul>
                                    <li class="text-uppercase">
                                        <i class="icon-calendar icons"></i>
                                        <?= $posted_on ?>
                                    </li>
                                    <li class="text-uppercase">
                                        <i class="icon-user icons"></i>
                                        Site Admin
                                    </li>
                                </ul>
                            </span>
                        </span>
                    </span>
                </article>
            </div>
            <?php } ?>
        </div>
    </div>
</section>