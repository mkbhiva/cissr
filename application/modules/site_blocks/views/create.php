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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Options</h2>
        </div>
        
        <div class="box-content">
               <a href="<?= base_url() ?>homepage_offers/add_items/<?= $update_id ?>"><button type="button" class="btn btn-primary">Add Item</button></a>
               <a href="<?= base_url() ?>posts/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
               <a href="<?= base_url() ?>post_cat_assign/update/<?= $update_id ?>"><button type="button" class="btn btn-primary">Update Categories</button></a>
               <a href="<?= base_url() ?>posts/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Post</button></a>
               <a target="_new" href="<?= base_url() ?>"><button type="button" class="btn btn-default">View Home Page</button></a>

        </div>
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white star"></i><span class="break"></span>Homepage Offer Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."homepage_blocks/create/".$update_id;
		
		?>
              <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Offer Block Title </label>
                        <div class="controls">
                            <input type="text" name="block_title" class="span6 typeahead" value="<?= $block_title ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        <a href="<?= base_url() ?>homepage_blocks/manage" class="btn">Cancel</a>
                    </div>
                   
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div>
