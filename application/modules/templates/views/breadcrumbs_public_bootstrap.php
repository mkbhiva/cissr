
     				




<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<?php
                        foreach($breadcrumbs_array as $key => $value){
                            
                            
                                echo '<li><a href="'.$key.'">'.$value.'</a></li>';
                            
                        }
                        
                        ?>
                                <li>
                                <?= $current_page_title ?>
                                </li>

					</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->


