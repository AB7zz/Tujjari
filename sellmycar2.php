<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<?php if($_SESSION['logged'] != 1){
  echo '<script>window.open("login", "_self");</script>';
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<title>Tujjari</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  <div class="coolnav container">
    <div class="row yolo">
      <div class="m-auto">
        <div class="row">
          <p class="smaul1"><i style="color: green;" class="fa fa-check"></i> Car Details</p>
          <p class="smaul2"><i style="color: lightblue;" class="fa fa-check"></i> Contact Information</p>
          <p class="smaul3"  ><i style="color: lightgrey;" class="fa fa-check"></i> Ad Posted</p>
        </div>
      </div>
    </div>
    <br><br><br>
    <!-- <div class="boxer"><br>
      <div class="container">
        <form method="post">
          <div class="row">
            <label class="ml-4">Enter Emirate</label>
            <select style="border-radius: 0px; width: 40%; " class=" form-control loca" name="emirate">
              <option></option>
              <option>Dubai</option>
              <option>Abu Dhabi</option>
              <option>Umm Al Quain</option>
              <option>Ras Al Khaimah</option>
              <option>Sharjah</option>
              <option>Ajman</option>
              <option>Fujairah</option>
            </select>
            <br><br><br>
          </div>
          <div class="row">
            <label class="ml-4">Enter Contact Number</label>
            <input class="m-auto form-control locu" type="text" name="phone">
          </div><br>
        </form>
        </div>
    </div> -->
    <div id="map" ></div>
    <br>
    <form method="post">
      <div class="boxer"><br>
        <div class="container">
          <div class="row">
            <label class="ml-4">Enter Emirate</label>
            <select required style="border-radius: 0px; width: 40%; " class=" form-control loca" name="emirate">
              <option></option>
              <option>Dubai</option>
              <option>Abu Dhabi</option>
              <option>Umm Al Quain</option>
              <option>Ras Al Khaimah</option>
              <option>Sharjah</option>
              <option>Ajman</option>
              <option>Fujairah</option>
            </select>
            <br><br><br>
          </div>
          <div class="row">
            <label class="ml-4">Enter Contact Number</label>
            <input required class="m-auto form-control locu" type="text" name="phone">
          </div><br>
        </div>
      </div>
      <input class="invisible" id="latitude" name="latitude" type="text" value="">
      <input class="invisible" id="longitude" name="longitude" type="text" value="">
      <center>
        <button name="confirm" id="confirmPosition" class="btn btn-secondary">Confirm Position</button>
      </center>
    </form>
    <br><br>
  </div>
  <br><br>
  <script>
    // Initialize locationPicker plugin
    var lp = new locationPicker('map', {
      setCurrentPosition: true, // You can omit this, defaults to true
    }, {
      zoom: 15 // You can set any google map options here, zoom defaults to 15
    });
    // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
    google.maps.event.addListener(lp.map, 'idle', function (event) {
      // Get current location and show it in HTML
      var location = lp.getMarkerPosition();
      document.getElementById("latitude").value = location.lat;
      document.getElementById("longitude").value = location.lng;
    });
  </script>

  <script>
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
</body>
<style type="text/css">
  @media only screen and (max-width: 600px) {
 .locu{
  width: 40%;
 }
 .loca
 {
  margin-left: 75px;
 }
 .locus{
  margin-left: 31px;
 }
  }
@media only screen and (min-width: 768px) {
  .locu,.loca{
    margin-left: 306px;
  }
  .locu{
    width: 40%;
  }
  .locus{
    margin-left: 262px !important;
    width: 40%;
  }
}
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

<?php
if(isset($_POST['confirm'])){
  if((isset($_SESSION['ad_title'])) && (isset($_SESSION['user_id']))){
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $ad_title_copy = $_SESSION['ad_title'];
    $user_id_copy = $_SESSION['user_id'];
    $vin_copy = $_SESSION['vin'];
    $emirate = $_POST['emirate'];
    $phone = $_POST['phone'];
    $sql = $con->prepare("UPDATE free_ad set emirate =?, phone = ?, latitude = ?, longitude = ? where title = ? and user_id = ? ");
      $sql->bind_param("siddsi",$emirate,$phone,$latitude,$longitude,$ad_title_copy,$user_id_copy);
  $sql->execute();
    if($sql){
      $_SESSION['ad_title'] = 0;
    }
    echo '<script>window.open("adposted", "_self");</script>';
  }
}
?>
<?php
}
?>