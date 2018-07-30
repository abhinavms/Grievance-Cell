<?php 
	
	include('credentials.php');
	$db1 = mysqli_connect($host, $access_username, $access_password, $database_users);
	$db2 = mysqli_connect($host, $access_username, $access_password, $database_grievance);
	
	if(mysqli_connect_error()){
		die ("Error Connecting.");
	}

	if(array_key_exists('subject',$_POST) OR array_key_exists('desc',$_POST)){	
		
		if($_POST['subject'] == '' OR $_POST['desc'] == ''){
			echo "<p style='color: red;'> Every field is required.</p>";
		}
		else{
			$userid =  mysqli_real_escape_string($db2,$_SESSION['username']);
			$sub = mysqli_real_escape_string($db2,$_POST['subject']);
			$desc = mysqli_real_escape_string($db2,$_POST['desc']);
			
			$query = "SELECT `name` FROM `users` WHERE  userid = '$userid'";
			mysqli_query($db1,$query);
			$results = mysqli_query($db1,$query);
		    $row = mysqli_fetch_array($results);
			$username = $row['name'];
			
			$query = "INSERT INTO `grv` (`slno`, `datetime`, `userid`, `username`, `sub`, `description`, `done`,`reply`)
					VALUES (NULL, now(),'$userid','$username','$sub','$desc','0','')";

			mysqli_query($db2,$query);
			echo "<h5 style='color: red;'> We will get back to you as soon as possible.</h5>";
		}
	}
?>