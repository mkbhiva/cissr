<h1>Manage Authors</h1>
<p align="right"><a href="<?= base_url() ?>authors/create" class="btn btn-primary">Create Aothor</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Authors</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Author Name</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
                    $i = $query->num_rows();
                    foreach($query->result() as $row){
					$edit_post_url = base_url()."authors/create/".$row->id;
                    
                    if($row->author_img==''){
                        $author_image = "no_img.png";
                    } else {
                        $author_image = $row->author_img;
                    }
					?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><img src="<?= base_url() ?>assets/images/authors/thumb/<?= $author_image ?>" width="60" ></td>
                        <td class="center"><?= $row->author_name ?></td>
                        <td class="center"><?= $row->author_name ?></td>
                        <td class="center" width="100px">
                            <a class="btn btn-success" target="_new" href="">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
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




