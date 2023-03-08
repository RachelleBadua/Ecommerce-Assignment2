<?php $this->view('shared/header', 'Login into your acount'); ?>
<div class="container">
		<form method ="post" action="">
			<div class="form-group">
				<label>Username:</label>
				<input type="text" name="username" class="form-control"><br>
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control"><br>
			</div>
			<input type="submit" name="action" value='Login' class="btn btn-primary">
			Don't already have an account? <a href="/User/register">Regsiter.</a>
		</form>
</div>
<?php $this->view('shared/footer'); ?>