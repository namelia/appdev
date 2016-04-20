<?php


error_reporting(0);
include("config.php");
$table='objects';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Products</title>

	<link href="table.css" rel="stylesheet" type="text/css">
	<link href="css/buttons.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="tablesort.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<!--<style>
BODY, TD:not(id=sidebar) {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
</style>-->



</head>


<body>
	<div class="row">

		<div id ="sidebar" class="container">
			<!--<div class=" col-sm-3 col-xs-3">-->
			<?php include("sidebar.php"); ?>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

	<!-- <div class=" col-sm-9 col-xs-9">-->
	<div id="table" class="container ">
	<form id="form1" name="form1" method="post" action="tableItem.php" autocomplete="off">
		<div class ="row">
			<!--<div class="col-xs-2">
				<label for="from">From</label>
				<input name="from" type="text" id="from" size="10" value="<?php echo $_REQUEST["from"]; ?>" />
			</div>
			<div class="col-xs-2">
				<label for="to">to</label>
				<input name="to" type="text" id="to" size="10" value="<?php echo $_REQUEST["to"]; ?>"/>
			</div>-->
			<div  class="col-xs-3">
				<label>Items:</label>&nbsp;
				<input id ="searchitem"  type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
			</div>
			<div  class="col-xs-2">
				<label>Category</label>
				<select name="category" id="cat">
				<option value="">--</option>
				<?php
					$query= $conn->query("SELECT * FROM $table GROUP BY category ORDER BY category")or die ('request "Could not execute SQL query" '.$sql);
					while ($row = $query->fetch_assoc()) {
						echo "<option value='".$row["category"]."'".($row["category"]==$_REQUEST["category"] ? " selected" : "").">".$row["category"]."</option>";
					}
				?>
				</select>
			</div>
			<div  class="col-xs-4">
				<input type="submit" name="button" class="button"  value="Filter" />
				</label>
				<!-- <button  class="buttonReset"><a href="tableItem.php">Reset</a></button> -->
				<a href="tableItem.php?id=$id_" class="buttonReset" role="button">Reset</a>
				
			</div>

		</form>
		<!-- </div>
	</div>-->

<br /><br /> <br> <br>
<table width="500" border="1" cellspacing="0" cellpadding="4" id="tableitem"class="table table-striped table-hover table-responsive tablesorter">
  <thead>
  <tr>
	  <th width="159"> Category</td>
	  <th width="95"> ID</td>
      <th width="159"> Name</th>
	  <th width="159"> Manufacturer</th>
	  <th width="95"> OS</th>
      <th width="100"> Description</th>
      <th width="95"> UDID</th>
	  <th width="95"> IMEI</th>
	  <th width="95"> Serial</th>
	  <th colspan="2"> Manage</th>
  </tr>
  </thead>
	<tbody>
<?php

if ($_REQUEST["string"]<>''){
	$search_string = " AND (name LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR description LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR Category LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%') OR OS LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR UDID LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR id LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR manufacturer LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR serial LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR IMEI LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'";
}
if ($_REQUEST["category"]<>'') {
	$search_category = " AND category='".mysqli_real_escape_string($conn,$_REQUEST["category"])."'";
}

if ($_REQUEST["from"]<>'' and $_REQUEST["to"]<>'')
{
	$sql = "SELECT * FROM $table WHERE from_date >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."' AND to_date <= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
} else if ($_REQUEST["from"]<>'')
{
	$sql = "SELECT * FROM $table WHERE from_date >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."'".$search_string.$search_category;
} else if ($_REQUEST["to"]<>'')
{
	$sql = "SELECT * FROM $table WHERE to_date <= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
} else {
	$sql = "SELECT * FROM $table WHERE id>0".$search_string.$search_category;
}

$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
if (mysqli_num_rows($sql_result)>0) {
	while ($row=$sql_result->fetch_assoc()) {
		$category_=$row['category'];
		$id_=$row['id'];
		$name_=$row['name'];
		$manufacturer_=$row['manufacturer'];
		$OS_=$row['OS'];
		$description_=$row['description'];
		$UDID_=$row['UDID'];
		$IMEI_=$row['IMEI'];
		$serial_=$row['serial'];
		echo"
 	  <tr>
	  <td>$category_</td>
	  <td>$id_</td>
      <td>$name_</td>
	  <td>$manufacturer_</td>
	  <td>$OS_</td>
	  <td>$description_</td>
      <td>$UDID_</td>
	  <td>$IMEI_</td>
	  <td>$serial_</td>
	  <td><form action=\"editItem.php?id=$id_&name=$name_&description=$description_&category=$category_&OS=$OS_&UDID=$UDID_&IMEI=$IMEI_&Serial=$serial_&Manufacturer=$manufacturer_\" method=\"POST\">
			 <input type=\"submit\" name=\"submitec\" value=\"Edit\"> </input></form></td>
	  <td><form action=\"tableItem.php?id=$id_\" method=\"POST\">
			  <input type=\"submit\" name=\"submitri\" value=\"Remove\"> </input></form></td>
  </tr>";

	}
} else {
?>
<tr><td colspan="11">No results found.</td>
<?php	
}
?>
	</tbody>
	</div>
	<script type="text/javascript">
		$(document).ready(function()
			{
				$("#tableitem").tablesorter();
			}
		);

	</script>
<?php
if(isset($_POST["submitri"])) {
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$someID = $_GET['id'];
	$sql = "DELETE FROM objects WHERE `objects`.`id` = $someID ";
	if ($conn->query($sql) === TRUE) {
		echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Entry has been deleted!</h1>
              </div>
              <div id="mask"></div>
              </div>';


	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		//echo "  ID: " . $someID;
	}
	$conn->close();
}
?>



<script type="text/javascript">
	$(document).ready(function() {

		var id = '#dialog';

//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();

//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});

//transition effect
		$('#mask').fadeIn(500);
		$('#mask').fadeTo("slow",0.9);

//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();

//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);

//transition effect
		$(id).fadeIn(2000);

//if close button is clicked
		$('.window .close').click(function (e) {
//Cancel the link behavior
			e.preventDefault();

			$('#mask').hide();
			$('.window').hide();
		});

//if mask is clicked
		$('#mask').click(function () {
			$(this).hide();
			$('.window').hide();
		});

	});
</script>
	<script type="text/javascript">
		$(function() {
			var dates = $( "#from, #to" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 2,
				dateFormat: 'yy-mm-dd',
				onSelect: function( selectedDate ) {
					var option = this.id == "from" ? "minDate" : "maxDate",
						instance = $( this ).data( "datepicker" ),
						date = $.datepicker.parseDate(
							instance.settings.dateFormat ||
							$.datepicker._defaults.dateFormat,
							selectedDate, instance.settings );
					dates.not( this ).datepicker( "option", option, date );
				}
			});
		});
	</script>
	<script type="text/javascript" src="tablesort.js"></script>
</body>
</html>