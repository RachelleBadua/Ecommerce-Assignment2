<?php $this->view('shared/header', 'Your Profile'); ?>
	
<dl>
	
	<dt>First name</dt>
	<dd><?=$data->first_name?></dd>
	<dt>Middle name</dt>
	<dd><?=$data->middle_name?></dd>
	<dt>Last name</dt>
	<dd><?=$data->last_name?></dd>
	<dd><img src="/images/<?= $data->picture?>"></dd>
</dl>

<a href='/Profile/edit'>Edit my profile</a>
<a href="/Profile/logout">Logout</a>

<h2>My publications</h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?>



<?php $this->view('shared/footer'); ?>

