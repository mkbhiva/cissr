
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->volumeNo ?></h4>
<p><?= $row->issueNo ?></p>
<?php } ?>
