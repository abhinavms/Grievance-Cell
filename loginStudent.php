<?php 
	include('php/loginStudent.php');
?>
<!doctype html>
<html lang="en">
	<head>   
		<title>Grievance Cell</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
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

		<div class="grad" >
			<?php  if (isset($_SESSION['userid'])) : ?>
			<H1>Welcome <strong>
			<?php 
			echo $_SESSION['username'];
			?></strong></H1> <?php endif ?>
			<a class="pull-right" href="index.php?logout='1'" style="color: red;">logout</a>
		</div>

		<?php if (mysqli_num_rows($results) > 0) : ?>
			<br><br>
			
			<div class = "container">
				<h4 style = "color: white">Your previous queries:</h4>
				<div class="table-responsive">
					<table>
						<tr >
							<th>Submitted On</th>
							<th>Subject</th>
							<th>Replied</th>
						</tr>
							<?php
								while($row = mysqli_fetch_array($results)){
							?>
						<tr>
						<td> <?php echo $row['datetime']; ?> </td>
						<td> <?php echo $row['sub']; ?></td>
						<?php 
							if($row['done']==1) : ?>
								<td> <?php echo $row['reply']; ?></td>
								</tr>
							<?php else : ?>
								<td> Still waiting reply </td>
								</tr>
							<?php endif;} ?>
					</table>
				</div>
			</div>
			<br><br>
		<?php endif; ?>

			<!--Submit Form : -->

			<div style="color:white;" class = "container">
				<h3 >Fill out</h3>
				<form method="post">
						<div class="form-group">
							<label for="sub">Subject:</label>
							<input type="text" style="margin-top: 0%;" class="form-control" name="subject" placeholder="Subject of grievance">
						</div>
						<div class="form-group">	
							<label for="Desc">Description:</label>
							<textarea class="form-control" name="desc" rows="3" placeholder="Description of grievance"></textarea>
						</div>
						
						<input id="submit" name="submit" type="submit" class="btn btn-primary" value="Submit" style="margin-top=1%;margin-bottom: 3%">
  				</form>
			</div>
</div>
</body>
</html>