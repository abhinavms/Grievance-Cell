
<?php 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}

?>
</style>
	<div class="container">
		
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		
		<?php  if (isset($_SESSION['username'])) : ?>
			<?php $username = $_SESSION['username']; ?>
			
		<?php endif ?>
		
	</div>
	 <!-- View entered queries -->
<br><br>
 <div class = "container">
	  <h4 style = "color: white">Your previous queries:</h4>

<div class="table-responsive">

   <?php 
   		include('credentials.php');
			$db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

			if(mysqli_connect_error()){
				die ("Error Connecting.");
			}
			
			$query = "SELECT * FROM `grv` WHERE userid='$username' ORDER BY done";
			echo '<table class="table">
						<tr style="background: rgb(233, 233, 233)">
							<th>Submitted On</th>
							<th>Subject</th>
							<th>Replied</th>
						</tr>';
			if($results = mysqli_query($db,$query)){
					while($row = mysqli_fetch_array($results)){
							
							echo '<tr style="background: white">',
								 "<td>",$row['datetime'],"</td>",
								 "<td>",$row['sub'],"</td>";
															   
							if($row['done']==1){
									echo "<td>",$row['reply'],"</td></tr>";

							}
							else{
									echo "<td>Still waiting reply</td></tr>";
							}						
					}
			}

			echo "</table>";

    ?>
	</div>
</div>
<br><br>
	  <div class = "container">
	  <h3>Fill out</h3>
	<form method = "POST">


	 <div class="form-group">
    <label for="sub">Subject:</label>
    <input type="text" style="margin-top: 0%;" class="form-control" name="subject" placeholder="Subject of grievance">
	</div>
	  <div class="form-group">
    <label for="Desc">Description:</label>
    <textarea class="form-control" name="desc" rows="3" placeholder="Description of grievance"></textarea></div>
   <?php include ('input.php'); ?>
   <button id="submit" type="submit" class="btn btn-light" style="margin-top=1%;margin-bottom: 3%">Submit</button>
  </form>
</div>
</body>
</html>