<?php 
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$get_cust = "select * from customers where customer_email = '$email'";
		$run_cust = mysqli_query($con, $get_cust);
		$row_cust = mysqli_num_rows($run_cust);
		if($row_cust==0){
			echo '<script>alert("No such email exists, please enter again");</script>';
			echo '<script>window.open("forgotpassword", "_self");</script>';
		}
		else{
			$selector = bin2hex(random_bytes(8));
			$token = random_bytes(32);
			$url = "http://tujjari.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); 
			$expires = date("U") + 1800;
			require 'db/db.php';
			$sql="DELETE from pwdreset where pwdResetEmail=?";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "there was an error!";
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
			}
			$sql = "INSERT INTO pwdreset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "there was an error!";
				exit();    
			}else{
				$hashedToken = password_hash($token, PASSWORD_DEFAULT);
				mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
				mysqli_stmt_execute($stmt);
			}
			mysqli_stmt_close($stmt);
			mysqli_close($con);

			$to = $email;
			$subject = "Password reset on Tujjari";
			$message = "You're receiving this e-mail because you requested a password reset for your Tujjari.com account.\n\nPlease go to the following page and choose a new password:\nHere is your password reset link: \n";
			$message .= $url;
			$message .= "\n\nIf this action wasn't taken by you, please report it here https://tujjari.com/contactus";
			$headers = "From- tujjari@gmail.com \nReply To- tujjari@gmail.com\nContent type- texthtml";


			$success = mail($to, $subject, $message, $headers);
			if($success){
				echo '<script>window.open("emailsent", "_self");</script>';
			}else{
				echo "Something went wrong :(";
			}
		}
	}
?>