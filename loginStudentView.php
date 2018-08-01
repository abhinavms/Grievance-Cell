
<?php 

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Grievance Site</title>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 10px;
	padding-left:20px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(odd) {background-color: white;}
</style>
</head>
<body>
<div class="container">
	
	<?php if (isset($_SESSION['success'])) : ?>
		<div class="error success" >
			<h3>
				<?php 
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>

	<?php  if (isset($_SESSION['username'])) : ?>
		<?php $username = $_SESSION['username']; ?>
		
	<?php endif ?>
	
</div>

 	<!-- View entered queries -->
<br><br>
<div class = "container">
	<h4 style = "color: white">Your previous queries:</h4>
	<div class="table-responsive">
		<?php 
		include('credentials.php');
		$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);
		if(mysqli_connect_error())
			die ("Error Connecting.");
				
		$query = "SELECT * FROM `grv` WHERE userid='$username' ORDER BY done";
		?>

		<table>
			<tr >
				<th>Submitted On</th>
				<th>Subject</th>
				<th>Replied</th>
			</tr>
			
			<?php
			$results = mysqli_query($db,$query);
			if(!$results)
				die ("Query Error");
			else{	
				while($row = mysqli_fetch_array($results)){
					?>
					<tr >
						<td> <?php echo $row['datetime']; ?> </td>
						<td> <?php echo $row['sub']; ?></td>
						<?php 
						if($row['done']==1)
							echo "<td>" . $row['reply'] . "</td></tr>";
						else 
							echo "<td> Still waiting reply </td></tr>";
				}
			}
			?>
		</table>
	</div>
</div>
<br><br>
</body>
</html>