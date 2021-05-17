<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<!DOCTYPE html>
<html>
<head>
<title>Tujjari</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Font Awesome CDN -->
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMq_YJsJ75HOUWUAK3MyZp47vzdR7_Jv8"></script>
  <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
  <style type="text/css">
    #map {
      width: 100%;
      height: 480px;
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



<style type="text/css">

  .yolo{
     padding: 8px 15px !important;
     background-color: #ffffff !important;
  border-radius: 0 !important;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5) !important;

  }
 
  @media only screen and (max-width: 600px) {

  .smaul1,.smaul2,.smaul3{
    font-size: 84%;
    padding-left: 10px;
  }
  .yolo{
    margin: auto;
    width: 100%;
  }
}
@media only screen and (min-width: 768px) {
    .smaul1{
     padding-right: 300px;
     margin: auto;
    }
    .smaul2{
      margin: auto;
      padding-right: 300px;
    }
    .smaul3{
      margin: auto;
    }
 
}
.boxer{
  background-color: #fff;
  border: solid 1px #e6e6e6;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}
</style>


<div class="coolnav container">
<div class="row yolo">
<div class="m-auto">
<div class="row">
<p class="smaul1"><i style="color: green;" class="fa fa-check"></i> Car Details</p>
<p class="smaul2"><i style="color: green;" class="fa fa-check"></i> Contact Information</p>
<p class="smaul3"  ><i style="color: green;" class="fa fa-check"></i> Ad Posted</p>
</div>
</div></div>
<br><br><br>

<div class="boxer"><br>
<div class="container">
 
<center>
  <i class="fa fa-check-circle animate__animated animate__fadeInUp" style="font-size: 100px; color: green;"></i><br>
  <p style="font-size: 40px;" class="animate__animated animate__fadeInUp"><b>SUCCESS!</b></p>  <p style="font-size: 20px;">Your Ad has been posted</p>

</center>