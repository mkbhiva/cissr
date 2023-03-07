<h1>Manage Blogs</h1>
<?php if(isset($flash)){
	echo $flash;
}?>
<p align="right"><a href="<?= base_url() ?>blogs/create" class="btn btn-primary">Create Blog</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Blogs</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Blog Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
                    $i = $query->num_rows();
                    $this->load->module('timedate');
                    foreach($query->result() as $row){
                    $bloged_on = $this->timedate->get_nice_date($row->blog_date, 'mini');    
					$edit_blog_url = base_url()."blogs/create/".$row->id;
					$view_blog_url = base_url()."blogs/view/".$row->blog_url;
					$status = $row->blog_status;
					if($status==1){
						$status_label = "success";
						$status_desc = "Active";
					}else{
						$status_label = "default";
						$status_desc = "Inactive";
					}
					?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="center"><?= $bloged_on ?></td>
                        <td class="center"><?= $row->blog_title ?></td>
                        <td class="center">
                            <span class="label label-<?= $status_label ?>"><?= $status_desc ?></span>
                        </td>
                        <td class="center" width="100px">
                            <a class="btn btn-success" target="_new" href="<?= $view_blog_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_blog_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php $i--; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




