<h1><?= $headline ?></h1>
<?php echo validation_errors("<p style='color:red;'>","</p>"); ?>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Account Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."site_accounts/update_pword/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Password</label>
                        <div class="controls">
                            <input type="password" name="pword" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Repeat Password</label>
                        <div class="controls">
                            <input type="password" name="repeat_pword" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        <a href="<?= base_url() ?>site_accounts/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
