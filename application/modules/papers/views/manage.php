<h1>Submitted Papers</h1>

<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Papers</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author(s)</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                	<?php
					$this->load->module('timedate');
                    $i = $query->num_rows();
                    foreach($query->result() as $row){
					$dateCreated = $this->timedate->get_nice_date($row->paperSubDate,'mini');
                    $target_url = base_url().'papers/view_details/'.$row->id;

					?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="center"><?= $row->paperTitle ?></td>
                        <td class="center"><?= $row->authorName ?>/<?= $row->coAuthorName ?></td>
                        <td><?= $dateCreated ?></td>
                        <td class="center" width="100px">
                            <a class="btn btn-info" href="<?= $target_url ?>">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                        </td>
                    </tr>
                    <?php $i--; } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




