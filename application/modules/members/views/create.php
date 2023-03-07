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
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Member Options</h2>
            </div>

            <div class="box-content">
                <?php if ($member_img == "") { ?>
                    <a href="<?= base_url() ?>members/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Image</button></a>
                <?php } else { ?>
                    <a href="<?= base_url() ?>members/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
                <?php } ?>
            </div>
        </div><!--/span-->
    </div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span> Member Details</h2>
        </div>

        <div class="box-content">
            <?php
            $form_location = base_url() . "members/create/" . $update_id;

            ?>
            <form class="form-horizontal" action="<?php echo $form_location; ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Member Name </label>
                        <div class="controls">
                            <input type="text" name="member_name" class="span6 typeahead" value="<?= $member_name ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Mobile </label>
                        <div class="controls">
                            <input type="text" name="member_phone" class="span6 typeahead" value="<?= $member_phone ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Address </label>
                        <div class="controls">
                            <input type="text" name="member_address" class="span6 typeahead" value="<?= $member_address ?>" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Location </label>
                        <div class="controls">
                            <input type="text" name="member_location" class="span6 typeahead" value="<?= $member_location ?>" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="selectError">Membership</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError"';
                            $options = array(
                                '1'         => 'Life Time',
                                '2'           => 'Limited',
                            );

                            echo form_dropdown('member_lifelong', $options, $member_status, $additional_dd_code);

                            ?>
                        </div>
                    </div>
                    <?php
                    $joinDate = $this->timedate->get_nice_date($member_join, 'creatForm');
                    $endDate = $this->timedate->get_nice_date($member_valid, 'creatForm');
                    ?>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Join Date </label>
                        <div class="controls">
                            <input type="date" name="member_join" class="span6 typeahead" value="<?= $joinDate ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Valid </label>
                        <div class="controls">
                            <input type="date" name="member_valid" class="span6 typeahead" value="<?= $endDate ?>" id="typeahead">
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

                            echo form_dropdown('member_status', $options, $member_status, $additional_dd_code);

                            ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>members/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div>

<?php if ($member_img != "") { ?>
    <div class="row-fluid sortablee">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Team Member Image</h2>
            </div>

            <div class="box-content">
                <img src="<?= base_url() ?>assets/images/members/main/<?= $member_img ?>" width="200" />
            </div>
        </div><!--/span-->
    </div>
<?php } ?>