<h1><?= $headline ?></h1>
<?php if(isset($flash)){
    echo $flash;
}else{
    echo '<p>&nbsp;</p>';
}?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Assign Volume</h2>
        </div>
        
        <div class="box-content">
             

				<?php 
				$attributes = array('class' => 'form-horizontal');
				echo form_open_multipart('researches/updateVol/'.$update_id, $attributes);
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
                                <label class="control-label" for="selectError">Volume</label>
                                <div class="controls">
                                <?php
                                $additional_dd_code = 'id="selectError"';
                                        
                                  echo form_dropdown('research_volume', $options, $research_volume, $additional_dd_code);
                                                                        
                                ?>
                                </div>
                              </div> 
                            
                            
                                            
                    <br /><br />
                    <div class="form-actions">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    <a href="<?= site_url('researches/create/'.$update_id) ?>" class="btn btn-warning">Back</a>
                    </div>
                </fieldset>
                </form>


        </div>
    </div><!--/span-->
</div>