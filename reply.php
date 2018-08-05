<?php 
	include('php/reply.php');
?>
<!DOCTYPE html>
<html>
<head>   
</style>

    <title>Grievance Cell</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">	
</head>
<body>
	<div class = "container">    
	<form method="POST">
	<div class="form-group" style="margin: 3%;">
	<table class="table table-bordered" style="background:RGB(255,255,255);">
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Name </h4></label></div> </th>
		<th> <h4><?php echo $row2['username']; ?></h4> </th>
	</tr>    
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Department</h4></label></div>	</th>
		<th> <h4><?php echo $row2['dept']; ?></h4> </th>
	</tr>   
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Semester</h4></label></div> </th>
		<th> <h4><?php echo $row2['semester']; ?></h4> </th>
	</tr>
    <tr>
		<th> <div class="form-group"><label for="sub"><h4>Subject</h4></label></div> </th>
		<th> <textarea readonly rows = "4" ><?php echo $row['sub'] ?></textarea></th>
    </tr>
		<th> <div class="form-group"><label for="sub"><h4>Description</h4></label></div> </th>
		<th> <textarea readonly rows = "7"><?php echo $row['description']?></textarea></th>
	</tr>
	<tr>
		<th> <div class="form-group"><label for="sub"><h4>Reply here</h4></label></div> </th>
		<th> <textarea name="reply" class="form-control"  rows="3" placeholder="Enter your reply"></textarea> </th>
	</tr>
	<tr>
		<th></th>
		<th> <button name="submit" type="submit" value = "submit" class="btn btn-primary">Submit</button> </th>
	</tr>
	</table>
	</div>
	</form>
	</div>
</body>
</html>
 