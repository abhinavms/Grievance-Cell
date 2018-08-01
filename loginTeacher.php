<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	if ($_SESSION['Category']==1 OR $_SESSION['Category']==2) {
		$_SESSION['msg'] = "You dont have access";
		header('location: index.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}
	
	include('credentials.php');
	$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

	if(mysqli_connect_error()){
			die ("Error Connecting.");
	}			
	$query = "SELECT * FROM `grv` ORDER BY `done`,`datetime`";
	$results = mysqli_query($db,$query);
?>
<!DOCTYPE html>
<html>
<head>   
 	<title>Grievance Cell</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">	
</head>
<body>

	<div class="container">

	<div class="table-responsive">

		<div class="grad">
			<?php  if (isset($_SESSION['username'])) : ?>
			<H1>Welcome <strong>
			<?php echo $_SESSION['username']; ?>
			</strong></H1> 
			<?php endif ?>
			<a class="pull-right" href="index.php?logout='1'" style="color: red;">logout</a>
		</div>
		
		<table class="table" style="margin-top:3%;">
			<tr  style="background: rgb(233, 233, 233)">
				<th>Submitted On</th>
				<th>Subject</th>
				<th>Replied</th>
				<th>Reply</th>
			</tr>';
			
			<?php while($row = mysqli_fetch_array($results)){ ?>							
				<tr style="background: white ">
					<td><?php echo $row['datetime']; ?></td>
					<td><?php echo $row['sub']; ?></td>										   
					<td><?php 
							if($row['done']==1){
								echo "YES";
							}
							else {
								echo "NO";
							} 
						?>
					</td>
					<td><?php if($row['done']==1){
								echo"<a href='reply.php?id=".$row['slno']."'>Change Reply</a>";
							}
							else {
								echo"<a href='reply.php?id=".$row['slno']."'>Reply</a>";
							}
						?>
					</td> 
				<tr>
			<?php } ?>
</body>
</html>