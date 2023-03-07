<h1><?= $headline ?></h1>
<?php echo validation_errors("<p style='color:red;'>","</p>"); ?>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>

<?php if(is_numeric($update_id)){ ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Aothor Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($member_img=="") { ?>
               <a href="<?= base_url() ?>authors/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Image</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>authors/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
               <?php } ?>
        </div>
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Aothor Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."authors/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Author Name </label>
                        <div class="controls">
                            <input type="text" name="member_name" class="span6 typeahead" value="<?= $member_name ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError">Author Type</label>
                        <div class="controls">
                        <?php
                        $additional_dd_code = 'id="selectError"';

                                
                            echo form_dropdown('member_type', $options, $member_type, $additional_dd_code);
                                                                
                        ?>
                        </div>
                      </div>

                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="member_desc" id="textarea2" rows="3"><?= $member_desc ?></textarea>
                        </div>
                    </div>
 
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>authors/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>

<?php if($member_img!="") { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Aothor Image</h2>
        </div>
        
        <div class="box-content">
               <img src="<?= base_url() ?>assets/images/authors/main/<?= $member_img ?>" />
        </div>
    </div><!--/span-->
</div>
<?php } ?>