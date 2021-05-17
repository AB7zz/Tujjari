<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<span class="navbar-toggler-icon"></span>
</button>
<div class="ml-3 sidebarbox"style="border-radius: 10px; margin-top: 40px;">
<div class="form-inline">
</div>
<form method="post" id="sidebar" style="padding-left: 7px; padding-right: 7px;"><br>
  <div class="container-fluid"><div class="row">
  <h4>Search</h4>
  <button class="ml-auto btn" type="reset" >Clear</button><br></div></div>
<div class="mt-2">
<label class="text-muted">Brand</label>
<select id="select1"  style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="carbrand" value="Choose Brand" style="">
<option>Choose Brand</option>
<?php
              $select = "SELECT * FROM `free_ad` order by car_brand ASC";
              $run = mysqli_query($con, $select);
              while($row = mysqli_fetch_array($run)){
                $brand_id = $row['car_brand'];
                $select1 = "SELECT * FROM `car_brand` where brand_id='$brand_id'";
                $run1 = mysqli_query($con, $select1);
                $row1 = mysqli_fetch_array($run1);
                $brand_name = $row1['brand_name'];
                echo "<option value='$brand_id'>$brand_name</option>";
              }
            ?>
</select>
<label class="text-muted">Model</label>
<select id="select2" style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" style="border-top: none !important;" class="form-control mr-sm-2 mb-3" name="carmodel" value="Choose Model" style="">
<option>Choose Model</option>
<script type="text/javascript">
   $('[name=carbrand]').change(function(){
              document.getElementById('select2').innerHTML = "<?php
              $select = 'SELECT * FROM `car_model` order by model_name ASC';
              $run = mysqli_query($con, $select);
              while($row = mysqli_fetch_array($run))
              {
                $model_name = $row['model_name'];
                $brand_id = $row['brand_id'];
                echo "<option value='$model_name' id='$brand_id'>$model_name</option>";
              }
            ?>"})
</script>
</select>
  <script type="text/javascript">
$("#select1").change(function() {
  if ($(this).data('options') === undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select2 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[id=' + id + ']');
  $('#select2').html(options);
});
</script>
<span id="dots"></span>
<span id="more">
<div class="container-fluid">
<label class="text-muted">Year Range</label>
<div class="row">
<select style="width: 49%;" class="form-control" name="year1" >
<option>From</option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>

<select style="width: 49%;" class="form-control mb-3 ml-1" name="year2" >
<option>To</option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select></div></div>
<!-- <label class="text-muted">Select Body Style</label>
<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="" value="Choose Body Style" style="">
<option>--Choose Body Style--</option>
<option>Dubai</option>
<option>Ajman</option>
<option>Sharjah</option>
<option>Abu Dhabi</option>
<option>Umm Al Quwain</option>
<option>Ras Al Khaimah</option>
</select>
<label class="text-muted">Select Fuel Type</label>
<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="" value="Choose Fuel Type" style="">
<option>--Choose Fuel Type--</option>
<option>Dubai</option>
<option>Ajman</option>
<option>Sharjah</option>
<option>Abu Dhabi</option>
<option>Umm Al Quwain</option>
<option>Ras Al Khaimah</option>
</select>
<label class="text-muted">Select Transmission</label>
<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="" value="Choose Transmission" style="">
<option>--Choose Transmission--</option>
<option>Dubai</option>
<option>Ajman</option>
<option>Sharjah</option>
<option>Abu Dhabi</option>
<option>Umm Al Quwain</option>
<option>Ras Al Khaimah</option>
</select>
<label class="text-muted">Select Body Style</label>
<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="" value="Choose Body Style" style="">
<option>--Choose Body Style--</option>
<option>Dubai</option>
<option>Ajman</option>
<option>Sharjah</option>
<option>Abu Dhabi</option>
<option>Umm Al Quwain</option>
<option>Ras Al Khaimah</option>
</select> -->
<label>Price Range (AED)</label>

<div class="fromto"><div class="container-fluid"><div class="row">
<input style="border-radius: 0px; border-color: lightgrey; border-top: none; border-left: none; border-right: none;width: 49%;" type="text" class="mb-2" name="from" placeholder="From">
<input style="border-radius: 0px; border-color: lightgrey; border-top: none; border-left: none; border-right: none; width: 49%;" type="text" name="to" placeholder="To" class="ml-1 mb-2">
</div></div></div><br><br>
<center>
<input class="form-control mb-1" name="keywords" placeholder="Enter Keywords" style="border-color: rgb(0, 0, 0); width: 97%;" aria-label="Search"></center>
<!-- <label class="text-muted">Select Car Condition</label>
<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="" value="Choose Car Condition" style="">
<option>--Choose Car Condition--</option>
<option>Dubai</option>
<option>Ajman</option>
<option>Sharjah</option>
<option>Abu Dhabi</option>
<option>Umm Al Quwain</option>
<option>Ras Al Khaimah</option>
</select>
<label class="text-muted">Select Seller Type</label>
<select style="border-radius: 0px; border-top: none; border-left: none; border-right: none;" class="form-control mr-sm-2 mb-3" name="" value="Choose Seller Type" style="">
<option>--Choose Seller Type--</option>
<option>Dubai</option>
<option>Ajman</option>
<option>Sharjah</option>
<option>Abu Dhabi</option>
<option>Umm Al Quwain</option>
<option>Ras Al Khaimah</option>
</select> -->
<center><br>
<button class="btn btn-primary mb-4" value="Search" name="search" style="width: 100%;">Search</button>
</center>
</div>
</form>

</div>

<script type="text/javascript">


function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerText = "View more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerText = "View less";
    moreText.style.display = "inline";
  }

}
</script>

<?php
if(isset($_POST['search'])){
  if(($_POST['carbrand'] == "") || ($_POST['carbrand'] == "Choose Brand")){$carbrand=NULL;}else{$carbrand=$_POST['carbrand'];}
  if(($_POST['carmodel'] == "") || ($_POST['carmodel'] == "Choose Model")){$carmodel=NULL;}else{$carmodel=$_POST['carmodel'];}
  if($_POST['keywords'] ==""){$keywords=NULL;}else{$keywords=$_POST['keywords'];}
  if($_POST['from'] == ""){$from=NULL;}else{$from=$_POST['from'];}
  if($_POST['to'] == ""){$to=NULL;}else{$to=$_POST['to'];}
  if(($_POST['year1'] == "") || ($_POST['year1'] == "From")){$year1=NULL;}else{$year1=$_POST['year1'];}
  if(($_POST['year2'] == "") || ($_POST['year2'] == "To")){$year2=NULL;}else{$year2=$_POST['year2'];}
  echo "<script>window.open('car.php?carbrand=$carbrand&carmodel=$carmodel&keywords=$keywords&pricefrom=$from&priceto=$to&yearfrom=$year1&yearto=$year2', '_self');</script>";
}
?><br>