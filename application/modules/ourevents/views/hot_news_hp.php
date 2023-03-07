
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->name ?></h4>
<p><?= $row->eventdesc ?></p>
<?php } ?>
