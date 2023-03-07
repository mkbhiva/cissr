<h1>Manage Accounts</h1>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-briefcase white briefcase"></i><span class="break"></span>Accounts</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Comment Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
                    $i = $query->num_rows(); 
					$this->load->module('timedate');
					foreach($query->result() as $row){
					$edit_url = base_url()."post_comments/create/".$row->id;
					$view_url = base_url()."posts/view/".$row->post_id;
					$date_commneted = $this->timedate->get_nice_date($row->comment_date,'mini');
                    $status = $row->status;

                    if($status==1){
                        $status_label = "success";
                        $status_desc = "Approved";
                    }else{
                        $status_label = "danger";
                        $status_desc = "Not Approved";
                    }
					?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row->comment_name ?></td>
                        <td class="center"><?= character_limiter($row->comment_text, 20) ?></td>
                        <td class="center"><?= $date_commneted ?></td>
                        <td class="center"><span class="label label-<?= $status_label ?>"><?= $status_desc ?></span></td>
                        <td class="center">
                            <a class="btn btn-success" target="_new" href="<?= $view_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="<?= $edit_url ?>">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php
                        $i--;
                     } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




