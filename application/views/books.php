<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h2>Welcome <?= $this->session->userdata('first_name') ?></h2>
				<a href="/Books/add">Add Book and Review</a>
				<a href="/Logins/logout">Logout</a>
			</div>
			<hr>
			
		</div>
	</body>
</html>