<h1><?= $headline ?></h1>
<div class="row-fluid sortablee">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Upload Successfully</h2>
        </div>

        <div class="box-content">

            <div class="alert alert-success">Your file was successfully uploaded!</div>

            <ul>
                <?php foreach ($upload_data as $item => $value) : ?>
                    <li><?php echo $item; ?>: <?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul>
            <br />
            <p>
                <?php
                $edit_post_url = base_url() . 'notices/create/' . $update_id;
                ?>
                <a href="<?= $edit_post_url ?>"><button type="button" class="btn btn-primary">Return to Details page</button></a>
            </p>



        </div>
    </div><!--/span-->
</div>