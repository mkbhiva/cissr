<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">प्रशासनिक सूचनाएं</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">प्रशासनिक सूचनाएं</span>
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
                    $this->load->module('timedate');
                    foreach ($query->result() as $row) {
                        $date = $this->timedate->get_nice_date($row->notice_date, 'mini');
                    ?>

                        <div class="entry-meta">
                            <time>
                                <a class="buttons time fleft" style="pointer-events: none">
                                    <i class="fa fa-calendar"></i> <?= $date ?>
                                </a>
                            </time>
                            <a class="buttons author fleft" style="pointer-events: none">
                                <i class="icon-user"></i> <?= $row->notice_htitle ?>
                            </a> <a class="buttons fright" href="<?= site_url('notices/admindetails/' . $row->notice_url) ?>" title="read more">
                                पूरा पढ़ें
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