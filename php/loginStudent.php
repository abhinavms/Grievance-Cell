<?php 
	session_start(); 

	if (!isset($_SESSION['userid'])) {
		session_destroy();
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	
	if (isset($_GET['logout']) OR $_SESSION['Category']==3) {
		unset($_SESSION['userid']);
		session_destroy();
		header("location: index.php");
	}

	include("php/credentials.php");
			$db_grv = mysqli_connect($host, $access_username, $access_password, $database_grievance);
			if(mysqli_connect_error())
				die ("Error Connecting.");

			$userid = $_SESSION['userid'];
			$query = "SELECT * FROM `grv` WHERE userid='$userid' ORDER BY reply";
			$results = mysqli_query($db_grv,$query);

	if(array_key_exists('subject',$_POST) OR array_key_exists('desc',$_POST)){	
		
		if($_POST['subject'] == '' OR $_POST['desc'] == ''){
			echo "<p style='color: red;'> Every field is required.</p>";
		}
		else{
			$userid =  $_SESSION['userid'];
			$username = $_SESSION['username'];
			$sub = mysqli_real_escape_string($db_grv,$_POST['subject']);
			$desc = mysqli_real_escape_string($db_grv,$_POST['desc']);			

			$query = "INSERT INTO `grv` (`slno`, `datetime`, `userid`, `username`, `sub`, `description`, `done`,`reply`)
								VALUES (NULL, now(),'$userid','$username','$sub','$desc','0','')";

			mysqli_query($db_grv,$query);
			echo "<h5 style='color: red;'> We will get back to you as soon as possible.</h5>";
			header("location: loginStudent.php");
		}
	}
?>