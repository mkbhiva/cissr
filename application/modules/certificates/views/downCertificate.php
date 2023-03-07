<div class="container">
    <div class="row pt-5">
        <div class="col-md-12">
            <h1 class="mb-0">Certificate Download </h1>
            <div class="divider divider-primary divider-small mb-4">
                <hr class="mr-auto">
            </div>
            <?php if ($downloadFile == '') { ?>
                <form action="<?= base_url() ?>certificates/serchCertificates" method="post" enctype="multipart/form-data">


                    <?php echo validation_errors("<p style='color:red;'>", "</p>"); ?>

                    <?php
                    if ($flash) {
                        echo '<div class="alert alert-danger">';
                        foreach ($flash as $error) {
                            echo $error;
                        }
                        echo '</div>';
                    }
                    ?>


                    <div style="background-color: #e7d4b3; padding: 20px; margin-bottom: 30px;">


                        <h4>Search</h4>
                        <div class="row">
                            <div class="form-group col">
                                <label>First Name*</label>
                                <input type="text" placeholder="First Name" value="<?= $fname; ?>" class="form-control" name="fname">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Mobile Number / Email ID*</label>
                                <input type="text" placeholder="Mobile Number / Email ID" value="<?= $mnumber; ?>" class="form-control" name="mnumber">

                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <input type="submit" name="search" value="Submit Certificate" class="btn btn-primary btn-lg mb-5">
                        </div>
                    </div>
                </form>
            <?php } ?>

            <?php if ($downloadFile != '') { ?>
                <div class="alert alert-success">
                    <?php echo validation_errors("<p style='color:red;'>", "</p>"); ?>

                    <?php
                    foreach ($flash as $error) {
                        echo $error;
                    }
                    ?>
                </div>

                <div style="background-color: #e7d4b3" class="pl-4 pt-4 pb-2">
                    <p>To download Click here - <a class="btn btn-primary btn-lg" href="<?= base_url('/assets/pdf/certificates/' . $downloadFile) ?>" target="_new">Download Certificate</a></p>
                </div>
            <?php } ?>


        </div>



    </div>
</div>