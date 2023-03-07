<h1>Manage Members</h1>
<p align="right"><a href="<?= base_url() ?>teams/create" class="btn btn-primary">Create Team Member</a></p>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Members</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Member Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Join</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $this->load->module('timedate');
                    $this->load->module('member_type');
                    $i = $query->num_rows();
                    foreach ($query->result() as $row) {

                        $join = $this->timedate->get_nice_date($row->member_join, 'mini');
                        $edit_post_url = base_url() . "members/create/" . $row->id;
                        //$member_type_name = $this->member_type->get_type_name($row->member_type);

                        if ($row->member_img == '') {
                            $member_photo = "no-mem.png";
                        } else {
                            $member_photo = $row->member_img;
                        }
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?= base_url() ?>assets/images/members/main/<?= $member_photo ?>" width="60"></td>
                            <td class="center"><?= $row->member_name ?></td>
                            <td class="center"><?= $row->member_phone ?></td>
                            <td class="center"><?= $row->member_location ?></td>
                            <td class="center"><?= $join ?></td>
                            <td class="center" width="100px">
                                <a class="btn btn-success" target="_new" href="">
                                    <i class="halflings-icon white zoom-in"></i>
                                </a>
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