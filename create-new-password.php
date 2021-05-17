<?php include 'db/db.php'; ?>
<?php session_start(); ?>
<?php error_reporting(0); 
      $selector = $_GET['selector'];
      $validator = $_GET['validator'];
      $datenow = date("U");
      if(empty($selector) || empty($validator)){
        echo "Could not validate your request!";
      }else{
        if((ctype_xdigit($selector)!==false) && (ctype_xdigit($validator)!==false)){
          $sql = "SELECT * from pwdreset where pwdResetSelector = ?";
          $stmt = mysqli_stmt_init($con);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "there was an error!";
            exit();
          }
          else
          {
            mysqli_stmt_bind_param($stmt, "s", $selector);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
              echo "You have already changed your password or your form has expired.";
            }else{
              $expiredate = $row['pwdResetExpires'];
              if($datenow > $expiredate){
                echo "This form has expired";
              }else{
                ?><!DOCTYPE html>
<html>
<head>
<title>Tujjari</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://use.fontawesome.com/265b5bff8c.js"></script>
<script src="https://kit.fontawesome.com/420b921a12.js" crossorigin="anonymous"></script>
<!--Animate.css link1-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/anonymousimate.min.css"/>
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
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
</head>
<body class="bg-white">
<center>
  <div class="container">
  <br>
<div>

<a href="https://tujjari.com"><img class="loginlogo" src="images/logo.png" style="height: 65px; width: 160px;"></a>
   </div>
  <div class="boxlegend m-auto">
  <h3 style="font-size: 30px;" class="ml-3 mt-4">Enter New Password</h3>
  <p>Please enter your new password twice so we can verify you typed it in correctly.</p>
  <form method="post" id="yoyo" >
     
    
          <form method="post" id="yoyo" >
            <input type="hidden" name="selector" value="<?php  echo $selector; ?>">
            <input type="hidden" name="validator" value="<?php  echo $validator; ?>">
            <label class="ml-3" style="font-size: 15px;padding-right: 260px;"><b>New Password</b></label><br>
            <input type="password" name="pass" class="ml-3" placeholder="At least 5 characters" style="width: 360px !important;" required>
            <label class="ml-3" style="font-size: 15px;padding-right: 231px;" ><b>Re-enter password</b></label><br>
            <input type="password" name="repass" class="ml-3" style="width: 360px !important;" required>
                <div>
                <br>
             

                <button class="btn btn-danger mt-1" name="reset-my-password" style="width: 360px;">Reset my password</button>

               </form> <br>
          <center >
          <br><br>
          <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="L3T6LfKa"></script>
          </center></div>
            </div><!-- boxlegend --> <br>  
            <div class="container">
            <div class="row ">
            <h7 class="separatori m-auto" >Already have an account?</h7></div></div><br>
            <a href="login" class="btn lacuste" style=" width: 50% ; color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%); ">Sign In</a></div></div></div>
            </div><!-- container -->
            <br><br>
            </center>
          </body>
          </html>



          <style type="text/css">
          @media only screen and (max-width: 600px) {
          .lacuste{
          width: 117% !important;
          }
          .loginlogo{
  margin-left: 85px;
}

          }
          @media only screen and (min-width: 768px) {
          .separatori {
              display: flex;
              align-items: center;
              text-align: center;
              width: 30%;
          }
          }


          .boxlegend{
            width: 400px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            border: .01px solid #d9d9d9;
            height: 350px;
           
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
          <?php
        }
      }
      ?>
    
<?php
include 'php/reset-pass-process.php';
?><?php
              }
            }}
          ?>
