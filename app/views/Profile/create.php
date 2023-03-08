<?php $this->view('shared/header', 'Create a profile'); ?>
<div class="container">
	<form method ="post" action="">
		<div class="form-group">
			<label>First Name:</label><input type="text" name="first_name" class="form-control"><br>
		</div>
		<div class="form-group">
			<label>Middle Name:</label><input type="text" name="middle_name" class="form-control"><br>
		</div>
		<div class="form-group">
			<label>Last Name:</label><input type="text" name="last_name" class="form-control"><br>
		</div>
		<div class="form-group">
			<label>Profile Picture:</label><input type="file" name="profilePicture"></form><br/>
		</div>
		<input type="submit" name="action" value='Create' class="btn btn-primary">
	</form>
</div>
<?php $this->view('shared/footer'); ?>