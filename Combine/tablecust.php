<?php

error_reporting(0);
include("config.php");
$table='clients';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

		<!-- CSS reset -->
		<link rel="stylesheet" href="simple-confirmation-popup/css/reset.css">
		<link rel="stylesheet" href="simple-confirmation-popup/css/style.css"> <!-- Resource style -->
		<script type="text/javascript" src="simple-confirmation-popup/js/modernizr.js"></script> <!-- Modernizr -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MySQL table search</title>

	<link href="table.css" rel="stylesheet" type="text/css">
	<link href="css/buttons.css" rel="stylesheet" type="text/css" media="all">

	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>


<body>
<div id ="sidebar" class="container">
	<?php include("sidebar.php"); ?>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<div id="table" class="container" style="overflow-x:auto;">
<form id="form1" name="form1" method="post" action="tablecust.php">
	<label>Search:</label>
	<input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
	<label>category</label>
	<select name="category">
	<option value="">--</option>
	<?php
		$query= $conn->query("SELECT * FROM $table GROUP BY category ORDER BY category")or die ('request "Could not execute SQL query here" '.$sql);
		while ($row = $query->fetch_assoc()) {
			echo "<option value='".$row["category"]."'".($row["category"]==$_REQUEST["category"] ? " selected" : "").">".$row["category"]."</option>";
		}
	?>
	</select>
	<input type="submit" name="button" class="button" value="Filter" />
	</label>
	<button class="buttonReset"><a href="tablecust.php">Reset</a></button>
</form>
<br /><br />

<table  border="1" cellspacing="0" cellpadding="4" class="table">
  <tr>
	  <th> Id</th>
	  <th> Category</th>
      <th> Name</th>
	  <th> Email</th>
	  <th> Phone</th>
	  <th> Address</th>
      <th> Description</th>
	  <th> Manage</th><th></th>
  </tr>
<?php
include("config.php");

if ($_REQUEST["string"]<>'')  {
	$search_string = " AND (name LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR details LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR email LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR phone LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR address LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR id LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR category LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%')";
}
if ($_REQUEST["category"]<>'') {
	$search_category = " AND category= '".mysqli_real_escape_string($conn,$_REQUEST["category"])."'".$search_string.$search_category;
}
	$sql = "SELECT * FROM $table WHERE id>0".$search_string .$search_category;
$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
if (mysqli_num_rows($sql_result)>0) {
	while ($row=$sql_result->fetch_assoc()) {
?>
  <tr>
	  <td><?php echo $row["id"]; ?></td>
	  <td><?php echo $row["category"]; ?></td>
	  <td><?php echo $row["name"]; ?></td>
	  <td><?php echo $row["email"]; ?></td>
	  <td><?php echo $row["phone"]; ?></td>
	  <td><?php echo $row["address"]; ?></td>
	  <td><?php echo $row["details"]; ?></td>
	  <td> <a href="editCustomer.php?category=<?php echo $row['category']?>&customername=<?php echo $row['name']?>&email=<?php echo $row['email']?>&phone=<?php echo $row['phone']?>&address=<?php echo $row['address']?>&details=<?php echo $row['details']?>&id=<?php echo $row["id"]; ?>" 2="post" class="group1"  >Edit</a> </td>
	  <td><a href="removeCustomer.php?id=<?php echo $row["id"] ?>" >Remove</a> </td>
<!-- want to implement this but fail
	   <div class="cd-popup" role="alert">
		  <div class="cd-popup-container">
			  <p>Are you sure you want to delete this element?</p>
			  <ul class="cd-buttons">
				  <li><a href="removeCustomer.php?id=<?php echo $row["id"]; ?>">Yes</a></li>
				  <li><a href="tablecust.php">No</a></li>
			  </ul>
			  <a href="" class="cd-popup-close img-replace">Close</a>
		  </div> <!-- cd-popup-container  !--href="removeCustomer.php?id=<1--?php echo $row["id"] -->
	 <!--<div><!-- cd-popup -->

  </tr>
<?php
	}


} else {
?>
<tr><td colspan="9">No results found.</td>
<?php
}
?>
</table>


<script>
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



</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="simple-confirmation-popup/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>