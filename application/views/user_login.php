<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="/assets/style.css">
		<title>User Login</title>
	</head>
	<body>
	<div id="container">
		<h1>Book Review Central</h1>
			<div class='register'>
				<h3>Register</h3>
				<form action='/Logins/register' method='post'>
					<?php 
						echo $this->session->userdata('message'); 
						$this->session->unset_userdata('message');
						echo form_error('first_name'); 
					?>
					First Name: <input type='text' name='first_name'  value="<?php echo set_value('first_name'); ?>">
					<?php echo form_error('last_name'); ?>
					Last Name: <input type='text' name='last_name' value="<?php echo set_value('last_name'); ?>">
					<?php echo form_error('alias'); ?>
					Alias: <input type='text' name='alias' value="<?php echo set_value('alias'); ?>">
					<?php echo form_error('email'); ?>
					Email: <input type='email' name='email' value="<?php echo set_value('email'); ?>">
					<?php echo form_error('password'); ?>
					Password: <input type='password' name='password' value="<?php echo set_value('password'); ?>">
					<?php echo form_error('confirm_password'); ?>
					Confirm Password: <input type='password' name='confirm_password' value="<?php echo set_value('confirm_password'); ?>">
					<input class="submit" type='submit' value='Register'>
				</form>
			</div>
			<div class="login">
				<h3>Login</h3>
				<form action='/Logins/login_process' method='post'>
					Email: <?php echo $this->session->userdata('email_error'); ?>
					<input type='email' name='login_email' value="<?php echo set_value('login_email'); ?>">
					Password: <?php echo $this->session->userdata('password_error'); ?><input type='password' name='login_password' value="<?php echo set_value('login_password');
					$this->session->unset_userdata('password_error');
					$this->session->unset_userdata('email_error'); ?>">
					<input class="submit" type='submit' value='Login'>
				</form>
			</div>
		</div>
	</body>
</html>