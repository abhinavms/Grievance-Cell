<?php 
	session_start(); 

	if (!isset($_SESSION['userid'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.html');
	}
	if ($_SESSION['Category']==1 OR $_SESSION['Category']==2) {
		$_SESSION['msg'] = "You dont have access";
		header('location: index.html');
	}
	if (isset($_GET['logout'])) {
		unset($_SESSION['userid']);		
		session_destroy();
		header("location: index.html");
	}
	$yearSelected = date('Y'); 
	$month = 1;
	$monthTemp = $month;
	$year = $yearSelected;
	$yearStart = 2017;	//One less than actual year
	$yearNow = date('Y');
	if(isset($_POST['submit'])){
		$yearSelected = $_POST['yearSelected'];	
	}

	include('php/credentials.php');
	$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

	if(mysqli_connect_error()){
			die ("Error Connecting.");
	}

	$query = "SELECT month(datetime),year(datetime),count(*) FROM `grv` WHERE year(datetime)='$yearSelected' GROUP BY month(datetime),Year(datetime) ORDER BY `datetime`";
	$results = mysqli_query($db,$query);
	$row = mysqli_fetch_array($results); 

	function switchCall($var){
		switch ($var) {
									case 1:
											echo "January";
											break;
									case 2:
											echo "February";
											break;
									case 3:
											echo "March";
											break;
									case 4:
											echo "April";
											break;
									case 5:
											echo "May";
											break;
									case 6:
											echo "June";
											break;
									case 7:
											echo "July";
											break;
									case 8:
											echo "August";
											break;
									case 9:
											echo "September";
											break;
									case 10:
											echo "October";
											break;
									case 11:
											echo "November";
											break;
									case 12:
											echo "December";
											break;
									default:
											break;
									}									
									
	}
?>