
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->interview_title ?></h4>
<p><?= $row->interview_desc ?></p>
<?php } ?>
