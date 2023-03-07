<h1>Manage Researches</h1>
<?php if(isset($flash)){
	echo $flash;
}?>
<p align="right"><a href="<?= base_url() ?>researches/create" class="btn btn-primary">Create Research</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Researches</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Research Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
                    $i = $query->num_rows();
                    $this->load->module('timedate');
                    foreach($query->result() as $row){
                    $researched_on = $this->timedate->get_nice_date($row->research_date, 'mini');    
					$edit_research_url = base_url()."researches/create/".$row->id;
					$view_research_url = base_url()."researches/view/".$row->research_url;
					$status = $row->research_status;
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
                        <td class="center"><?= $researched_on ?></td>
                        <td class="center"><?= $row->research_title ?></td>
                        <td class="center">
                            <span class="label label-<?= $status_label ?>"><?= $status_desc ?></span>
                        </td>
                        <td class="center" width="100px">
                            <a class="btn btn-success" target="_new" href="<?= $view_research_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_research_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php $i--; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




