<h1>Manage Students</h1>
<p align="right"><a href="<?= base_url() ?>hostelstudents/create" class="btn btn-primary">Add Students</a></p>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Students</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reg. No.</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Hostel</th>
                        <th>Room No.</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $this->load->module('timedate');
                    $i = $query->num_rows();
                    foreach ($query->result() as $row) {
                        $edit_post_url = base_url() . "hostelstudents/create/" . $row->id;


                        $status = $row->hostStudStatus;
                        if ($status == 1) {
                            $status_label = "success";
                            $status_desc = "Active";
                        } else {
                            $status_label = "default";
                            $status_desc = "Inactive";
                        }

                        $htype = $row->hosType;
                        if ($htype == 1) {
                            $hostel_name = "बालक";
                        } else {
                            $hostel_name = "बालिका";
                        }
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>HSTL<?= $row->id ?></td>
                            <td class="center"><?= $row->hosStudName ?></td>
                            <td class="center"><?= $row->hostStudCity ?></td>
                            <td><?= $hostel_name ?></td>
                            <td class="center"><?= $row->hosRoom ?></td>
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