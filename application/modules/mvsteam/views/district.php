<div class="item teaser-page-list">
	<div class="container_16">
		<aside class="grid_10">
			<h1 class="page-title">जिला कार्यकारिणी</h1>
		</aside>
		<div class="grid_6">
			<div id="rootline">
				<a href="<?= site_url() ?>">Home Page</a> <i class="fa fa-angle-right"></i> <span class="current">जिला कार्यकारिणी</span>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="main" class="site-main container_16">

	<div class="inner">
		<div style="margin-bottom: 40px; font-size:25px; font-weight:500; color: #306; border-bottom:2px solid #306; ">
			मुख्य कार्यकारिणी
		</div>

		<?php
		foreach ($query->result() as $row) {

			if ($row->team_img == '') {
				$team_photo = "no-mem.png";
			} else {
				$team_photo = $row->team_img;
			}

		?>
			<!-- canditate -->
			<div class="candidate radius grid_4">
				<div class="candidate-margins">
					<a href="#">
						<img width="200" height="210" src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" class="wp-post-image" alt="Image alt">
						<div class="name"><?= $row->team_name ?></div>
						<div class="position"><?= $row->team_postName ?></div>
						<?php if ($row->team_phone != '') { ?>
							<div class="position"><?= $row->team_phone ?></div>
						<?php } ?>
					</a>
				</div>
			</div>
			<!-- canditate -->
		<?php } ?>
		<div class="clear"></div>
	</div>

	<div class="inner">
		<div style="margin-bottom: 40px; font-size:25px; font-weight:500; color: #306; border-bottom:2px solid #306; ">
			युवा प्रकोष्ठ
		</div>

		<?php
		foreach ($youthquery->result() as $yrow) {

			if ($yrow->team_img == '') {
				$team_photo = "no-mem.png";
			} else {
				$team_photo = $yrow->team_img;
			}
		?>
			<!-- canditate -->
			<div class="candidate radius grid_4">
				<div class="candidate-margins">
					<a href="#">
						<img width="200" height="210" src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" class="wp-post-image" alt="Image alt">
						<div class="name"><?= $yrow->team_name ?></div>
						<div class="position"><?= $yrow->team_postName ?></div>
						<?php if ($yrow->team_phone != '') { ?>
							<div class="position"><?= $yrow->team_phone ?></div>
						<?php } ?>
					</a>
				</div>
			</div>
			<!-- canditate -->
		<?php } ?>
		<div class="clear"></div>
	</div>

	<div class="inner">
		<div style="margin-bottom: 40px; font-size:25px; font-weight:500; color: #306; border-bottom:2px solid #306; ">
			महिला प्रकोष्ठ
		</div>

		<?php
		foreach ($womenquery->result() as $ldyrow) {

			if ($ldyrow->team_img == '') {
				$team_photo = "no-mem.png";
			} else {
				$team_photo = $ldyrow->team_img;
			}
		?>
			<!-- canditate -->
			<div class="candidate radius grid_4">
				<div class="candidate-margins">
					<a href="#">
						<img width="200" height="210" src="<?= base_url() ?>assets/images/teams/main/<?= $team_photo ?>" class="wp-post-image" alt="Image alt">
						<div class="name"><?= $ldyrow->team_name ?></div>
						<div class="position"><?= $ldyrow->team_postName ?></div>
						<?php if ($ldyrow->team_phone != '') { ?>
							<div class="position"><?= $ldyrow->team_phone ?></div>
						<?php } ?>
					</a>
				</div>
			</div>
			<!-- canditate -->
		<?php } ?>
		<div class="clear"></div>
	</div>
</div>