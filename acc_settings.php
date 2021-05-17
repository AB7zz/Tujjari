<h3><center>Account Settings</center></h3>
<button class="accordion"><b>Name:</b> Abhinav CV</button>
<div class="panel">
  <input class="mt-3 mb-3" type="text" name="firstname" placeholder="Enter First Name">
  <input class="mt-3 mb-3" type="text" name="secondname" placeholder="Enter Second Name">
  <button class="btn btn-outline-dark">Update</button>
</div>
<button class="mt-4 accordion"><b>Email:</b> abhinavcv007@gmail.com</button>
<div class="panel">
  <input class="mt-3 mb-3" type="text" name="email" placeholder="Enter Email">
  <button class="btn btn-outline-dark">Update</button>
</div>
<button class="mt-4 accordion"><b>Password:</b> ************</button>
<div class="panel">
  <input class="mt-3 mb-3" type="password" name="newpass" placeholder="Enter New Password">
  <input class="mt-3 mb-3" type="password" name="renewpass" placeholder="Re-enter Your New Password">
  <button class="btn btn-outline-dark">Update</button>
</div>
<button class="mt-4 accordion"><b>Phone:</b> +971551271295</button>
<div class="panel">
  <input class="mt-3 mb-3" type="text" name="phone" placeholder="Enter Phone Number">
  <button class="btn btn-outline-dark">Update</button>
</div>
<button class="mt-4 accordion"><b>Deactivate:</b> Delete Account</button>
<style type="text/css">
/* Style the buttons that are used to open and close the accordion panel */
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