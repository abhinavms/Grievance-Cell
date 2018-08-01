<?php 
	session_start();

	$userid = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	include('credentials.php');

	$db_users = mysqli_connect($host, $access_username, $access_password, $database_users);


	if (isset($_POST['login_user'])) {
		$userid = mysqli_real_escape_string($db_users, $_POST['userid']);
		$password = mysqli_real_escape_string($db_users, $_POST['password']);

		if (empty($userid)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {

			$query = "SELECT * FROM users WHERE userid='$userid' AND password1='$password'";
			$results = mysqli_query($db_users, $query);

			if (mysqli_num_rows($results) > 0) {
				
				$_SESSION['userid'] = $userid;
				$_SESSION['success'] = "You are now logged in";
				
				$row_users = mysqli_fetch_array($results);

				$_SESSION['username']=$row_users['username'];
				$_SESSION['Category'] = $row_users['catagory'];

				if($_SESSION['Category']==1 OR $_SESSION['Category']==2)
				 	header('location: loginStudent.php');
				else if($_SESSION['Category']==3)
				 	header('location: loginTeacher.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>