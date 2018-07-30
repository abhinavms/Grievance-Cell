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
	 <div class = "container">
	  <h3>Fill out</h3>
	<form method = "POST" action = "loginStudent.php">
	 <div class="form-group">
    <label for="sub">Subject:</label>
    <input type="text" class="form-control" name="subject" placeholder="Subject of grievance">
	  <div class="form-group">
    <label for="Desc">Description:</label>
    <textarea class="form-control" name="desc" rows="3" placeholder="Description of grievance"></textarea>
   </div>
   </div>
   <?php include ('input.php'); ?>
   <button id="submit" type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>