<h1>Manage Video</h1>
<p align="right"><a href="<?= base_url() ?>videogallery/create" class="btn btn-primary">Create Video</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Video</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Video</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$i = 1;
					foreach($query->result() as $row){
					$edit_video_url = base_url()."videogallery/create/".$row->id;
					$view_video_url = base_url()."videogallery/view/".$row->id;
                    $vimage = $row->vimg;
                    if($vimage==''){
                        $vimage = "noimg.jpg";
                    }
					
					?>
                    <tr>
                        <td><?= $i ?></td>
						<td class="center"><img src="<?= base_url() ?>assets/images/gallery/vgallery/thumb/<?= $vimage ?>" width="80" /></td>
                        <td class="center"><?= $row->htitle ?></td>      
                        <td class="center">
                            <a class="btn btn-success" target="_new" href="<?= $view_video_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_video_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




