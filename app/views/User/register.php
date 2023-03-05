<?php $this->view('shared/header', 'Register your account'); ?>

<form method ="post" action="">
	<label>Username:</label><input type="text" name="username"><br><br>
	<label>Password:</label><input type="password" name="password"><br><br>

	<input type="submit" name="action" value='Register'>
	Already have an account? <a href="/User/indxex">Login.</a>
</form>

<?php $this->view('shared/footer'); ?>