<h1>Manage Whatsapp Group</h1>
<p align="right"><a href="<?= base_url() ?>whatsapp/create" class="btn btn-primary">Create Whatsapp</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Whatsapp Group</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Group Name</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
					$this->load->module('timedate');
                    $i = $query->num_rows();
                    foreach($query->result() as $row){
					$edit_post_url = base_url()."whatsapp/create/".$row->id;
					$dateCreated = $this->timedate->get_nice_date($row->groupCreated,'mini');
                    
                    if($row->status==''){
                        $author_image = "no_img.png";
                    } else {
                        $author_image = $row->status;
                    }
					?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="center"><?= $row->groupName ?></td>
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




