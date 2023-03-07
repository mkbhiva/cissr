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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Research Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($research_file=="") { ?>
               <a href="<?= base_url() ?>researches/upload_file/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload File</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>researches/delete_file/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete File</button></a>
                              &nbsp;&nbsp;<?= $research_file ?>
               <?php } ?>
               <span class="pull-right">
                    <a href="<?= base_url() ?>researches/updateVol/<?= $update_id ?>"><button type="button" class="btn btn-warning">Assign Volume</button></a>
                    <a href="<?= base_url() ?>researches/delete_research/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Research</button></a>
                </span>
        </div>
        
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Research Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."researches/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Research Title </label>
                        <div class="controls">
                            <input type="text" name="research_title" class="span6 typeahead" value="<?= $research_title ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Author Details </label>
                        <div class="controls">
                            <input type="text" name="research_author" class="span6 typeahead" value="<?= $research_author ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Co-Author Details </label>
                        <div class="controls">
                            <input type="text" name="research_coauthor" class="span6 typeahead" value="<?= $research_coauthor ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Pages </label>
                        <div class="controls">
                            <input type="text" name="research_pages" class="span6 typeahead" value="<?= $research_pages ?>" id="typeahead">
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
										
										echo form_dropdown('research_status', $options, $research_status, $additional_dd_code);
																		
								?>
								</div>
							  </div>
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="research_desc" id="textarea2" rows="3"><?= $research_desc ?></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Keywords</label>
                        <div class="controls">
                            <input type="text" name="research_keywords" class="span6 typeahead" id="typeahead"  value="<?= $research_keywords ?>">
                        </div>
                    </div>
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>researches/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
