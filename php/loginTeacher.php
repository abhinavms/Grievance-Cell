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
		unset($_SESSION['userid']);		
		session_destroy();
		header("location: index.php");
	}
	
	include('php/credentials.php');
	$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

	if(mysqli_connect_error()){
			die ("Error Connecting.");
	}			
	$query = "SELECT * FROM `grv` ORDER BY `done`,`datetime`";
	$results = mysqli_query($db,$query);
?>