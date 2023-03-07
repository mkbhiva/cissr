<div class="container">
					<div class="row pt-5">
						<div class="col-md-12">
							<h1 class="mb-0">Submit Your Paper</h1>
							<div class="divider divider-primary divider-small mb-4">
								<hr class="mr-auto">
							</div>
							<form action="<?= base_url() ?>papers/submitPaper" method="post" enctype="multipart/form-data">


								

				                <div style="background-color: #e7d4b3; padding: 20px; margin-bottom: 30px;">
				                <h4>Details of Author</h4>
								<div class="row">
									<div class="form-group col">
										<label>Name of the Author*</label>
										<input type="text" placeholder="Full Name" value="<?= $authorName; ?>" class="form-control" name="authorName">
                                        <?php echo form_error('authorName', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>Author Email*</label>
										<input type="email" placeholder="email" value="<?= $authorEmail; ?>" class="form-control" name="authorEmail">
										<?php echo form_error('authorEmail', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Contact No.*</label>
										<input type="text" placeholder="Mobile No." value="<?= $authorMobile; ?>" class="form-control" name="authorMobile">
										<?php echo form_error('authorMobile', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Country*</label>
										<input type="text" placeholder="Country Name" value="<?= $authorCountry; ?>" class="form-control" name="authorCountry">
										<?php echo form_error('authorCountry', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Name of Institution*</label>
										<input type="text" placeholder="Institution Name" value="<?= $authorInst; ?>" class="form-control" name="authorInst">
										<?php echo form_error('authorInst', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Course*</label>
										<input type="text" placeholder="Course" value="<?= $authorCourse; ?>" class="form-control" name="authorCourse">
										<?php echo form_error('authorCourse', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-2">
										<label>Year*</label>
										<input type="text" placeholder="Year" value="<?= $authorYear; ?>" class="form-control" name="authorYear">
										<?php echo form_error('authorYear', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>

								</div>

								<div style="background-color: #e7d4b3; padding: 20px; margin-bottom: 30px;">
				                <h4>Details of Co-Author (If any)</h4>
								<div class="row">
									<div class="form-group col">
										<label>Name of the Co-Author</label>
										<input type="text" placeholder="Full Name" value="<?= $coAuthorName; ?>" class="form-control" name="coAuthorName">
										<?php echo form_error('coAuthorName', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>Co-Author Email</label>
										<input type="email" placeholder="email" value="<?= $coAuthorEmail; ?>" class="form-control" name="coAuthorEmail">
										<?php echo form_error('coAuthorEmail', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Contact No.</label>
										<input type="text" placeholder="Mobile No." value="<?= $coAuthorMobile; ?>" class="form-control" name="coAuthorMobile">
										<?php echo form_error('coAuthorMobile', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Country</label>
										<input type="text" placeholder="Country Name" value="<?= $coAuthorCountry; ?>" class="form-control" name="coAuthorCountry">
										<?php echo form_error('coAuthorCountry', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Name of Institution</label>
										<input type="text" placeholder="Institution Name" value="<?= $coAuthorInst; ?>" class="form-control" name="coAuthorInst">
										<?php echo form_error('coAuthorInst', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Course</label>
										<input type="text" placeholder="Course" value="<?= $coAuthorCourse; ?>" class="form-control" name="coAuthorCourse">
										<?php echo form_error('coAuthorCourse', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
									<div class="form-group col-md-2">
										<label>Year</label>
										<input type="text" placeholder="Year" value="<?= $coAuthorYear; ?>" class="form-control" name="coAuthorYear">
										<?php echo form_error('coAuthorYear', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>
								</div>

								<div style="background-color: #e7d4b3; padding: 20px; margin-bottom: 30px;">
				                <h4>Paper Details</h4>
								<div class="row">
									<div class="form-group col">
										<label>Title of Paper*</label>
										<input type="text" placeholder="Paper Title" value="<?= $paperTitle; ?>" class="form-control" name="paperTitle">
										<?php echo form_error('paperTitle', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>

								<div class="row">
									<div class="form-group col">
										<label>Remark (If any)</label>
										<textarea placeholder="Your Message" rows="5" class="form-control" name="paperMsg"><?= $paperMsg ?></textarea>
										<?php echo form_error('paperMsg', '<span style="font-size:12px; color:red;">', '</span>'); ?>
									</div>
								</div>

								<div class="row">
									<div class="form-group col">
										<label>Upload Paper File*</label>
										<input type="file" class="form-control" name="userfile">
                                        <?php if(isset($error)){ echo $error; }?>
									</div>
								</div>



								</div> <!-- paper details -->



								
								
								<div class="row">
									<div class="form-group col">
										<input type="submit" name="submitThePaper" value="Submit Paper" class="btn btn-primary btn-lg mb-5">
									</div>
								</div>
							</form>

						</div>
						


					</div>
				</div>

				