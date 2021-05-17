<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Tujjari</title><link rel="shortcut icon" type="image/jpg" href="faviconimg"/>
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
	<link rel="stylesheet" type="text/css" href="../tujjari.css?v=<?php echo time(); ?>">
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
</head>
<body>
	<div class="firstdiv">
<nav class="navbar navbar-default navbar-fixed-top navbar-custom fixed-top navbar-expand-lg navbar-light bg-white">
<a class="navbar-brand" href="https://tujjari.com"><img style="height: 65px; width: 160px;" src="logoimg"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ml-auto">
<form class="form-inline">
<form>
<form class="form-inline my-2 my-lg-2">
 <!--<li class="nav-item active">
   <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item">
   <a class="nav-link" href="#">Contact us</a>
 </li>
 <li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Services
   </a>
   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
     <a class="dropdown-item" href="#">Service 1</a>
     <a class="dropdown-item" href="#">Service 2</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item" href="#">Something else here</a>
   </div>
 </li>-->
<form class="form-inline my-2 my-lg-0">
<i style="font-size: 25px;" class="fa fa-comment-dots"></i>
    <?php 
        if(!isset($_SESSION['logged'])){
                      echo "<button class='mr-3 btn btn-outline-dark my-2 my-sm-0 type=submit' formaction='login'>Log in/Register</button>";
        }else{
            echo "<li class='nav-item active dropdown'>
                        <a class='mr-3 btn my-2 my-sm-0 nav-link dropdown-toggle' href='userpanel' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' type='submit'>
                          <img src='defaultimg' style='height: 30px; width: 30px; border-radius: 50%;'> Abhinav CV
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                          <a class='dropdown-item' href='../userpanel/mylistings'>My Listings</a>
                          <div class='dropdown-divider'></div>
                          <a class='dropdown-item' href='../userpanel/myprofile'>My Profile</a>
                          <div class='dropdown-divider'></div>
                          <a class='dropdown-item' href='../userpanel/mychats'>My Chats</a>
                          <div class='dropdown-divider'></div>
                          
                          <div class='dropdown-divider'></div>
                          <a class='dropdown-item' href='signout'>Sign Out</a>
                        </div>
                      </li>";
        } 
    ?>
  <button style="color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%); " class="btn my-2 my-sm-0" type="submit" formaction="cardetails"><a style="color: white;text-decoration: none;" href="cardetails">Sell Your Car</a></button>
</form>
</ul>
</div>
</nav>
</div>  <!-- Navbar div ends (firstdiv) -->
	<div style="margin-top: 120px;" class="container">
		<div class="col-md-12">
			<ul style="padding-left: 100px;" class="breadcrumb">
				<li style="padding-left: 130px;"><i style="color: green;" class="fa fa-check"></i> Select Your Ad Type</li>
				<li style="padding-left: 130px;"><i style="color: lightgrey;" class="fa fa-check"></i>Insert Car Details</li>
				<li style="padding-left: 130px;"><i style="color: lightgrey;" class="fa fa-check"></i>Provide us your Details</li>
        	</ul>
		</div>
		<div class="col-md-12">
			<div class="box">
				<label>Enter Car Brand</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="brand" value="Choose Brand" style="">
					<option>--Which Brand is your car?--</option>
					<option>Toyota</option>
					<option>Hyundai</option>
					<option>Nissan</option>
					<option>Ford</option>
					<option>CRange Rover</option>
				</select>
				<label>Select Model</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="model" value="Choose Model" style="">
					<option>--Which model is your car?--</option>
					<option>AURION</option>
					<option>AURIS</option>
					<option>COROLLA</option>
					<option>YARIS</option>
					<option>PRADO</option>
				</select>
				<label>Select Model Year</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="modelyear" value="Choose Model" style="">
					<option>--Which year is the car model?--</option>
					<option>AURION</option>
					<option>AURIS</option>
					<option>COROLLA</option>
					<option>YARIS</option>
					<option>PRADO</option>
				</select>
				<label>Select Car Color</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="color" value="Choose Model" style="">
					<option>--What is the color?--</option>
					<option>AURION</option>
					<option>AURIS</option>
					<option>COROLLA</option>
					<option>YARIS</option>
					<option>PRADO</option>
				</select>
				<label>Usage</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="usage" value="Choose Model" style="">
					<option>--User or New--</option>
					<option>AURION</option>
					<option>AURIS</option>
					<option>COROLLA</option>
					<option>YARIS</option>
					<option>PRADO</option>
				</select>
				<label>City</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="city" value="Choose Model" style="">
					<option>--Which city is it located in?--</option>
					<option>AURION</option>
					<option>AURIS</option>
					<option>COROLLA</option>
					<option>YARIS</option>
					<option>PRADO</option>
				</select>
				<label>Price</label>
				<input type="text" name="price" placeholder="What is the price of your car?"><br>
				<label>Warranty Date</label>
				<input type="date" name="warranty"><br>
				<label>Kilometers</label>
				<input type="number" name="kilometer" placeholder="How many kilometers has your car driven?"><br>
				<label>Specs</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="specs" value="Choose Model" style="">
					<option>--Select the specs--</option>
					<option>AURION</option>
					<option>AURIS</option>
					<option>COROLLA</option>
					<option>YARIS</option>
					<option>PRADO</option>
				</select>
				<label>Accident History</label>
				<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="accident" value="Choose Model" style="">
					<option>--Has your car had any accidents previously?--</option>
					<option>AURION</option>
					<option>AURIS</option>
					<option>COROLLA</option>
					<option>YARIS</option>
					<option>PRADO</option>
				</select>
				<label>Additional Information</label>
				<textarea name="addinfo"></textarea>
				<center>
					<a class="btn btn-primary" href="insertseller.php">CONTINUE</a>
				</center>
			</div>
		</div>
	</div>
</body>
</html>