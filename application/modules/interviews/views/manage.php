<h1>Manage Interviews</h1>
<?php if(isset($flash)){
	echo $flash;
}?>
<p align="right"><a href="<?= base_url() ?>interviews/create" class="btn btn-primary">Create Interview</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Interviews</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Interview Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
                    $i = $query->num_rows();
                    $this->load->module('timedate');
                    foreach($query->result() as $row){
                    $bloged_on = $this->timedate->get_nice_date($row->interview_date, 'mini');    
					$edit_interview_url = base_url()."interviews/create/".$row->id;
					$view_interview_url = base_url()."interviews/view/".$row->interview_url;
					$status = $row->interview_status;
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
                        <td class="center"><?= $row->interview_title ?></td>
                        <td class="center">
                            <span class="label label-<?= $status_label ?>"><?= $status_desc ?></span>
                        </td>
                        <td class="center" width="100px">
                            <a class="btn btn-success" target="_new" href="<?= $view_interview_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_interview_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php $i--; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




