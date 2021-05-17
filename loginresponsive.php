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
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
<style type="text/css">
    @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu{ display: none; }
            .navbar .nav-item:hover .dropdown-menu{ display: block; }
            .navbar .nav-item .dropdown-menu{ margin-top:0; }
        }   
</style>
</head>

<body class="bg-white">
<center>
<div class="container-fluid"><br>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-sm-12 col-12 col-lg-12">
      <center>
        <a href="https://tujjari.com"><img src="logoimg" class="loginlogo" style="height: 65px; width: 160px;" ></a>
      </center>
      <div class="boxlegend"><br>
        <h3 style="font-size: 30px;" >Sign-In</h3>
        <form method="post">
          <?php 
            if(!isset($_SESSION['wrong_enter'])){
            }else{
                $wrong_enter = $_SESSION['wrong_enter'];
                if($wrong_enter == 1){
                  echo"<p style='color: red;'>Wrong Password, Kindly Enter Again</p>";  
                }
                else if($wrong_enter == 2){
                  echo"<p style='color: red;'>Account doesnt exist, kindly register</p>";  
                }
            }
          ?>
          <label  style="font-size: 15px; padding-right: 320px;" ><b>Email</b> <span id='message'></span></label><br>
          <input id="email" type="text" name="email" value="<?php if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie']; } else if(isset($_SESSION['wrong_email'])){$wrong_email = $_SESSION['wrong_email']; echo $wrong_email; }?>"  style="width: 360px !important;" required oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')"/>
          <label  style="font-size: 15px;padding-right: 290px;"><b>Password</b> <span id='message'></span><div id="checkpass"></div></label><br>
          <input id="password" type="password" name="pass" value="<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie']; } ?>" style="width: 360px !important;" required oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')"/>   <br>
          <input type="checkbox" name="remember_me" id="remember_me" style="padding-right: 200px;"> Remember Me
          <?php 
          if(isset($_GET['newpwd'])){
            if($_GET['newpwd'] == "passwordupdated"){
              echo '<p class="signupsuccess">Your password has been reset!</p>';
            }
          }
          ?>
          <a href="forgotpassword"  style="color: blue; padding-left: 100px;">Forgot password?</a>
          <button name="submit" class="btn btn-danger mt-1" style="width: 360px;">Sign-In</button>  
        </form>
 
<!-- <div id="my-signin2"></div>
<script>
   function onSuccess(googleUser) {
     console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
   }
   function onFailure(error) {
     console.log(error);
   }
   function renderButton() {
     gapi.signin2.render('my-signin2', {
       'scope': 'profile email',
       'width': 240,
       'height': 50,
       'longtitle': true,
       'theme': 'dark',
       'onsuccess': onSuccess,
       'onfailure': onFailure
     });
   }
  </script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script> -->
<!-- <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
<div id="fb-root"></div> -->
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="L3T6LfKa"></script> -->
      </div><!-- boxlegend --> 
      <h7 class="separatori" style="padding-top: 15px; padding-bottom: 15px;" >New to Tujjari?</h7>
      <form>
        <div class="col-12 col-sm-12"><a class="btn lacustu" href="register" style=" width: 440px; color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%); ">Create Account</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>


<style type="text/css">
@media only screen and (max-width: 600px) {
.lacustu{
width: 117% !important;
}
.loginlogo{
  margin-left: 85px;
}

}


.boxlegend{
  width: 400px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  border: .01px solid #d9d9d9;
  height: 300px;
 
}
input{
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  border: 1px solid #DDDDDD;
}
input:focus{
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  border: 2px solid rgba(255, 51, 51,1);
}
/*seperator line*/
.separator {
    display: flex;
    align-items: center;
    text-align: center;
    width: 50%;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    border-top: 1px solid #000;
   
   
}
.separator::before {
  margin-right: .25em;

}
.separator::after {
    margin-left: .25em;


}




.separatori {
    display: flex;
    align-items: center;
    text-align: center;
    width: 30%;
}
.separatori::before, .separatori::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
   
   
}
.separatori::before {
  margin-right: .25em;

}
.separatori::after {
    margin-left: .25em;


}
</style>
<?php include 'php/login-process.php'; ?>