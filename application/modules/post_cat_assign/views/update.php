<h1><?= $headline ?></h1>
<?php echo validation_errors("<p style='color:red;'>","</p>"); ?>
<?php if(isset($flash)){
	echo $flash;
}else{
	echo '<p>&nbsp;</p>';
}?>



<?php if($num_rows>0) { ?>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Assigned Categories for this Post</h2>
        </div>
        
        <div class="box-content">
               <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Category Title</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$count = 0;
					$this->load->module('post_categories');
					foreach($query->result() as $row){
						$count ++;
					$delete_url = base_url()."post_cat_assign/delete/".$row->id;
					$cat_title = $this->post_categories->_get_cat_title($row->cat_id);
					$parent_cat_title = $this->post_categories->_get_parent_cat_title($row->cat_id);
					$long_cat_title = $parent_cat_title.' > '.$cat_title;
					?>
                    <tr>
                        <td><?= $count ?></td>
                        <td class="center"><?= $long_cat_title ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </div>
    </div><!--/span-->
</div>
<?php } ?>
