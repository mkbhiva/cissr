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
		$this->load->module('homepage_blocks');
		foreach($query->result() as $row){
		$edit_post_url = base_url()."homepage_blocks/create/".$row->id;
		$block_title = $row->block_title;
		?>
	<li class="sort" id="<?= $row->id ?>"><i class="icon-sort"></i> <?= $row->block_title ?>
    <?= $block_title ?>
    
    					<?php
						$num_items = 0;
						if($num_items<1){
							echo "&nbsp;";
						}else{
							if($num_items==1){
								$entity = "Sub Homepage Offer";
							}else{
								$entity = "Sub Homepage Offers";	
							}
							
							$sub_cat_url = base_url()."homepage_blocks/manage/".$row->id;
							?>
							<a class="btn btn-warning" href="<?= $sub_cat_url ?>">
                                <i class="halflings-icon white eye-open"></i>  
                                Hi
                            </a>
                            
                            
							
						
						<?php } ?>
                        
                        <a class="btn btn-info" href="<?= $edit_post_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
    
    
    </li>
    <?php } ?>
</ul>