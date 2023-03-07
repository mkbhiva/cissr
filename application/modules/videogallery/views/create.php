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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Video Options</h2>
        </div>
        
        <div class="box-content">

               <a target="_new" href="<?= base_url() ?>videogallery/album/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete</button></a>
               <a target="_new" href="<?= base_url() ?>videogallery/album/<?= $update_id ?>"><button type="button" class="btn btn-default">View Video on Website</button></a>

        </div>
    </div><!--/span-->
</div>
<?php } ?>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Video Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."videogallery/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Hindi Title </label>
                        <div class="controls">
                            <input type="text" name="htitle" class="span6 typeahead" value="<?= $htitle ?>" placeholder="Write hindi title here" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">English Title </label>
                        <div class="controls">
                            <input type="text" name="etitle" class="span6 typeahead" value="<?= $etitle ?>" placeholder="Write english title here" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Youtube Code </label>
                        <div class="controls">
                            <input type="text" name="vlink" class="span6 typeahead" value="<?= $vlink ?>" placeholder="code like...  BeTt0mKlgAA" id="typeahead">
                        </div>
                    </div>
                              
                    
                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="description" id="textarea2" rows="3"><?= $description ?></textarea>
                        </div>
                    </div>


                    <div class="control-group hidden-phonee">
                        <label class="control-label" for="textarea2">Status</label>    
                        <div class="controls">
                            <select name="status">
                                <?php if($status == 0) { ?>    
                                    <option value="0" selected>OFF</option>
                                    <option value="1">ON</option>
                                <?php } else { ?>
                                    <option value="0">OFF</option>
                                    <option value="1" selected>ON</option>
                                <?php } ?>    
                            </select>
                        </div>
                    </div>
                                        
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>videogallery/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Video Cover</h2>
        </div>
        <?php
            $vimage = $vimg;
            if($vimage==''){
                $vimage = "noimg.jpg";
            }

        ?>
        
        <div class="box-content">
               <img src="<?= base_url() ?>assets/images/gallery/vgallery/thumb/<?= $vimage ?>" width="300" />
        </div>
    </div><!--/span-->
</div>
