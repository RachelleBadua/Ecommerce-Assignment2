<?php $this->view('shared/header', 'Your Profile'); ?>
<div class="container">	
<dl>
	<dt>First name</dt>
	<dd><?=$data->first_name?></dd>
	<dt>Middle name</dt>
	<dd><?=$data->middle_name?></dd>
	<dt>Last name</dt>
	<dd><?=$data->last_name?></dd>
	<dt>Profile picture</dt>
	<dd><img src="/images/<?= $data->picture?>" style="max-width:300px;max-height:300px"></dd>
</dl>


<?php
					if($_SESSION['user_id'] != $data->user_id){
						//$this here is profile
						$checkFollowing = $this->checkIfFollowing($data->user_id);
						if($checkFollowing == true){	
							//does not exits
							echo '<a href=',"/Follow/unfollowUser/$data->user_id",'>Unfollow</a>';
						}else{
							//does exist
							echo '<a href=',"/Follow/followUser/$data->user_id",'>Follow</a>';
						}
					}
?>

<?php
	if($_SESSION['user_id'] == $data->user_id){
		echo '<a href="/Profile/logout">Logout</a>';
	}
?>

<?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id){
			echo '<br><a href="/Profile/edit">Edit my profile</a> <br>';
		}
	?>
	<a href="/Main/index">Back to Main Page</a>
	<br><br>

<h1>My publications</h1>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/post', $publication);
}
?>
</div>


<?php $this->view('shared/footer'); ?>