<?php
if(isset($_POST['submit'])){
$email = $_POST['email'];
$pass = $_POST['pass'];
  $nigga = $con->prepare("SELECT * FROM customers where customer_email = ?");
      $nigga->bind_param("s",$email);
  $nigga->execute();
  $run_cust = $nigga->get_result();
$count_cust = mysqli_num_rows($run_cust);
$fetch_cust = mysqli_fetch_array($run_cust);
$password = $fetch_cust['customer_pass'];
if($count_cust == 1)
{
$pass_check = password_verify($pass, $password);
if($pass_check)
{
$name = $fetch_cust['customer_name'];
$user_id = $fetch_cust['id'];
$email = $fetch_cust['customer_email'];
$phonez = $fetch_cust['phone'];
$_SESSION['customer_name'] = $name;
$_SESSION['user_id'] = $user_id;
$_SESSION['customer_email'] = $email;
$_SESSION['phonez'] = $phonez;
$_SESSION['logged'] = 1;
if (isset($_POST['remember_me'])) {
  setcookie('emailcookie',$email,time()+86400);
  setcookie('passwordcookie',$pass,time()+86400);
  echo '<script>window.open("https://tujjari.com", "_self");</script>';
}
else{
  echo '<script>window.open("https://tujjari.com", "_self");</script>';
}
}else{
$_SESSION['wrong_email'] = $email;
$_SESSION['wrong_enter'] = 1;
echo '<script>window.open("login", "_self");</script>';
}
}
else if($count_cust == 0)
{
$_SESSION['wrong_email'] = "";
$_SESSION['wrong_enter'] = 2;
echo '<script>window.open("login", "_self");</script>';
}
}
?>
