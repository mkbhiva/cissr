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
            <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Category Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."post_categories/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Title </label>
                        <div class="controls">
                            <input type="text" name="cat_title" class="span6 typeahead" value="<?= $cat_title ?>" id="typeahead">
                        </div>
                    </div>
                    
                    
                    <?php if($num_dropdown_options>1){ ?>
                    <div class="control-group">
								<label class="control-label" for="selectError">Parent Category</label>
								<div class="controls">
                                <?php
								$additional_dd_code = 'id="selectError"';
                              
										echo form_dropdown('parent_cat_id', $options, $parent_cat_id, $additional_dd_code);
																		
								?>
                    </div>
                  </div>
                   <?php }else{
					   echo form_hidden('parent_cat_id',0);
					   
				   } ?>

                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        <a href="<?= base_url() ?>post_categories/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
