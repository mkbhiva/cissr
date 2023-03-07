<div class="container">
					<div class="row pt-5">
						<div class="col-lg-7">
							<h1 class="mb-0">Submit Your Paper</h1>
							<div class="divider divider-primary divider-small mb-4">
								<hr class="mr-auto">
							</div>
							<form class="contact-form" action="<?= base_url() ?>papers/submitPaper" method="post" enctype="multipart/form-data">


								<?php if(isset($flash)){
				                        echo $flash;
				                }?>

				                <div style="background-color: #e7d4b3; padding: 20px; margin-bottom: 30px;">
				                <h4>Details of Author</h4>
								<div class="row">
									<div class="form-group col">
										<label>Name of the Author*</label>
										<input type="text" placeholder="Full Name" value="<?= $authorName; ?>" class="form-control" name="authorName">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>Author Email*</label>
										<input type="email" placeholder="email" value="<?= $authorEmail; ?>" class="form-control" name="authorEmail">
									</div>
									<div class="form-group col-md-4">
										<label>Contact No.*</label>
										<input type="text" placeholder="Mobile No." value="<?= $authorMobile; ?>" class="form-control" name="authorMobile">
									</div>
									<div class="form-group col-md-4">
										<label>Country*</label>
										<input type="text" placeholder="Country Name" value="<?= $authorCountry; ?>" class="form-control" name="authorCountry">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Name of Institution*</label>
										<input type="text" placeholder="Institution Name" value="<?= $authorInst; ?>" class="form-control" name="authorInst">
									</div>
									<div class="form-group col-md-4">
										<label>Course*</label>
										<input type="text" placeholder="Course" value="<?= $authorCourse; ?>" class="form-control" name="authorCourse">
									</div>
									<div class="form-group col-md-2">
										<label>Year*</label>
										<input type="text" placeholder="Year" value="<?= $authorYear; ?>" class="form-control" name="authorYear">
									</div>
								</div>

								</div>

								<div style="background-color: #e7d4b3; padding: 20px; margin-bottom: 30px;">
				                <h4>Details of Co-Author (If any)</h4>
								<div class="row">
									<div class="form-group col">
										<label>Name of the Co-Author</label>
										<input type="text" placeholder="Full Name" value="<?= $coAuthorName; ?>" class="form-control" name="coAuthorName">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>Co-Author Email</label>
										<input type="email" placeholder="email" value="<?= $coAuthorEmail; ?>" class="form-control" name="coAuthorEmail">
									</div>
									<div class="form-group col-md-4">
										<label>Contact No.</label>
										<input type="text" placeholder="Mobile No." value="<?= $coAuthorMobile; ?>" class="form-control" name="coAuthorMobile">
									</div>
									<div class="form-group col-md-4">
										<label>Country</label>
										<input type="text" placeholder="Country Name" value="<?= $coAuthorCountry; ?>" class="form-control" name="coAuthorCountry">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Name of Institution</label>
										<input type="text" placeholder="Institution Name" value="<?= $coAuthorInst; ?>" class="form-control" name="coAuthorInst">
									</div>
									<div class="form-group col-md-4">
										<label>Course</label>
										<input type="text" placeholder="Course" value="<?= $coAuthorCourse; ?>" class="form-control" name="coAuthorCourse">
									</div>
									<div class="form-group col-md-2">
										<label>Year</label>
										<input type="text" placeholder="Year" value="<?= $coAuthorYear; ?>" class="form-control" name="coAuthorYear">
									</div>
								</div>
								</div>

								<div style="background-color: #e7d4b3; padding: 20px; margin-bottom: 30px;">
				                <h4>Paper Details</h4>
								<div class="row">
									<div class="form-group col">
										<label>Title of Paper*</label>
										<input type="text" placeholder="Paper Title" value="<?= $paperTitle; ?>" class="form-control" name="paperTitle">
									</div>
								</div>

								<div class="row">
									<div class="form-group col">
										<label>Remark (If any)</label>
										<textarea placeholder="Your Message" rows="5" class="form-control" name="paperMsg"><?= $paperMsg ?></textarea>
									</div>
								</div>

								<div class="row">
									<div class="form-group col">
										<label>Upload Paper File*</label>
										<input type="file" class="form-control" name="userfile">
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
						






						<div class="col-lg-4 col-lg-offset-1">

							<h4 class="mb-0">Our Office</h4>
							<div class="divider divider-primary divider-small mb-4">
								<hr class="mr-auto">
							</div>

							<ul class="list list-icons list-icons-style-3 mt-4 mb-4">
								<li><i class="fas fa-building"></i> <strong><?= $our_company ?></strong></li>
								<li><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> <?= $our_address ?></li>
								<li><i class="fas fa-phone"></i> <strong>Phone:</strong> <?= $our_telnum ?></li>
								<li><i class="far fa-envelope"></i> <strong>Email:</strong> <a href="#"><?= $our_email ?></a></li>
							</ul>

						</div>
					</div>
				</div>

				