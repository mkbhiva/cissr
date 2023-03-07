
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->author_name ?></h4>
<p><?= $row->author_desc ?></p>
<?php } ?>
