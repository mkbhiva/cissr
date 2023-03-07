<h1><?= $headline ?></h1>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>

<?php if(is_numeric($update_id)){ ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Gallery Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($temp_img=="") { ?>
               <a href="<?= base_url() ?>tempphotos/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Profile Image</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>tempphotos/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Profile Image</button></a>
               <?php } ?>
               <a href="<?= base_url() ?>galleryphotos/addphoto/<?= $update_id ?>"><button type="button" class="btn btn-primary">Add Photosto this gallery</button></a>
               <a target="_new" href="<?= base_url() ?>tempphotos/album/<?= $update_id ?>"><button type="button" class="btn btn-default">View Item on Website</button></a>

        </div>
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Gallery Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."tempphotos/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Title </label>
                        <div class="controls">
                            <input type="text" name="gallery_title" class="span6 typeahead" value="<?= $gallery_title ?>" id="typeahead">
                        </div>
                    </div>
                              
                         
                              
                              
                    
                    <div class="control-group">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="gallery_desc" id="textarea2" rows="3"><?= $gallery_desc ?></textarea>
                        </div>
                    </div>
                    
                                        
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>tempphotos/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>

<?php if($temp_img!="") { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Profile Image</h2>
        </div>
        
        <div class="box-content">
               <img src="<?= base_url() ?>assets/images/tempimages/<?= $temp_img ?>" width="200"/>
        </div>
    </div><!--/span-->
</div>
<?php } ?>