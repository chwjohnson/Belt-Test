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
					<a href="/Logins/logout">Logout</a>
				</div>
			</div>
			<hr>
			<h3>Here are your appointments for today:</h3>
			<table class="table">
				<tr>
					<th>Tasks</th>
					<th>Time</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php
					foreach ($result as $value2) {
						if($value2['date'] == date('Y-m-d')) {
							echo "<tr><td>";
							echo $value2['task']."</td><td>".$value2['time']."</td><td>".$value2['status']."</td><td>";
							if($value2['status'] != 'Done') {
								echo "<a href='/Appointments/edit/".$value2['id']."'>Edit </a><a href='/Appointments/destroy/".$value2['id']."'> Delete</a>";
							}
							echo "</td></tr>";
						}
					}
				?>
			</table>
			<h3>Your other appointments:</h3>
			<table class="table">
				<tr>
					<th>Tasks</th>
					<th>Date</th>
					<th>Time</th>
				</tr>
				<?php 
					foreach ($result as $value) {
						if($value['date'] != date('Y-m-d')) {
							if( strtotime($value['date']) < strtotime('now') ) {
							}
							else{
								echo "<tr><td>";
								echo $value['task']."</td><td>".$value['date']."</td><td>".$value['time'];
								echo "</td></tr>";
							}
						}
					}
				?>
			</table>
			<?php
			 echo "<p class='error'>".$this->session->userdata('error')."</p>";
				$this->session->unset_userdata('error');
			 ?>	
			<?php echo validation_errors('<div class="error">', '</div>'); ?>
			<form action="/Appointments/create" method="post">
				<label>Date: </label><input type="date" name="date">
				<label>Time: </label><input type="time" name="time">
				<label>Tasks: </label><input type="text" name="task">
				<input type="submit" value="Add">
			</form>
		</div>
	</body>
</html>