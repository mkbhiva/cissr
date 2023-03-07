<h1><?= $headline ?></h1>
<?php if (isset($flash)) {
    echo $flash;
} else {
    echo '<p>&nbsp;</p>';
} ?>



<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Static Details</h2>
        </div>

        <div class="box-content">
            <?php
            $form_location = base_url() . "hostelstat/create/" . $update_id;

            ?>
            <form class="form-horizontal" action="<?php echo $form_location; ?>" method="post" enctype="multipart/form-data">
                <fieldset>


                    <div class="control-group">
                        <label class="control-label" for="selectError">Hostel Type</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError"';
                            $hostelType_options = array(
                                '1'         => 'बालक छात्रावास',
                                '2'           => 'बालिका छात्रावास',
                            );

                            echo form_dropdown('hostelType', $hostelType_options, $hostelType, $additional_dd_code);

                            ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Total Seats </label>
                        <div class="controls">
                            <input type="text" name="hostalTotSeat" class="span10 typeahead" value="<?= $hostalTotSeat ?>" placeholder="Total Seats" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Occupied Seats</label>
                        <div class="controls">
                            <input type="text" name="hostelOccuSeat" class="span10 typeahead" value="<?= $hostelOccuSeat ?>" placeholder="Occupied Seats" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Other Details </label>
                        <div class="controls">
                            <textarea class="cleditor" name="hostelMembers" id="textarea2" rows="3"><?= $hostelMembers ?></textarea>
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

                            echo form_dropdown('hostelStatus', $options, $hostelStatus, $additional_dd_code);

                            ?>
                        </div>
                    </div>



                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>hostelstat/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div>