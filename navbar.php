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
        echo "<li class='nav-item chatdropdown dropdown'>
          <a class='mr-3 btn my-2 my-sm-0 nav-link' href='userpanel' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' type='submit'>
            <i style='color: darkgrey; font-size: 25px;' class='fa fa-comment-dots'></i>
            </a></li>
          <a class='btn btn-outline-dark loginbtn my-2 my-sm-0' type=submit' href='login'>Log in/Register</a>";
      }
      else
      {?>
        <li class="nav-item chatdropdown active dropdown">
          <div class="label">
            <p style="color: white;" id="messageno" class="best-value"></p>
          </div>
          <style>
            .chatdropdown .label {
                    position: absolute;
    top: 25px;
    left: 25px;
    width: 10.625rem;
    height: 10.625rem;
    overflow: hidden;
            }
            .chatdropdown .label .best-value {
                position: relative;
    padding: 5px 15px 5px 7px;
    background-color: red;
    border-radius: 50%;
    font-size: 10px;
    width: 0px;
            }
          </style>
          <a class='mr-3 btn my-2 my-sm-0 nav-link dropdown-toggle' href='userpanel' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' type='submit'>
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
                    var ref = database.ref('messages/'+my_id);
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
                        firebase.database().ref("messages/"+my_id+"/"+keys[i]).on("child_added", function(snapshot){
                        if((snapshot.val().client_id == my_id) && (snapshot.val().sender_id != my_id)){
                            //TESTING 3 (ALMOST PERFECT ONE)
                            html = "<div onClick='window.open('userpanel?client_id=";
                              html += snapshot.val().client_id + "', '_self');' id='chatbox' class='chatbox'> <div class='col-md-12 col-12 col-sm-12'><div class='col-md-12'><div class='row'><div class='col-1'><img class='mt-3' src='images/default.png' style='height: 50px; width: 50px; border-radius: 50%;'></div><div class='col-md-9'><div class='col-md-12'><p>";
                              html += "<a href='userpanel?client_id="
                              html += snapshot.val().sender_id + "'>" + snapshot.val().sender + "</a></p></div><div class='col-md-12'><div class='row'><p class='cut-text ml-3 text-muted'>";
                              html += snapshot.val().message + "</p></div></div></div></div></div></div>";
                              document.getElementById("chats["+i+"]").innerHTML = html;
                          }
                          else if((snapshot.val().client_id != my_id) && (snapshot.val().sender_id == my_id)){
                            html = "<div onClick='window.open('userpanel?client_id=";
                              html += snapshot.val().client_id + "', '_self');' id='chatbox' class='chatbox'> <div class='col-md-12 col-12 col-sm-12'><div class='col-md-12'><div class='row'><div class='col-1'><img class='mt-3' src='images/default.png' style='height: 50px; width: 50px; border-radius: 50%;'></div><div class='col-md-9'><div class='col-md-12'><p>";
                              html += "<a href='userpanel?client_id="
                              html += snapshot.val().client_id + "'>" + snapshot.val().client_name + "</a></p></div><div class='col-md-12'><div class='row'><p class='cut-text ml-3 text-muted'>";
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
                    min-height: 100px;
                    max-width: 250px;
                    padding-right: 180px;
                    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
                  }
                  .chatbox:hover{
                    background-color: #F2F2F2;
                    cursor: pointer;
                  }
                  .cut-text { 
                    display: block;
                    white-space: nowrap;
                    overflow: hidden !important;
                    text-overflow: ellipsis;
                  }
                </style>
              </div>
          </div>
        </li><?php
        echo "<li class='nav-item myaccbtn active dropdown'>
                    <a class='btn my-2 my-sm-0 nav-link dropdown-toggle' href='userpanel' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' type='submit'>
                      <img src='images/default.png' style='height: 30px; width: 30px; border-radius: 50%;'>
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                      <a class='dropdown-item' href='mylistings'>My Listings</a>
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='myprofile'>My Profile</a>
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='mychats'>My Chats</a>
                     
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='signout'>Sign Out</a>
                    </div>
                  </li>";
      }
  ?>
  <a style="color: white; outline: none; background: rgb(255,0,0); background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,47,1,1) 35%, rgba(254,93,0,1) 58%, rgba(255,98,0,1) 100%, rgba(215,49,203,1) 100%, rgba(208,108,235,1) 100%, rgba(11,11,11,1) 100%); " class="btn my-2 sellyourcarbtn my-sm-0" type="submit" href="cardetails">Sell Your Car</a>
</form>
</ul>
</div>
</nav>
</div>  <!-- Navbar div ends (firstdiv) -->