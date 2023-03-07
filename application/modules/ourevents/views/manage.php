<h1>Manage Events</h1>
<p align="right"><a href="<?= base_url() ?>ourevents/create" class="btn btn-primary">Create Event</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Events</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Event Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
                    $i = $query->num_rows();
                    $this->load->module('timedate');
                    foreach($query->result() as $row){
                    $posted_on = $this->timedate->get_nice_date($row->event_dated, 'mini');    
					$edit_post_url = base_url()."ourevents/create/".$row->id;
					$view_post_url = base_url()."ourevents/view/".$row->id;
					$status = $row->event_status;
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
                        <td class="center"><?= $posted_on ?></td>
                        <td class="center"><?= $row->event_location ?></td>
                        <td class="center">
                            <span class="label label-<?= $status_label ?>"><?= $status_desc ?></span>
                        </td>
                        <td class="center" width="100px">
                            <a class="btn btn-success" target="_new" href="<?= $view_post_url ?>">
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




