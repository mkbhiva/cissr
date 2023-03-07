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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($event_image=="") { ?>
               <a href="<?= base_url() ?>ourevents/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Image</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>ourevents/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
               <?php } ?>
               <a href="<?= base_url() ?>post_cat_assign/update/<?= $update_id ?>"><button type="button" class="btn btn-primary">Update Categories</button></a>
               <a href="<?= base_url() ?>ourevents/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Event</button></a>
               <a target="_new" href="<?= base_url() ?>ourevents/view/<?= $update_id ?>"><button type="button" class="btn btn-default">View Event on Website</button></a>

        </div>
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."ourevents/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Event Name </label>
                        <div class="controls">
                            <input type="text" name="name" class="span6 typeahead" value="<?= $name ?>" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Event Location </label>
                        <div class="controls">
                            <input type="text" name="event_location" class="span6 typeahead" value="<?= $event_location ?>" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                      <label class="control-label" for="date01">Event Date</label>
                      <div class="controls">
                        <input type="text" name="event_dated" class="input-xlarge datepicker" id="date01" value="<?= $event_dated ?>">
                      </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Event Time </label>
                        <div class="controls">
                            <input type="text" name="event_time" class="span6 typeahead" value="<?= $event_time ?>" placeholder="10.00 AM" id="typeahead">
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
										
										echo form_dropdown('event_status', $options, $event_status, $additional_dd_code);
																		
								?>
								</div>
							  </div>
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="eventdesc" id="textarea2" rows="3"><?= $eventdesc ?></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>ourevents/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>

<?php if($event_image!="") { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Image</h2>
        </div>
        
        <div class="box-content">
               <img src="<?= base_url() ?>assets/images/eventsimg/medium/<?= $event_image ?>" />
        </div>
    </div><!--/span-->
</div>
<?php } ?>