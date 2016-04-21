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
				<h2>Welcome <?= $this->session->userdata('first_name') ?></h2>
				<div class="nav">
					<a href="/Books/add">Add Book and Review</a>
					<a href="/Logins/logout">Logout</a>
				</div>
			</div>
			<hr>
			<div id="reviews">
				<h3>Recent Book Reviews</h3>
				<?php
					foreach ($result[1] as $value) {
						echo "<p><a href='/Books/title/" . $value['id'] . "'>" . $value['name'] . "</a></p>";
						echo "<h4>rating: " . $value['rating'] . "</h4>";
						echo "<p><a href='/Books/user/" . $value['user_id'] . "'>".$value['alias']."</a> says: " . $value['content'] . "</p>";
						echo "<p>" . $value['created_at'] . "</p>\n<hr>";
					}
				?>
			</div>
			<div id="reviewed">
				<h3>Other Books with Reviews: </h3>
				<div class="reviewed_books">
					<?php
						foreach ($result[0] as $value) {
							echo "<p><a href='/Books/title/" . $value['id'] . "'>" . $value['name'] . "</a></p>";
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>