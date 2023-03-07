
<h1> Hot News</h1>
<?php
foreach($query->result() as $row){
	
?>
<h4><?= $row->blog_title ?></h4>
<p><?= $row->blog_desc ?></p>
<?php } ?>
