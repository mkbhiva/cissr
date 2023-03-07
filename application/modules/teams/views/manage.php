<h1>Manage Teams</h1>
<p align="right"><a href="<?= base_url() ?>teams/create" class="btn btn-primary">Create Team Member</a></p>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Teams</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Member Name</th>
                        <th>Location</th>
                        <th>Post</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $this->load->module('team_type');
                    $i = $query->num_rows();
                    foreach ($query->result() as $row) {

                        $edit_post_url = base_url() . "teams/create/" . $row->id;
                        //$team_type_name = $this->team_type->get_type_name($row->team_type);

                        if ($row->team_img == '') {
                            $team_photo = "no-mem.png";
                        } else {
                            $team_photo = $row->team_img;
                        }
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" width="60"></td>
                            <td class="center"><?= $row->team_name ?></td>
                            <td class="center"><?= $row->team_location ?></td>
                            <td class="center"><?= $row->team_postName ?></td>
                            <td class="center"><?= $row->team_year ?></td>
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