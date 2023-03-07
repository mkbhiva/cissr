<style type="text/css">
	.sort{
		list-style:none;
		border: 1px solid #cccccc;
		padding:10px;
		color:#333;
		margin-bottom:5px;
		background-color:white;
	}
</style>

<ul id="sortlist">
	<?php 
		$this->load->module('post_categories');
		foreach($query->result() as $row){
			$num_sub_cats = $this->post_categories->_count_sub_cats($row->id);
		$edit_post_url = base_url()."post_categories/create/".$row->id;
		if($row->parent_cat_id ==0){
			$parent_cat_title = "&nbsp;";
		}else{
			$parent_cat_title = $this->post_categories->_get_cat_title($row->parent_cat_id);
		}
		?>
	<li class="sort" id="<?= $row->id ?>"><i class="icon-sort"></i> <?= $row->cat_title ?>
    <?= $parent_cat_title ?>
    
    <?php
						if($num_sub_cats<1){
							echo "&nbsp;";
						}else{
							if($num_sub_cats==1){
								$entity = "Sub Category";
							}else{
								$entity = "Sub Categories";	
							}
							
							$sub_cat_url = base_url()."post_categories/manage/".$row->id;
							?>
							<a class="btn btn-warning" href="<?= $sub_cat_url ?>">
                                <i class="halflings-icon white eye-open"></i>  
                                <?php echo $num_sub_cats.' '.$entity; ?>
                            </a>
                            
                            
							
						
						<?php } ?>
                        
                        <a class="btn btn-info" href="<?= $edit_post_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
    
    
    </li>
    <?php } ?>
</ul>