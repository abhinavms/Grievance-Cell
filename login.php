<?php 
	include('php/index.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
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
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>
        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li class="probootstrap-cta"><a href="login.php">Log in</a></li>
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
          </div>
        </nav>
    </div>
    
  </header>
  <!-- END: header -->
  
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center section-heading">
          <h2>Log in</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" class="probootstrap-form probootstrap-form-box" action="login.php">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="username" name="userid" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="username">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>

              <!-- Errors here : -->
              <?php include('php/errors.php'); ?>
              <!-- Errors end -->
              
            <div class="form-group mb50">
              <input type="submit" name="login_user" value="Log in" class="btn btn-primary btn-block">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  
  <!-- START: footer -->
  <footer role="contentinfo" class="probootstrap-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <h3>About</h3>
            <p>Sree Chitra Thirunal College of Engineering , Thiruvananthapuram; a Government sponsored Engineering College, started functioning from the academic year 1995, under the University of Kerala. SCT College of Engineering is one of the few colleges in the state of Kerala having ISO 9001-2000 certification.</p>
            <p><a href="http://sctce.ac.in/" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <h3>Contact</h3>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>Pappanamcode, Thiruvananthapuram, Kerala 695018</span></li>
              <li><i class="icon-mail"></i><span>principal@sctce.ac.in</span></li>
              <li><i class="icon-phone2"></i><span>(0471) 249 0572</span></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row mt40">
        <div class="col-md-12 text-center">
          <p>
            <small>&copy; 2018 <a href="http://sctce.ac.in/" target="_blank">SCTCE</a>. Designed by <a href="https://www.linkedin.com/in/abhinavms/" target="_blank">Abhinav MS</a> and  <a href="https://www.linkedin.com/in/ashir-ali/" target="_blank">Ashir Ali</a>. All Rights Reserved </small>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- END: footer -->

  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>

  </body>
</html>