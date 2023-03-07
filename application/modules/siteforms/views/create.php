<h1><?= $headline ?></h1>
<?php if (isset($flash)) {
    echo $flash;
} else {
    echo '<p>&nbsp;</p>';
} ?>

<?php if (is_numeric($update_id)) { ?>
    <div class="row-fluid sortablee">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Forms Options</h2>
            </div>

            <div class="box-content">
                <?php if ($form_img == "") { ?>
                    <a href="<?= base_url() ?>siteforms/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload file</button></a>
                <?php } else { ?>
                    <a href="<?= base_url() ?>siteforms/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete file</button></a>
                <?php } ?>
                <a target="_new" href="<?= base_url() ?>siteforms"><button type="button" class="btn btn-default">View on Website</button></a>

            </div>
        </div><!--/span-->
    </div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Forms Details</h2>
        </div>

        <div class="box-content">
            <?php
            $form_location = base_url() . "siteforms/create/" . $update_id;

            ?>
            <form class="form-horizontal" action="<?php echo $form_location; ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Hindi Title </label>
                        <div class="controls">
                            <input type="text" name="form_htitle" class="span6 typeahead" value="<?= $form_htitle ?>" id="typeahead">
                        </div>
                    </div>





                    <div class="control-group">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="form_desc" id="textarea2" rows="2"><?= $form_desc ?></textarea>
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>siteforms/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div>

<?php if ($form_img != "") { ?>
    <div class="row-fluid sortablee">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>File Attached</h2>
            </div>

            <div class="box-content">
                <a class="btn btn-primary" href="<?= base_url() ?>assets/pdf/forms/<?= $form_img ?>" target="_blank">File Attached</a>
            </div>
        </div><!--/span-->
    </div>
<?php } ?>