
<div class="container">
	<?php
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($data->profile_id);
	?>
	<img src="/images/<?= $data->picture?>" style="max-width:200px;max-height:200px"><br>
	<div>posted by <?=$profile->first_name?></div>
	<div>published on <?=$data->timestamp?></div>
	<div>caption: <?=$data->caption?></div>
	<div>-----------------------------------------------</div><br>
</div>
