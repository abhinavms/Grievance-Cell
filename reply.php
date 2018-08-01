<?php 
	session_start(); 

	if (!isset($_SESSION['userid'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	if ($_SESSION['Category']==1 OR $_SESSION['Category']==2) {
		$_SESSION['msg'] = "You dont have access";
		header('location: index.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['userid']);
		header("location: index.php");
	}
		  
		  include('credentials.php');
		  $db3 = mysqli_connect($host, $access_username, $access_password, $database_grievance);
		  $db4 = mysqli_connect($host, $access_username, $access_password, $database_users);
		  if(mysqli_connect_error()){
				die ("Error Connecting.");
			}
		  $sl_no = $_GET['id'];
		  
		  $query = "SELECT * FROM `grv` WHERE slno = '$sl_no'";
		  $results = mysqli_query($db3,$query);
		  $row = mysqli_fetch_array($results);
		  $userid = $row['userid'];
		  
		  $query = "SELECT * FROM `users` WHERE userid = '$userid'";
		  $results = mysqli_query($db4,$query);
		  $row2 = mysqli_fetch_array($results);
		  
		  if($_POST){
		    $reply =  mysqli_real_escape_string($db3,$_POST['reply']);	
			$sl_no = $row['slno'];
			$query = "UPDATE `grv` SET `reply` = '$reply' WHERE `grv`.`slno` = $sl_no";

			mysqli_query($db3,$query);
			$query = "UPDATE `grv` SET done = 1 WHERE slno = '$sl_no' LIMIT 1";
			mysqli_query($db3,$query);
			
			if(isset($_POST['submit']) && $_POST['submit'] == "submit"){
				echo "<h5 style='color: red;'>Your replied was entered.</h5>";
				header('location: loginTeacher.php');
			}
		}
?>
<!DOCTYPE html>
<html>
<head>   
</style>

    <title>Grievance Cell</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">	
</head>
<body>
	<div class = "container">    
	<form method="POST">
	<div class="form-group" style="margin: 3%;">
	<table class="table table-bordered" style="background:RGB(255,255,255);">
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Name </h4></label></div> </th>
		<th> <h4><?php echo $row2['username']; ?></h4> </th>
	</tr>    
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Department</h4></label></div>	</th>
		<th> <h4><?php echo $row2['dept']; ?></h4> </th>
	</tr>   
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Semester</h4></label></div> </th>
		<th> <h4><?php echo $row2['semester']; ?></h4> </th>
	</tr>
    <tr>
		<th> <div class="form-group"><label for="sub"><h4>Subject</h4></label></div> </th>
		<th> <textarea readonly rows = "4" ><?php echo $row['sub'] ?></textarea></th>
    </tr>
		<th> <div class="form-group"><label for="sub"><h4>Description</h4></label></div> </th>
		<th> <textarea readonly rows = "7"><?php echo $row['description']?></textarea></th>
	</tr>
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Reply here</h4></label></div> </th>
		<th> <textarea name="reply" class="form-control"  rows="3" placeholder="Enter your reply"></textarea> </th>
	</tr>
	<tr>
		<th></th>
		<th> <button name="submit" type="submit" value = "submit" class="btn btn-primary">Submit</button> </th>
	</tr>
	</table>
	</div>
	</form>
	</div>
</body>
</html>
 