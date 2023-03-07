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
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Interview Options</h2>
            </div>

            <div class="box-content">
                <?php if ($interview_file == "") { ?>
                    <a href="<?= base_url() ?>interviews/upload_file/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload File</button></a>
                <?php } else { ?>
                    <a href="<?= base_url() ?>interviews/delete_file/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete File</button></a>
                <?php } ?>
                <a href="<?= base_url() ?>interviews/delete_blog/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Interview</button></a>
            </div>

        </div>
        <!--/span-->
    </div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Interview Details</h2>
        </div>

        <div class="box-content">
            <?php
            $form_location = base_url() . "interviews/create/" . $update_id;

            ?>
            <form class="form-horizontal" action="<?php echo $form_location; ?>" method="post" enctype="multipart/form-data">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Interview Title </label>
                        <div class="controls">
                            <input type="text" name="interview_title" class="span6 typeahead" value="<?= $interview_title ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Author(s) Name </label>
                        <div class="controls">
                            <input type="text" name="interview_author" class="span6 typeahead" value="<?= $interview_author ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">About Author </label>
                        <div class="controls">
                            <input type="text" name="interview_authordesc" class="span6 typeahead" value="<?= $interview_authordesc ?>" id="typeahead">
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

                            echo form_dropdown('interview_status', $options, $interview_status, $additional_dd_code);

                            ?>
                        </div>
                    </div>

                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="interview_desc" id="textarea2" rows="3"><?= $interview_desc ?></textarea>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Keywords</label>
                        <div class="controls">
                            <input type="text" name="interview_keywords" class="span6 typeahead" id="typeahead" value="<?= $interview_keywords ?>">
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>interviews/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>

<?php if ($interview_file != "") { ?>
    <div class="row-fluid sortablee">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Image</h2>
            </div>

            <div class="box-content">
                <img src="<?= base_url() ?>assets/images/interviews/small/<?= $interview_file ?>" />
            </div>
        </div>
        <!--/span-->
    </div>
<?php } ?>