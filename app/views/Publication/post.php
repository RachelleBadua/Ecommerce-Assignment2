
<div class="container">
	<?php
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($data->profile_id);
	?>
	<img src="/images/<?= $data->picture?>" style="max-width:200px;max-height:200px"><br>
	<div>posted by <a href="/Profile/details/<?=$profile->user_id?>"><?=$profile->first_name . " " . $profile->middle_name . " " . $profile->last_name?></a></div>
	<div>published on <?=$data->timestamp?></div>
	<div>caption: <?=$data->caption?></div>
	
	<div>
		<?php
			if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $data->profile_id)){
				echo "
					<a class='' href='/Publication/delete/$data->publication_id'>delete</a>
					<a class='button' href='/Publication/edit/$data->publication_id'>edit</a>
				";	
			}
		?>
		</div>
	<div>-----------------------------------------------</div><br>
</div>
