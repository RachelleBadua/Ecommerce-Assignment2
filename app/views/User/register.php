<?php $this->view('shared/header', 'Register your account'); ?>
<div class="container">
	<form method ="post" action="">
		<div class="form-group">
			<label>Username:</label><input type="text" name="username" class="form-control"><br>
		</div>
		<div class="form-group">
			<label>Password:</label><input type="password" name="password" class="form-control"><br>
		</div>
		<input type="submit" name="action" value='Register' class="btn btn-primary">
		Already have an account? <a href="/User/indxex">Login.</a>
	</form>
</div>
<?php $this->view('shared/footer'); ?>