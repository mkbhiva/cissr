<h1>Submitted Detials : Ref. No. <?= $paperRef ?></h1>
<p align="right"><a href="<?= base_url() ?>papers/manage" class="btn btn-warning">Back to Paper List</a></p>
<div class="row-fluid sortablee">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify white user"></i><span class="break"></span>Papers</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                   
                <tbody>
                	<?php
					$this->load->module('timedate');
					$dateCreated = $this->timedate->get_nice_date($paperSubDate,'full');
					?>
                    <tr>
                        <td class="center">Download File</td>
                        <td><a target="_new" class="btn btn-success btn-small" href="<?= base_url() ?>assets/pdf/papers/<?= $fileName ?>">Click here to download Paper</a></td>
                    </tr>
                    <tr>
                        <td class="center">Submission Date</td>
                        <td><?= $dateCreated ?></td>
                    </tr>
                    <tr>
                        <td class="center">Paper Title</td>
                        <td><?= $paperTitle ?></td>
                    </tr>
                    <tr>
                        <td class="center">Author Name</td>
                        <td class="center"><?= $authorName ?></td>
                    </tr>
                    <tr>
                        <td class="center">Author Mobile</td>
                        <td><?= $authorMobile ?></td>
                    </tr>
                    <tr>
                        <td class="center">Author Email</td>
                        <td><?= $authorEmail ?></td>
                    </tr>
                    <tr>
                        <td class="center">Country</td>
                        <td class="center"><?= $authorCountry ?></td>
                    </tr>
                    <tr>
                        <td class="center">Institute</td>
                        <td><?= $authorInst ?></td>
                    </tr>
                    <tr>
                        <td class="center">Author Course/ Year</td>
                        <td class="center"><?= $authorCourse ?> / <?= $authorYear ?></td>
                    </tr>
                    <?php if(!$coAuthorName===''){ ?>
                    <tr>
                        <td class="center">Co-Author Name</td>
                        <td class="center"><?= $coAuthorName ?></td>
                    </tr>
                    <tr>
                        <td class="center">Co-Author Mobile</td>
                        <td><?= $coAuthorMobile ?></td>
                    </tr>
                    <tr>
                        <td class="center">Co-Author Email</td>
                        <td><?= $coAuthorEmail ?></td>
                    </tr>
                    <tr>
                        <td class="center">Co-Country</td>
                        <td class="center"><?= $coAuthorCountry ?></td>
                    </tr>
                    <tr>
                        <td class="center">Co-Institute</td>
                        <td><?= $coAuthorInst ?></td>
                    </tr>
                    <tr>
                        <td class="center">Co-Author Course/ Year</td>
                        <td class="center"><?= $coAuthorCourse ?> / <?= $coAuthorYear ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->




