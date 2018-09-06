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
						<li><a href="report.php">Monthly Report</a></li>
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
	
    <div class="section-heading text-center ">
		<?php  if (isset($_SESSION['userid'])) : ?>
		<H2>Welcome <strong>
		<?php echo $_SESSION['username'] ?>
		 </strong></H2>
		 <?php endif ?>
	 	</div>
		<h3>
		<div class="section-heading text-center m-t-30 m-b-40">
		<!-- Year selector -->
    <form action="#" method="post">
		Select Year -
		<SELECT name = "yearSelected">
				<?php 
					echo"<OPTION value = ".$yearNow." selected>".$yearNow."</OPTION>";
					$yearNow--;
		  			while("$yearStart" != "$yearNow"){
						echo"<OPTION value = ".$yearNow.">".$yearNow."</OPTION>";
	 					$yearNow--; 
	 					}
	 			?>
		</SELECT>
		<input class = "btn btn-primary btn-sm m-l-5" type = "submit" name = "submit" value = "Submit" style = "padding: 5px 30px">
		</form>
		<!-- End of selector -->
		</div> </h3>

	<!-- START: Table -->
				 <div class="table100 m-b-20 m-t-20">
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
	<!-- END: Table -->
</div>

	<script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>

</body>
</html>