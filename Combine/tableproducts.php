<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Products</title>
	<link href="table.css" rel="stylesheet" type="text/css">
	<link href="css/buttons.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="tablesort.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>

<div id ="sidebar" class="container">
	<?php include("sidebar.php"); ?>
</div>

<body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<?php
error_reporting(0);
if(isset($_POST["deleteproduct"])) {
	$delete_id = $_GET['id'];
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "DELETE FROM objects WHERE `objects`.`id` = $delete_id ";
	echo '<div id="boxes">
              <div id="dialog" class="window">
              <h1>';
	if ($conn->query($sql) === TRUE) {
		echo 'Product has been deleted.';
	} else {
		echo $conn->error;
	}
	echo '</h1>
              </div>
              <div id="mask"></div>
              </div>';
} else {
	$delete_id = 0;
}
?>

	<div id="table" class="inner-block container ">
	<form id="form1" name="form1" method="post" action="tableproducts.php" autocomplete="off">
		<div class ="row">
			<div class="col-xs-1">
				<label for="from">From:</label>
				<input name="from" type="text" id="from" size="10" value="<?php echo $_REQUEST["from"]; ?>" />
			</div>
			<div class="col-xs-1">
				<label for="to">To:</label>
				<input name="to" type="text" id="to" size="10" value="<?php echo $_REQUEST["to"]; ?>"/>
			</div>
			<div  class="col-xs-2">
				<label>Items:</label>&nbsp;
				<input id ="searchitem"  type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
			</div>
			<div  class="col-xs-2">
				<label>Category:</label>
				<select name="category" id="cat">
				<option value="">--</option>
				<?php
					$query= $conn->query("SELECT * FROM objects GROUP BY category ORDER BY category")or die ('request "Could not execute SQL query" '.$sql);
					while ($row = $query->fetch_assoc()) {
						echo "<option value='".$row["category"]."'".($row["category"]==$_REQUEST["category"] ? " selected" : "").">".$row["category"]."</option>";
					}
				?>
				</select>
			</div>
			<div  class="col-xs-1">
				<label>Status:</label>
				<select name ="status">
					<option ><?php echo stripcslashes($_REQUEST["status"]); ?></option>
					<option value="Available">Available</option>
					<option value="On Loan">On Loan</option>
					<option value="Overdue">Overdue</option>
				</select>
			</div>
			<div  class="col-xs-4">
				<input type="submit" name="button" class="button"  value="Filter" />
				</label>
				<a href="tableproducts.php?id=$id_" class="buttonReset" role="button">Reset</a>
				
			</div>

		</form>

<br /><br /> <br> <br>
<table width="500" border="0" cellspacing="0" cellpadding="4" id="tableitem"class="table tablesorter">
  <thead>
  <tr>
	  <th width="95">Category</td>
	  <th width="95">ID</td>
      <th width="159">Name</th>
	  <th width="159">Manufacturer</th>
	  <th width="95">OS</th>
      <th width="100">Description</th>
      <th width="100">UDID</th>
	  <th width="100">IMEI</th>
	  <th width="100">Serial</th>
	  <th width="191">Client</th>
	  <th width="95">Start</th>
	  <th width="95">End </th>
	  <th width="30">Status</th>
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
	$sql = "SELECT * FROM objects WHERE beginDate >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."' AND endDate <= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
} else if ($_REQUEST["from"]<>'')
{
	$sql = "SELECT * FROM objects WHERE beginDate >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."'".$search_string.$search_category;
} else if ($_REQUEST["to"]<>'')
{
	$sql = "SELECT * FROM objects WHERE endDate<= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
}else if($_REQUEST["status"]=="Available")
{
	$sql = "SELECT * FROM objects WHERE client IS NULL".$search_string.$search_category;
}
else if($_REQUEST["status"]=="On Loan")
{

	$sql = "SELECT * FROM objects WHERE client IS NOT NULL AND CURDATE()<=endDate ".$search_string.$search_category ;
}
else if($_REQUEST["status"]=="Overdue")
{
	$sql = "SELECT * FROM objects WHERE client IS NOT NULL AND CURDATE()>endDate ".$search_string.$search_category ;
}
else {
	$sql = "SELECT * FROM objects WHERE id != $delete_id".$search_string.$search_category;
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
		$begin_ = $row["beginDate"];
		$end_ = $row["endDate"];
		if ($begin_ == "0000-00-00") {
			$begin_ = "";
			$end_ = "";
		}
		$client_ = $row["client"];
		$status_ = "<span class=\"label label-info\">Available</span>";
		if ($row["client"]!= NULL)
		{
			if (date("Y-m-d") > $end_) {
				$status_ = "<span class=\"label label-danger\">Overdue</span>";
			} else {
				$status_ = "<span class=\"label label-success\">On Loan</span>";
			}
		}
		echo"<tr>
	  <td>$category_</td>
	  <td>$id_</td>
      <td>$name_</td>
	  <td>$manufacturer_</td>
	  <td>$OS_</td>
	  <td>$description_</td>
      <td>$UDID_</td>
	  <td>$IMEI_</td>
	  <td>$serial_</td>
	  <td>$client_</td>
	  <td>$begin_</td>
      <td>$end_</td>
	  <td>$status_</td>
	  <td><form action=\"editproduct.php?id=$id_&name=$name_&description=$description_&category=$category_&os=$OS_&udid=$UDID_&imei=$IMEI_&serial=$serial_&manufacturer=$manufacturer_\" method=\"POST\">
			 <input type=\"submit\" name=\"submitec\" value=\"Edit\" class = \"tb5-2\"> </input></form></td>
	  <td><form action=\"tableproducts.php?id=$id_\" method=\"POST\">
			  <input type=\"submit\" name=\"deleteproduct\" value=\"X\" class = \"tb5\"> </input></form></td>
  		</tr>";
	}
} else {
echo '<tr><td colspan="14">No results found.</td>';
}
$conn->close();
?>

	</tbody>
	</div>

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
	<script>
		$(function() {
			enable_cb();
			$("#group1").click(enable_cb);
		});

		function enable_cb() {
			if (this.click) {
				$("input.group1").removeAttr("disabled");
			} else {
				$("input.group1").attr("disabled", true);
			}
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function()
			{
				$("#tableitem").tablesorter();
			}
		);

	</script>
	<script type="text/javascript" src="tablesort.js"></script>
	<div id = resp>

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