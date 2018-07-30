<?php 
	session_start();

	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	include('credentials.php');

	$db = mysqli_connect($host, $access_username, $access_password, $database_users);


	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {

			$query = "SELECT * FROM users WHERE userid='$username' AND password1='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {
				
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				
				$row = mysqli_fetch_array($results);
				
				$_SESSION['Category'] = $row['catagory'];
				
				if($_SESSION['Category']==1)
					header('location: loginStudent.php');
				else if($_SESSION['Category']==2)
					header('location: loginTeacher.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>