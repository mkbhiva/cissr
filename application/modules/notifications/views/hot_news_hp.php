
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->notifi_title ?></h4>
<p><?= $row->notifi_desc ?></p>
<?php } ?>
