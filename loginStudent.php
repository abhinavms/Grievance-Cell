<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}

?>

<!doctype html>
<html lang="en">
  <head>   
	<title>Grievance Cell</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<title>Grievance Site</title>
   </head>
   <body>

	<div class="container">
		
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<div class="grad" style="margin-top:0px; padding-top=0px;">
		<?php  if (isset($_SESSION['username'])) : ?>
			<H1>Welcome <strong>
			<?php 
			echo $_SESSION['username']; 
			$username = $_SESSION['username'];
			?></strong></H1> <?php endif ?>
		<a class="pull-right" href="index.php?logout='1'" style="color: red;">logout</a>

		</div>
   <?php 
   		include('credentials.php');
			$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

			if(mysqli_connect_error()){
				die ("Error Connecting.");
			}
			
			$query = "SELECT * FROM `grv` WHERE userid='$username' ORDER BY reply";
			$results = mysqli_query($db,$query);
			if (mysqli_num_rows($results) > 0) {
				include ("loginStudentView.php");
			}
			else{
				include("loginStudentInput.php");
			}
    ?>
</div>
</body>
</html>