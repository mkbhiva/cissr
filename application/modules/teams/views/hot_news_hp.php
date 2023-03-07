
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->team_name ?></h4>
<p><?= $row->team_desc ?></p>
<?php } ?>
