<?php include 'db/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title><link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>
	<form method="post">
		<select style="border-radius: 0px; width: 100%;" class="form-control " name="brand_id" value="Choose Brand">
			<option>Select Brand Name</option>
			<?php 
				$select = "SELECT * FROM `car_brand`";
				$run = mysqli_query($con, $select);
				while($row = mysqli_fetch_array($run)){
					$brand_id = $row['brand_id'];
					$brand_name = $row['brand_name'];
					echo "<option value='$brand_id'>$brand_name</option>";
				}
			?>
		</select>
		<br>
		<input type="text" name="model_name">
		<br>
		<button name="submit">Submit</button>
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$brand_id= $_POST['brand_id'];
	$model_name = $_POST['model_name'];
	// $id = "select * from car_brand where brand_name = '$brand_name'";
	// $run_id = mysqli_query($con, $id);
	// $fetch_id = mysqli_fetch_array($run_id);
	$insert = "insert into car_model(brand_id, model_name) values('$brand_id', '$model_name')";
	$run = mysqli_query($con, $insert);
}
?>