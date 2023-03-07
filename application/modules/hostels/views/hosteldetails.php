<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title"> छात्रावास सूचनाएं </h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current"> छात्रावास सूचनाएं </span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="main" class="site-main container_16">
    <div class="inner">

        <div id="primary" class="grid_11 suffix_1">
            <article class="single">
                <a class="button black square fright" href="<?= base_url('notices/allhostel') ?>">वापस जाए</a>

                <h2> <?= $notice_htitle; ?> </h2>

                <br>

                <div class="entry-content">
                    <?= $notice_desc ?>

                    <?php
                    if ($notice_file != '') {
                    ?>
                        <p>
                            To View document, <a href="#">click here</a>
                        </p>
                    <?php } ?>
                    <div class="clear"></div>

                </div>

            </article>

        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>