
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->post_title ?></h4>
<p><?= $row->post_desc ?></p>
<?php } ?>
