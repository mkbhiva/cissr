
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->member_name ?></h4>
<p><?= $row->member_desc ?></p>
<?php } ?>
