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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Blog Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($blog_file=="") { ?>
               <a href="<?= base_url() ?>blogs/upload_file/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload File</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>blogs/delete_file/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete File</button></a>
               <?php } ?>
               <a href="<?= base_url() ?>blogs/delete_blog/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Blog</button></a>
        </div>
        
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Blog Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."blogs/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Blog Title </label>
                        <div class="controls">
                            <input type="text" name="blog_title" class="span6 typeahead" value="<?= $blog_title ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Author(s) Name </label>
                        <div class="controls">
                            <input type="text" name="blog_author" class="span6 typeahead" value="<?= $blog_author ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">About Author </label>
                        <div class="controls">
                            <input type="text" name="blog_authordesc" class="span6 typeahead" value="<?= $blog_authordesc ?>" id="typeahead">
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
										
										echo form_dropdown('blog_status', $options, $blog_status, $additional_dd_code);
																		
								?>
								</div>
							  </div>
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="blog_desc" id="textarea2" rows="3"><?= $blog_desc ?></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Keywords</label>
                        <div class="controls">
                            <input type="text" name="blog_keywords" class="span6 typeahead" id="typeahead"  value="<?= $blog_keywords ?>">
                        </div>
                    </div>
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>blogs/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>

<?php if($blog_file!="") { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Image</h2>
        </div>
        
        <div class="box-content">
               <img src="<?= base_url() ?>assets/images/blogs/small/<?= $blog_file ?>" />
        </div>
    </div><!--/span-->
</div>
<?php } ?>
