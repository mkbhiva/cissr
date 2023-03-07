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
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Notice Options</h2>
            </div>

            <div class="box-content">
                <?php if ($notice_file == "") { ?>
                    <a href="<?= base_url() ?>notices/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Image</button></a>
                <?php } else { ?>
                    <a href="<?= base_url() ?>notices/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
                <?php } ?>
            </div>
        </div><!--/span-->
    </div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span9">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Notice Details</h2>
        </div>

        <div class="box-content">
            <?php
            $form_location = base_url() . "notices/create/" . $update_id;

            ?>
            <form class="form-horizontal" action="<?php echo $form_location; ?>" method="post" enctype="multipart/form-data">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Title in Hindi </label>
                        <div class="controls">
                            <input type="text" name="notice_htitle" class="span10 typeahead" value="<?= $notice_htitle ?>" placeholder="Title in Hindi" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Title in English</label>
                        <div class="controls">
                            <input type="text" name="notice_title" class="span10 typeahead" value="<?= $notice_title ?>" placeholder="Title in English" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Notice Text </label>
                        <div class="controls">
                            <textarea class="cleditorr span10" name="notice_desc" id="textarea2" rows="15"><?= $notice_desc ?></textarea>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="selectError">Category</label>
                        <div class="controls">
                            <?php
                            $additional_dd_code = 'id="selectError"';
                            $notice_cat_options = array(
                                '1'         => 'प्रशासनिक',
                                '2'           => 'कार्यकरणी',
                                '3'           => 'छात्रावास',
                            );

                            echo form_dropdown('notice_cat', $notice_cat_options, $notice_cat, $additional_dd_code);

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

                            echo form_dropdown('notice_status', $options, $notice_status, $additional_dd_code);

                            ?>
                        </div>
                    </div>



                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>notices/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->


    <div class="box span3">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>File</h2>
        </div>

        <div class="box-content">
            <?php if ($notice_file != "") { ?>
                <a class="btn btn-sm btn-success" href="<?= base_url() ?>assets/notices/raw/<?= $notice_file ?>" target="_blank">File Attached</a>
            <?php } else {  ?>
                <p>Not Found</p>
            <?php }  ?>
        </div>
    </div><!--/span-->

</div>