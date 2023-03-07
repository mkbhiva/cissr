<h1><?= $headline ?></h1>
<?php echo validation_errors("<p style='color:red;'>","</p>"); ?>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Comment Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."post_comments/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Name</label>
                        <div class="controls">
                            <input type="text" name="comment_name" class="span6 typeahead" value="<?= $comment_name ?>" id="typeahead">
                            <input type="hidden" name="post_id" class="span6 typeahead" value="<?= $post_id ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email ID</label>
                        <div class="controls">
                            <input type="text" name="comment_email" class="span6 typeahead" value="<?= $comment_email ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Place</label>
                        <div class="controls">
                            <input type="text" name="comment_place" class="span6 typeahead" value="<?= $comment_place ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Comment Date</label>
                        <div class="controls">
                            <input type="text" name="comment_name" class="span6 typeahead" value="<?= $comment_name ?>" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError">Status</label>
                        <div class="controls">
                        <?php
                        $additional_dd_code = 'id="selectError"';
                        $options = array(
                                        '1'         => 'Approved',
                                        '0'           => 'Not Approved',
                                );
                                
                                echo form_dropdown('status', $options, $status, $additional_dd_code);
                                                                
                        ?>
                        </div>
                      </div>

                      <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Comment</label>
                        <div class="controls">
                            <textarea class="cleditor" name="comment_text" id="textarea2" rows="3"><?= $comment_text ?></textarea>
                        </div>
                    </div>
    
                    
                    
                    
                    
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        <a href="<?= base_url() ?>post_comments/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>


<?php if(is_numeric($update_id)){ ?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Comment related to Post</h2>
        </div>
        
        <div class="box-content">
               <a target="_new" href="<?= base_url() ?>posts/view/<?= $post_id ?>"><button type="button" class="btn btn-primary">View Post</button></a>
        </div>
    </div><!--/span-->
</div>
<?php } ?>