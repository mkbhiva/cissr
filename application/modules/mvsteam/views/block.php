<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">ब्लोक कार्यकारिणी</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">ब्लोक कार्यकारिणी</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="main" class="site-main container_16">
    <div class="inner">
        <div id="primary" class="grid_11 suffix_1">
            <article class="list">

                <div class="short-content">


                    <?php
                    foreach ($query->result() as $row) {
                        $locationUrl = url_title($row->team_location);
                    ?>
                        <div class="entry-meta">
                            <time>
                                <h4>
                                    <a class="buttons time fleft" style="pointer-events: none">
                                        <i class="fa fa-map-marker"></i> <?= $row->team_location ?>
                                    </a>
                                </h4>
                            </time>
                            <a class="buttons fright" href="<?= site_url('mvsteam/location/' . $locationUrl) ?>" title="read more">
                                कार्यकारिणी लिस्ट
                            </a>
                        </div>
                    <?php } ?>
                </div>

            </article>

        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>