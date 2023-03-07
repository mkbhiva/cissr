<h1><?= $headline ?></h1>
<?php echo validation_errors("<p style='color:red;'>", "</p>"); ?>
<?php if (isset($flash)) {
    echo $flash;
} else {
    echo '<p>&nbsp;</p>';
} ?>

<?php if (is_numeric($update_id)) { ?>
    <div class="row-fluid sortablee">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Team Member Options</h2>
            </div>

            <div class="box-content">
                <?php if ($team_img == "") { ?>
                    <a href="<?= base_url() ?>teams/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Image</button></a>
                <?php } else { ?>
                    <a href="<?= base_url() ?>teams/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
                <?php } ?>
            </div>
        </div><!--/span-->
    </div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Team Member Details</h2>
        </div>

        <div class="box-content">
            <?php
            $form_location = base_url() . "teams/create/" . $update_id;

            ?>
            <form class="form-horizontal" action="<?php echo $form_location; ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Member Name </label>
                        <div class="controls">
                            <input type="text" name="team_name" class="span6 typeahead" value="<?= $team_name ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError">Team Member Type</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError"';


                            echo form_dropdown('team_type', $options, $team_type, $additional_dd_code);

                            ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError">Sub Type</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError"';
                            $suboptions = array(
                                '1' => 'मुख्य कार्यकारिणी',
                                '2'         => 'युवा प्रकोष्ठ',
                                '3'           => 'महिला प्रकोष्ठ',
                            );

                            echo form_dropdown('team_subType', $suboptions, $team_subType, $additional_dd_code);

                            ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Phone </label>
                        <div class="controls">
                            <input type="text" name="team_phone" class="span6 typeahead" value="<?= $team_phone ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Location </label>
                        <div class="controls">
                            <input type="text" name="team_location" class="span6 typeahead" value="<?= $team_location ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Post </label>
                        <div class="controls">
                            <input type="text" name="team_postName" class="span6 typeahead" value="<?= $team_postName ?>" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Year </label>
                        <div class="controls">
                            <input type="text" name="team_year" class="span6 typeahead" value="<?= $team_year ?>" id="typeahead">
                        </div>
                    </div>



                    <div class="control-group">
                        <label class="control-label" for="selectError">Postion</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError"';
                            $postions_options = array(
                                '1'         => 'Sanrakshak',
                                '2'         => 'Adhyaksh',
                                '3'         => 'Varisth Upadhyaksh',
                                '4'         => 'Upadhyaksh',
                                '5'         => 'Mahasachiv',
                                '6'         => 'Sachiv',
                                '7'         => 'Upsachiv',
                                '8'         => 'Sanghtan Sachiv',
                                '9'         => 'Kosh Adhyaksh',
                                '10'         => 'Sahayak Kosh Adhyaksh',
                                '11'        => 'Vidhi Salahkar',
                                '12'        => 'Parcharmantri',
                                '13'         => 'Auditor',
                                '14'         => 'Media Prabhari',
                                '15'         => 'Pravakta',
                                '16'         => 'Sadasya',
                            );

                            echo form_dropdown('team_position', $postions_options, $team_position, $additional_dd_code);

                            ?>
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

                            echo form_dropdown('team_status', $options, $team_status, $additional_dd_code);

                            ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>teams/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div>

<?php if ($team_img != "") { ?>
    <div class="row-fluid sortablee">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Team Member Image</h2>
            </div>

            <div class="box-content">
                <img src="<?= base_url() ?>assets/images/teams/main/<?= $team_img ?>" width="200" />
            </div>
        </div><!--/span-->
    </div>
<?php } ?>