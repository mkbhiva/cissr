<h1>Content Management System</h1>
<p align="right"><a href="<?= base_url() ?>webpages/create" class="btn btn-primary">Create New Webpage</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white file"></i><span class="break"></span>Webpages</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Page URL</th>
                        <th>Page Title</th>
                        <th class="span2">Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php foreach($query->result() as $row){
					$edit_page_url = base_url()."webpages/create/".$row->id;
					$view_page_url = base_url().$row->page_url;
					?>
                    <tr>
                        <td><?= $view_page_url ?></td>
                        <td class="center"><?= $row->page_title ?></td>
                        <td class="center">
                            <a class="btn btn-success" href="<?= $view_page_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_page_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




