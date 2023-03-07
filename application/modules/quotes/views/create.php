<h1><?= $headline ?></h1>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Quotes Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."quotes/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Quotes </label>
                        <div class="controls">
                            <input type="text" name="quote_text" class="span6 typeahead" value="<?= $quote_text ?>" placeholder="Write Group Name" id="typeahead">
                        </div>
                    </div>
                    
                    
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="quote_desc" id="textarea2" rows="3"><?= $quote_desc ?></textarea>
                        </div>
                    </div>
                     
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>quotes/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
