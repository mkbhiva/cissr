<h1><?= $headline ?></h1>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>


<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Upload Image</h2>
        </div>
        
        <div class="box-content">
             

				<?php 
				$attributes = array('class' => 'form-horizontal');
				echo form_open_multipart('galleryphotos/do_upload/'.$update_id, $attributes);
				?>
                <fieldset>
                
                <div class="control-group">
                 <?php 
			   if(isset($error)){
				foreach($error as $value){
					echo $value;
					}
			  }?>
              </div>
                <p>&nbsp;</p>
                <div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="userfile" required>
							  </div>
							</div>  
                            
                            
                                            
                    <br /><br />
                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Upload Image</button>
                    <a href="<?= base_url() ?>webgallery/create/<?= $update_id ?>" class="btn btn-warning">Cancel</a>
                    </div>
                </fieldset>
                </form>


        </div>
    </div><!--/span-->
</div>



<?php if($num_rows>0) { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Added Photos to this List</h2>
        </div>
        
        <div class="box-content">
               <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Photos</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$count = 0;
					$gallery_id = $this->uri->segment(3);
					foreach($query->result() as $row){
						$count ++;
					?>
                    <tr>
                        <td><?= $count ?></td>
                        <td class="center"><img src="<?= base_url() ?>assets/images/gallery/galleryphotos/thumb/<?= $row->photo_img ?>" width="100" /></td>
                        <td class="center">
                            <a class="btn btn-success"  target="_new" href="<?= base_url() ?>assets/images/gallery/galleryphotos/main/<?= $row->photo_img ?>">
                                <i class="halflings-icon white zoom-in"></i>  View Full Image
                            </a>
                            <a class="btn btn-danger" href="<?= base_url() ?>galleryphotos/delete_image/<?= $gallery_id.'/'.$row->id ?>">
                                <i class="halflings-icon white trash"></i>  Remove options
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </div>
    </div><!--/span-->
</div>
<?php } ?>
