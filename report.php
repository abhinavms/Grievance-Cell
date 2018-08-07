<?php 
	include('php/report.php');
?>
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
		</div>
		
		<table class="table" style="margin-top:3%;">
			<tr  style="background: rgb(233, 233, 233)">
				<th>Month</th>
				<th>Number of Grienvances</th>
				<th>Monthly Report</th>
			</tr>
			
			<?php while($row = mysqli_fetch_array($results)): ?>							
				<tr style="background: white ">
					<td><?php 
					switch ($row['month(datetime)']) {
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
					?></td>
					<td><?php echo $row['count(*)']; ?></td>					
					<td><?php echo"<a href='php/generate.php?month=".$row['month(datetime)']."&year=".$row['year(datetime)']."'>Generate</a>"; ?> </td>
				</tr>
			<?php endwhile; ?>
		</table>
</body>
</html>