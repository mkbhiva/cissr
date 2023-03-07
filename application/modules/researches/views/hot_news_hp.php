
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->research_title ?></h4>
<p><?= $row->research_desc ?></p>
<?php } ?>
