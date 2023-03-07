<h1>Manage Magazines</h1>
<p align="right"><a href="<?= base_url() ?>magazines/create" class="btn btn-primary">Create Magazines</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Magazines</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date Publish</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
					$this->load->module('timedate');
                    $i = $query->num_rows();
                    foreach($query->result() as $row){
					$edit_post_url = base_url()."magazines/create/".$row->id;
					$dateCreated = $this->timedate->get_nice_date($row->publishOn,'mini');
                    
                    if($row->status==''){
                        $author_image = "no_img.png";
                    } else {
                        $author_image = $row->status;
                    }
					?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="center"><?= $row->title ?></td>
                        <td><?= $dateCreated ?></td>
                        <td class="center" width="100px">
                            <a class="btn btn-info" href="<?= $edit_post_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php $i--; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




