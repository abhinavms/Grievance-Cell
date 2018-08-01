<?php 
	if (!isset($_SESSION['userid'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['userid']);
		header("location: index.php");
	}

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