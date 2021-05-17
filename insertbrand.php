<?php include 'db/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>
	<form method="post">
		<input type="text" name="brand">
		<br>
		<button name="submit">Submit</button>
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$brand = $_POST['brand'];
	$insert = "insert into car_brand(brand_name) values('$brand')";
	$run = mysqli_query($con, $insert);
}
?>