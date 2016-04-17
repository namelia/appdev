<?php


error_reporting(0);
include("config.php");
$table='objects';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MySQL table search</title>

	<link href="table.css" rel="stylesheet" type="text/css">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>


<body>
<div class="row">

		<div id ="sidebar" class="container">
			<?php include("sidebar.php"); ?>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>


	<div id="table" class="container ">
	<form id="form1" name="form1" method="post" action="tableItem.php">
		<div class ="row">
			<div class="col-xs-2">
				<label for="from">From</label>
				<input name="from" type="text" id="from" size="10" value="<?php echo $_REQUEST["from"]; ?>" />
			</div>
			<div class="col-xs-2">
				<label for="to">to</label>
				<input name="to" type="text" id="to" size="10" value="<?php echo $_REQUEST["to"]; ?>"/>
			</div>
			<div  class="col-xs-3">
				<label>Items:</label>&nbsp;
				<input id ="searchitem"  type="text" size="15" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
			</div>
			<div  class="col-xs-3">
				<label>Type</label>
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
			<div  class="col-xs-2">
				<input type="submit" name="button" id="button" value="Filter" />
				</label>
				<button type="button"><a href="tableItem.php"> Reset</a></button>
			</div>

		</form>
		<!-- </div>
	</div>-->

<br /><br />
<table width="500" border="1" cellspacing="0" cellpadding="4" class="table table-striped table-hover table-responsive">
  <tr>
	  <td width="159" bgcolor="#CCCCCC"><strong>Category</strong></td>
	  <td width="95" bgcolor="#CCCCCC"><strong>ID</strong/td>
      <!--<td width="160" bgcolor="#CCCCCC"><strong>From date</strong></td>
      <td width="160" bgcolor="#CCCCCC"><strong>To date</strong/td>-->
      <td width="159" bgcolor="#CCCCCC"><strong>Name</strong></td>
	  <td width="159" bgcolor="#CCCCCC"><strong>Manufacturer</strong></td>
	  <td width="95" bgcolor="#CCCCCC"><strong>OS</strong/td>
	  <td width="95" bgcolor="#CCCCCC"><strong>UDID</strong/td>
	  <td width="95" bgcolor="#CCCCCC"><strong>IMEI</strong/td>
	  <td width="95" bgcolor="#CCCCCC"><strong>Serial</strong/td>
      <td width="100" bgcolor="#CCCCCC"><strong>Description</strong></td>
	  <td colspan="2" width="20" bgcolor="#CCCCCC"><strong>Manage</strong></td>
  </tr>
<?php

if ($_REQUEST["string"]<>'') {
	$search_string = " AND (name LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR description LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR Category LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%') OR OS LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR UDID LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR IMEI LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR serial LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR manufacturer LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR id LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'";
}
if ($_REQUEST["category"]<>'') {
	$search_category = " AND category='".mysqli_real_escape_string($conn,$_REQUEST["category"])."'";
}

if ($_REQUEST["from"]<>'' and $_REQUEST["to"]<>'')
{
	$sql = "SELECT * FROM $table WHERE beginDate >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."' AND endDate <= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
} else if ($_REQUEST["from"]<>'')
{
	$sql = "SELECT * FROM $table WHERE beginDate >= '".mysqli_real_escape_string($conn,$_REQUEST["from"])."'".$search_string.$search_category;
} else if ($_REQUEST["to"]<>'')
{
	$sql = "SELECT * FROM $table WHERE endDate <= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
} else {
	$sql = "SELECT * FROM $table WHERE id>0".$search_string.$search_category;
}

$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
if (mysqli_num_rows($sql_result)>0) {
	while ($row=$sql_result->fetch_assoc()) {
?>
  <tr>
	  <td><?php echo $row["category"]; ?></td>
      <!--<td><!--?php echo $row["beginDate"]; ?></td>
      <td><!--?php echo $row["endDate"]; ?></td>-->
	  <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
	  <td><?php echo $row["manufacturer"]; ?></td>
	  <td><?php echo $row["OS"]; ?></td>
	  <td><?php echo $row["UDID"]; ?></td>
	  <td><?php echo $row["IMEI"]; ?></td>
	  <td><?php echo $row["serial"]; ?></td>
      <td><?php echo $row["description"]; ?></td>

	  <td> <a href="editItem.php?id=<?php echo $row["id"]?>&name=<?php echo $row["name"]?>&description=<?php echo $row["description"]?>&category=<?php echo $row["category"]?>&OS=<?php echo $row["OS"]?>&UDID=<?php echo $row["UDID"]?>&IMEI=<?php echo $row["IMEI"]?>&Serial=<?php echo $row["serial"]?>&Manufacturer=<?php echo $row["manufacturer"]?>" class="group1"  >Edit</a> </td>
	  <td> <a href="removeItem.php?id=<?php echo $row["id"] ?>">Remove</a> </td>

  </tr>
<?php
	}
} else {
?>
<tr><td colspan="12">No results found.</td>
<?php	
}
?>
	</div>
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

	<script>
	$("#delete").on("click", function (e) {
	var checkbox = $(this);
	if (checkbox.is(":checked") {
		var r = confirm("Are you sure you want to delete this?");
		if (r == true) {
			if(isset($_POST['submitt']))
		} else {
		}
	e.preventDefault();
	return false;
	}
	});
	</script>


<div id = resp>

</div>
</body>
</html>