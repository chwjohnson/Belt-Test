<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="/assets/style_home.css">
		<title>Home</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h2>Hello <?= $this->session->userdata('first_name') ?></h2>
				<div class="nav">
					<a href="/Logins/">Dashboard</a>
					<a href="/Logins/logout">Logout</a>
				</div>
			</div>
			<hr>
			<?php
			 echo "<p class='error'>".$this->session->userdata('error')."</p>";
				$this->session->unset_userdata('error');
			 ?>	
			<?php echo validation_errors('<div class="error">', '</div>'); ?>
			<form action="/Appointments/edit_appt/<?php echo $id ?>" method="post">
				<label>Tasks: </label><input type="text" name="task">
				<label>Status: </label>
				<select name="status">
					<option value="Pending">Pending</option>
					<option value="Missed">Missed</option>
					<option value="Done">Done</option>
				</select>
				<label>Date: </label><input type="date" name="date">
				<label>Time: </label><input type="time" name="time">
				<input type="submit" value="Update">
			</form>
		</div>
	</body>
</html>