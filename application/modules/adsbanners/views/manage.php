<h1>Manage Banners</h1>
<p align="right"><a href="<?= base_url() ?>adsbanners/addphoto/1" class="btn btn-success">Create Top Banner</a>
<a href="<?= base_url() ?>adsbanners/addphoto/2" class="btn btn-warning">Create Middle Banner</a>
</p>
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
                        <th>Banners</th>
                        <th>Place</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$i = 1;
					foreach($query->result() as $row){
					$statusURL = base_url()."adsbanners/addphoto/".$row->place;
					$deleteURL = base_url()."adsbanners/delete_image/".$row->place.'/'.$row->id;
                    $bannerImage = $row->fileName;
                    if($bannerImage==''){
                        $bannerImage = "noimg.jpg";
                    }

                    if($row->place==1){
                        $position = "Top Banner";
                    } else {
                        $position = "Middle Banner";
                    }

                    if($row->status==1){
                        $bstatus = "ON";
                    } else {
                        $bstatus = "OFF";
                    }
					
					?>
                    <tr>
                        <td><?= $i ?></td>
						<td class="center"><img src="<?= base_url() ?>assets/images/banners/small/<?= $bannerImage ?>"/></td>
                        <td class="center"><?= $position ?></td>
                        <td class="center"><?= $bstatus ?></td>
                        <td class="center">
                            <a class="btn btn-info" href="<?= $statusURL ?>">
                                <i class="halflings-icon white edit"></i> Update Status / Delete   
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




