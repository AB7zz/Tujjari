<?php
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$name = $_POST['name'];
	$repass = $_POST['repass'];
	$phoney =$_POST['phoney'];
	if($pass==$repass)
	{
		$nigga = $con->prepare("SELECT * FROM customers where customer_email = ?");
		$nigga->bind_param("s",$email);
		$nigga->execute();
		$run_cust = $nigga->get_result();
		$count_cust = mysqli_num_rows($run_cust);
		if(strlen($pass) < 5)
		{
			$_SESSION['namelacoste'] = $name;
			$_SESSION['emaillacoste']=$email;
			$_SESSION['passlacoste']=$pass;
			$_SESSION['relacoste'] = $repass;
			$_SESSION['phonelacoste']=$phoney;
			$_SESSION['wrongy'] = 3;
			echo '<script>window.open("register", "_self");</script>';
		}
		else
		{
			if($count_cust == 0 )
			{
				$token = random_bytes(32);
				$url = "http://tujjari.com/verify?token=" . bin2hex($token); 
				$expires = date("U") + 1800;
				require 'db/db.php';
				$sql="DELETE from verifyacc where verifyaccEmail=?";
				$stmt = mysqli_stmt_init($con);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "there was an error!";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "s", $email);
					mysqli_stmt_execute($stmt);
				}
				$sql = "INSERT INTO verifyacc(verifyaccEmail, verifyaccPass, verifyaccName, verifyaccPhone, verifyaccToken, verifyaccExpires) VALUES(?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($con);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "there was an error!";
					exit();    
				}else{
					$password = password_hash($pass, PASSWORD_DEFAULT);
					$hashedToken = bin2hex($token);
					mysqli_stmt_bind_param($stmt, "ssssss", $email, $password, $name, $phoney, $hashedToken, $expires);
					mysqli_stmt_execute($stmt);
				}
				mysqli_stmt_close($stmt);
				mysqli_close($con);
				$to = $email;
				$subject = "Verify Email Address for Tujjari";
				$message = ' 
    
                <!DOCTYPE html>
                <html>
                <center>
                <div class="container"><br>
                <div>
                <a href="https://tujjari.com"><img class="loginlogo" src="https://tujjari.com/images/logo.png" style="height: 65px; width: 160px;" ></a>
                   </div>
                  <div class="boxlegend">
                  <h3 style="color: black; font-size: 20px;" >Hey '.$name. ',<br></h3>
                  <p style="color: black; font-size: 15px;">Thanks for registering for an account on Tujjari! Before we get started, we just need to confirm that this is you. Click below to verify your email address:</p>
                    <br>
                    <a class="btn btn-primary" href="' .$url. '">Verify Email</a>
                ';
    $headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
				$headers .= "From- tujjari@gmail.com \nReply To- tujjari@gmail.com\nContent type- texthtml";


				$success = mail($to, $subject, $message, $headers);
				if($success){
					echo '<script>window.open("verificationemail", "_self");</script>';
				}else{
					echo "Something went wrong :(";
				}
			}
		}
	}
}
?>