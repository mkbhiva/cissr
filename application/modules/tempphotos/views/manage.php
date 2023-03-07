<h1>Manage Photos</h1>
<p align="right"><a href="<?= base_url() ?>tempphotos/upload_image" class="btn btn-primary">Add Photo</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Photos</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$i = 1;
					$this->load->module('timedate');
					foreach($query->result() as $row){
					?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="center"><img src="<?= base_url() ?>assets/images/tempimages/<?= $row->temp_img ?>" width="60" /></td>
                        <td class="center">
                            <a class="btn btn-success" target="_new" href="<?= base_url() ?>assets/images/tempimages/<?= $row->temp_img ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-danger" href="<?= site_url('tempphotos/delete_image/'.$row->id) ?>">
                                <i class="halflings-icon white trash"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




