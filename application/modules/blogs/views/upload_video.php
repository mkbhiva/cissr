<h1><?= $headline ?></h1>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Upload Video</h2>
        </div>
        
        <div class="box-content">
             

				<?php 
				$attributes = array('class' => 'form-horizontal');
				echo form_open_multipart('blogs/upload_video/'.$update_id, $attributes);
				?>
                <fieldset>
                
                <div class="control-group">
                 <?php 
			   if(isset($flash)){
					echo $flash;
			  }?>
              </div>
                <p>&nbsp;</p>
                <div class="control-group">
                        <label class="control-label" for="typeahead">Video Code </label>
                        <div class="controls">
                            <input type="text" name="blog_video" class="span6 typeahead" value="<?= $blog_video ?>" id="typeahead">
                        </div>
                    </div>  
                            
                            
                                            
                    <br /><br />
                    <div class="form-actions">
                    <button type="submit" name="submit" value="Submit" class="btn btn-primary">Upload Video</button>
                    <button type="submit" name="submit" value="Cancel" class="btn btn-warning">Cancel</button>
                    </div>
                </fieldset>
                </form>


        </div>
    </div><!--/span-->
</div>

<?php if($blog_video!="") { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Video</h2>
        </div>
        
        <div class="box-content">
               <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $blog_video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div><!--/span-->
</div>
<?php } ?>