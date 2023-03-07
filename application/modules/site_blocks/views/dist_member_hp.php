<!-- Fifth Widget area -->
<div class="grid_16 fifth-home-widget-area">
    <aside id="wpltfbe-2" class="widget WPlookStaff">
        <div class="widget-title">
            <h3>जिला कार्यकारिणी</h3>
            <div class="viewall fright"><a href="<?= site_url('mvsteam/district') ?>" class="radius">view all</a></div>
            <div class="clear"></div>
        </div>

        <div class="staff-body">

            <?php
            foreach ($query->result() as $hprow) {
                if ($hprow->team_img == '') {
                    $team_photo = "no-mem.png";
                } else {
                    $team_photo = $hprow->team_img;
                }

            ?>
                <!-- canditate -->
                <div class="candidate radius grid_4">
                    <div class="candidate-margins">
                        <a href="09-staff-single.html">
                            <img width="200" height="210" src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" class="wp-post-image" alt="Image alt">
                            <div class="name"><?= $hprow->team_name; ?></div>
                            <div class="position"><?= $hprow->team_postName ?></div>
                        </a>
                    </div>
                </div>
                <!-- canditate -->
            <?php
            } ?>


            <div class="clear"></div>
        </div>
    </aside>

</div>