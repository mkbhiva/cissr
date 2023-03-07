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
            <h2><i class="halflings-icon white file"></i><span class="break"></span>Confirm Delete</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."webpages/delete/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                	<div class="control-group">
                    	<div class="controls">
                        <h2>Are you sure that you want to delete the page !!!</h2>
                        </div>
                    </div>
                     
                    <div class="form-actions">
                        <button type="submit" class="btn btn-danger" name="submit" value="Yes - Delete Page">Yes - Delete Page</button>
                        <a href="<?= base_url() ?>webpages/create/<?= $update_id ?>" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
