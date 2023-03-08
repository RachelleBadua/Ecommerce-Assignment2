<?php $this->view('shared/header', 'Your Profile'); ?>
	
<dl>
	<dd><img src="/images/<?= $data->picture?>"></dd>
	<dt>First name</dt>
	<dd><?=$data->first_name?></dd>
	<dt>Middle name</dt>
	<dd><?=$data->middle_name?></dd>
	<dt>Last name</dt>
	<dd><?=$data->last_name?></dd>
	
</dl>

<h2>My publications</h2>

<a href='/Profile/edit'>Edit my profile</a>
<a href="/Profile/logout">Logout</a>

<?php $this->view('shared/footer'); ?>

