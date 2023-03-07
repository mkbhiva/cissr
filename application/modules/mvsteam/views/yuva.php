<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">युवा प्रकोष्ठ</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="<?= site_url() ?>">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">युवा प्रकोष्ठ</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="main" class="site-main container_16">
    <div class="inner">

        <?php for ($x = 1; $x < 13; $x++) { ?>
            <!-- canditate -->
            <div class="candidate radius grid_4">
                <div class="candidate-margins">
                    <a href="09-staff-single.html">
                        <img width="200" height="210" src="<?= base_url() ?>assets/images/members/no-mem.png" class="wp-post-image" alt="Image alt">
                        <div class="name">Raj Kamal</div>
                        <div class="position">president</div>
                    </a>
                </div>
            </div>
            <!-- canditate -->
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>