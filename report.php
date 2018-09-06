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
	<link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
  </head>

<body>

	<!-- START: header -->
	<header role="banner" class="probootstrap-header probootstrap-header-no-intro">
    <div class="container-fluid">
        <a href="index.html" class="probootstrap-logo">Grievance Cell<span>.</span></a>
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>
        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
		    <li><a href="loginTeacher.php">View Reports</a></li>
			<li class="probootstrap-cta"><a href="index.html">Log Out</a></li>
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
          </div>
        </nav>
    </div>
  </header>
  <!-- END: header -->

 <div class="container m-t-50">

	<!-- Year Selector -->
	<div class="section-heading text-center ">
	<h3> 
    <form action="#" method="post">
		Select Year -
		<SELECT name = "yearSelected">
				<?php 
					$yearStart = 2002;	//One less than actual year
					$yearNow = date('Y');
					echo"<OPTION value = ".$yearNow." selected>".$yearNow."</OPTION>";
					$yearNow--;
		  			while("$yearStart" != "$yearNow"){
						echo"<OPTION value = ".$yearNow.">".$yearNow."</OPTION>";
	 					$yearNow--; 
	 					}
	 			?>
		</SELECT>
		<input class = "btn btn-primary btn-sm m-l-5" type = "submit" name = "submit" value = "Submit">
	</form>
	</h3> </div>


				<div class="table100 m-b-20 m-t-20">
					<h1 style="text-align: center;" colspan = "3"><?php echo $yearSelected; ?> </h1>
					<table>
						<thead>								
							<tr class="table100-head">
								<th class="column">Month</th>
								<th class="column">Number of Grievances</th>
								<th class="column">Monthly Report</th>
							</tr>
						</thead>
						<tbody>
						<?php if($yearSelected == date('Y')): while(($month-1) != date('n')): ?>							
							<tr>
								<td class="column"><?php switchCall($month);?></td>
								<td class="column">
									<?php   
											$count = 0;
											if($row['month(datetime)'] == $month){
												$monthTemp = $row['month(datetime)'];
												$count = $row['count(*)']; 
												if($count !=0)
													echo $count;
												$year = $row['year(datetime)'];
												$row = mysqli_fetch_array($results);
											}
											else 
												echo "Nil";
									?>		
								</td>					
								<td class="column">
									<?php echo"<a href='php/generate.php?month=".$month."&year=".$yearSelected."'>Generate</a>"; ?> 
								</td>
							</tr>
							<?php $month++;	endwhile; else: while($month<13): ?>															
							<tr>
								<td class="column"><?php switchCall($month);?></td>
								<td class="column">
									<?php   
											$count = 0;
											if($row['month(datetime)'] == $month){
												$monthTemp = $row['month(datetime)'];
												$count = $row['count(*)']; 
												if($count !=0)
													echo $count;
												$year = $row['year(datetime)'];
												$row = mysqli_fetch_array($results);
											}
											else 
												echo "Nil";
									?>		
								</td>					
								<td class="column">
									<?php echo"<a href='php/generate.php?month=".$monthTemp."&year=".$year."'>Generate</a>"; ?>
								</td>
							</tr>
							<?php $month++; endwhile; endif; ?>
						</tbody>
					</table>
				</div>
	<!-- END: Table -->
	</div>

	<script src="js/scripts.min.js"></script>
  	<script src="js/main.min.js"></script>
  	<script src="js/custom.js"></script>

</body>
</html>