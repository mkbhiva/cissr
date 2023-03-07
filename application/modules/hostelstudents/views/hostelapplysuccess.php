<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">छात्रावास के लिए ऑनलाइन आवेदन</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">छात्रावास के लिए ऑनलाइन आवेदन</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="main" class="site-main container_16">
    <div class="inner">
        <div id="primary" class="grid_11 suffix_1">
            <article class="single">

                <div class="entry-content">
                    <h3>Submitted Successfully</h3><br />

                    <?php if (isset($flash)) {
                        echo $flash;
                    } else {
                        echo '<p>&nbsp;</p>';
                    } ?>
                    <p>Soon! we will inform you by email or contact. Thank you.</p>
                    <div class="clear"></div>

                </div>

                <div class="clear"></div>

            </article>

        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>