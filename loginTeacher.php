<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	if ($_SESSION['Category']==1) {
		$_SESSION['msg'] = "You dont have access";
		header('location: index.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}

?>
<!DOCTYPE html>
<html>
 <head>   
    <title>Grievance Site</title>
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #d2d2d2;
    text-align: left;
    padding: 8px;
}

.bg-grey{
        background-color: #dddddd;
    }
.bg-light{
        background-color: #f2f2f2;
    }

	
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

		</div>
		<?php  if (isset($_SESSION['username'])) : ?>
			<h1><text style="color : grey">Welcome Teacher</text> <strong><?php echo $_SESSION['username']; ?></strong></h1>
			<h4> <a href="index.php?logout='1'" style="color: red;">logout</a> </h4>
		<?php endif ?>
		
		<?php 
			include('credentials.php');
			$rowColClass = 'bg-light';
			$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

			if(mysqli_connect_error()){
				die ("Error Connecting.");
			}
			
			$query = "SELECT * FROM `grv` ORDER BY `done`,`datetime`";
			echo '<table>
									<tr>
										<th>Submitted On</th>
										<th>Subject</th>
										<th>Replied</th>
										<th>Reply</th>
									</tr>';
			if($results = mysqli_query($db,$query)){
					while($row = mysqli_fetch_array($results)){
							
							echo "<tr class=",$rowColClass,">",
								 "<td>",$row['datetime'],"</td>",
								 "<td>",$row['sub'],"</td>";
															   
							if($row['done']==1){
									echo "<td>Yes</td>";


							}
							else{
									echo "<td>No</td>";
							}
							echo  "<td><a href='reply.php?id=".$row['slno']."'>Reply</a></td>
									<tr>";
							if($rowColClass == 'bg-light')
									$rowColClass = 'bg-grey';
							else
									$rowColClass = 'bg-light';
							
					}
			}
		?>	
</body>
</html>

