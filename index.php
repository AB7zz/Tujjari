<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<!DOCTYPE html>
<html>

<head>
<title>Tujjari | Search For your Next Car</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
<meta name="description" content="Tujjari.com is a web portal based in UAE where you can sell your used car or buy your next car">
<link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
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
</head>
<body>
<?php include 'navbar.php'; ?>
<br><br><br><br><br>
<section class="section1 makebgbigger justify-content-center container" style="padding-top: 35px;">
<div class="redbox borders">
<div class="text-center">
<div id="container"><h1 id="typewriters" class="font1" style="color: white;">Search for your next car</h1><div id="cursors"></div></div>
<form style="padding: 10px;" class=" justify-content-center" name="form1" method="post">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 resp1">

        <select id="select1" class="form-control mb-1" name="carbrand" value="Choose Brand">
          <option>Choose Brand</option>
          <?php
              $select = "SELECT * FROM `free_ad` order by car_brand ASC";
              $run = mysqli_query($con, $select);
              while($row = mysqli_fetch_array($run)){
                $brand_id = $row['car_brand'];
                $select1 = "SELECT * FROM `car_brand` where brand_id='$brand_id'";
                $run1 = mysqli_query($con, $select1);
                $row1 = mysqli_fetch_array($run1);
                $brand_name = $row1['brand_name'];
                echo "<option value='$brand_id'>$brand_name</option>";
              }
            ?>
        </select>
      </div><style type="text/css">
      @media only screen and (max-width: 768px) {
        .resp1{
          width: 50%;
        }
        .resp2{
          width: 50%;
        }
        .ravi1{
        width: 50%;
        }
        .ravi2{
        
          margin-top: 17px;
        }
        .mega{
          width: 100%;
        }
      }
    </style>
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 resp2">
        <select id="select2" class="form-control mb-1" name="carmodel" value="Choose Model">
          <option>Choose Model</option>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
          <script type="text/javascript">
             $('[name=carbrand]').change(function(){
              document.getElementById('select2').innerHTML = "<?php
              $select = 'SELECT * FROM `car_model` order by model_name ASC';
              $run = mysqli_query($con, $select);
              while($row = mysqli_fetch_array($run))
              {
                $model_name = $row['model_name'];
                $brand_id = $row['brand_id'];
                echo "<option value='$model_name' id='$brand_id'>$model_name</option>";
              }
            ?>"});
          </script>
        </select>
      </div>
    </div>

<div class="row">
  <!-- YEAR -->
  <div class="col-md-6 col-lg-6 col-12 col-sm-12">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 ravi1">
        <label style="font-size: 18px;" class="yearfrom">Year</label>
        <select class="form-control"name="year1" value="Choose Year Range">
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
        <option>2020</option></select>
      </div>
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 ravi2">
     
        <select class="form-control ravi2 mega"name="year2" value="Choose Year Range">
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
      </div>
    </div>
  </div>
  <!-- PRICE -->

<!-- part 2 for desktop -->
 <div class="col-md-6 col-lg-6 col-12 col-sm-12 ravi1 diss2">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 ">
        <label style="font-size: 18px;" class="pricefrom">Price(AED)</label>
        <input type="text" class="form-control ravi3"  name="from" placeholder="From">
      </div>
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 pri2 ">
        <input type="text" name="to" class="form-control ravi4" placeholder="To">
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$("#select1").change(function() {
  if ($(this).data('options') === undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select2 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[id=' + id + ']');
  $('#select2').html(options);
});
</script>
<style type="text/css">
  .ravi1{display:none;}
  .ravi2{display:none;}
  .ravi3{display:none;}
  .ravi4{display:none;}
  .ravi6{display: none;}
  .section2{
    padding: 70px;
    height: 500px;
    background-image: url('images/bg-img.jpg');
    background-size: 1200px 500px !important;
    background-repeat: no-repeat;
    border-radius: 20px;
  }
  @media (max-width: 880px){
    .section2{
      padding: 10px;
    height: 800px;
    background-image: url('images/bg-img.jpg');
    background-size: 400px 800px !important;
    background-repeat: no-repeat;
    border-radius: 20px;
    }
    .pri2{
      margin-top: 32px;
    }
    .diss2{
      display: none !important;
    }
    .kkk{
      margin-bottom: 5px !important;
    }.sss{
      margin-top: 6px;
    }
    .pricefrom{margin-right: 80px !important;color: darkred; font-size: 15px !important;}
    .yearfrom{
      margin-right: 100px;
      font-size: 15px !important;
      color: darkred;

    }
  }
  @media only screen and (min-width: 768px) {
  /* For desktop: */
  .diss1{
    display: none !important;
  }

  /* For desktop: */
  .yearfrom{font-size: 18px; margin-right:140px; margin-bottom: 0px;
  }
  .pricefrom{ margin-right: 110px; margin-bottom:0px;

  }
  .ravi2{
    margin-top: 13.7px;
  }
 .ravi4{
  margin-top: 26px;
 }
.ssss{
  padding-left: 0px !important;
}

}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $('[name=carmodel]').change(function(){
    $('.makebgbigger').addClass('section2');
    $('.ravi1').show();
    $('.ravi2').show();
    $('.ravi3').show();
    $('.ravi4').show();
    $('.ravi6').show();
});
</script>
<script type="text/javascript">
 
</script>
<script type="text/javascript">
  $('[name=carbrand]').change(function(){
    $('.lambo').show();
});
</script>
<br>
<div class="row">
  <div class="col-md-11 col-lg-11 col-12 col-sm-12">
    <input class="form-control mr-sm-2 mb-3 kkk" name="keywords" type="search" placeholder="Enter Keywords" aria-label="Search">
  </div>
    <div class="col-md-6 col-lg-6 col-12 col-sm-12 ravi1 diss1">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 ">
        <label style="font-size: 18px;" class="pricefrom">Price(AED)</label>
        <input type="text" class="form-control ravi3"  name="from" placeholder="From">
      </div>
      <div class="col-md-6 col-lg-6 col-6 col-sm-6 pri2 ">
        <input type="text" name="to" class="form-control ravi4" placeholder="To">
      </div>
    </div>
  </div>

  <div class="col-md-1 col-lg-1 col-12 col-sm-12 ssss" >
    <button style='color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%); ' class='btn mb-3 sss' type='submit' name='submit'><a style='color: white; text-decoration: none; '>Search</a>
    </button>
  </div>
</div>
</form>
</div>
</div></div>
</section>
<br><br><br>
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
<script>
// This is to make the navbar be transparent yet visibile
 $(window).on('scroll load', function() {
if ($(".navbar").offset().top > 60) {
$(".fixed-top").addClass("top-nav-collapse");
} else {
$(".fixed-top").removeClass("top-nav-collapse");
}
    });
 ScrollReveal().reveal('.nule');

  AOS.init();

 // BSSSSS

</script>
</body>
</html>
<?php

if(isset($_POST['submit'])){
  if(($_POST['carbrand'] == "") || ($_POST['carbrand'] == "Choose Brand")){$carbrand=NULL;}else{$carbrand=$_POST['carbrand'];}
  if(($_POST['carmodel'] == "") || ($_POST['carmodel'] == "Choose Model")){$carmodel=NULL;}else{$carmodel=$_POST['carmodel'];}
  if($_POST['keywords'] ==""){$keywords=NULL;}else{$keywords=$_POST['keywords'];}
  if($_POST['from'] == ""){$from=NULL;}else{$from=$_POST['from'];}
  if($_POST['to'] == ""){$to=NULL;}else{$to=$_POST['to'];}
  if($_POST['year1'] == ""){$year1=NULL;}else{$year1=$_POST['year1'];}
  if($_POST['year2'] == ""){$year2=NULL;}else{$year2=$_POST['year2'];}
  echo "<script>window.open('car.php?carbrand=$carbrand&carmodel=$carmodel&keywords=$keywords&pricefrom=$from&priceto=$to&yearfrom=$year1&yearto=$year2', '_self');</script>";
  $_SESSION['carurl'] = "car.php?carbrand=$carbrand&carmodel=$carmodel&keywords=$keywords&pricefrom=$from&priceto=$to&yearfrom=$year1&yearto=$year2";
}
?>
<script>
  // List of sentences
var _CONTENT = [ 
  "First Car", 
  "Next Car"
];

// Current sentence being processed
var _PART = 0;

// Character number of the current sentence being processed 
var _PART_INDEX = 0;

// Holds the handle returned from setInterval
var _INTERVAL_VAL;

// Element that holds the text
var _ELEMENT = document.querySelector("#typewriter");

// Cursor element 
var _CURSOR = document.querySelector("#cursor");

// Implements typing effect
function Type() { 
  // Get substring with 1 characater added
  var text =  _CONTENT[_PART].substring(0, _PART_INDEX);
  _ELEMENT.innerHTML= "Search for your ";
  _ELEMENT.innerHTML += text;
  _PART_INDEX++;

  // If full sentence has been displayed then start to delete the sentence after some time
  if(text === _CONTENT[_PART]) {
    // Hide the cursor
    _CURSOR.style.display = 'none';

    clearInterval(_INTERVAL_VAL);
    setTimeout(function() {
      _INTERVAL_VAL = setInterval(Delete, 10);
    }, 1000);
  }
}

// Implements deleting effect
function Delete() {
  // Get substring with 1 characater deleted
  var text =  _CONTENT[_PART].substring(0, _PART_INDEX - 1);
  _ELEMENT.innerHTML= "Search for your ";
  _ELEMENT.innerHTML += text;
  _PART_INDEX--;

  // If sentence has been deleted then start to display the next sentence
  if(text === '') {
    clearInterval(_INTERVAL_VAL);

    // If current sentence was last then display the first one, else move to the next
    if(_PART == (_CONTENT.length - 1))
      _PART = 0;
    else
      _PART++;
    
    _PART_INDEX = 0;

    // Start to display the next sentence after some time
    setTimeout(function() {
      _CURSOR.style.display = 'inline-block';
      _INTERVAL_VAL = setInterval(Type, 100);
    }, 200);
  }
}

// Start the typing effect on load
_INTERVAL_VAL = setInterval(Type, 100);
</script>
<style>
  #cursor {
  display: inline-block;
  vertical-align: middle;
  width: 1.5px;
  height: 20px;
  background-color: darkgrey !important;
  animation: blink .75s step-end infinite;
}
#container {
  text-align: center;
}
#typewriter {
  display: inline-block;
  vertical-align: middle;
  color: black;
  letter-spacing: 2px;
}
@media (max-width: 425px){
  #typewriter {
  font-size: 25px;
}
}
</style>