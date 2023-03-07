<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">आजीवन समिति सदस्य</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="icon-angle-right"></i> <span class="current">आजीवन समिति सदस्य</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="main" class="site-main container_16">
    <div class="inner">
        <div id="primary" class="grid_11 suffix_1">
            <h2>आजीवन समिति सदस्य की सूची</h2><br>
            <!-- First article -->
            <article class="list">
                <table class="tblclass">
                    <thead>
                        <tr>
                            <th height="20">क्र.सं.</th>
                            <th align="left">सदस्य नाम</th>
                            <th>शहर</th>
                            <th>सदस्यता तिथि</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $this->load->module('timedate');
                        foreach ($query->result() as $row) {
                            $join_on = $this->timedate->get_nice_date($row->member_join, 'mini');
                        ?>
                            <tr>
                                <td height="20">MVSM000<?= $row->id ?></td>
                                <td align="left"><?= $row->member_name ?></td>
                                <td align="left"><?= $row->member_location ?></td>
                                <td align="left"><?= $join_on ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
                <div class="clear"></div>
            </article>


        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>