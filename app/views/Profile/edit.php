<?php $this->view('shared/header', 'Register your account'); ?>
<div class="container">
	<form method ="post" action="">
		<div class="form-group">	
			<label>Profile Picture:</label><input type="file" name="profilePicture"><br/>
		</div>
		<div class="form-group">
			<label>First Name:</label><input type="text" name="first_name" class="form-control" value='<?=$data->first_name?>'><br>
		</div>
		<div class="form-group">
			<label>Middle Name:</label><input type="text" name="middle_name" class="form-control" value='<?=$data->middle_name?>'><br>
		</div>
		<div class="form-group">
			<label>Last Name:</label><input type="text" name="last_name" class="form-control" value='<?=$data->last_name?>'><br>
		</div>
		<input type="submit" name="action" value='Save changes' class="btn btn-primary">

	</form>

	<a href='/Profile/index'><button class="btn btn-dark"> Back</button></a>
	
</div>

<?php $this->view('shared/footer'); ?>