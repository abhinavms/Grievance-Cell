<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Grievance Cell</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<h2>Login</h2>
		<form method="post" action="login.php">
			<?php include('errors.php'); ?>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="login_user">Login</button>
			</div>
		</form>
	</div>

</body>
</html>