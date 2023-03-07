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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>File Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($fileName=="") { ?>
               <a href="<?= base_url() ?>papers/upload_file/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload File</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>papers/delete_file/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete File</button></a>
               <?php } ?>
        </div>
    </div><!--/span-->
</div>
<?php } ?>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Papers Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."papers/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Title </label>
                        <div class="controls">
                            <input type="text" name="title" class="span6 typeahead" value="<?= $title ?>" placeholder="Write Paper Issue" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Author(s) </label>
                        <div class="controls">
                            <input type="text" name="paperAuthor" class="span6 typeahead" value="<?= $paperAuthor ?>" placeholder="Write Paper Issue" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Papge(s) </label>
                        <div class="controls">
                            <input type="text" name="paperPage" class="span6 typeahead" value="<?= $paperPage ?>" placeholder="Write Paper Issue" id="typeahead">
                        </div>
                    </div>
                
                     
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>papers/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
