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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Additional Options</h2>
        </div>
        
        <div class="box-content">
        		<?php if($update_id>2){ ?>
               <a href="<?= base_url() ?>webpages/deleteconf/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Page</button></a>
               <?php } ?>
               <a href="<?= base_url().$page_url ?>"><button type="button" class="btn btn-default">View Page on Website</button></a>

        </div>
    </div><!--/span-->
</div>
<?php } ?>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Page Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."webpages/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Page Title* </label>
                        <div class="controls">
                            <input type="text" name="page_title" class="span6 typeahead" value="<?= $page_title ?>" id="typeahead">
                        </div>
                    </div>
                    
                    
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2"> Page Description</label>
                        <div class="controls">
                            <textarea class="span6" name="page_description" id="textarea2" rows="3"><?= $page_description ?></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Keywords</label>
                        <div class="controls">
                            <input type="text" name="page_keywords" class="span6 typeahead" id="typeahead"  value="<?= $page_keywords ?>">
                        </div>
                    </div>
                    
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2"> Page Content*</label>
                        <div class="controls">
                            <textarea class="cleditor" name="page_content" id="textarea2" rows="3"><?= $page_content ?></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        <a href="<?= base_url() ?>webpages/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
