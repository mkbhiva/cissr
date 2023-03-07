<h1><?= $headline ?></h1>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Whatsapp Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."whatsapp/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Group Name </label>
                        <div class="controls">
                            <input type="text" name="groupName" class="span6 typeahead" value="<?= $groupName ?>" placeholder="Write Group Name" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Link Code </label>
                        <div class="controls">
                            <input type="text" name="groupLink" class="span6 typeahead" value="<?= $groupLink ?>" placeholder="B9qrmCtzTxXKgdd8oAwbjH" id="typeahead">
                        </div>
                    </div>
                     
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>whatsapp/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
