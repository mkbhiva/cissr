<h1>Manage Categories</h1>
<p align="right"><a href="<?= base_url() ?>post_categories/create" class="btn btn-primary">Create Category</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Existing Categories</h2>
        </div>
        <div class="box-content">
        	<?php
            echo Modules::run('post_categories/_draw_sortable_list',$parent_cat_id);
			?>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Category Title</th>
                        <th>Parent Category</th>
                        <th>Sub Categories</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$this->load->module('post_categories');
					foreach($query->result() as $row){
						$num_sub_cats = $this->post_categories->_count_sub_cats($row->id);
					$edit_post_url = base_url()."post_categories/create/".$row->id;
					if($row->parent_cat_id ==0){
						$parent_cat_title = "-";
					}else{
						$parent_cat_title = $this->post_categories->_get_cat_title($row->parent_cat_id);
					}
					?>
                    <tr>
                        <td><?= $row->cat_title ?></td>
                        <td class="center"><?= $parent_cat_title ?></td>
                        <td class="center">
						<?php
						if($num_sub_cats<1){
							echo "-";
						}else{
							if($num_sub_cats==1){
								$entity = "Category";
							}else{
								$entity = "Categories";	
							}
							
							$sub_cat_url = base_url()."post_categories/manage/".$row->id;
							?>
							<a class="btn btn-warning" href="<?= $sub_cat_url ?>">
                                <i class="halflings-icon white eye-open"></i>  
                                <?php echo $num_sub_cats.' '.$entity; ?>
                            </a>
							
						
						<?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-success" href="#">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_post_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




