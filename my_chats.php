<?php include 'php/userinfo.php'; ?>
  <div id="chatmessages2"></div>
	<script>
     
      
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
     			html1 += "<div id='chats2[" + i + "]'></div>";
     			document.getElementById("chatmessages2").innerHTML += html1;
			    firebase.database().ref("messages/"+my_id+"/"+keys[i]).on("child_added", function(snapshot){
					if((snapshot.val().client_id == my_id) && (snapshot.val().sender_id != my_id)){
					    //TESTING 3 (ALMOST PERFECT ONE)
					    html = "<div onClick='window.open('userpanel?client_id=";
                html += snapshot.val().sender_id + "', '_self');' id='chatbox' class='chatbox5'><div class='row'><div class='col-md-2 col-lg-2 col-12 col-sm-12'><img class='mt-3 mb-3 ml-5' src='images/default.png' style='height: 100px; width: 100px; border-radius: 50%;'></div><div class='col-md-10 col-lg-10 col-12 col-sm-12'><div class='col-lg-12 col-md-12 col-sm-12 col-12'><p class='mt-4 ml-5'>";
                html += "<a href='userpanel?client_id="
                html += snapshot.val().sender_id + "'>" + snapshot.val().sender + "</a></p></div><ul class='mt-3' ><li style='list-style-type: none;' class='cut-text col-md-12 col-lg-12 col-12 col-sm-12 ml-3 text-muted' >";
                html += snapshot.val().message + "</li></ul></div>";
                document.getElementById("chats2["+i+"]").innerHTML = html;
			    	}	
			    	else if((snapshot.val().client_id != my_id) && (snapshot.val().sender_id == my_id)){
			    		html = "<div onClick='window.open('userpanel?client_id=";
                html += snapshot.val().client_id + "', '_self');' id='chatbox' class='chatbox5'><div class='row'><div class='col-md-2 col-lg-2 col-5 col-sm-5'><img class='mt-3 ml-3 mb-3 makechatimgresponsive img-responsive' src='images/default.png' style='height: 100px; width: 100px; border-radius: 50%;'></div><div class='col-md-10 col-lg-10 col-7 col-sm-7'><div class='col-lg-12 col-md-12 col-sm-12 col-12'><p class='ml-3 mt-4'>";
                html += "<a href='userpanel?client_id=";
                html += snapshot.val().client_id + "'>" + snapshot.val().client_name + "</a></p></div><p class='ml-3 cut-text col-md-12 col-lg-12 col-12 col-sm-12 text-muted' >";
                html += snapshot.val().message + "</p></div>";
                document.getElementById("chats2["+i+"]").innerHTML = html;
			    	}
			    });
			}
		}
		function errData(err){
			console.log('Error!');
			console.log(err);
	    }
	</script>
	<div class="popup" id="popup-1">
  <div class="popupoverlay"></div>
  <div class="popupcontent">
    <div class="popupclose-btn" onclick="deletepopup()">&times;</div>
    <h3 class="col-md-12 col-lg-12 col-12 col-sm-12 mt-4">Delete Chat with this person?</h3>
    <div class="col-md-12 col-lg-12 col-12 col-sm-12 ">
      <div class="mt-3">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <form method="post">
              <button name="deletead" class="btn btn-success">Delete</button>
            </form>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <button onclick="deletepopup()" class="btn btn-danger">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
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
  height:200px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}
@media (max-width: 991px){
  .popup .popupcontent {
  width:300px;
  height:250px;
}

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

@media()
</style>
<script>
  function deletepopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>
	<style type="text/css">
		.box5{
			min-height: 500px;
		}
		.chatbox5{
			background-color: #fff;
			border: solid 1px #e6e6e6;
			min-height: 70px;
      width: 100%;
			box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
		}
		.chatbox5:hover{
			background-color: #F2F2F2;
			cursor: pointer;
		}
    .messagetext{
      padding: 0 500px 0 0px;
    }
    .cut-text { 
  display: block;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
}
@media only screen and (max-width: 768px) {
.makechatimgresponsive{
  height: 50px  !important; 
  width: 50px !important;
}
}
	</style>
