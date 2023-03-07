<?php
$locationurl = $this->uri->segment(3);
$locationName = str_replace('-', ' ', $locationurl);
?>
<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">ब्लोक कार्यकारिणी</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="<?= site_url() ?>">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">ब्लोक कार्यकारिणी</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="main" class="site-main container_16">

    <div class="inner">
        <div style="margin-bottom: 40px; font-size:25px; font-weight:500; color: #306; border-bottom:2px solid #306; ">
            <?= $locationName; ?> - कार्यकारिणी
        </div>

        <?php
        foreach ($blockquery->result() as $row) {

            if ($row->team_img == '') {
                $team_photo = "no-mem.png";
            } else {
                $team_photo = $row->team_img;
            }
        ?>
            <!-- canditate -->
            <div class="candidate radius grid_4">
                <div class="candidate-margins">
                    <a href="#">
                        <img width="200" height="210" src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" class="wp-post-image" alt="Image alt">
                        <div class="name"><?= $row->team_name ?></div>
                        <?php if ($row->team_postName != '') { ?>
                            <div class="position"></i> <?= $row->team_postName ?></div>
                        <?php } ?>

                        <?php if ($row->team_phone != '') { ?>
                            <div class="position"><i class="fa fa-phone"></i> <?= $row->team_phone ?></div>
                        <?php } ?>
                    </a>
                </div>
            </div>
            <!-- canditate -->
        <?php } ?>
        <div class="clear"></div>
    </div>

    <div class="inner">
        <div style="margin-bottom: 40px; font-size:25px; font-weight:500; color: #306; border-bottom:2px solid #306; ">
            <?= $locationName; ?> - युवा प्रकोष्ठ
        </div>

        <?php
        foreach ($youthquery->result() as $row) {

            if ($row->team_img == '') {
                $team_photo = "no-mem.png";
            } else {
                $team_photo = $row->team_img;
            }
        ?>
            <!-- canditate -->
            <div class="candidate radius grid_4">
                <div class="candidate-margins">
                    <a href="#">
                        <img width="200" height="210" src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" class="wp-post-image" alt="Image alt">
                        <div class="name"><?= $row->team_name ?></div>
                        <?php if ($row->team_postName != '') { ?>
                            <div class="position"></i> <?= $row->team_postName ?></div>
                        <?php } ?>

                        <?php if ($row->team_phone != '') { ?>
                            <div class="position"><i class="fa fa-phone"></i> <?= $row->team_phone ?></div>
                        <?php } ?>
                    </a>
                </div>
            </div>
            <!-- canditate -->
        <?php } ?>
        <div class="clear"></div>
    </div>

    <div class="inner">
        <div style="margin-bottom: 40px; font-size:25px; font-weight:500; color: #306; border-bottom:2px solid #306; ">
            <?= $locationName; ?> - महिला प्रकोष्ठ
        </div>

        <?php
        foreach ($womenquery->result() as $row) {

            if ($row->team_img == '') {
                $team_photo = "no-mem.png";
            } else {
                $team_photo = $row->team_img;
            }
        ?>
            <!-- canditate -->
            <div class="candidate radius grid_4">
                <div class="candidate-margins">
                    <a href="#">
                        <img width="200" height="210" src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" class="wp-post-image" alt="Image alt">
                        <div class="name"><?= $row->team_name ?></div>
                        <?php if ($row->team_postName != '') { ?>
                            <div class="position"></i> <?= $row->team_postName ?></div>
                        <?php } ?>

                        <?php if ($row->team_phone != '') { ?>
                            <div class="position"><i class="fa fa-phone"></i> <?= $row->team_phone ?></div>
                        <?php } ?>
                    </a>
                </div>
            </div>
            <!-- canditate -->
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>