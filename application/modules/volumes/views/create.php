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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Volume Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."volumes/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Volume Title </label>
                        <div class="controls">
                            <input type="text" name="volumeNo" class="span6 typeahead" value="<?= $volumeNo ?>" id="typeahead">
                        </div>
                    </div>
                    

                    
                    <div class="control-group">
								<label class="control-label" for="selectError">Issue No.</label>
								<div class="controls">
                                <?php
                                $i=1;
								$additional_dd_code = 'id="selectError"';

                                $options = array(
                                            'Issue 1' => 'Issue 1',
                                            'Issue 2' => 'Issue 2',
                                            'Issue 3' => 'Issue 3',
                                            'Issue 4' => 'Issue 4',
                                            'Issue 5' => 'Issue 5',
                                            'Issue 6' => 'Issue 6',
                                            'Issue 7' => 'Issue 7',
                                            'Issue 8' => 'Issue 8',
                                            'Issue 9' => 'Issue 9',
                                            'Issue 10' => 'Issue 10',
                                            'Issue 11' => 'Issue 11',
                                            'Issue 12' => 'Issue 12'
                                        );
                                										
								echo form_dropdown('issueNo', $options, $issueNo, $additional_dd_code);
																		
								?>
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
                                        
                                        echo form_dropdown('volumeStatus', $options, $volumeStatus, $additional_dd_code);
                                                                        
                                ?>
                                </div>
                              </div>
                    
                   
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
                        <a href="<?= base_url() ?>volumes/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
