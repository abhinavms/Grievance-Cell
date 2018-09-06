<?php 
	include('php/reply.php');
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
	<link rel="stylesheet" href="css/custom.css">

  </head>
  <body>
	
  	<!-- START: header -->
	<header role="banner" class="probootstrap-header probootstrap-header-no-intro">
    <div class="container-fluid">
        <a href="index.html" class="probootstrap-logo">Grievance Cell<span>.</span></a>
        <nav role="navigation" class="probootstrap-nav">
          <ul class="probootstrap-main-nav">
            <li class="probootstrap-cta"><a href="index.html">Log Out</a></li>
          </ul>
        </nav>
	</div>
  </header>
  <!-- END: header -->
 <section class="probootstrap-section">
	<div class = "container">    
		<form method="POST">
			<div class="form-group">
			<table>
			<tr>
				<th> <h4>Name </h4> </th>
				<td> <h4><?php echo $row2['name']; ?></h4> </td>
			</tr>    
			<tr>
				<th> <h4>Department</h4> </th>
				<td> <h4><?php echo $row2['dept']; ?></h4> </th>
			</tr>   
			<tr>
				<th> <h4>Semester</h4> </th>
				<td> <h4><?php echo $row2['semester']; ?></h4> </th>
			</tr>
			<tr>
				<th> <h4>Subject</h4> </th>
				<td> <h4><?php echo $row['sub'] ?></h4></th>
			</tr>
				<th> <h4>Description</h4> </th>
				<td> <h4><?php echo $row['description']?></h4></th>
			</tr>
			<?php if($row['reply']!=''):?>
			</tr>
				<th> <h4>Your previous reply</h4> </th>
				<td> <h4><?php echo $row['reply']?></h4></th>
			</tr>
			<?php endif ?>
			<tr>
				<th> <h4>Reply here</h4> </th>
				<td> <textarea name="reply" class="form-control"  rows="3" placeholder="Enter your reply"></textarea> </th>
			</tr>
			<tr>
				<th></th>
				<th > <button name="submit" type="submit" value = "submit" class="btn btn-primary">Submit</button> </th>
			</tr>
			</table>
			</div>
		</form>
	</div>
 </section>
</body>
</html>
 