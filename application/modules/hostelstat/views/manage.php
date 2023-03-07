<h1>Manage Hostel Static</h1>

<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Hostel Static</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hostel Name</th>
                        <th>Total Seat</th>
                        <th>Occupied Seat</th>
                        <th>Date Updated</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $this->load->module('timedate');
                    $i = $query->num_rows();
                    foreach ($query->result() as $row) {
                        $edit_post_url = base_url() . "hostelstat/create/" . $row->id;
                        $dateCreated = $this->timedate->get_nice_date($row->hostelUpdated, 'mini');

                        $status = $row->hostelStatus;
                        if ($status == 1) {
                            $status_label = "success";
                            $status_desc = "Active";
                        } else {
                            $status_label = "default";
                            $status_desc = "Inactive";
                        }

                        $htype = $row->hostelType;
                        if ($htype == 1) {
                            $hostel_name = "श्री बाबा गरीबनाथ छात्रावास";
                        } else {
                            $hostel_name = "बालिका छात्रावास";
                        }
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td class="center"><?= $hostel_name ?></td>
                            <td class="center"><?= $row->hostalTotSeat ?></td>
                            <td class="center"><?= $row->hostelOccuSeat ?></td>
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