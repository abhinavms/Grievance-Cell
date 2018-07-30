<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	if ($_SESSION['Category']==1) {
		$_SESSION['msg'] = "You dont have access";
		header('location: index.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}

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
		
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<div class="grad">
		<?php  if (isset($_SESSION['username'])) : ?>
			<h1>Welcome Teacher<strong><?php echo $_SESSION['username']; ?></strong></h1>
			<h4> <a href="index.php?logout='1'" style="color: red;">logout</a> </h4>
		<?php endif ?>
		</div>
		
		<?php 
			include('credentials.php');
			$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

			if(mysqli_connect_error()){
				die ("Error Connecting.");
			}
			
			$query = "SELECT * FROM `grv` ORDER BY `done`,`datetime`";
			echo '<table class="table" style="margin-top:3%;">
									<tr  style="background: rgb(233, 233, 233)">
										<th>Submitted On</th>
										<th>Subject</th>
										<th>Replied</th>
										<th>Reply</th>
									</tr>';
			if($results = mysqli_query($db,$query)){
					while($row = mysqli_fetch_array($results)){
							
							echo '<tr style="background: white ">',
								 "<td>",$row['datetime'],"</td>",
								 "<td>",$row['sub'],"</td>";
															   
							if($row['done']==1){
									echo "<td>Yes</td>";


							}
							else{
									echo "<td>No</td>";
							}
							echo  "<td><a href='reply.php?id=".$row['slno']."'>Reply</a></td>
									<tr>";
							
					}
			}
		?>	
</body>
</html>