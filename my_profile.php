<?php include 'db/db.php'; ?>

<h3><center>My Account</center></h3><br><br>
<button class="accordion"><b>Name:</b> <?php echo $name ?></button>
<div class="panel">
  <form method="post">
  <input class="mt-3 mb-3" type="Name" name="namey" placeholder="Enter Name">
  <button class="btn btn-outline-dark" name="update1">Update</button>
</form>
</div>
<button class="mt-4 accordion"><b>Email:</b> <?php echo $user_email ?></button>
<div class="panel">
  <form method="post">
  <input class="mt-3 mb-3" type="Email" name="emaily" placeholder="Enter Email">
  <button class="btn btn-outline-dark" name="update2">Update</button>
  </form>
</div>
<button class="mt-4 accordion"><b>Password:</b> *************</button>
<div class="panel">
  <form method="post">
  <input class="mt-3 mb-3" type="password" name="newpass" placeholder="Enter New Password">
  <input class="mt-3 mb-3" type="password" name="renewpass" placeholder="Re-enter Your New Password">
  <button class="btn btn-outline-dark" name="update3">Update</button>
</form>
</div>

<button class="mt-4 accordion"><b>Phone:</b> <?php echo $phonenamaste ?></button>
<div class="panel"><form method="post">
  <input class="mt-3 mb-3" type="phone" name="phonelacoste" placeholder="Enter Phone Number">
  <button class="btn btn-outline-dark" name="update4">Update</button></form>
</div>
<button class="mt-4 accordiony" onclick="deletepopup()"><b>Deactivate:</b> Delete Account</button>


<style type="text/css">
/* Style the buttons that are used to open and close the accordion panel */
.accordiony{
  background-color: #fff;
border: solid 2px darkgrey;
box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
color: #444;
cursor: pointer;
padding: 10px;
width: 100%;
text-align: left;
border: none;
outline: none;

}
.accordion {
background-color: #fff;
border: solid 2px darkgrey;
box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
color: #444;
cursor: pointer;
padding: 10px;
width: 100%;
text-align: left;
border: none;
outline: none;
transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.activea, .accordion:hover {
  background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */

.accordion:after {
  content: '\270F';  /* Unicode character for "plus" sign (+) */
  font-size: 20px;
  color: black;
  float: right;
  margin-left: 5px;
}

.activea:after {
 /* content: "\2212";*/ /* Unicode character for "minus" sign (-) */
}
.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
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
</style>
<script type="text/javascript">

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activea");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

</script>
<style type="text/css">
  @media only screen and (max-width: 768px) {
    .momo2{
      font-size: 80%;
    }
    .momo3{
      margin-top: 20px;
      font-size: 105%;
    }
    .momo{
      margin-left: 100px;
      font-size: 100%;
    }
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
  width:350px;
  height:250px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
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
  }







  @media only screen and (min-width: 768px) {
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

  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}

.popup .popupclose-btn {
  cursor:pointer;

  width:30px;
  height:32px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;

  border-radius:50%;
}

.popup.active .popupoverlay {
  display:block;
}

.popup.active .popupcontent {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}
.popupclose-btn{
  margin-top: 15px;
  margin-left: 450px;
  }
  .momo{
    margin-top: 10px;
    margin-left: 195px;
  }
}
</style>

<div class="popup" id="popup-1">

  <div class="popupoverlay"></div>
  <div class="popupcontent">
    <div class="popupclose-btn momo2" onclick="deletepopup()">&times;</div><br>
    <center>
    <h3 class="momo3" >Are you sure you want to delete your account?</h3>
    <div class="row momo">
          <form method="post" style="text-align: center;">
            <button onclick="deletepopup()" class="btn btn-danger"  style="padding-left: 15px; padding-right: 15px; ">No</button>
            <button name="update5" class="btn btn-success mono">Yes</button>
           
          </form>
        </div>
      </center>
    </div>
  </div>
</div>
<style type="text/css"></style>
<script>
  function deletepopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>
<?php

if (isset($_POST['update1'])) {
  $namey = $_POST['namey'];
  $sql = "Update customers set customer_name = '$namey' where id = '$user_id'";
  $runsql = mysqli_query($con, $sql);
  if($runsql){
      $_SESSION['customer_name'] = $namey;
      echo '<script>window.open("myprofile", "_self");</script>';
    }
}
if (isset($_POST['update2'])) {
  $emaily = $_POST['emaily'];
  $sql = "Update customers set customer_email= '$emaily' where id = '$user_id' ";
  $runsql = mysqli_query($con,$sql);
  if($runsql){
      $_SESSION['customer_email'] = $emaily;
      echo '<script>window.open("myprofile", "_self");</script>';
    }
}
if (isset($_POST['update3'])) {
  $newpass = $_POST['newpass'];
  $renewpass = $_POST['renewpass'];
  if ($newpass==$renewpass) {
     $passwordy = password_hash($newpass, PASSWORD_DEFAULT);
     $sql = "Update customers set customer_pass = '$passwordy' where id = '$user_id' ";
     $runsql = mysqli_query($con,$sql);
     echo '<script>window.open("myprofile", "_self");</script>';
}}
if (isset($_POST['update4'])) {
     $phonelacoste1 = $_POST['phonelacoste'];
     $sql22 = "UPDATE customers set phone= '$phonelacoste1' where id = '$user_id' ";
     $runsql = mysqli_query($con,$sql22);
     if($runsql){
      $_SESSION['phonez'] = $phonelacoste1;
      echo '<script>window.open("myprofile", "_self");</script>';
    }
       
}
if(isset($_POST['update5'])){
  $delete55 = "delete from customers where id='$user_id'";
  $delete66 = "delete from free_ad where user_id='$user_id'";
  $run = mysqli_query($con, $delete55);
  $run = mysqli_query($con, $delete66);
  if($run){
      $_SESSION['logged'] = 0;
      session_start();
      session_destroy();
    }
  echo '<script>window.open("https://tujjari.com", "_self");</script>';
}
?>