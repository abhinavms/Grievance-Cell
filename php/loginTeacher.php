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
		unset($_SESSION['userid']);		
		session_destroy();
		header("location: login.php");
	}
	$yearSelected = date('Y'); 
	//$monthSelected = date('n');
	if(isset($_POST['submit'])){
		$yearSelected = $_POST['yearSelected'];	
		//$monthSelected = $_POST['monthSelected'];
	}

	include('php/credentials.php');
	$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

	if(mysqli_connect_error()){
			die ("Error Connecting.");
	}			
	$yearStart = 2017;	//One less than actual year
	$yearNow = date('Y');

	$query = "SELECT * FROM `grv` WHERE year(datetime) = '$yearSelected' ORDER BY `done`,`datetime` desc";
	$results = mysqli_query($db,$query);

	function switchCall($var){
		switch ($var) {
									case 1:
											return "January";
											break;
									case 2:
											return "February";
											break;
									case 3:
											return "March";
											break;
									case 4:
											return "April";
											break;
									case 5:
											return "May";
											break;
									case 6:
											return "June";
											break;
									case 7:
											return "July";
											break;
									case 8:
											return "August";
											break;
									case 9:
											return "September";
											break;
									case 10:
											return "October";
											break;
									case 11:
											return "November";
											break;
									case 12:
											return "December";
											break;
									default:
											break;
									}									
									
	}
?>