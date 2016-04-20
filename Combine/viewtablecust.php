<?php

error_reporting(0);
$table='clients';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Customers</title>
	<link rel="stylesheet" href="simple-confirmation-popup/css/reset.css">
	<link href="table.css" rel="stylesheet" type="text/css">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>


<body>
<div id ="sidebar" class="container">
	<?php include("sidebar.php"); ?>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<div id="table" class="container" style="overflow-x:auto;">
<form id="form1" name="form1" method="post" action="viewtablecust.php" autocomplete="off">
 <label>Search:</label>
<input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
<label>Category</label>
<select name="category">
<option value="">--</option>
<?php
	$query= $conn->query("SELECT * FROM $table GROUP BY category ORDER BY category")or die ('request "Could not execute SQL query here" '.$sql);
	while ($row = $query->fetch_assoc()) {
		echo "<option value='".$row["category"]."'".($row["category"]==$_REQUEST["category"] ? " selected" : "").">".$row["category"]."</option>";
	}
?>
</select>
<input type="submit" name="button" id="button" value="Filter" />
  </label>
	<button type="button"><a href="viewtablecust.php">Reset</a></button>
</form>
<br /><br />
<table width="700" border="1" cellspacing="0" cellpadding="4" id="tablecust" class="table tablesort">
	<thead>
  <tr>
    <!--<td width="90" bgcolor="#CCCCCC"><strong>From date</strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong>To date</strong></td>-->
	  <th width="50">ID</th>
	  <th width="191">Category</th>
      <th width="159">Name</th>
	  <th width="159">Email</th>
	  <th width="159">Phone</th>
	  <th width="159">Address</th>
      <th width="191">Description</th>
  </tr>
	</thead>
	<tbody>
<?php
if ($_REQUEST["string"]<>'') {
	$search_string = " AND (name LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR details LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR email LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR phone LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR address LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR id LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR category LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%')";
}
if ($_REQUEST["category"]<>'') {
	$search_category = " AND category= '".mysqli_real_escape_string($conn,$_REQUEST["category"])."'".$search_string.$search_category;
}

/*($_REQUEST["from"]<>'' and $_REQUEST["to"]<>'')*/
/* $sql = "SELECT * FROM $table WHERE from_date >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."' AND to_date <= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
} else if ($_REQUEST["from"]<>'') {SE from_date >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."'".$search_string.$search_category;
} else if ($_REQUEST["to"]<>'') {
	$sql = "SELECT * FROM $table WHERE to_date <= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
} else {*/
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
  </tr>
<?php
	}
} else {
?>
<tr><td colspan="7">No results found.</td>
<?php	
}
?>
</table>
	</tbody>

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
	<script type="text/javascript">
		$(document).ready(function()
			{
				$("#tablecust").tablesorter();
			}
		);

	</script>
</div>
<script type="text/javascript" src="tablesort.js"></script>
</body>
</html>