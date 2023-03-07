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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Expression Options</h2>
        </div>
        
        <div class="box-content">
        <?php if($tphoto=="") { ?>
               <a href="<?= base_url() ?>testimonials/upload_image/<?= $update_id ?>"><button type="button" class="btn btn-primary">Upload Image</button></a>
               <?php } else { ?>
               <a href="<?= base_url() ?>testimonials/delete_image/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Image</button></a>
               <?php } ?>
        </div>
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span9">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Testimonials Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."testimonials/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Name </label>
                        <div class="controls">
                            <input type="text" name="tname" class="span6 typeahead" value="<?= $tname ?>" placeholder="Name of the Person" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Place </label>
                        <div class="controls">
                            <input type="text" name="tplace" class="span6 typeahead" value="<?= $tplace ?>" placeholder="Name of Place" id="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Expression Text </label>
                        <div class="controls">
                            <textarea class="cleditorr" name="tdesc" id="textarea2" rows="3"><?= $tdesc ?></textarea>
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
                                
                                echo form_dropdown('tstatus', $options, $tstatus, $additional_dd_code);
                                                                
                        ?>
                        </div>
                      </div>


                     
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>testimonials/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

    
    <div class="box span3">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Photo</h2>
        </div>
        
        <div class="box-content">
        		<?php if($tphoto!="") { ?>
              		 <img src="<?= base_url() ?>assets/images/testimonial/<?= $tphoto ?>" />
               <?php } else {  ?>
               		<img src="<?= base_url() ?>assets/images/testimonial/no-img.jpg" />
               	<?php }  ?>	
        </div>
    </div><!--/span-->
    
</div>


