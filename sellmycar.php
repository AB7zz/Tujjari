<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<?php if(!isset($_SESSION['logged'])){echo '<script>window.open("login", "_self");</script>'; }else{ ?>
<!DOCTYPE html>
<html>
<head>
<title>Tujjari</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
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
<?php include 'navbar.php'; ?>

<!-- INSERT QUERY!! -->

<?php
if(isset($_POST['confirm'])){
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['customer_name'];
  $user_email = $_SESSION['customer_email'];
  $get_text1 = $_POST['title'];
   $_SESSION['ad_title'] = $get_text1;
  $get_optiony = $_POST['select1'];
  $get_optiony2 = $_POST['select2'];
  $get_option = $_POST['modelyear'];
  $get_option2 = $_POST['body_condition'];
  $get_option3 = $_POST['mechanical_condition'];
  $get_option4 = $_POST['transmission_type'];
  $get_option5 = $_POST['fuel_type'];
  $get_option6 = $_POST['car_color'];
  $get_text = $_POST['price'];
  $get_text2 = $_POST['warranty'];
  $get_text3 = $_POST['kilometer'];
  $get_option8 = $_POST['accident'];
  $get_text4 = $_POST['desc'];
  $specs = $_POST['specs'];


  foreach ($_FILES["image"]["error"] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
          $tmp_name = $_FILES["image"]["tmp_name"][$key];
          $name = $_FILES["image"]["name"][$key];
          move_uploaded_file($tmp_name, "adimages/$name");
          $images_name =$name.",".$images_name;
      }
  }
  $seperateimg = explode(',', $images_name);
  $get_checky = $_POST['check_list'];
  $chk="";  

  foreach($get_checky as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

 $sql = $con->prepare("INSERT into free_ad(user_id, user_name, user_email,title,timenow,car_brand,car_model,model_year,body_condition,mechanical_condition,transmission_type,fuel_type,car_color,price,warranty,km,specs,accident_hist,desci,check1) values
     (?,?,?,?,(CURDATE()),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $sql->bind_param("isssssssssssisissss",$user_id,$user_name,$user_email,$get_text1,$get_optiony,$get_optiony2,$get_option,$get_option2,$get_option3,$get_option4,$get_option5,$get_option6,$get_text,$get_text2,$get_text3,$specs,$get_option8,$get_text4,$chk);
  $sql->execute();
  // FOR IMAGES
  $sql = $con->prepare("UPDATE free_ad set ad_img1=? where title=?");
      $sql->bind_param("ss",$seperateimg[0],$get_text1);
  $sql->execute();
;
  $sql = $con->prepare("UPDATE free_ad set ad_img2=? where title=?");
      $sql->bind_param("ss",$seperateimg[1],$get_text1);
  $sql->execute();

  $sql = $con->prepare("UPDATE free_ad set ad_img3=? where title=?");
      $sql->bind_param("ss",$seperateimg[2],$get_text1);
  $sql->execute();

  $sql = $con->prepare("UPDATE free_ad set ad_img4=? where title=?");
      $sql->bind_param("ss",$seperateimg[3],$get_text1);
  $sql->execute();
  $sql = $con->prepare("UPDATE free_ad set ad_img5=? where title=?");
      $sql->bind_param("ss",$seperateimg[4],$get_text1);
  $sql->execute();

  $sql = $con->prepare("UPDATE free_ad set ad_img6=? where title=?");
      $sql->bind_param("ss",$seperateimg[5],$get_text1);
  $sql->execute();

  $sql = $con->prepare("UPDATE free_ad set ad_img7=? where title=?");
      $sql->bind_param("ss",$seperateimg[6],$get_text1);
  $sql->execute();

  $sql = $con->prepare("UPDATE free_ad set ad_img8=? where title=?");
      $sql->bind_param("ss",$seperateimg[7],$get_text1);
  $sql->execute();

  $sql = $con->prepare("UPDATE free_ad set ad_img9=? where title=?");
      $sql->bind_param("ss",$seperateimg[8],$get_text1);
  $sql->execute();

  $sql = $con->prepare("UPDATE free_ad set ad_img10=? where title=?");
      $sql->bind_param("ss",$seperateimg[9],$get_text1);
  $sql->execute();
   echo "<script>window.open('contactinformation', '_self')</script>";



}
?>



<!-- INSERT QUERY ENDS -->

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


<br><br><br><br><br>




<div class="coolnav container">
<div class="row yolo">
<div class="m-auto">
<div class="row">
<p class="smaul1"><i style="color: lightblue;" class="fa fa-check"></i> Car Details</p>
<p class="smaul2"><i style="color: lightgrey;" class="fa fa-check"></i> Contact Information</p>
<p class="smaul3"  ><i style="color: lightgrey;" class="fa fa-check"></i> Ad Posted</p>
</div>
</div></div>
<br><br><br>



<style>

@media only screen and (min-width: 768px) {
.lamer{
margin-left: 950px;
margin-bottom: 15px;
}
}
@media only screen and (max-width: 768px) {
.lamer{
margin-left: 250px;
}
}

</style>

<div class="boxer"><br>
<form method="post"enctype="multipart/form-data">
<div class="container">
<button class="btn lamer" style="color: blue;" type="reset">Clear</button>
<input required type="text" name="title" placeholder="Title" class="form-control"><br>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<label>Enter Car Brand</label>
<select required name="select1" id="select1" style="border-radius: 0px; width: 100%;" class="form-control " >
  <option></option>
  <?php
    $select = "SELECT * FROM `car_brand` order by brand_name ASC";
    $run = mysqli_query($con, $select);
    while($row = mysqli_fetch_array($run)){
      $brand_id = $row['brand_id'];
      $brand_name = $row['brand_name'];
      echo "<option value='$brand_id'>$brand_name</option>";
    }
  ?>
</select>

<br>
<label>Enter Car Model</label>
<select required name="select2" id="select2" style="border-radius: 0px; width: 100%;" class="form-control " >
  <option></option>
  <?php
    $select = "SELECT * FROM `car_model` order by model_name ASC";
    $run = mysqli_query($con, $select);
    while($row = mysqli_fetch_array($run))
    {
      $model_name = $row['model_name'];
      $brand_id = $row['brand_id'];
      echo "<option class='$brand_id'>$model_name</option>";
    }
  ?>
</select><br>
<script type="text/javascript">
$("#select1").change(function() {
  if ($(this).data('options') === undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select2 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[class=' + id + ']');
  $('#select2').html(options);
});
</script>
<label>Model Year <span style="color: red;">&#42;</span></label>
<select required style="border-radius: 0px; " style="border-top: none !important;" class="form-control" name="modelyear" value="Choose Model">
<option></option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>
<label>Body Condition</label>
<select required style="border-radius: 0px; width: 100%;" class="form-control " name="body_condition" value="Choose Body Condition">
<option></option>
<option>Perfect(no damage/scratches)</option>
<option>Few Scratches(no accident)</option>
<option>Wear and tear(repaired)</option>
<option>Lots of wear and tear</option>
</select>
<label>Mechanical Condition</label>
<select required style="border-radius: 0px; width: 100%;" class="form-control " name="mechanical_condition" value="Choose Mechanical Condition">
<option></option>
<option>Perfect(no damage)</option>
<option>Few Faults(repaired)</option>
<option>Plenty Faults(repaired)</option>
<option>Major Faults fixed(small remaining)</option>
<option>Ongoing Faults</option>
</select>
<label>Transmission Type <span style="color: red;">&#42;</span></label>
<select required style="border-radius: 0px; width: 100%;" class="form-control " name="transmission_type" value="Choose Transmission Type">
<option></option>
<option>Automatic</option>
<option>Manual</option>
</select>
<label>Fuel Type<span style="color: red;">&#42;</span></label>
<select required style="border-radius: 0px; width: 100%;" class="form-control " name="fuel_type" value="Fuely">
<option></option>
<option>Gasoline</option>
<option>Electric</option>
<option>Diesel</option>
<option>Hybrid</option>
</select>
<label>Select Car Color</label>
<select required style="border-radius: 0px;" class="form-control" name="car_color" value="Choose car color" >
<option></option>
<option>Black</option>
<option>White</option>
<option>Red</option>
<option>Blue</option>
<option>Yellow</option>
<option>Gray</option>
</select><br>
<label>Price <span style="color: red;">&#42;</span></label>
<input required type="text"  name="price" placeholder="Enter Price"><br>
<label>Warranty Date</label>
<input required type="date" name="warranty"><br>
<label>Kilometers <span style="color: red;">&#42;</span></label>
<input required type="number" name="kilometer" placeholder= "Kilometers driven?"><br>
<label>Accident History</label>
<select required style="border-radius: 0px;" class="form-control mr-sm-2 mb-3" name="accident" value="Choose Model" style="">
<option></option>
<option>No Accidents</option>
<option>Small Accident(s)(parts affected <2)</option>
<option>Major Accident(s)(parts affected >2)</option>
</select>
<label>Regional Specs</label>
<select required style="border-radius: 0px;" class="form-control mr-sm-2 mb-3" name="specs" value="Choose Specs" style="">
<option></option>
<option>Japanese Specs</option>
<option>American Specs</option>
<option>Canadian</option>
<option>Not Sure</option>
<option>Other</option>
</select>


<style type="text/css">
  .checky{
    background-color: #fff;
  border: solid 1px #e6e6e6;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);

  }
  @media only screen and (min-width: 768px) {
    .raina{
      padding-left: 60px;
    }
    .raina2{
      padding-left: 60px;
    }
    .raina3{
      padding-left: 60px;
    }
   .mamacita{
      display: none !important;
    }

  }
  @media only screen and (max-width: 768px) {
    #more {display: none;}
  }

</style>
<script type="text/javascript">

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerText = "View more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerText = "View less";
    moreText.style.display = "inline";
  }

}
</script>
<div class="mamacita">
<button onclick="myFunction()" id="myBtn" class="btn" type="button" style="margin-left: 210px;" >View more</button></div>
      <div data-required="False" dataty class="checky container" >
        <ul class="list-unstyled">
<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox" name="check_list[]" value="4 Wheel Drive"> 4 Wheel Drive</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Cruise Control"> Cruise Control</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Keyless Start"> Keyless Start</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Spoiler"> Spoiler</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Power Mirrors"> Power Mirrors</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="CD Players"> CD Player</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Rear Wheel Drive"> Rear Wheel Drive</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Sunroof"> Sunroof</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Heated Seats"> Heated Seats</label></li>
</div>
<span id="dots"></span>
<span id="more">
<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="All Wheel Steering"> All Wheel Steering</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Front Wheel Drive"
> Front Wheel Drive </label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]"value="Climate Control"> Climate Control</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Bluetooth System"> Bluetooth System</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Parking Sensors"> Parking Sensors</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Rear View Camera"> Rear View Camera</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Cooled Seats"> Cooled Seats</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Dual Exhaust"> Dual Exhaust</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Anti Theft System"> Anti Theft System</label></li>
</div>

</span>
</ul>
      </div>
<br>
<input required id='buttonid' type='button' value='Upload Images' class="btn" style="width: 100%; color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%);" />
<input required id="file-input" type="file" name="image[]" multiple hidden="">
<div id="preview"></div>
<script type="text/javascript">
document.getElementById('buttonid').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input').click();
}

function previewImages() {

  var preview = document.querySelector('#preview');
 
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
   
    var reader = new FileReader();
   
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 200;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
   
    reader.readAsDataURL(file);
   
  }

}

document.querySelector('#file-input').addEventListener("change", previewImages);
</script>
<label>Description</label>
  <input required style="height: 130px;" class="form-control" type="text" id="exampleFormControlTextarea3" name="desc"></input>


<style type="text/css">
 

</style>

<br>
<center>
<button href="contactinformation" class="btn btn-primary" type="btn" name="confirm">Confirm</button></form>
</center>
<br><br>
</div>
</div>
</div></div>
</body>



<br><br>


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