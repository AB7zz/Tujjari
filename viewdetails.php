<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<?php
  if(isset($_GET['id'])){
    $ad_id = $_GET['id'];
    $select = "select * from free_ad where id='$ad_id'";
    $run = mysqli_query($con, $select);
    $fetch = mysqli_fetch_array($run);
    $brand_id = $fetch['car_brand'];
    $ad_user_id = $fetch['user_id'];
    $modelname = $fetch['car_model'];
    $ad_title = $fetch['title'];
    $year = $fetch['model_year'];
    $km = $fetch['km'];
    $transmission = $fetch['transmission_type'];
    $desc = $fetch['desci'];
    $emirate = $fetch['emirate'];
    $latitude = $fetch['latitude'];
    $longitude = $fetch['longitude'];
    $phone = $fetch['phone'];
    $body_condition = $fetch['body_condition'];
    $specs = $fetch['specs'];
    $fuel_type = $fetch['fuel_type'];
    $car_color = $fetch['car_color'];
    $check = $fetch['check1'];
    $checkarr = explode(',', $check);
    $ad_image = $fetch['ad_image'];
    $ad1 = $fetch['ad_img1'];
    $ad2 = $fetch['ad_img2'];
    $ad3 = $fetch['ad_img3'];
    $ad4 = $fetch['ad_img4'];
    $ad5 = $fetch['ad_img5'];
    $ad6 = $fetch['ad_img6'];
    $ad7 = $fetch['ad_img7'];
    $ad8 = $fetch['ad_img8'];
    $ad9 = $fetch['ad_img9'];
    $ad10 = $fetch['ad_img10'];
    $acc_hist = $fetch['accident_hist'];
    $checkimg = explode(',', $ad_image);
?>
<!DOCTYPE html>
<html>
<head>
<title>Tujjari</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
<link rel="stylesheet" type="text/css" href="tujjaricss.css">
<!--Bootstrap CDN's-->
<script src="https://unpkg.com/scrollreveal"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<style type="text/css">
/*//CODE TO MAKE NOTIFICATION DROPDOWN ON HOVER. ITS NOT WORKING FOR SOME REASON ONLY FOR VIEWDETAILS, FORGET IT*/
@media all and (min-width: 992px) {
.navbar .nav-item .dropdown-menu{ display: none; }
.navbar .nav-item:hover .dropdown-menu{ display: block; }
.navbar .nav-item .dropdown-menu{ margin-top:0; }
}
body{
overflow-x: hidden;
}
.fa-phone{
 -webkit-transform: scaleX(-1) !important;
 transform: scaleX(-1) !important;
}
.rari{
list-style: none;
}
.lacoste{
margin-top: 50px;
}
.lala{
box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);   background-color: #fff;
 border: solid 1px #e6e6e6;
}
.lambo{
margin-left: 20px;
margin-right: 20px;
}
.headerDivider{
border-left:1.5px solid #000;

}
.dividerb{
border-top: 1px solid #000;

}
@media(max-width: 767px){
.details{
padding-left:0px !important;
}

.lambo{
margin-left: 10px !important;
margin-right: 20px !important;
margin-top: 15px !important;
}
.details2{
padding-left: 14px !important;
}
}
//Carousel for Details START
.carousel-item-detail img{
height: 550px !important;
width: 234px !important;
}
.carousel-item-detail{
height: 355px !important;
width: 434px !important;
}

.carousel-inner-detail{
   height: 355px !important;
   width: 234px !important;
}
}
@media (max-width: 991px) {
.carousel-item-detail img{
height: 400px;
width: 434px;
}
.carousel-item-detail{
height: 355px;
width: 434px;
}

.carousel-inner-detail{
   height: 355px;
   width: 434px;
}
}
/*//Carousel for Details END*/


/*//CSS CODE FOR SLIDER START*/
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
 max-width: 1000px;
 position: relative;
 margin: auto;
}

/* Next & previous buttons */
.prev, .next {
 cursor: pointer;
 position: absolute;
 top: 50%;
 width: auto;
 padding: 16px;
 margin-top: -22px;
 color: white;
 font-weight: bold;
 font-size: 18px;
 transition: 0.6s ease;
 border-radius: 0 3px 3px 0;
 user-select: none;
}

/* Position the "next button" to the right */
.next {
 right: 0;
 border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
 background-color: rgba(0,0,0,0.8);
}

/* Number text (1/3 etc) */
.numbertext {
 color: #f2f2f2;
 font-size: 12px;
 padding: 8px 12px;
 position: absolute;
 top: 0;
}

/* The dots/bullets/indicators */
.dot {
 cursor: pointer;
 height: 15px;
 width: 15px;
 margin: 0 2px;
 background-color: #bbb;
 border-radius: 50%;
 display: inline-block;
 transition: background-color 0.6s ease;
}

.slideractive, .dot:hover {
 background-color: #717171;
}

/* Fading animation */
.fade {
 -webkit-animation-name: fade;
 -webkit-animation-duration: 1.5s;
 animation-name: fade;
 animation-duration: 1.5s;
}

@-webkit-keyframes fade {
 from {opacity: .4}
 to {opacity: 1}
}
.fade:not(.show) {
   opacity: 1;
}

@keyframes fade {
 from {opacity: .4}
 to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
 .prev, .next,.text {font-size: 11px}
}
/*//CSS CODE FOR SLIDER END*/
@media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu{ display: none; }
            .navbar .nav-item:hover .dropdown-menu{ display: block; }
            .navbar .nav-item .dropdown-menu{ margin-top:0; }
        }
        .lightbox-basic {
  margin: 2.5rem auto;
  padding: 2rem 1.5rem 2rem 1.5rem;
  border-radius: 0.25rem;
  background: #fff;
  text-align: left;
}

.lightbox-basic .container {
  padding-right: 0;
  padding-left: 0;
}
.my-mfp-slide-bottom .zoom-anim-dialog {
  opacity: 0;
  transition: all 0.2s ease-out;
  -webkit-transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
  -ms-transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
  transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
}

/* animate in */
.my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
  opacity: 1;
  -webkit-transform: translateY(0) perspective(37.5rem) rotateX(0);
  -ms-transform: translateY(0) perspective(37.5rem) rotateX(0);
  transform: translateY(0) perspective(37.5rem) rotateX(0);
}

/* animate out */
.my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
  opacity: 0;
  -webkit-transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg);
  -ms-transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg);
  transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg);
}
.lightbox-basic .list-unstyled .media-body {
  margin-left: 0.625rem;
}

.lightbox-basic .btn-outline-reg,
.lightbox-basic .btn-solid-reg {
  margin-top: 0.75rem;
}

/* Signup Button */
.lightbox-basic .btn-solid-reg.mfp-close {
  position: relative;
  width: auto;
  height: auto;
  color: #fff;
  opacity: 1;
}

.lightbox-basic .btn-solid-reg.mfp-close:hover {
  color: #9f7ba9;
}
/* end of signup Button */

/* Back Button */
.lightbox-basic a.mfp-close.as-button {
  position: relative;
  width: auto;
  height: auto;
  margin-left: 0.375rem;
  color: #9f7ba9;
  opacity: 1;
}

button.mfp-close.x-button{
  background: transparent !important;
  border: none !important;
}

.lightbox-basic a.mfp-close.as-button:hover {
  color: #fff;
}
/* end of back button */

.lightbox-basic button.mfp-close.x-button {
  position: absolute;
  top: -0.125rem;
  right: 1.000rem;
  width: 2.75rem;
  height: 2.75rem;
  color: #707984;
}
/* Fade-move Animation For Lightbox - Magnific Popup */
/* at start */
.my-mfp-slide-bottom .zoom-anim-dialog {
  opacity: 0;
  transition: all 0.2s ease-out;
  -webkit-transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
  -ms-transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
  transform: translateY(-1.25rem) perspective(37.5rem) rotateX(10deg);
}

/* animate in */
.my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
  opacity: 1;
  -webkit-transform: translateY(0) perspective(37.5rem) rotateX(0);
  -ms-transform: translateY(0) perspective(37.5rem) rotateX(0);
  transform: translateY(0) perspective(37.5rem) rotateX(0);
}

/* animate out */
.my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
  opacity: 0;
  -webkit-transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg);
  -ms-transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg);
  transform: translateY(-0.625rem) perspective(37.5rem) rotateX(10deg);
}

/* dark overlay, start state */
.my-mfp-slide-bottom.mfp-bg {
  opacity: 0;
  transition: opacity 0.2s ease-out;
}

/* animate in */
.my-mfp-slide-bottom.mfp-ready.mfp-bg {
  opacity: 0.8;
}
/* animate out */
.my-mfp-slide-bottom.mfp-removing.mfp-bg {
  opacity: 0;
}
/* end of fade-move animation for lightbox - magnific popup */
@media only screen and (max-width: 768px) {

    .cpytext{
      font-size: 80%;
    }
    .divy,.divy2{
      font-size: 90%;
    }
    .divy3{
     
      margin: auto !important;
    }
    .fa-instagram{
      font-size: 35px !important;
    }
    .fa-facebook-square{
        font-size: 35px !important;
    }
    .fa-linkedin{
        font-size: 35px !important
    }
    .fa-twitter{
       font-size: 35px !important;
    }

  }
  @media only screen and (min-width: 768px) {

    .divy3{
      padding-left: 250px;
      padding-top: 30px;
    }
    .divy2{
      padding-left: 50px;
    }
    .divy{
      padding-left: 50px;
    }
    .divybab{
      padding-left: 100px;
    }
  }
  .footerbtn:hover{
    background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%);
    color: white !important;
    border-color: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%);
  }
  .fa-facebook-square:hover,.fa-instagram:hover,.fa-linkedin:hover,.fa-twitter:hover{
    background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    transition: 0.3s;
    transform: rotate(30deg);
}
</style>
</head>
<body>
<?php include 'navbar.php'; ?>
<br><br><br><br>
<div class="mt-4"><!--Center content-->
<div class="col-md-12"><!--Code for Breadcrumb START-->
<ul class="breadcrumb">
<li><a href="<?php if(!isset($_SESSION['carurl'])){ echo 'car.php'; } else{$hola = $_SESSION['carurl']; echo $hola; }?>">Back</a></li>
<li><?php echo $ad_title;?></li>
        </ul>
</div><!--Code for Breadcrumb END-->
<div class="row">
<div class="mt-3 col-md-3"><!--Code for sidebar START-->
<?php include 'sidebar.php'; ?>
</div><!--Code for sidebar END-->
  <div class="col-md-9 col-12 col-sm-12">
  <div class="container">
<div>
<h2><b><?php echo $ad_title; ?></b></h2>
</div><br>
<div class="row">
<div class="col-md-6">
  <div class="slideshow-container">
    <?php
      if($ad1 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>1</div>
            <img src='adimages/$ad1' style='width:100%;'>
        </div>";
      }
       if($ad2 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>2</div>
            <img src='adimages/$ad2' style='width:100%;'>
        </div>";
      }
      if($ad3 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>3</div>
            <img src='adimages/$ad3' style='width:100%;'>
        </div>";
      }
      if($ad4 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>4</div>
            <img src='adimages/$ad4' style='width:100%;'>
        </div>";
      }
      if($ad5 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>5</div>
            <img src='adimages/$ad5' style='width:100%;'>
        </div>";
      }
      if($ad6 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>6</div>
            <img src='adimages/$ad6' style='width:100%;'>
        </div>";
      }
      if($ad7 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>7</div>
            <img src='adimages/$ad7' style='width:100%;'>
        </div>";
      }
      if($ad8 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>8</div>
            <img src='adimages/$ad8' style='width:100%;'>
        </div>";
      }
      if($ad9 != null) {
      echo "<div class='mySlides fade'>
          <div class='numbertext'>9</div>
            <img src='adimages/$ad9' style='width:100%;'>
        </div>";
      }

      ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  <div style="text-align:center">
   <?php
   if($ad1 != null) { echo "<span class='dot' onclick='currentSlide(1)'></span>";}
   if($ad2 != null) { echo "<span class='dot' onclick='currentSlide(2)'></span>";}
   if($ad3 != null) { echo "<span class='dot' onclick='currentSlide(3)'></span>";}
   if($ad4 != null) { echo "<span class='dot' onclick='currentSlide(4)'></span>";}
   if($ad5 != null) { echo "<span class='dot' onclick='currentSlide(5)'></span>";}
   if($ad6 != null) { echo "<span class='dot' onclick='currentSlide(6)'></span>";}
   if($ad7 != null) { echo "<span class='dot' onclick='currentSlide(7)'></span>";}
   if($ad8 != null) { echo "<span class='dot' onclick='currentSlide(8)'></span>";}
   if($ad9 != null) { echo "<span class='dot' onclick='currentSlide(9)'></span>";}
   if($ad10 != null) { echo "<span class='dot' onclick='currentSlide(10)'></span>";}
   ?>
  </div>
</div>
  <div class="col-md-6 lacoste">
            <div class="boxy" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);padding-right: 25px; padding-left: 25px; background-color: #fff;border: solid 1px #e6e6e6;" >
              <div id="contactnumber"></div>
              <script type="text/javascript">
                document.getElementById("contactnumber").innerHTML = "<button onclick = 'myFunction()' class='phonebtn btn btn-danger' style='width: 100%; margin-top: 15px; margin-bottom: 15px;'> <i class='fa fa-phone'></i> Show phone number</button>";
                function myFunction(){
                  document.getElementById("contactnumber").innerHTML = "<button onclick = 'myFunction()' class='phonebtn btn btn-outline-danger' style='width: 100%; margin-top: 15px; margin-bottom: 15px;''><i class='fa fa-phone'></i> <?php echo $phone; ?></button>";
                }

              </script>
            </div><br>
            <div class="boxy" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);background-color: #fff;padding-right: 25px;padding-left: 25px; border: solid 1px #e6e6e6;" ><div id="locationbtn"></div></div>
              <div class="
                    <?php if($user_id == $ad_user_id)
                      {
                        echo 'invisible';
                      }
                    ?> mt-4 boxy" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); background-color: #fff;padding-right: 25px;padding-left: 25px; border: solid 1px #e6e6e6;" >
                  <a href="
                  <?php
                    if(!isset($_SESSION['logged']))
                    {
                      echo 'login';
                    }
                    else
                    {
                      ?>userpanel?client_id=<?php echo $ad_user_id; ?><?php
                    }
                  ?>" class="chatbtn btn btn-success" style="width: 100%; margin-top: 15px; margin-bottom: 15px;' "> <i class="popup-with-move-anim fa fa-comments" aria-hidden="true" style></i>  Chat</a>
              </div>
           </div>
       </div><!-- row end  -->
   </div>
   <div id="userlocation"></div>
    <script type="text/javascript">
      function userlocation(){
        document.getElementById("userlocation").innerHTML = "<section class='col-lg-12 col-md-12 col-sm-12 col-12' ><div id='location' class='lightbox-basic zoom-anim-dialog mfp-hide'><div class='container'><button title='Close (Esc)' type='button' onclick='userlocationclose()' style='font-size: 30px;' class='mfp-close x-button'>×</button><div class='col-lg-12'><div class='mapresponsive' style='margin-left: 10px;'><iframe class='mapbox' width='100%' height='230' src='https://maps.google.com/maps?q=<?php echo $latitude;?>,<?php echo $longitude;?>&hl=es&t=&z=14&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' ></iframe></div><style>.mapoute{position:relative;  text-align:right;height:220px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:332px;width:100%;}</style></div> <!-- end of col --></div> <!-- end of container --></div> <!-- end of lightbox-basic --></section>";
        document.getElementById("locationbtn").innerHTML = "<button href='#location' onclick='userlocation()' class='locationbtn btn btn-outline-primary' style='width: 100%; margin-top: 15px; margin-bottom: 15px;'> <i class='popup-with-move-anim fa fa-map-pin' aria-hidden='true' style=''></i>  Show Location</button>";
      }
      document.getElementById("locationbtn").innerHTML = "<button href='#location' onclick='userlocation()' class='locationbtn btn btn-primary' style='width: 100%; margin-top: 15px; margin-bottom: 15px;'> <i class='popup-with-move-anim fa fa-map-pin' aria-hidden='true' style=''></i>  Show Location</button>";
      function userlocationclose(){
        document.getElementById("userlocation").innerHTML = "";
        document.getElementById("locationbtn").innerHTML = "<button href='#location' onclick='userlocation()' class='locationbtn btn btn-primary' style='width: 100%; margin-top: 15px; margin-bottom: 15px;'> <i class='popup-with-move-anim fa fa-map-pin' aria-hidden='true' style=''></i>  Show Location</button>";
      }
    </script>
    <style type="text/css">
      .detailbox{
        background-color: #fff;
        border: solid 1px #e6e6e6;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
      }
    </style>
    <!-- end of details lightbox 1 -->
       <div class="col-md-12 mt-4">
        <div class="bg-white lala">
          <div class="container mt-4">
          <ul class="row rari justify-content-center">
              <div class="col-md-12">
                  <div class="row">
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Model Name</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-car"></i></center>
                        </div>
                        <center><?php echo $modelname; ?></center>
                      </div>
                    </div>
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Location</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-map-marker-alt"></i></center>
                        </div>
                        <center><?php echo $emirate ?></center>
                      </div>
                    </div>
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Model Year</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-calendar"></i></center>
                        </div>
                        <center><?php echo $year; ?></center>
                      </div>
                    </div>
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Kilometers</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-tachometer"></i></center>
                        </div>
                        <center><?php echo $km; ?></center>
                      </div>
                    </div>
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Specs</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-car"></i></center>
                        </div>
                        <center><?php echo $specs; ?></center>
                      </div>
                    </div>
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Transmission</center>
                        </div>
                        <div class="col-md-12">
                          <center><img src="images/transmissionpng.png"  height="30" width="30"
                               alt="Transmission"></center>
                        </div>
                        <center><?php echo $transmission; ?></center>
                      </div>
                    </div>
                    <!-- <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Body Type</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-car-side"></i></i></center>
                        </div>
                        <center><?php echo "SUV"; ?></center>
                      </div>
                    </div> -->
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Accident History</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-car-crash"></i></i></center>
                        </div>
                        <center><?php if($acc_hist == "No Accidents"){ echo "No";}if($acc_hist == "Small Accident(s)(parts affected <2)"){ echo "Few";}if($acc_hist == "Major Accident(s)(parts affected >2)"){ echo "Major";} ?></center>
                      </div>
                    </div>
                    <div class="mt-2 col-md-3 col-lg-3 col-5 col-sm-5">
                      <div class="detailbox">
                        <div class="col-md-12">
                          <center>Car Color</center>
                        </div>
                        <div class="col-md-12">
                          <center><i style="font-size: 25px;" class="fa fa-palette"></i></center>
                        </div>
                        <center><?php echo $car_color; ?></center>
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
             <div class="dividerb"></div>
             <div class="container"><br>
              <h7> <b>Description</b> </h7>
              <p> <?php echo $desc;?></p>
             </div>
             <div class="dividerb"></div>
             <div class="mt-3 container">
                 <div class="row">
                  <?php
                  for($i=0; $checkarr[$i]!=""; $i++){
                    echo "<div class='mb-3 col-md-4 col-lg-4 col-12 col-sm-12'>
                                          $checkarr[$i]
                                         <i class='details fa fa-check-circle' style='font-size: 18px; color: #7fbd71;'></i>
                                        </div>";
                                      }
                    ?>
                 </div>
             </div>
             <br>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
</div><br>
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

<!-- fOOTER ENDS -->

<div class="popup" id="popup-1">
  <div class="popupoverlay"></div>
  <div class="popupcontent">
    <div class="popupclose-btn" onclick="deletepopup()">&times;</div>
    <h3 class="col-md-12 col-lg-12 col-12 col-sm-12 mt-4">Are you sure you want to delete this Ad?</h3>
    <div class="col-md-12 col-lg-12 col-12 col-sm-12 ">
      <div class="mt-3">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <form method="post">
              <button name="deletead" class="btn btn-success">Yes</button>
            </form>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <button onclick="deletepopup()" class="btn btn-danger">NO</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.popup .popupoverlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
  z-index:1;
  display:none;
}

.popup .popupcontent {
  position: fixed;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:500px;
  height:250px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}
@media (max-width: 991px){
  .popup .popupcontent {
  width:300px;
  height:250px;
}

}

.popup .popupclose-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:15px;
  width:30px;
  height:32px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}

.popup.active .popupoverlay {
  display:block;
}

.popup.active .popupcontent {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}

@media()
</style>
<script>
  function deletepopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>

<?php
if(isset($_SESSION['logged'])){
  $user_id_copy = $_SESSION['user_id'];
  if($user_id_copy == $ad_user_id)
  {
      echo"<section class='col-md-12' style='margin-bottom: 90px; background-color: black !important; width: 100% !important;'>
          <div class='copyright'>
              <div class='container'>
                  <div class='row'>
                          <p class='m-auto cpytext' style='color: white;'>Copyright © 2020 Tujjari. All rights reserved.</p>
                     
                  </div> <!-- enf of row -->
              </div> <!-- end of container -->
          </div> <!-- end of copyright -->
      </section>
      <section class='fixed-bottom col-md-12' style='height: 90px; -webkit-box-shadow: 0px -2px 5px 0px rgba(0,0,0,0.31);
      -moz-box-shadow: 0px -2px 5px 0px rgba(0,0,0,0.31);
      box-shadow: 0px -2px 5px 0px rgba(0,0,0,0.31);background-color: white !important; width: 100% !important;'>
        <div class='copyright'>
            <div class='container'>
                <div class='row'>
                  <div class='ml-auto mt-4'>
                    <a href='editad.php?id=$ad_id' class='footerbtn btn btn-outline-dark' href='#'><i class='fa fa-pencil'></i> Edit Ad</a>
                    <button onclick='deletepopup()' class='footerbtn ml-5 btn btn-outline-dark'><i class='fa fa-trash'></i> Delete Ad</button>
                </div> <!-- enf of row -->
            </div> <!-- end of container -->
        </div> <!-- end of copyright -->
      </section>";
  }else{
    echo "<section class='col-md-12' style='background-color: black !important; width: 100% !important;'>
          <div class='copyright'>
              <div class='container'>
                  <div class='row'>
                          <p class='m-auto cpytext' style='color: white;'>Copyright © 2020 Tujjari. All rights reserved.</p>
                  </div> <!-- enf of row -->
              </div> <!-- end of container -->
          </div> <!-- end of copyright -->
      </section>";
  }
}else{
    echo "<section class='col-md-12' style='background-color: black !important; width: 100% !important;'>
          <div class='copyright'>
              <div class='container'>
                  <div class='row'>
                          <p class='m-auto cpytext' style='color: white;'>Copyright © 2020 Tujjari. All rights reserved.</p>
                  </div> <!-- enf of row -->
              </div> <!-- end of container -->
          </div> <!-- end of copyright -->
      </section>";
  }
?>
<script  type="text/javascript">
$(document).ready(function(){
 $('.slick').slick({
   fade:true,

 });
});
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
 showSlides(slideIndex += n);
}

function currentSlide(n) {
 showSlides(slideIndex = n);
}

function showSlides(n) {
 var i;
 var slides = document.getElementsByClassName("mySlides");
 var dots = document.getElementsByClassName("dot");
 if (n > slides.length) {slideIndex = 1}    
 if (n < 1) {slideIndex = slides.length}
 for (i = 0; i < slides.length; i++) {
     slides[i].style.display = "none";  
 }
 for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" slideractive", "");
 }
 slides[slideIndex-1].style.display = "block";  
 dots[slideIndex-1].className += " slideractive";
}
</script>
</body>
</html>

<?php
}else{echo '<script>window.open("car.php", "_self");</script>';}
if(isset($_POST['deletead'])){
  $delete = "delete from free_ad where id='$ad_id'";
  $run = mysqli_query($con, $delete);
  echo '<script>window.open("mylistings", "_self");</script>';
}
?>
