<?php 
	include('php/loginStudent.php');
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
	<link rel="stylesheet" href="css/util.css">

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
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
			<?php  if (isset($_SESSION['userid'])) : ?>
			<h2>Welcome <strong>
			<?php 
			echo $_SESSION['username'];
			?></strong></h2> <?php endif ?>
				</div>
			</div>
		</div>

		<?php if (mysqli_num_rows($results) > 0) : ?>			
			<div class = "container m-b-20">
				<h3>Your previous queries:</h3>
							<div class="table100 m-b-20 m-t-20">
								<table>
									<thead>
										<tr class="table100-head">
											<th class="column">Submitted On</th>
											<th class="column">Subject</th>
											<th class="column">Replied</th>
										</tr>
									</thead>
									<tbody>
										<?php while($row = mysqli_fetch_array($results)){ ?>
										<tr>
											<td class="column"> <?php echo $row['datetime']; ?> </td>
											<td class="column"> <?php echo $row['sub']; ?></td>
											<?php 
												if($row['done']==1) : ?>
													<td class="column"> <?php echo $row['reply']; ?></td>
													</tr>
												<?php else : ?>
													<td class="column"> Still waiting reply </td>
													</tr>
												<?php endif;} ?>
									</tbody>
								</table>
							</div>
			<?php endif; ?>
			</div>


			<!--Submit Form -->

			<div class = "container">
				<h3>Fill out</h3>
				<div class = "m-b-20 m-t-20">
				<form method="post" class="probootstrap-form">
						<div class="form-group">
							<label for="sub">Subject</label>
							<input type="text" class="form-control" name="subject" placeholder="Subject of grievance">
						</div>
						<div class="form-group">	
							<label for="Desc">Description</label>
							<textarea class="form-control" name="desc" rows="3" placeholder="Description of grievance"></textarea>
						</div>
						<p style="color: red"><?php echo $_SESSION['warn']; ?></p>
						<input id="submit" name="submit" type="submit" class="btn btn-primary" value="Submit">
				  </form>
				  </div>
			</div>
	</section>

	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/popper.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/vendor/select2.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>