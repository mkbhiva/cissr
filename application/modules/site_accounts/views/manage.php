<h1>Manage Accounts</h1>
<p align="right"><a href="<?= base_url() ?>site_accounts/create" class="btn btn-primary">Add New Account</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-briefcase white briefcase"></i><span class="break"></span>Accounts</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php 
					$this->load->module('timedate');
					foreach($query->result() as $row){
					$edit_url = base_url()."site_accounts/create/".$row->id;
					$view_url = base_url()."site_accounts/view/".$row->id;
					$date_created = $this->timedate->get_nice_date($row->date_made,'cool');
					?>
                    <tr>
                        <td><?= $row->username ?></td>
                        <td><?= $row->firstname ?></td>
                        <td class="center"><?= $row->lastname ?></td>
                        <td class="center"><?= $row->company ?></td>
                        <td class="center"><?= $date_created ?></td>
                        <td class="center">
                            <a class="btn btn-success" target="_new" href="<?= $view_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




