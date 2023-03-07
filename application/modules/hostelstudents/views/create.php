<h1><?= $headline ?></h1>
<?php if (isset($flash)) {
    echo $flash;
} else {
    echo '<p>&nbsp;</p>';
} ?>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Student Details</h2>
        </div>

        <div class="box-content">
            <?php
            $form_location = base_url() . "hostelstudents/create/" . $update_id;

            ?>
            <form class="form-horizontal" action="<?php echo $form_location; ?>" method="post" enctype="multipart/form-data">
                <fieldset>


                    <div class="control-group">
                        <label class="control-label" for="selectError">Hostel</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError" class="span10"';
                            $hosType_options = array(
                                '1'         => 'बालक छात्रावास',
                                '2'           => 'बालिका छात्रावास',
                            );

                            echo form_dropdown('hosType', $hosType_options, $hosType, $additional_dd_code);

                            ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Room No. </label>
                        <div class="controls">
                            <input type="text" name="hosRoom" class="span10 typeahead" value="<?= $hosRoom ?>" placeholder="Room number" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Name </label>
                        <div class="controls">
                            <input type="text" name="hosStudName" class="span10 typeahead" value="<?= $hosStudName ?>" placeholder="Name" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Mobile</label>
                        <div class="controls">
                            <input type="text" name="hostStudMobile" class="span10 typeahead" value="<?= $hostStudMobile ?>" placeholder="Mobile" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Address</label>
                        <div class="controls">
                            <input type="text" name="hosStudAdd" class="span10 typeahead" value="<?= $hosStudAdd ?>" placeholder="Address" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">City</label>
                        <div class="controls">
                            <input type="text" name="hostStudCity" class="span10 typeahead" value="<?= $hostStudCity ?>" placeholder="City" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Preparing for </label>
                        <div class="controls">
                            <input type="text" name="hostStudPrep" class="span10 typeahead" value="<?= $hostStudPrep ?>" placeholder="Preparing for " id="typeahead">
                        </div>
                    </div>

                    <?php
                    $joinDate = $this->timedate->get_nice_date($hostStudIn, 'creatForm');
                    $endDate = $this->timedate->get_nice_date($hostStudOut, 'creatForm');
                    ?>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Admitted on </label>
                        <div class="controls">
                            <input type="date" name="hostStudIn" class="span10 typeahead" value="<?= $joinDate ?>" placeholder="Mobile" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Valid Till </label>
                        <div class="controls">
                            <input type="date" name="hostStudOut" class="span10 typeahead" value="<?= $endDate ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Post</label>
                        <div class="controls">
                            <input type="text" name="hostStudCurrent" class="span10 typeahead" value="<?= $hostStudCurrent ?>" placeholder="Current Position" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="selectError">Status</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError"';
                            $options = array(
                                '1'         => 'Active',
                                '0'           => 'Inactive',
                            );

                            echo form_dropdown('hostStudStatus', $options, $hostStudStatus, $additional_dd_code);

                            ?>
                        </div>
                    </div>



                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>hostelstudents/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div>