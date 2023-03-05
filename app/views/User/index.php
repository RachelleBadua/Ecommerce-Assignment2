<?php $this->view('shared/header', 'Login into your acount'); ?>

<form method ="post" action="">
	<label>Username:</label><input type="text" name="username"><br><br>
	<label>Password:</label><input type="password" name="password"><br><br>

	<input type="submit" name="action" value='Login'>
	Don't already have an account? <a href="/User/register">Regsiter.</a>
</form>

<?php $this->view('shared/footer'); ?>