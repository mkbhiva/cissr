<h1>Manage Forms</h1>
<p align="right"><a href="<?= base_url() ?>siteforms/create" class="btn btn-primary">Add Forms</a></p>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Forms</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Dated</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $this->load->module('timedate');
                    foreach ($query->result() as $row) {
                        $edit_post_url = base_url() . "siteforms/create/" . $row->id;
                        $date_created = $this->timedate->get_nice_date($row->date_created, 'mini');

                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td class="center"><?= $date_created ?></td>
                            <td class="center"><?= $row->form_htitle ?></td>
                            <td class="center">
                                <a class="btn btn-info" href="<?= $edit_post_url ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div><!--/span-->