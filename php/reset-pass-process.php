<?php

if(isset($_POST['reset-my-password'])){
	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$password = $_POST['pass'];
	$passwordRepeat = $_POST['repass'];
	if(empty($password) || empty($passwordRepeat)){
        // header("Location: ../create-new-password.php?newpwd=empty");
        echo "<script>window.open('../create-new-password.php?newpwd=empty' , '_self')</script>";
        exit();
	}else if($password != $passwordRepeat){
		// header("Location: ../create-new-password.php?newpwd=pwdnotsame");
		echo "<script>window.open('../create-new-password.php?newpwd=pwdnotsame' , '_self')</script>";
		exit();
	}
	$currentDate = date("U");
	require 'db/db.php';
	$sql = "SELECT * from pwdreset where pwdResetSelector = ? AND pwdResetExpires >= ?";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "there was an error!";
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if(!$row = mysqli_fetch_assoc($result)){
			echo "An error occurred";
		}else{
			$tokenBin = hex2bin($validator);
			$tokenCheck  = password_verify($tokenBin, $row['pwdResetToken']);
			if($tokenCheck == false){
				echo "An error occurred";
				exit();
			}else if($tokenCheck == true){
				$tokenEmail = $row['pwdResetEmail'];
				$sql = "SELECT * from customers where customer_email=?";
				$stmt = mysqli_stmt_init($con);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "there was an error!";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					if(!$row = mysqli_fetch_assoc($result)){
						echo "There was an error";
						exit();
					}else{
						$sql = "UPDATE customers set customer_pass=? where customer_email=?";
						$stmt = mysqli_stmt_init($con);
						if(!mysqli_stmt_prepare($stmt, $sql)){
							echo "there was an error!";
							exit();
						}else{
							$newPwdHash = password_hash($password, PASSWORD_DEFAULT);
							mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
							mysqli_stmt_execute($stmt);
							$sql = "DELETE FROM pwdreset where pwdResetEmail=?";
							$stmt = mysqli_stmt_init($con);
							if(!mysqli_stmt_prepare($stmt, $sql)){
								echo "there was an error!";
								exit();
							}else{
								mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
								mysqli_stmt_execute($stmt);
								$_SESSION['pwdReset'] = 1;
								echo "<script>window.open('../login?newpwd=passwordupdated' , '_self')</script>";							}
						}
					}
				}
			}
		}
	}
}else{
	// echo "<script>window.open('../create-new-password.php?newpwd=pwdnotsame' , '_self')</script>";
}
?>