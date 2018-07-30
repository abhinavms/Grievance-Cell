<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Grievance Cell</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

	<div class="row grad">
		<div class= "col-lg-1 hidden-md hidden-sm hidden-xs"><img class="logo" src="images/logo.jpg"></div>
		<div class= "col-lg-3 clg hidden-md hidden-sm hidden-xs">Sree Chitra Thirunal College Of Engineering
			<br>Trivandrum</div>
		<div class= "col-lg-8 ghead"><h1>GRIEVANCE CELL<h1></div>
	</div>

	<div class="container">
		<div class="login">
			<h2>LOGIN</h2>
			<form class=glog method="post" action="index.php">
				<?php include('errors.php'); ?>
				<div class="form-group ">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<input type="text" name="username" placeholder="Username">
				</div>
				<div class="form-group inner-addon left-addon">
				<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
					<input type="password" name="password" placeholder=" Password">
				</div>
				<div class="form-group inner-addon left-addon">					
					<button type="submit" class="btn btn-light"  name="login_user">Login</button>
				</div>
			</form>
		</div>
	</div>

</body>
</html>