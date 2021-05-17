<?php 
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM free_ad where user_id = '$user_id' ORDER BY id DESC";
	$res_data = mysqli_query($con,$sql);
	$count_ads = mysqli_num_rows($res_data);
	if($count_ads == 0){
		echo "<div class='centerthestuff'><p class='centerthetext'>You haven't listed any Ads yet. If you wish to place an Ad, click the button below</p><br><a href='cardetails' class='centerthesellmycarbuttonagain btn btn-primary'>Sell your car now</a>";
	}else{
	while($row = mysqli_fetch_array($res_data)){
	  $title = $row['title'];
	  $year = $row['model_year'];
	  $id = $row['id'];
	  $price = $row['price'];
	  $km = $row['km'];
	  $description = $row['desci'];
	  $emirate = $row['emirate'];
	  $transmission = $row['transmission_type'];
	  $time = $row['timenow'];
	  $ad_image = $row['ad_image'];
	  $ad_img1 = $row['ad_img1'];
	  echo"<div class='mt-3 mb-3 box1'>
		<div class='col-md-12'>
			<div class='row'>
				<div class='col-md-3'>
					<img class='m-auto' src='adimages/$ad_img1' style='height: auto; width:100%;'>
					<p>Uploaded on <b>$time</b></p>
				</div>
				<div class='col-md-6'>
					<a href='viewdetails.php?id=$id' style='color: black;'><h5> $title</h5></a>
					<p class='text-muted' style='font-size: 14px;'>$description</p>
					<div class='row'>
							<p class='ml-3'>Year: <b>$year</b></p>
							<p class='details1' style='margin-left: 150px;'>Transmission: <b>$transmission</b></p>
					</div>
					<div class='row'>
						<p class='ml-3'>Kilometers: <b>$km km</b></p>
						<p class='details2' style='margin-left: 100px;'>Location: <b>$emirate</b></p>
					</div>
				</div>
				<div class='col-md-3'>
					<div class='row'>
						<p class='stylishtext' style='padding-right: 50px;font-size: 25px;'>AED $price</p>
						<div class='dropdown'>
							<button class='btn' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								<div class='textSpan'></div>
							</button>
							<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
								<form method='post'>
									<a class='dropdown-item' href='editad.php?id=$id'><i class='fa fa-pencil'></i> Edit</a>
									<button name='deletead' class='dropdown-item' href='#'><i class='fa fa-trash'></i> Delete</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";
	}
	if(isset($_POST['deletead'])){
  $delete = "delete from free_ad where id='$id'";
  $run = mysqli_query($con, $delete);
  echo '<script>window.open("mylistings", "_self");</script>';
}
}
	?>
	<style>
		@media (max-width: 767px){
			.details1{
				margin-left: 70px !important;
			}
			.details2{
				margin-left: 25px !important;
			}
		}
		.dropdown-menu.show {
		    display: block;
		    margin-right: 100px !important;
		}
		.textSpan:after {
			content: '\2807';
			font-size: 30px;
			color: #2e2e2e;
		}
		.textSpan:hover{
			background-color: #EDEBEB;
			border-radius: 50%;
		}
		.centerthestuff{
			text-align: center;
			margin-top: 100px;
		}
		.centerthesellmycarbuttonagain{
			margin-bottom: 100px;
		}
		.centerthetext{
*/    		left:25%; 
		}
	</style>
	<?php
}else{
	echo '<script>window.open("login", "_self");</script>';
}
?>