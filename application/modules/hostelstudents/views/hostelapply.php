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
                    <h3>Fill the form for admission:</h3><br />

                    <?php if (isset($flash)) {
                        echo $flash;
                    } else {
                        echo '<p>&nbsp;</p>';
                    } ?>

                    <form action="<?= site_url('hostelstudents/studentapply') ?>" id="contact-form" method="post" enctype="multipart/form-data">
                        <table style="width:100%; border-spacing: 20px;">



                            <tr>
                                <td style="width:25%">*Name of the applicant</td>

                                <td><input class="radius" type="text" name="hosStudName" value="<?php echo set_value('hosStudName'); ?>" placeholder="Name" />
                                    <span class="clear"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%">*Mobile No. </td>

                                <td><input class="radius" type="text" name="hostStudMobile" value="<?php echo set_value('hostStudMobile'); ?>" placeholder="Mobile No." />
                                    <span class="clear"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%">*Email Id</td>

                                <td><input class="radius" type="email" name="hostStudEmail" value="<?php echo set_value('hostStudEmail'); ?>" placeholder="Email Id" />
                                    <span class="clear"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%">*Full Address</td>

                                <td><input class="radius" type="text" name="hosStudAdd" value="<?php echo set_value('hosStudAdd'); ?>" placeholder="Write full address" />
                                    <span class="clear"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%">*City</td>

                                <td><input class="radius" type="text" name="hostStudCity" value="<?php echo set_value('hostStudCity'); ?>" placeholder="City" />
                                    <span class="clear"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%">*Pin Code</td>

                                <td><input class="radius" type="number" name="hostStudPin" value="<?php echo set_value('hostStudPin'); ?>" placeholder="Pin code pls" />
                                    <span class="clear"></span>
                                </td>
                            </tr>


                            <tr>
                                <td style="width:25%">*Sex</td>

                                <td>
                                    <select name="hosStudSex" style="padding: 5px; width:221px">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="clear"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%">*Preparing For</td>

                                <td><input class="radius" type="text" name="hostStudPrep" value="<?php echo set_value('hostStudPrep'); ?>" placeholder="Like IAS, PCS, SSB etc." />
                                    <span class="clear"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%">*Required Days</td>

                                <td><input class="radius" type="number" name="hostStudReqTime" value="<?php echo set_value('hostStudReqTime'); ?>" placeholder="No. of days needed" />
                                    <span class="clear"></span>
                                </td>
                            </tr>



                            <tr>
                                <td></td>
                                <td>
                                    <br>
                                    <br>
                                    <input class="buttons radius send" name="submit" value="Submit Application" type="submit" />
                                    <br>
                                    <br>
                                </td>
                                <td></td>
                            </tr>


                        </table>

                    </form>

                    <hr>
                    <div class="clear"></div>

                </div>

                <div class="clear"></div>

            </article>

        </div>

        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>
        <div class="clear"></div>
    </div>
</div>