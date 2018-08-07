<?php 
	include('php/loginTeacher.php');
?>
<!DOCTYPE html>
<html>
<head>   
 	<title>Grievance Cell</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">	
</head>
<body>

	<div class="container">

	<div class="table-responsive">

		<div class="grad">
			<?php  if (isset($_SESSION['userid'])) : ?>
			<H1>Welcome <strong>
			<?php echo $_SESSION['username'] ?>
			</strong></H1> 
			<?php endif ?>
			<a class="pull-right" href="index.php" style="color: red">logout</a>
			<a class="pull-left" href="report.php" style="color: blue">Generate Monthly Report</a>
		</div>
		
		<table class="table" style="margin-top:3%;">
			<tr  style="background: rgb(233, 233, 233)">
				<th>Submitted On</th>
				<th>Subject</th>
				<th>Replied</th>
				<th>Reply</th>
			</tr>
			
			<?php while($row = mysqli_fetch_array($results)){ ?>							
				<tr style="background: white ">
					<td><?php echo $row['datetime']; ?></td>
					<td><?php echo $row['sub']; ?></td>										   
					<td><?php 
							if($row['done']==1){
								echo "YES";
							}
							else {
								echo "NO";
							} 
						?>
					</td>
					<td><?php if($row['done']==1){
								echo"<a href='reply.php?id=".$row['slno']."'>Change Reply</a>";
							}
							else {
								echo"<a href='reply.php?id=".$row['slno']."'>Reply</a>";
							}
						?>
					</td> 
				<tr>
			<?php } ?>
</body>
</html>