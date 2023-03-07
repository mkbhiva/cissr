<h1>Manage Notices</h1>
<p align="right"><a href="<?= base_url() ?>notices/create" class="btn btn-primary">Create Notices</a></p>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Notices</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Notice Title</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $this->load->module('timedate');
                    $i = $query->num_rows();
                    foreach ($query->result() as $row) {
                        $edit_post_url = base_url() . "notices/create/" . $row->id;
                        $dateCreated = $this->timedate->get_nice_date($row->notice_date, 'mini');

                        $status = $row->notice_status;
                        if ($status == 1) {
                            $status_label = "success";
                            $status_desc = "Active";
                        } else {
                            $status_label = "default";
                            $status_desc = "Inactive";
                        }
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td class="center"><?= $row->notice_htitle ?></td>
                            <td><?= $dateCreated ?></td>
                            <td class="center">
                                <span class="label label-<?= $status_label ?>"><?= $status_desc ?></span>
                            </td>
                            <td class="center" width="100px">
                                <a class="btn btn-info" href="<?= $edit_post_url ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $i--;
                    } ?>
                </tbody>
            </table>
        </div>
    </div><!--/span-->