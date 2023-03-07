<div class="container">
					<div class="row pt-5">
						<div class="col-lg-7">
							<h1 class="mb-0">Your Paper Submitted Successfully.</h1>
							<div class="divider divider-primary divider-small mb-4">
								<hr class="mr-auto">
							</div>
                            
                            <div style="background-color:#CFA968; padding:30px; height:250px; color:white; text-align:center; font-size:24px; font-weight:600; margin:30px; line-height:50px;">Paper submission reference no. is <br />
                            <span style="font-size:36px; color:black"><?php if(isset($flash)){ echo $flash; } else { echo "Reference number not found! write mail to us.";  } ?></span><br />
                            Keep this refernce number for future track.</div>
							

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

				