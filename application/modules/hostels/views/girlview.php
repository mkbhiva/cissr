<div class="item teaser-page-list">
    <div class="container_16">
        <aside class="grid_10">
            <h1 class="page-title">बालिका छात्रावास</h1>
        </aside>
        <div class="grid_6">
            <div id="rootline">
                <a href="#">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">बालिका छात्रावास</span>
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
                    <div class="long-description">
                        <?= $hstatic['hostelMembers']; ?>

                        <table class="tblclass">
                            <?php
                            $this->load->module('timedate');
                            $dateCreated = $this->timedate->get_nice_date($hstatic['hostelUpdated'], 'mini');
                            ?>
                            <h6>Updated on : <?= $dateCreated; ?></h6>
                            <thead>
                                <tr>
                                    <th>कुल सीट</th>
                                    <th>सीट आवंटित</th>
                                    <th>शेष सीट</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $hstatic['hostalTotSeat']; ?></td>
                                    <td><?= $hstatic['hostelOccuSeat']; ?></td>
                                    <td><?= $hstatic['hostalTotSeat'] - $hstatic['hostelOccuSeat']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br><br>

                        <hr>
                        <br><br>
                        <h2>छात्राओं की सूची</h2>
                        <table class="tblclass">
                            <?php
                            $totst = $query->num_rows();
                            ?>
                            <p align="right">
                            <h6>कुल छात्रा : <?= $totst ?></h6>
                            </p>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>छात्रा का नाम</th>
                                    <th>आवंटित दिनांक</th>
                                    <th>कमरा नंबर</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($query->result() as $row) {
                                    $this->load->module('timedate');
                                    $dateIn = $this->timedate->get_nice_date($row->hostStudIn, 'mini');
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row->hosStudName ?></td>
                                        <td><?= $dateIn; ?></td>
                                        <td><?= $row->hosRoom; ?></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </article>

        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>