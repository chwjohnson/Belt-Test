<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="/assets/style_add.css">
		<title>Add a Book</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h2>Add a New Book Title and Review</h2>
				<div class="nav">
					<a href="/">Home</a>
					<a href="/Logins/logout">Logout</a>
				</div>
			</div>
			<hr>
			<form action="/Books/add_book" method="post">
				<label>Book Title: </label><input type="text" name="title">
				<h3>Author: </h3>
				<label>Choose from the list: </label>
				<select name="author1">
					<?php 

						foreach ($result as $value) {
							echo "<option value='" . $value['author'] . "'>" . $value['author'] . "</option>";
						}
					?>
				</select>
				<label>Or add a new author: </label>
				<input type="text" name="author2">
				<label>Review: </label>
				<textarea name="content"></textarea>
				<label>Rating: </label>
				<input type="number" name="rating" min="1" max="5" value="1">
				<input type="submit" value="Add Book and Review">
			</form>
		</div>
	</body>
</html>