<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<?php if(!isset($_SESSION['logged']))
    {
        echo '<script>window.open("login.php", "_self");</script>';
    }
    else if(isset($_GET['id']))
    {
            $ad_id = $_GET['id'];
            $_SESSION['ad_id'] = $ad_id;
            $select = "select * from free_ad where id = '$ad_id'";
            $run = mysqli_query($con, $select);
            $fetch = mysqli_fetch_array($run);
            $user_id = $fetch['user_id'];
            $user_id_check = $_SESSION['user_id'];
            if($user_id == $user_id_check){
                $title = $fetch['title'];
                $car_brand_id = $fetch['car_brand'];
                $select_car = "select * from car_brand where brand_id = '$car_brand_id'";
                $run_car = mysqli_query($con, $select_car);
                $fetch_car = mysqli_fetch_array($run_car);
                $car_brand = $fetch_car['brand_name'];
                $car_model = $fetch['car_model'];
                $model_year = $fetch['model_year'];
                $body_condition = $fetch['body_condition'];
                $mech_condition = $fetch['mechanical_condition'];
                $trans_type = $fetch['transmission_type'];
                $fuel_type = $fetch['fuel_type'];
                $car_color = $fetch['car_color'];
                $price = $fetch['price'];
                $warranty = $fetch['warranty'];
                $km = $fetch['km'];
                $specs = $fetch['specs'];
                $accident_hist = $fetch['accident_hist'];
                $desc = $fetch['desci'];
                $check = $fetch['check1'];
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
                $checkarr = explode(',', $check);
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Tujjari</title>
<link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
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
if(isset($_POST['confirm']))
{
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
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['customer_name'];
  $user_email = $_SESSION['customer_email'];

  foreach ($_FILES["image"]["error"] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
          $tmp_name = $_FILES["image"]["tmp_name"][$key];
          $name = $_FILES["image"]["name"][$key];
          move_uploaded_file($tmp_name, "adimages/$name");
          $images_name =$name.",".$images_name;
      }
  }
  //Im seperating the new images added
  $seperateimg = explode(",", $images_name);
  //so here im checking if the First image is blank. IF it IS blank, then that means the rest of the images are also blank coz images are inserted in order from ad_img1 to ad_img10. So im replacing each of them with the newly inserted images ($seperateimg[blahblah])
  if($ad1==""){
    $sql = $con->prepare("UPDATE free_ad set ad_img1=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img2=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img3=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img4=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[3]);
    $sql->execute();
   
    $sql = $con->prepare("UPDATE free_ad set ad_img5=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[4]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img6=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[5]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img7=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[6]);
    $sql->execute();  

    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[7]);
    $sql->execute();  

    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[8]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[9]);
    $sql->execute();  
  }
  //Same goes here...Im checking if the second image is blank. IF it IS blank, then that means the rest of the images are also blank sooo yea
  else if($ad2==""){
    $sql = $con->prepare("UPDATE free_ad set ad_img2=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img3=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img4=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img5=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[3]);
    $sql->execute();
   
    $sql = $con->prepare("UPDATE free_ad set ad_img6=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[4]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img7=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[5]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[6]);
    $sql->execute();  

    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[7]);
    $sql->execute();  

    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[8]);
    $sql->execute();

  }
  //I dont need to explain again
  else if($ad3==""){

   $sql = $con->prepare("UPDATE free_ad set ad_img3=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img4=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img5=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img6=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[3]);
    $sql->execute();
   
    $sql = $con->prepare("UPDATE free_ad set ad_img7=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[4]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[5]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[6]);
    $sql->execute();  

    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[7]);
    $sql->execute();  

  }
  //OK, so if you're wondering, why im putting ad_img4 = '$seperateimg[0]. WHY 0!?', it's coz when a user inserts an image, the first image is stored as $seperateimg[0]...you should try putting $seperateimg[10] and see what happens. Its kinda hard to explain...
  else if($ad4==""){
    $sql = $con->prepare("UPDATE free_ad set ad_img4=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img5=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img6=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img7=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[3]);
    $sql->execute();
   
    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[4]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[5]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[6]);
    $sql->execute();  

  }
  //OK, so if you're wondering, why im putting ad_img5 = '$seperateimg[0]. WHY 0!?', it's coz when a user inserts an image, the first image is stored as $seperateimg[0]...you should try putting $seperateimg[10] and see what happens. Its kinda hard to explain...
  else if($ad5==""){

    $sql = $con->prepare("UPDATE free_ad set ad_img5=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img6=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img7=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[3]);
    $sql->execute();
   
    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[4]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[5]);
    $sql->execute();

  }
  //OK, so if you're wondering, why im putting ad_img6 = '$seperateimg[0]. WHY 0!?', it's coz when a user inserts an image, the first image is stored as $seperateimg[0]...you should try putting $seperateimg[10] and see what happens. Its kinda hard to explain...
  else if($ad6==""){
    $sql = $con->prepare("UPDATE free_ad set ad_img6=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img7=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[3]);
    $sql->execute();
   
    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[4]);
    $sql->execute();

  }
  //OK, so if you're wondering, why im putting ad_img7 = '$seperateimg[0]. WHY 0!?', it's coz when a user inserts an image, the first image is stored as $seperateimg[0]...you should try putting $seperateimg[10] and see what happens. Its kinda hard to explain...
  else if($ad7==""){
    $sql = $con->prepare("UPDATE free_ad set ad_img7=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[3]);
    $sql->execute();
   
  }
  //OK, so if you're wondering, why im putting ad_img8 = '$seperateimg[0]. WHY 0!?', it's coz when a user inserts an image, the first image is stored as $seperateimg[0]...you should try putting $seperateimg[10] and see what happens. Its kinda hard to explain...
  else if($ad8==""){
    $sql = $con->prepare("UPDATE free_ad set ad_img8=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();

    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[2]);
    $sql->execute();

  }
  //OK, so if you're wondering, why im putting ad_img9 = '$seperateimg[0]. WHY 0!?', it's coz when a user inserts an image, the first image is stored as $seperateimg[0]...you should try putting $seperateimg[10] and see what happens. Its kinda hard to explain...
  else if($ad9==""){

   $sql = $con->prepare("UPDATE free_ad set ad_img9=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();


    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[1]);
    $sql->execute();
  }
  //Thats it. OK, so if you're wondering, why im putting ad_img10 = '$seperateimg[0]. WHY 0!?', it's coz when a user inserts an image, the first image is stored as $seperateimg[0]...you should try putting $seperateimg[10] and see what happens. Its kinda hard to explain...
  else if($ad10==""){
    $sql = $con->prepare("UPDATE free_ad set ad_img10=? where id='$ad_id'");
      $sql->bind_param("s",$seperateimg[0]);
    $sql->execute();
  }



  $get_checky = $_POST['check_list'];
  $chk="";  

  foreach($get_checky as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

 $sql = $con->prepare("UPDATE free_ad set title = ?,timenow = (CURDATE()),car_brand = ?,car_model = ?,model_year = ?,body_condition = ?,mechanical_condition = ?,transmission_type = ?,fuel_type = ?,car_color = ? ,price = ?,warranty = ?,km = ?,specs = ?,accident_hist = ?,desci = ?,check1 =? where id = '$ad_id' ");
      $sql->bind_param("sssssssssisissss",$get_text1,$get_optiony,$get_optiony2,$get_option,$get_option2,$get_option3,$get_option4,$get_option5,$get_option6,$get_text,$get_text2,$get_text3,$specs,$get_option8,$get_text4,$chk);
  $sql->execute();
  echo "<script>window.open('editad2.php' ,'_self')</script>";
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
<button class="btn btn-outline-primary lamer" type="reset">Clear</button>
<input value="<?php echo $title; ?>" type="text" name="title" placeholder="Title" class="form-control"><br>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<label>Enter Car Brand</label>
<select name="select1" id="select1" style="border-radius: 0px; width: 100%;" class="form-control " >
  <option value="<?php echo $car_brand_id;?>"><?php echo $car_brand; ?></option>
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
<select name="select2" id="select2" style="border-radius: 0px; width: 100%;" class="form-control " >
  <option><?php echo $car_model; ?></option>
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
<select style="border-radius: 0px; " style="border-top: none !important;" class="form-control" name="modelyear" value="Choose Model">
<option><?php echo $model_year; ?></option>
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
<select style="border-radius: 0px; width: 100%;" class="form-control " name="body_condition" value="Choose Body Condition">
<option><?php echo $body_condition; ?></option>
<option>Perfect(no damage/scratches)</option>
<option>Few Scratches(no accident)</option>
<option>Wear and tear(repaired)</option>
<option>Lots of wear and tear</option>
</select>
<label>Mechanical Condition</label>
<select style="border-radius: 0px; width: 100%;" class="form-control " name="mechanical_condition" value="Choose Mechanical Condition">
<option><?php echo $mech_condition; ?></option>
<option>Perfect(no damage)</option>
<option>Few Faults(repaired)</option>
<option>Plenty Faults(repaired)</option>
<option>Major Faults fixed(small remaining)</option>
<option>Ongoing Faults</option>
</select>
<label>Transmission Type <span style="color: red;">&#42;</span></label>
<select style="border-radius: 0px; width: 100%;" class="form-control " name="transmission_type" value="Choose Transmission Type">
<option><?php echo $trans_type; ?></option>
<option>Automatic</option>
<option>Manual</option>
</select>
<label>Fuel Type<span style="color: red;">&#42;</span></label>
<select style="border-radius: 0px; width: 100%;" class="form-control " name="fuel_type" value="Fuely">
<option><?php echo $fuel_type; ?></option>
<option>Gasoline</option>
<option>Electric</option>
<option>Diesel</option>
<option>Hybrid</option>
</select>
<label>Select Car Color</label>
<select style="border-radius: 0px;" class="form-control" name="car_color" value="Choose car color" >
<option><?php echo $car_color; ?></option>
<option>Black</option>
<option>White</option>
<option>Red</option>
<option>Blue</option>
<option>Yellow</option>
<option>Gray</option>
</select><br>
<label>Price <span style="color: red;">&#42;</span></label>
<input type="text"  value="<?php echo $price; ?>" name="price" placeholder="Enter Price"><br>
<label>Warranty Date</label>
<input type="date" value="<?php echo $warranty; ?>" name="warranty"><br>
<label>Kilometers <span style="color: red;">&#42;</span></label>
<input type="number" value="<?php echo $km; ?>" name="kilometer" placeholder= "Kilometers driven?"><br>
<label>Accident History</label>
<select style="border-radius: 0px;" class="form-control mr-sm-2 mb-3" name="accident" value="Choose Model" style="">
<option><?php echo $accident_hist; ?></option>
<option>No Accidents</option>
<option>Small Accident(s)(parts affected <2)</option>
<option>Major Accident(s)(parts affected >2)</option>
</select>
<label>Regional Specs</label>
<select style="border-radius: 0px;" class="form-control mr-sm-2 mb-3" name="specs" value="Choose Specs" style="">
<option><?php echo $specs; ?></option>
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
    btnText.innerHTML = "View more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "View less";
    moreText.style.display = "inline";
  }

}
</script>
<div class="mamacita">
<button onclick="myFunction()" id="myBtn" class="btn" type="button" style="margin-left: 210px;" >View more</button></div>
      <div data-required="False" dataty class="checky container" >
        <ul class="list-unstyled">
<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox" name="check_list[]" value="4 Wheel Drive" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "4 Wheel Drive"){echo "checked";} } ?>> 4 Wheel Drive</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Cruise Control" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Cruise Control"){echo "checked";} } ?>> Cruise Control</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Keyless Start" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Keyless Start"){echo "checked";} } ?>> Keyless Start</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Spoiler" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Spoiler"){echo "checked";} } ?>> Spoiler</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Power Mirrors" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Power Mirrors"){echo "checked";} } ?>> Power Mirrors</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="CD Players" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "CD Players"){echo "checked";} } ?>> CD Player</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Rear Wheel Drive" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Rear Wheel Drive"){echo "checked";} } ?>> Rear Wheel Drive</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Sunroof" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Sunroof"){echo "checked";} } ?>> Sunroof</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Heated Seats" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Heated Seats"){echo "checked";} } ?>> Heated Seats</label></li>
</div>
<span id="dots"></span>
<span id="more">
<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="All Wheel Steering" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "All Wheel Steering"){echo "checked";} } ?>> All Wheel Steering</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Front Wheel Drive"
 <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Front Wheel Drive"){echo "checked";} } ?>> Front Wheel Drive </label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]"value="Climate Control" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Climate Control"){echo "checked";} } ?>> Climate Control</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Bluetooth System" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Bluetooth System"){echo "checked";} } ?>> Bluetooth System</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Parking Sensors" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Parking Sensors"){echo "checked";} } ?>> Parking Sensors</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Rear View Camera" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Rear View Camera"){echo "checked";} } ?>> Rear View Camera</label></li>
</div>

<div class="row">
<li class="col-md-4 raina"><label><input type="checkbox"name="check_list[]" value="Cooled Seats" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Cooled Seats"){echo "checked";} } ?>> Cooled Seats</label></li>
<li class="col-md-4 raina2"><label><input type="checkbox"name="check_list[]" value="Dual Exhaust" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Dual Exhaust"){echo "checked";} } ?>> Dual Exhaust</label></li>
<li class="col-md-4 raina3"><label><input type="checkbox"name="check_list[]" value="Anti Theft System" <?php for($i=0; $checkarr[$i]!=""; $i++){ if($checkarr[$i] == "Anti Theft System"){echo "checked";} } ?>> Anti Theft System</label></li>
</div>

</span>
</ul>
      </div>
<br>
<input id='buttonid' type='button' value='Upload Images' class="btn" style="width: 100%; color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%);" />
<input id="file-input" type="file" name="image[]" multiple hidden="">
<div class="container">
  <div class="row">
    <div class="col-md-4">
  <?php
   if($ad1 != null) {
      echo "
     <form method='post'>
       <div class='img-wrap'>
       <button name='abbas' style='font-size: 40px;' style='font-size: 40px;' class='close'>&times;</button><ul>
      <img src='adimages/$ad1' style='width:260px; height: 300px;'></div></form>
       " ;}
       ?>
 </div>
  <div class="col-md-4">
  <?php
 if($ad2 != null) {
    echo "
    <form method='post'>
   <div class='img-wrap'>
     <button name='abbas2' style='font-size: 40px;' class='close'>&times;</button><ul>
    <img src='adimages/$ad2' style='width:260px;  height: 300px;'></div></form>
     " ;}
     ?> </div>
 <div class="col-md-4">
  <?php
 if($ad3 != null) {
    echo "
    <form method='post'>
    <div class='img-wrap'>
     <button name='abbas3' style='font-size: 40px;' class='close'>&times;</button>
   <ul> <img src='adimages/$ad3' style='height: 300px; width:260px;'></div></form>
     " ;}
     ?> </div>

 <div class="col-md-4">
  <?php

   if($ad4 != null) {
      echo "
     <form method='post'>
       <div class='img-wrap'>
       <button name='abbas4' style='font-size: 40px;' class='close'>&times;</button><ul>
      <img  src='adimages/$ad4' style='width:260px; height: 300px;'></div></form>
       ";}
       ?>
 </div>
  <div class="col-md-4">
    <?php
   if($ad5 != null) {
      echo "
      <form method='post'>
     <div class='img-wrap'>
       <button name='abbas5' style='font-size: 40px;' class='close'>&times;</button><ul>
      <img src='adimages/$ad5' style='width:260px;  height: 300px;'></div></form>
       " ;}
       ?>
   </div>
 <div class="col-md-4">
  <?php
 if($ad6 != null) {
    echo "
    <form method='post'>
    <div class='img-wrap'>
     <button name='abbas6' style='font-size: 40px;' class='close'>&times;</button>
   <ul> <img src='adimages/$ad6' style='height: 300px; width:260px;'></div></form>
     " ;}
     ?> </div>
 <div class="col-md-4">
 
<?php

 if($ad7 != null) {
    echo "
   <form method='post'>
     <div class='img-wrap'>
     <button name='abbas7' style='font-size: 40px;' class='close'>&times;</button><ul>
    <img  src='adimages/$ad7' style='width:260px; height: 300px;'></div></form>
     " ;}
     ?>
 </div>
  <div class="col-md-4">
  <?php
 if($ad8 != null) {
    echo "
    <form method='post'>
   <div class='img-wrap'>
     <button name='abbas8' style='font-size: 40px;' class='close'>&times;</button><ul>
    <img src='adimages/$ad8' style='width:260px;  height: 300px;'></div></form>
     " ;}
     ?> </div>
 <div class="col-md-4">
  <?php
 if($ad9 != null) {
    echo "
    <form method='post'>
    <div class='img-wrap'>
     <button name='abbas9' style='font-size: 40px;' class='close'>&times;</button>
   <ul> <img src='adimages/$ad9' style='height: 300px; width:260px;'></div></form>
     " ;}
     ?>
   </div>
   <div class="col-md-4">
  <?php
 if($ad10 != null) {
    echo "
    <form method='post'>
    <div class='img-wrap'>
     <button name='abbas10' style='font-size: 40px;' class='close'>&times;</button>
   <ul> <img src='adimages/$ad10' style='height: 300px; width:260px;'></div></form>
     " ;}
     ?>
   </div>
   </div><br>
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
      image.height = 300;
      image.width = 260;
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
  <input value="<?php echo $desc; ?>" style="height: 130px;" class="form-control" type="text" id="exampleFormControlTextarea3" name="desc"></input><br><br>
<center>
  <a href="viewdetails.php?id=<?php echo $ad_id; ?>" class="mr-5 btn btn-primary" type="btn">Cancel</a>
<button class="btn btn-primary" type="btn" name="confirm">Confirm</button>
</center></form><br><br>

<script type="text/javascript">


document.getElementById('buttonid2').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input2').click();
}
document.getElementById('buttonid3').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input3').click();
}
document.getElementById('buttonid4').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input4').click();
}
document.getElementById('buttonid5').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input5').click();
}

document.getElementById('buttonid6').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input6').click();
}
document.getElementById('buttonid7').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input7').click();
}

document.getElementById('buttonid8').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input8').click();
}
document.getElementById('buttonid9').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('file-input9').click();
}

</script>
 
<?php
//Okay HERE, once the first image is deleted, there was always a blank left in the first image coz obviously there is no image...So to fill it, I have to move all image backwards. Meaning, Ive to put the second image as first, third as second, etc etc. So the code for all of that is below..
//START
if (isset($_POST['abbas'])) {
 $insert_query1 = "UPDATE free_ad SET ad_img1 = '$ad2' where id='$ad_id'";
 $insert_query2 = "UPDATE free_ad SET ad_img2 = '$ad3' where id='$ad_id'";
 $insert_query3 = "UPDATE free_ad SET ad_img3 = '$ad4' where id='$ad_id'";
 $insert_query4 = "UPDATE free_ad SET ad_img4 = '$ad5' where id='$ad_id'";
 $insert_query5 = "UPDATE free_ad SET ad_img5 = '$ad6' where id='$ad_id'";
 $insert_query6 = "UPDATE free_ad SET ad_img6 = '$ad7' where id='$ad_id'";
 $insert_query7 = "UPDATE free_ad SET ad_img7 = '$ad8' where id='$ad_id'";
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query1 = mysqli_query($con,$insert_query1);
 $run_insert_query2 = mysqli_query($con,$insert_query2);
 $run_insert_query3 = mysqli_query($con,$insert_query3);
 $run_insert_query4 = mysqli_query($con,$insert_query4);
 $run_insert_query5 = mysqli_query($con,$insert_query5);
 $run_insert_query6 = mysqli_query($con,$insert_query6);
 $run_insert_query7 = mysqli_query($con,$insert_query7);
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas2'])) {
 $insert_query2 = "UPDATE free_ad SET ad_img2 = '$ad3' where id='$ad_id'";
 $insert_query3 = "UPDATE free_ad SET ad_img3 = '$ad4' where id='$ad_id'";
 $insert_query4 = "UPDATE free_ad SET ad_img4 = '$ad5' where id='$ad_id'";
 $insert_query5 = "UPDATE free_ad SET ad_img5 = '$ad6' where id='$ad_id'";
 $insert_query6 = "UPDATE free_ad SET ad_img6 = '$ad7' where id='$ad_id'";
 $insert_query7 = "UPDATE free_ad SET ad_img7 = '$ad8' where id='$ad_id'";
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query2 = mysqli_query($con,$insert_query2);
 $run_insert_query3 = mysqli_query($con,$insert_query3);
 $run_insert_query4 = mysqli_query($con,$insert_query4);
 $run_insert_query5 = mysqli_query($con,$insert_query5);
 $run_insert_query6 = mysqli_query($con,$insert_query6);
 $run_insert_query7 = mysqli_query($con,$insert_query7);
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}

if (isset($_POST['abbas3'])) {
 $insert_query3 = "UPDATE free_ad SET ad_img3 = '$ad4' where id='$ad_id'";
 $insert_query4 = "UPDATE free_ad SET ad_img4 = '$ad5' where id='$ad_id'";
 $insert_query5 = "UPDATE free_ad SET ad_img5 = '$ad6' where id='$ad_id'";
 $insert_query6 = "UPDATE free_ad SET ad_img6 = '$ad7' where id='$ad_id'";
 $insert_query7 = "UPDATE free_ad SET ad_img7 = '$ad8' where id='$ad_id'";
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query3 = mysqli_query($con,$insert_query3);
 $run_insert_query4 = mysqli_query($con,$insert_query4);
 $run_insert_query5 = mysqli_query($con,$insert_query5);
 $run_insert_query6 = mysqli_query($con,$insert_query6);
 $run_insert_query7 = mysqli_query($con,$insert_query7);
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas4'])) {
 $insert_query4 = "UPDATE free_ad SET ad_img4 = '$ad5' where id='$ad_id'";
 $insert_query5 = "UPDATE free_ad SET ad_img5 = '$ad6' where id='$ad_id'";
 $insert_query6 = "UPDATE free_ad SET ad_img6 = '$ad7' where id='$ad_id'";
 $insert_query7 = "UPDATE free_ad SET ad_img7 = '$ad8' where id='$ad_id'";
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query4 = mysqli_query($con,$insert_query4);
 $run_insert_query5 = mysqli_query($con,$insert_query5);
 $run_insert_query6 = mysqli_query($con,$insert_query6);
 $run_insert_query7 = mysqli_query($con,$insert_query7);
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas5'])) {
 $insert_query5 = "UPDATE free_ad SET ad_img5 = '$ad6' where id='$ad_id'";
 $insert_query6 = "UPDATE free_ad SET ad_img6 = '$ad7' where id='$ad_id'";
 $insert_query7 = "UPDATE free_ad SET ad_img7 = '$ad8' where id='$ad_id'";
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query5 = mysqli_query($con,$insert_query5);
 $run_insert_query6 = mysqli_query($con,$insert_query6);
 $run_insert_query7 = mysqli_query($con,$insert_query7);
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas6'])) {
 $insert_query6 = "UPDATE free_ad SET ad_img6 = '$ad7' where id='$ad_id'";
 $insert_query7 = "UPDATE free_ad SET ad_img7 = '$ad8' where id='$ad_id'";
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query6 = mysqli_query($con,$insert_query6);
 $run_insert_query7 = mysqli_query($con,$insert_query7);
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas7'])) {
 $insert_query7 = "UPDATE free_ad SET ad_img7 = '$ad8' where id='$ad_id'";
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query7 = mysqli_query($con,$insert_query7);
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas8'])) {
 $insert_query8 = "UPDATE free_ad SET ad_img8 = '$ad9' where id='$ad_id'";
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query8 = mysqli_query($con,$insert_query8);
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas9'])) {
 $insert_query9 = "UPDATE free_ad SET ad_img9 = '$ad10' where id='$ad_id'";
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query9 = mysqli_query($con,$insert_query9);
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 
if (isset($_POST['abbas10'])) {
 $insert_query10 = "UPDATE free_ad SET ad_img10 = NULL where id='$ad_id'";
 $run_insert_query10 = mysqli_query($con,$insert_query10);
 echo "<script>window.open('editad.php?id=$ad_id', '_self');</script>";
}
 

// CHANGE IMAGE
if (isset($_POST['file-input'])) {
  $editimage =$_FILES['editimage']['name'];
  $temp_namy1=$_FILES['editimage']['tmp_name'];
   move_uploaded_file($temp_namy1, "adimages/$editimage");
 $insert_query = "UPDATE free_ad SET ad_img1 = '$editimage' where id='$ad_id'";
 $run_insert_query2 = mysqli_query($con,$insert_query);}

if (isset($_POST['uploadnow2'])) {
  $editimage =$_FILES['editimage2']['name'];
  $temp_namy1=$_FILES['editimage2']['tmp_name'];
   move_uploaded_file($temp_namy1, "adimages/$editimage2");
 $insert_query = "UPDATE free_ad SET ad_img2 = '$editimage2' where id='$ad_id'";
 $run_insert_query2 = mysqli_query($con,$insert_query);
}

if (isset($_POST['uploadnow3'])) {
  $editimage =$_FILES['editimage3']['name'];
  $temp_namy1=$_FILES['editimage3']['tmp_name'];
   move_uploaded_file($temp_namy1, "adimages/$editimage3");
 $insert_query = "UPDATE free_ad SET ad_img3 = '$editimage2' where id='$ad_id'";
 $run_insert_query2 = mysqli_query($con,$insert_query);
}
//END
?>
<style type="text/css">
.img-wrap {
  position: relative;
  display: inline-block;

  font-size: 0;
}
#buttonid,#buttonid2,#buttonid3,#buttonid4,#buttonid5,#buttonid6,#buttonid7,#buttonid8,#buttonid9{color: white;= background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%);" }

.img-wrap .close {
  position: absolute;
  top: 1px;
  right: 2px;
  z-index: 100;
  background-color: #FFF;
  margin-right: 70px;
  padding: 4px;
  color: #000;
  font-weight: bold;
  cursor: pointer;
  opacity: .2;
  text-align: center;
  font-size: 22px;
  line-height: 10px;
  border-radius: 50%;
}
.img-wrap:hover .close {
  opacity: 1;
}
</style>


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
}else{
    echo '<script>alert("This Ad was uploaded by a different user");</script>';
    echo '<script>window.open("car.php", "_self");</script>';
}
}
?>