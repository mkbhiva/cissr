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
        </div>
    </div><!--/span-->




