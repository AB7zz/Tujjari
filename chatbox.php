<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<?php include 'php/userinfo.php'; ?>
   <div id="diditstart">
<?php
if(isset($_GET['client_id'])){
  $client_id = $_GET['client_id'];
  $check_cust = "select * from customers where id = '$client_id'";
  $run_cust = mysqli_query($con, $check_cust);
  $row_cust = mysqli_num_rows($run_cust);
  if($row_cust == 0){echo '<script>alert("No such person exists");</script>'; echo '<script>window.open("mychats", "_self");</script>';}
  $sender_id = $user_id;
  if($client_id == $sender_id){echo '<script>alert("You cannot chat with yourself");</script>'; echo '<script>window.open("mychats", "_self");</script>';}else{
  $get_user = "select * from customers where id = '$client_id'";
  $run_user = mysqli_query($con, $get_user);
  $fetch_user = mysqli_fetch_array($run_user);
  $client_name = $fetch_user['customer_name'];
  ?>
  <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>

  <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
       https://firebase.google.com/docs/web/setup#available-libraries -->

  <script>
        
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
    var myName = "<?php echo $name; ?>";
    var client_id = "<?php echo $client_id; ?>";

    var sender_id = "<?php echo $sender_id; ?>";
    var client_name = "<?php echo $client_name; ?>";




    function sendMessage(){
      
    var message = document.getElementById("messaage").value;
    document.getElementById("messaage").value = "";
    firebase.database().ref("messages/"+sender_id+"/"+client_id).push().set({
    "sender": myName,
    "message": message,
        "client_id": client_id,
        "sender_id": sender_id,
        "client_name": client_name
    });
      firebase.database().ref("messages/"+client_id+"/"+sender_id).push().set({
        "sender": myName,
        "message": message,
        "client_id": client_id,
        "sender_id": sender_id,
        "client_name": client_name
      });
    return false;
    }

    firebase.database().ref("messages/"+sender_id+"/"+client_id).on("child_added", function(snapshot){
      

      if(((snapshot.val().client_id == sender_id) && (snapshot.val().sender_id == client_id))){
        var html = "";
        html += "<li id='movetothedamnright' class='mumo mt-3'>";
        html += "<b>"+snapshot.val().sender+"</b>" + ": <br>" + snapshot.val().message;
        html += "</li><br>";
       
        document.getElementById("messages").innerHTML += html;
      }
      if(((snapshot.val().client_id == client_id) && (snapshot.val().sender_id == sender_id))){
        var html = "";
        html += "<li id='movetothedamnright' class='movetotheright mt-3 kuko'>";
        html += "<b>"+snapshot.val().sender+"</b>" + ": <br>" + snapshot.val().message;
        html += "</li><br><br><br><br><br><br>";
       
        document.getElementById("messages").innerHTML += html;
      }
    });

    
          </script>
  <div class="namebox"><div class="mt-4 ml-5"><img src="images/default.png" class="mr-3" style="height: 60px; width: 60px; border-radius: 50%;"><b id="clientname"></b></div></div>
  <div class="chatbox"><div id="scrollmenu"><ul  id="messages"></ul></div></div><br>
  <form onsubmit="return sendMessage();">
  <div class="container">
    <div class="row">
  <input id="messaage" class="form-control lamar"  placeholder="Enter Message" autocomplete="off">
  <button style="border-radius: 10%; background-color: transparent;border: none;" onclick = "scrollSmoothToBottom('scrollmenu')" id="sob" type="submit"><i class="fab fa-telegram-plane fontypo"></i></button></div></div>
  </form>
<script>
   document.getElementById("clientname").innerText = client_name;
   var d = $('#messages');
d.scrollTop(d.prop("scrollHeight"));
</script>
  <style>
    .namebox{
      background-color: #fff;
  border: solid 1px #e6e6e6;
 padding-right: 0px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  min-height: 15%;
  width: 100%;
    }
  .chatbox{
  background-color: #fff;
  border: solid 1px #e6e6e6;
 padding-right: 0px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  max-height: 450px;
  width: 100%;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
  }
  
    .chatbox:hover{
      background-color: #fff;
    }
    div #scrollmenu {
      height: 450px;
      list-style-type: none;
      overflow:scroll;
overflow-x:hidden;
display: flex;
  flex-direction: column-reverse;
    }
    
@media only screen and (max-width: 768px) {
  .chatbox{
    /*margin-left: 20px !important;*/
  background-color: #fff;
  border: solid 1px #e6e6e6;
 padding-right: 0px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  min-height: 500px;
  width: 100%;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;

  }
  .fontypo{
    font-size: 25px;
  }
  .lamar{
    margin-left: 26px;
    width: 76%;
  }
  .cj{
    margin-left: 10px;
  }
  .mumo{
    position: relative;
 
    margin-bottom: 10px;
    padding: 10px;
    background-color: #EDEEEF;
    width: 125px;
    text-align: left;
    font: 400 .9em 'Open Sans', sans-serif;
    border: 1px solid #97C6E3;
    border-radius: 10px;
    list-style-type: none;
    font-size: 12px;
  }
  /*.mumo:after{
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border-top: 15px solid #EDEEEF;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-radius: 6px;
    top: -1px;
    left: -15px;
  }*/
  .kuko {
    color: white;
   position: relative;
   margin-bottom: 0px;
   margin-left: 150px;
   padding: 10px;
   background-color: #E05720;
   width: 125px;
   text-align: left;
   font: 400 .9em 'Open Sans', sans-serif;
   border: 1px solid #dfd087;
   border-radius: 10px;
   font-size: 12px;
}
/*.kuko:after {
   content: '';
   position: absolute;
   width: 0;
   height: 0;
   border-bottom: 15px solid #E05720;
   border-left: 15px solid transparent;
   border-right: 15px solid transparent;
   bottom: 0;
   border-radius: 6px;
   right: -15px;
}*/
}
@media only screen and (min-width: 768px) {.message{

  }
  .movetotheright{
    float: right;  
  }
  .fontypo{
    font-size: 25px;
  }
  .lamar{
    width: 90%;
  }
  .cj{
    margin-left: 10px;
  }
  .mumo{
    position: relative;
    margin-left: 20px;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #EDEEEF;
    width: 200px;
    text-align: left;
    font: 400 .9em 'Open Sans', sans-serif;
    border: 1px solid #97C6E3;
    border-radius: 10px;
    list-style-type: none;
    font-size: 16px;
  }
  .kuko {
    color: white;
   position: relative;
   margin-right: 25px !important;
   margin-bottom: 10px;
   padding: 10px;
   background-color: #E05720;
   width: 200px;
   text-align: left;
   font: 400 .9em 'Open Sans', sans-serif;
   border: 1px solid #dfd087;
   border-radius: 10px;
   font-size: 16px;
}
  .lamar{

  }
}
.dontshowbrs{
  display: none;
}


  </style>
  
  <script>
//     function scrollSmoothToBottom (scrollmenu) {
//    var div = document.getElementById(scrollmenu);
//    $('#' + scrollmenu).animate({
//       scrollTop: (div.scrollHeight - div.clientHeight)+100
//    }, 500);
//    console.log(div.scrollHeight);
//    console.log(div.clientHeight);
// }
// var width = $(window).width(); 

// if (width >= 768  ) {
//  $('#showbrs').addClass('dontshowbrs');
// }
  </script>
  <?php
}
}
?>
</div>