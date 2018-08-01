<?php 
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Grievance Site</title>
</head>
<body>
<div style="color:white;" class = "container">
	<h3 >Fill out</h3>
	<form method="post" action="loginStudent.php">
		<div class="form-group">
			<label for="sub">Subject:</label>
			<input type="text" style="margin-top: 0%;" class="form-control" name="subject" placeholder="Subject of grievance">
		</div>
		<div class="form-group">	
			<label for="Desc">Description:</label>
			<textarea class="form-control" name="desc" rows="3" placeholder="Description of grievance"></textarea>
		</div>
		<?php include ('input.php'); ?>
		<input id="submit" name="submit" type="submit" class="btn btn-primary" value="Submit" style="margin-top=1%;margin-bottom: 3%">
  	</form>
</div>
</body>
</html>