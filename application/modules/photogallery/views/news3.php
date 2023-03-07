<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title"> समाचार - 2016 </h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current"> समाचार - 2016 </span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="main" class="site-main container_16">
    <div class="inner">

        <div id="primary" class="grid_11 suffix_1">
            <article class="single">
                <a class="button black square fright" href="<?= base_url('newspaper') ?>">वापस जाए</a>

                <h2> समाचार - 2016 </h2>

                <br>

                <div class="entry-content">
                    <?php
                    // 848 352
                    foreach (range('a', 's') as $char) {
                    ?>
                        <figure>
                            <img width="200" height="200" src="<?= base_url() ?>assets/images/newspaperimg/n2016<?= $char ?>.jpg" class="wp-post-image" alt="समाचार">
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