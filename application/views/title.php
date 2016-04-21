<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="/assets/style_title.css">
		<title>Book</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h3><?php echo $reviews[0]['name'] ?> by:
				<?php echo $reviews[0]['author'] ?></h3>
				<div class="nav">
					<a href="/">Home</a>
					<a href="/Logins/logout">Logout</a>
				</div>
			</div>
			<hr>	
			<div id="reviews">
				<h3>Reviews</h3>
				<?php 
					foreach ($reviews as $review) {
						echo "<hr>\n";
						echo "<p>Rating: " . $review['rating'] . "</p>\n";
						echo "<p><a href='/Books/user/" . $review['user_id'] . "'>" . $review['alias'] . "</a> says: " . $review['content'] . "</p>\n";
						echo "<p>Posted on " . $review['created_at'] . "</p>\n";
						if ($review['user_id'] == $this->session->userdata('id')){
							echo "<a href='/Books/delete/" . $review['id'] . "'>delete this review</a>";
						}
					}
				?>
			</div>
			<div id="new_review">
				<h3>Add a new review for this title</h3>
				<hr>
				<form action='/Books/add_review' method="post">
					<input type="hidden" name="title" value="<?= $reviews[0]['name'] ?>">
					Review: <textarea name="content"></textarea>
					Rating: 
					<input type="number" name="rating" min="1" max="5" value="1">
					<input type="submit" value="Submit Review">
				</form>
			</div>
		</div>
	</body>
</html>