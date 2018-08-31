<?php 
	include('php/report.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grievance Cell</title>

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 

	
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/perfect-scrollbar.css">

	<link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

  </head>

<body>

  <!-- START: header -->
   <header role="banner" class="probootstrap-header probootstrap-header-no-intro">
    <div class="container-fluid">
        <a href="index.html" class="probootstrap-logo">Sublime<span>.</span></a>
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>
        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
		    <li><a href="loginTeacher.php">View Reports</a></li>
            <li class="probootstrap-cta"><a href="index.html">Log Out</a></li>
          </ul>
        </nav>
	</div>
  </header>
  <!-- END: header -->

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column">Month</th>
								<th class="column">Number of Grievances</th>
								<th class="column">Monthly Report</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = mysqli_fetch_array($results)): ?>							
							<tr>
								<td class="column"><?php 
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
									//echo " ".$row['year(datetime)'];
									?></td>
								<td class="column"><?php echo $row['count(*)']; ?></td>					
								<td class="column"><?php echo"<a href='php/generate.php?month=".$row['month(datetime)']."&year=".$row['year(datetime)']."'>Generate</a>"; ?> </td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Table -->

	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/popper.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/vendor/select2.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>