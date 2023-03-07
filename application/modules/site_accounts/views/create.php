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
            <h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Account Details</h2>
        </div>
        
        <div class="box-content">
        <?php
        $form_location = base_url()."site_accounts/create/".$update_id;
		
		?>
            <form class="form-horizontal" action="<?php echo $form_location ;?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Username</label>
                        <div class="controls">
                            <input type="text" name="username" class="span6 typeahead" value="<?= $username ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">First Name</label>
                        <div class="controls">
                            <input type="text" name="firstname" class="span6 typeahead" value="<?= $firstname ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Last Name</label>
                        <div class="controls">
                            <input type="text" name="lastname" class="span6 typeahead" value="<?= $lastname ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Company</label>
                        <div class="controls">
                            <input type="text" name="company" class="span6 typeahead" value="<?= $company ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Address Line 1</label>
                        <div class="controls">
                            <input type="text" name="address1" class="span6 typeahead" value="<?= $address1 ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Address Line 2</label>
                        <div class="controls">
                            <input type="text" name="address2" class="span6 typeahead" value="<?= $address2 ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Town</label>
                        <div class="controls">
                            <input type="text" name="town" class="span6 typeahead" value="<?= $town ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Country</label>
                        <div class="controls">
                            <input type="text" name="country" class="span6 typeahead" value="<?= $country ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Post Code</label>
                        <div class="controls">
                            <input type="text" name="postcode" class="span6 typeahead" value="<?= $postcode ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Telephone No.</label>
                        <div class="controls">
                            <input type="text" name="telnum" class="span6 typeahead" value="<?= $telnum ?>" id="typeahead">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email Id</label>
                        <div class="controls">
                            <input type="text" name="email" class="span6 typeahead" value="<?= $email ?>" id="typeahead">
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        <a href="<?= base_url() ?>site_accounts/manage" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>


<?php if(is_numeric($update_id)){ ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Account Options</h2>
        </div>
        
        <div class="box-content">
               <a href="<?= base_url() ?>site_accounts/update_pword/<?= $update_id ?>"><button type="button" class="btn btn-primary">Update Password</button></a>
               <a href="<?= base_url() ?>site_accounts/deleteconf/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Account</button></a>
        </div>
    </div><!--/span-->
</div>
<?php } ?>