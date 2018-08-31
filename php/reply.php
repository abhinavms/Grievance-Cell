<?php 
	session_start(); 

	if (!isset($_SESSION['userid'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if ($_SESSION['Category']==1 OR $_SESSION['Category']==2) {
		$_SESSION['msg'] = "You dont have access";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['userid']);
		header("location: login.php");
	}
		  
		  include('php/credentials.php');
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