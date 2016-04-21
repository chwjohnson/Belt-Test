<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="/assets/style_user.css">
		<title>User</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h3>User Alias: <?php echo $result[1][0]['alias'] ?></h3>
				<div class="nav">
					<a href="/">Home</a>
					<a href="/Books/add">Add Book and Review</a>
					<a href="/Logins/logout">Logout</a>
				</div>
			</div>
			<hr>
			<h4>Name: <?php echo $result[1][0]['first_name'] . " " . $result[1][0]['last_name']; ?></h4>
			<h4>Email: <?php echo $result[1][0]['email']; ?></h4>
			<h4>Total Reviews: <?php echo count($result[0]); ?></h4>
			<h4>Posted Reviews on the following books:</h4>
			<div class="books">
				<?php
					foreach ($result[1] as $book) {
						echo "<p><a href='/Books/title/" . $book['book_id'] . "'>" . $book['name'] . "</a><p>";
					}
				?>
			</div>
		</div>
	</body>
</html>