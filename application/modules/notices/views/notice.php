<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title"> महत्वपूर्ण आदेश </h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current"> महत्वपूर्ण आदेश </span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="main" class="site-main container_16">
    <div class="inner">

        <div id="primary" class="grid_11 suffix_1">
            <article class="single">
                <a class="button black square fright" href="<?= base_url('notices') ?>">वापस जाए</a>

                <h2> महत्वपूर्ण आदेश </h2>

                <br>

                <div class="entry-content">
                    <?php
                    $images = glob('assets/notices/important/*.{jpg,jpeg,gif,png}', GLOB_BRACE);
                    foreach ($images as $image) {
                    ?>
                        <figure>
                            <img width="200" height="200" src="<?= base_url() ?><?= $image ?>" class="wp-post-image" alt="notice">
                        </figure>

                    <?php } ?>

                    <div class="clear"></div>

                </div>






            </article>

        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>