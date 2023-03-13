<?php $this->view('shared/header', 'Your Profile'); ?>
<div class="container">	
<dl>
	<dt>First name</dt>
	<dd><?=$data->first_name?></dd>
	<dt>Middle name</dt>
	<dd><?=$data->middle_name?></dd>
	<dt>Last name</dt>
	<dd><?=$data->last_name?></dd>
	<dd><img src="/images/<?= $data->picture?>" style="max-width:300px;max-height:300px"></dd>
</dl>


<a href='/Profile/edit'>Edit my profile</a>
<a href="/Profile/logout">Logout</a>

<h1>My publications</h1>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/post', $publication);
}
?>
</div>


<?php $this->view('shared/footer'); ?>