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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Notification Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($notifi_file=="") { ?>
               <a href="<?= base_url() ?>notifications/upload_file/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload File</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>notifications/delete_file/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete File</button></a>
                &nbsp;&nbsp;<?= $notifi_file ?>
               <?php } ?>
               <a href="<?= base_url() ?>notifications/delete_notification/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Notification</button></a>
        </div>
        
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Notification Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."notifications/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Notification Title </label>
                        <div class="controls">
                            <input type="text" name="notifi_title" class="span6 typeahead" value="<?= $notifi_title ?>" id="typeahead">
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
										
										echo form_dropdown('notifi_status', $options, $notifi_status, $additional_dd_code);
																		
								?>
								</div>
							  </div>
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="notifi_desc" id="textarea2" rows="3"><?= $notifi_desc ?></textarea>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>notifications/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
