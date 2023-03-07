<h1>Manage Homepage Offers</h1>
<p align="right"><a href="<?= base_url() ?>homepage_blocks/create" class="btn btn-primary">Create Homepage Offer</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Existing Homepage Offers</h2>
        </div>
        <div class="box-content">
        	<?php
            echo Modules::run('homepage_blocks/_draw_sortable_list');
			?>
        </div>
    </div><!--/span-->




