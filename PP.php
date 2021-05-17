<?php session_start(); ?>
<?php include 'php/userinfo.php'?>
<?php ini_set('display_errors',0);?>
<!DOCTYPE html>
<html>
<head>
<title id="title">Tujjari</title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
<!--Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://use.fontawesome.com/265b5bff8c.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/420b921a12.js" crossorigin="anonymous"></script>
<!--Animate.css link1-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
<!--Animate.css link2-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/banimate.min.css">
<!--Linking style.css-->
<link rel="stylesheet" type="text/css" href="tujjaricss.css">
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
<a class="navbar-brand" href="https://tujjari.com"><img style="height: 65px; width: 160px;" src="images/logo.png"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ml-auto">
<form class="form-inline">
<form>
  <?php
      if(!isset($_SESSION['logged'])){
        echo "<li class='nav-item dropdown'>
          <a class='mr-3 btn my-2 my-sm-0 nav-link' href='userpanel.php' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' type='submit'>
            <i style='color: darkgrey; font-size: 25px;' class='fa fa-comment-dots'></i>
            </a></li>
          <a class='mr-3 btn btn-outline-dark my-2 my-sm-0 type=submit' href='login.php'>Log in/Register</a>";
      }
      else
      {?>
        <li class="nav-item active dropdown">
          <a class='mr-3 btn my-2 my-sm-0 nav-link dropdown-toggle' href='userpanel.php' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' type='submit'>
            <i style="font-size: 25px;" class="fa fa-comment-dots"></i>
          </a>
          <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
            <div class="dropdown-item">
              <?php include 'php/userinfo.php'; ?>
                <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
                <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
                <div class="box"><div id="chatmessages"></div></div>
                <script>
                  // Your web app's Firebase configuration
                    var firebaseConfig = {
    apiKey: "AIzaSyDM-q5pPByEMd3kRbYgwHRFV5vSYQGF6U4",
    authDomain: "tujjarichatbox.firebaseapp.com",
    databaseURL: "https://tujjarichatbox-default-rtdb.firebaseio.com",
    projectId: "tujjarichatbox",
    storageBucket: "tujjarichatbox.appspot.com",
    messagingSenderId: "405389287182",
    appId: "1:405389287182:web:7b0d957ebac6b11ab5415f",
    measurementId: "G-59Q9KSJEB3"
  };
                    // Initialize Firebase
                    firebase.initializeApp(firebaseConfig);

                    var my_id = "<?php echo $user_id; ?>";
                    var myName = "<?php echo $name; ?>";

                    database = firebase.database();
                    var ref = database.ref('messages/'+myName);
                    ref.on('value', gotData, errData);
                    function gotData(data){
                      var ids = data.val();
                      keys = Object.keys(ids);
                      console.log(keys);
                      for(var i = 0; i <keys.length; i++){
                        console.log(keys[i]);
                        html1="";
                        html1 += "<div id='chats[" + i + "]'></div>";
                        document.getElementById("chatmessages").innerHTML += html1;
                        firebase.database().ref("messages/"+myName+"/"+keys[i]).on("child_added", function(snapshot){
                        if((snapshot.val().client_id == my_id) && (snapshot.val().sender_id != my_id)){
                            //TESTING 3 (ALMOST PERFECT ONE)
                            html = "<div onClick='window.open('userpanel.php?client_id=";
                              html += snapshot.val().client_id + "', '_self');' id='chatbox' class='chatbox'> <div class='col-md-12 col-12 col-sm-12'><div class='col-md-12'><div class='row'><div class='col-1'><img class='mt-3' src='images/default.png' style='height: 50px; width: 50px; border-radius: 50%;'></div><div class='col-md-9'><div class='col-md-12'><p>";
                              html += "<a href='userpanel.php?client_id="
                              html += snapshot.val().sender_id + "'>" + snapshot.val().sender + "</a></p><p class='ml-auto'>Nov 30th 2020</p></div><div class='col-md-12'><div class='row'><p class='ml-3 text-muted'>";
                              html += snapshot.val().message + "</p></div></div></div></div></div></div>";
                              document.getElementById("chats["+i+"]").innerHTML = html;
                          }
                          else if((snapshot.val().client_id != my_id) && (snapshot.val().sender_id == my_id)){
                            html = "<div onClick='window.open('userpanel.php?client_id=";
                              html += snapshot.val().client_id + "', '_self');' id='chatbox' class='chatbox'> <div class='col-md-12 col-12 col-sm-12'><div class='col-md-12'><div class='row'><div class='col-1'><img class='mt-3' src='images/default.png' style='height: 50px; width: 50px; border-radius: 50%;'></div><div class='col-md-9'><div class='col-md-12'><p>";
                              html += "<a href='userpanel.php?client_id="
                              html += snapshot.val().client_id + "'>" + snapshot.val().client_name + "</a></p><p class='ml-auto'>Nov 30th 2020</p></div><div class='col-md-12'><div class='row'><p class='ml-3 text-muted'>";
                              html += snapshot.val().message + "</p></div></div></div></div></div></div>";
                              document.getElementById("chats["+i+"]").innerHTML = html;
                          }
                        });
                    }
                  }
                  function errData(err){
                    console.log('Error!');
                    console.log(err);
                    }
                </script>
                <style type="text/css">
                  .box{
                    padding-left: 0px !important;
                    overflow-y: scroll;
                    height: 400px;
                    width: 200px;
                  }
                  .chatbox{
                    background-color: #fff;
                    border: solid 1px #e6e6e6;
                    min-height: 50px;
                    padding-right: 180px;
                    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
                  }
                  .chatbox:hover{
                    background-color: #F2F2F2;
                    cursor: pointer;
                  }
                </style>
              </div>
          </div>
        </li><?php
        echo "<li class='nav-item active dropdown'>
                    <a class='mr-3 btn my-2 my-sm-0 nav-link dropdown-toggle' href='userpanel.php' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' type='submit'>
                      <img src='images/default.png' style='height: 30px; width: 30px; border-radius: 50%;'> $name
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                      <a class='dropdown-item' href='userpanel.php?my_listings'>My Listings</a>
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='userpanel.php?my_profile'>My Profile</a>
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='userpanel.php?my_chats'>My Chats</a>
                     
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='php/sign_out.php'>Sign Out</a>
                    </div>
                  </li>";
      }
  ?>
  <a style="color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%); " class="btn my-2 my-sm-0" type="submit" href="sellmycar.php">Sell Your Car</a>
</form>
</ul>
</div>
</nav>
</div>  <!-- Navbar div ends (firstdiv) --><br><br><br><br>
<style type="text/css"> @media only screen and (max-width: 768px) {
                .locomoco{background-color: white !important;width: 100% !important;}
                .locomoco2{font-family: 'Open Sans', sans-serif;}
                }
                @media only screen and (min-width: 768px) {
                .locomoco{margin-left: 50px; margin-right: 50px; background-color: white!important;border-radius: 2px;}
                .locomoco2{width: 65%;font-family: 'Open Sans', sans-serif;}
                }</style>
<div class="locomoco">
<div class="container locomoco2"><br>
  <h5 class="text-center"><b>Privacy Policy</b></h5><br>
  <p >

The privacy policy below will mention any and all ways we will use your personal data. We will notify you if there are any changes in how we use your data.

<br>
<h5 style="font-family: 'Montserrat', sans-serif !important;">Personal information that we collect</h5>

When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically-collected information as “Device Information.”
<br><br>
We collect Device Information using the following technologies:
<ul>
    <li><b>Cookies</b> are data files that are placed on your device or computer and often include an anonymous unique identifier.</li>

    <li><b>Log files</b> track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps.</li>
    <li><b>tags</b> are electronic files used to record information about how you browse the Site.</li>
  </ul>

When we mention “Personal Information” in this Privacy Policy, we are referring to Device Information.
<br><br>
<h5  style="font-family: 'Montserrat', sans-serif !important;margin-top: 20px;">Use of your data</h5>

We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address) along with marking location on the map when you post an ad, and more generally to improve and optimize our Site.
<br>
<h5  style="font-family: 'Montserrat', sans-serif !important;margin-top: 20px;">Who we share your personal information with</h5>

We currently do not share your data with any third party company or organization.
<br>
Though We may share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful request for information we receive, or to otherwise protect our rights.
<br>
<h5  style="font-family: 'Montserrat', sans-serif !important;margin-top: 20px;">"Do not track" request</h5>
Please note that we do not alter our Site’s data collection and use practices when we see a Do Not Track signal from your browser.
<br>
If you are a European resident, you have the right to access personal information we hold about you and to ask that your personal information be corrected, updated, or deleted. If you would like to exercise this right, please contact us through our official email.
<br>
<h5  style="font-family: 'Montserrat', sans-serif !important;margin-top: 20px;">Data retention</h5>

We currently hold on to the data you provide us (including IP address) unless you request us to delete it.

<h5  style="font-family: 'Montserrat', sans-serif !important;margin-top: 20px;">Updates and changes</h5>
We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.

</p><br><br>
</div></div>
