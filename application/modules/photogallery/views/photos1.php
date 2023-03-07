<?php
$urlseg = $this->uri->segment(3);
if ($urlseg == 1) {
    $folder = 1;
    $title = "I सम्मान समारोह";
} elseif ($urlseg == 2) {
    $folder = 2;
    $title = "II सम्मान समारोह";
} elseif ($urlseg == 3) {
    $folder = 3;
    $title = "IV प्रतिभा सम्मान समारोह";
} elseif ($urlseg == 4) {
    $folder = 4;
    $title = "प्रथम सामूहिक विवाह समारोह";
} elseif ($urlseg == 5) {
    $folder = 5;
    $title = "परिचय सम्मेलन 2012";
} elseif ($urlseg == 6) {
    $folder = 6;
    $title = "V प्रतिभा सम्मान समारोह";
} elseif ($urlseg == 7) {
    $folder = 7;
    $title = "VI प्रतिभा सम्मान समारोह";
} elseif ($urlseg == 8) {
    $folder = 8;
    $title = "अम्बेडकर जयंती 17.04.2014";
} elseif ($urlseg == 9) {
    $folder = 9;
    $title = "VII प्रतिभा सम्मान समारोह";
} elseif ($urlseg == 10) {
    $folder = 10;
    $title = "वृक्षारोपण 2015";
} else {
    $folder = 8;
    $title = "अम्बेडकर जयंती 17.04.2014";
}
?>

<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title"><?= $title ?></h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current"><?= $title ?></span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="main" class="site-main container_16">
    <div style="display:flex; align-items:flex-end; justify-content:right; padding-top:20px;">
        <a class="button black square fright" href="<?= base_url('photogallery') ?>">वापस जाए</a>
    </div>
    <div class="innerr">
        <?php
        $images = glob('assets/images/photogallery/' . $folder . '/*.{jpg,jpeg,gif,png}', GLOB_BRACE);
        foreach ($images as $image) {
        ?>
            <div class="candidatee radius grid_3">
                <div class="candidate-margins">
                    <a href="<?= base_url() ?><?= $image ?>" target="_new">
                        <img width="200" height="210" src="<?= base_url() ?><?= $image ?>" class="wp-post-image" alt="Image alt">
                    </a>
                </div>
            </div>
        <?php } ?>

        <div class="clear"></div>
    </div>
</div>