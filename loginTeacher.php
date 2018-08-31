<?php 
	include('php/loginTeacher.php');
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
		    <li><a href="report.php">Montly Report</a></li>
            <li class="probootstrap-cta"><a href="index.html">Log Out</a></li>
          </ul>
        </nav>
	</div>
  </header>
  <!-- END: header -->
	<!-- Year selector -->
    <form action="#" method="post">
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
		<input type = "submit" name = "submit" value = "Submit">
	</form>
    <div class="section-heading text-center ">
		<?php  if (isset($_SESSION['userid'])) : ?>
		<H2>Welcome <strong>
		<?php echo $_SESSION['username'] ?>
		 </strong></H2>
		 <?php endif ?>
	 </div>

	<!-- START: Table -->
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<h1 style="text-align: center;" colspan = "3"><?php echo $yearSelected; ?> </h1>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Submitted On</th>
								<th class="column3">Subject</th>
								<th class="column5">Replied</th>
								<th class="column6">Reply</th>
							</tr>
						</thead>
						<tbody>
								<?php while($row = mysqli_fetch_array($results)){ ?>							
									<tr>
										<td class="column1"><?php echo $row['datetime']; ?></td>
										<td class="column3"><?php echo $row['sub']; ?></td>										   
										<td class="column5"><?php 
												if($row['done']==1){
													echo "YES";
												}
												else {
													echo "NO";
												} 
											?>
										</td>
										<td class="column6"><?php if($row['done']==1){
													echo"<a href='reply.php?id=".$row['slno']."'>Change Reply</a>";
												}
												else {
													echo"<a href='reply.php?id=".$row['slno']."'>Reply</a>";
												}
											?>
										</td> 
									</tr>
								<?php } ?>
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