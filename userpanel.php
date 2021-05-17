<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<?php if(!isset($_SESSION['logged'])){echo '<script>window.open("login", "_self");</script>'; }else{ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tujjari</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Font Awesome CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://use.fontawesome.com/265b5bff8c.js"></script>
	<script src="https://kit.fontawesome.com/420b921a12.js" crossorigin="anonymous"></script>
	<!--Animate.css link1-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
	<!--Animate.css link2-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<!--Linking style.css-->
	<link rel="stylesheet" type="text/css" href="tujjaricss.css?v=<?php echo time(); ?>">
	<!--Bootstrap CDN's-->
	<script src="https://unpkg.com/scrollreveal"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style type="text/css">
		@media all and (min-width: 992px) {
			.navbar .nav-item .dropdown-menu{ display: none; }
			.navbar .nav-item:hover .dropdown-menu{ display: block; }
			.navbar .nav-item .dropdown-menu{ margin-top:0; }
		}	
	</style>
<style type="text/css">
    @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu{ display: none; }
            .navbar .nav-item:hover .dropdown-menu{ display: block; }
            .navbar .nav-item .dropdown-menu{ margin-top:0; }
        }   
</style>
</head>
<body>
<?php include 'navbar.php'; ?>
<br><br><br><br><br>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3">
				<?php include 'usersidebar.php'; ?>
			</div>
			<div class="col-md-9">
				<?php
					if(isset($_GET['my_listings'])){
					include ("my_listings.php");
					}
					?>
					<?php
					if(isset($_GET['my_profile'])){
					include ("my_profile.php");
					}
					?>
					<?php
					if(isset($_GET['my_chats'])){
					include ("my_chats.php");
					}
					?>
					<?php
					if(isset($_GET['acc_settings'])){
					include ("acc_settings.php");
					}
					?>
					<?php
					if(isset($_GET['sign_out'])){
					include ("signout");
					}
		        	?>
		        	<?php
					if(isset($_GET['client_id'])){
					include ("chatbox.php");
					}
		        	?>
			</div>
		</div>
	</div>
	<footer style="margin-top: 40px; background-color: #E2E2E2;">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="mt-4 mt-4 col-md-3 col-lg-3 col-6 col-sm-6">
          <ul style="list-style-type: none;"><p><b>Sitemap</b></p>
<li ><a style="color: black;" href="https://tujjari.com">Home</a></li>  <li><a style="color: black;"  href="login">Sign In/Register</a></li> <li><a style="color: black;"  href="faq.html">FAQ</a></li> <li><a style="color: black;"  href="<?php if(!isset($_SESSION['customer_name'])){echo "login";}else{ echo "userpanel";} ?>">My Account</a></li>
 </ul>
        </div>
        <div class="mt-4 col-md-3 col-lg-3 col-6 col-sm-6">
          <ul style="list-style-type: none;"><p><b>Our Company</b></p>
<li><a style="color: black;" href="about.php">About Us</a></li><li><a href="career.php" style="color: black;">Careers</a></li><li><a style="color: black;" href="T&C">Terms & Conditions</a></li><li><a href="privacypolicy" style="color: black;">Privacy Policy</a></li></ul>
        </div>
        <div class="mt-4 col-md-3 col-lg-3 col-6 col-sm-6">
          <ul style="list-style-type: none;"><p><b>Support</b></p>
<li><a style="color: black;" href="contactus.php">Contact Us</a></li><li><a href="help.html" style="color: black;">Get Help</a></li></ul>
        </div>
        <div class="mt-4 col-md-3 col-lg-3 col-12 col-sm-12">
          <a href="" class="social" style="margin-bottom: 25px; color: black;"><i style="font-size: 48px; " class="fa fa-facebook-square"></i></a>
<a href="" style="color: black;"><i style="margin-bottom: 25px; font-size: 48px; padding-left: 25px; " class="fa fa-instagram"></i></a>
<a href=""style="color: black;"><i style="margin-bottom: 25px; font-size: 48px; padding-left: 25px; " class="fa fa-linkedin"></i></a>
<a href=""style="color: black;"><i style="margin-bottom: 25px; font-size: 48px; padding-left: 25px; " class="fa fa-twitter"></i></a>
<!--<h4>Get the news</h4>
        <p class="text-muted">Enter your email below to get news of our products. Don't worry, even we hate spams! :)</p>
        <form action="php/subscribe-process.php" method="post">
          <div class="input-group">
            <input type="text" name="email" style="width: 150px;" class="form-control">
            <span class="input-group-btn">
              <input type="submit" name="subscribe" class="mb-2 ml-2 btn btn-outline-dark" value="SUBSCRIBE">
            </span>
          </div>
        </form>-->
        </div>
      </div>
    </div>
  </div>
</footer>

<section class="col-md-12" style="background-color: black !important; width: 100% !important;">
        <div class="copyright">
            <div class="container">
                <div class="row">
                        <p class="m-auto cpytext" style="color: white;">Copyright © 2020 Tujjari. All rights reserved.</p>
                   
                </div> <!-- enf of row -->
            </div> <!-- end of container -->
        </div> <!-- end of copyright -->
    </section>

<!-- fOOTER ENDS -->
</body>
</html>
<?php 
}
?>