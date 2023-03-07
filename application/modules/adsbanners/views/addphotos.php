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
				echo form_open_multipart('adsbanners/do_upload/'.$update_id, $attributes);
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
                    <a href="<?= base_url() ?>adsbanners/manage" class="btn btn-warning">Cancel</a>
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
            <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Added Banners to this List</h2>
        </div>
        
        <div class="box-content">
               <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Banners</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$count = 0;
					$place = $this->uri->segment(3);
					foreach($query->result() as $row){
                        $switchbtn = $row->status;
						$count ++;
                        if($switchbtn==1){
                            $swtichMassege = "Disable";
                            $swtchColor = "important";
                        } else {
                            $swtichMassege = "Enable";
                            $swtchColor = "success";
                        }
					?>
                    <tr>
                        <td><?= $count ?></td>
                        <td class="center"><img src="<?= base_url() ?>assets/images/banners/small/<?= $row->fileName ?>"/></td>
                        <td class="center">
                            <a class="btn btn-<?= $swtchColor ?>"  href="<?= base_url() ?>adsbanners/update_status/<?= $place.'/'.$row->id ?>">
                                <i class="halflings-icon white eye-open"></i>  <?= $swtichMassege ?>
                            </a>
                            <a class="btn btn-danger" href="<?= base_url() ?>adsbanners/delete_image/<?= $place.'/'.$row->id ?>">
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
