<?php
$count = 0;
$module_run = 'homepage_offers/_get_new_items';
foreach($query->result() as $row){
if($row->id == 2){
	$module_run = 'homepage_offers/_get_new_items';
}

if($row->id == 1){
	$module_run = 'homepage_offers/_get_featured_items';
}

if($row->id == 3){
	$module_run = 'homepage_offers/_get_hp_offer_items';
}
?>


<div class="container">
<div class="row">
<div class="card bg-light" style="width:100%">
  <div class="card-header"><h4><?= $row->block_title ?></h4></div>
  <div class="card-body bg-transparent  text-primary">


      	<div class="row">
        
					<?= Modules::run($module_run) ?>
                    





        </div>
        </div>
        </div>
</div>
        
        
    

               
     
</div>

<?php } ?>