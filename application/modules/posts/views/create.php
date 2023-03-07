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
        <?php if($post_img=="") { ?>
               <a href="<?= base_url() ?>posts/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Image</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>posts/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
               <?php } ?>
               <a href="<?= base_url() ?>post_cat_assign/update/<?= $update_id ?>"><button type="button" class="btn btn-primary">Update Categories</button></a>
               <a href="<?= base_url() ?>posts/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Post</button></a>
               <a target="_new" href="<?= base_url() ?>posts/view/<?= $update_id ?>"><button type="button" class="btn btn-default">View Post on Website</button></a>

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
        $form_location = base_url()."posts/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Hindi Title </label>
                        <div class="controls">
                            <input type="text" name="post_title" class="span6 typeahead" value="<?= $post_title ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">English Title </label>
                        <div class="controls">
                            <input type="text" name="post_title_en" class="span6 typeahead" value="<?= $post_title_en ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                                <label class="control-label" for="selectError">Author</label>
                                <div class="controls">
                                <?php
                                $additional_dd_code = 'id="selectError"';
                                        
                                    echo form_dropdown('post_author', $options, $post_author, $additional_dd_code);
                                                                        
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
										
										echo form_dropdown('post_status', $options, $post_status, $additional_dd_code);
																		
								?>
								</div>
							  </div>
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="post_desc" id="textarea2" rows="3"><?= $post_desc ?></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Hindi Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="post_desc_hn" id="textarea2" rows="3"><?= $post_desc_hn ?></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Keywords</label>
                        <div class="controls">
                            <input type="text" name="post_keywords" class="span6 typeahead" id="typeahead"  value="<?= $post_keywords ?>">
                        </div>
                    </div>
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>posts/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>

<?php if($post_img!="") { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Image</h2>
        </div>
        
        <div class="box-content">
               <img src="<?= base_url() ?>assets/images/blog/medium/<?= $post_img ?>" />
        </div>
    </div><!--/span-->
</div>
<?php } ?>