<h1><?= $headline ?></h1>
<div class="row-fluid sortablee">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon white edit"></i><span class="break"></span>Upload Image</h2>
    </div>

    <div class="box-content">


      <?php
      $attributes = array('class' => 'form-horizontal');
      echo form_open_multipart('members/do_upload/' . $update_id, $attributes);
      ?>
      <fieldset>

        <div class="control-group">
          <?php
          if (isset($error)) {
            foreach ($error as $value) {
              echo $value;
            }
          } ?>
        </div>
        <p>&nbsp;</p>
        <div class="control-group">
          <label class="control-label" for="fileInput">File input</label>
          <div class="controls">
            <input class="input-file uniform_on" id="fileInput" type="file" name="userfile">
          </div>
        </div>



        <br /><br />
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Upload Image</button>
          <button type="submit" name="submit" value="Cancel" class="btn btn-warning">Cancel</button>
        </div>
      </fieldset>
      </form>


    </div>
  </div><!--/span-->
</div>