<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">आय व्यय का विवरण</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">आय व्यय का विवरण</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="main" class="site-main container_16">
    <div class="inner">

        <div id="primary" class="grid_11 suffix_1">
            <article class="single">

                <?php for ($x = 2020; $x >= 1999; $x--) {
                    $start = $x;
                    $end = $x + 1;
                ?>

                    <?php if ($x == 2014 || $x == 2015) { ?>
                        <div class="clear"></div>
                        <div class="entry-meta-press">
                            <time class="entry-date fleft">
                                Audit Report <?= $start ?> - <?= $end ?>
                            </time>

                            <div class="category-i fright">
                                <i class="fa fa-download"></i>
                                <a href="<?= base_url() ?>assets/images/expenses/<?= $x ?>.pdf" title="View all posts in Blog" rel="category tag" target="_new">Click here to view Report</a>
                            </div>

                            <div class="clear"></div>

                        </div>
                    <?php } elseif ($x == 2010 || $x == 2013) { ?>

                    <?php } else { ?>

                        <div class="clear"></div>
                        <div class="entry-meta-press">
                            <time class="entry-date fleft">
                                Audit Report <?= $start ?> - <?= $end ?>
                            </time>

                            <div class="category-i fright">
                                <i class="fa fa-download"></i>
                                <a href="<?= base_url() ?>assets/images/expenses/<?= $x ?>.jpg" title="View all posts in Blog" rel="category tag" target="_new">Click here to view Report</a>
                            </div>

                            <div class="clear"></div>

                        </div>


                        <?php if ($x == 2012 || $x == 2016) { ?>
                            <div class="clear"></div>
                            <div class="entry-meta-press">
                                <time class="entry-date fleft">
                                    Audit Report <?= $start ?> - <?= $end ?> (2)
                                </time>

                                <div class="category-i fright">
                                    <i class="fa fa-download"></i>
                                    <a href="<?= base_url() ?>assets/images/expenses/a<?= $x ?>.jpg" title="View all posts in Blog" rel="category tag" target="_new">Click here to view Report

                                    </a>
                                </div>

                                <div class="clear"></div>

                            </div>
                <?php }
                    }
                } ?>
            </article>

        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>