<?php
error_reporting(0);
$table='objects';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Products</title>


	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<link href="table.css" rel="stylesheet" type="text/css">

</head>


<body>
<div class="row">
		<div id ="sidebar" class="container">
			<?php include("sidebar.php"); ?>
		</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

	<div id="table" class="inner-block container">
	<form id="form1" name="form1" method="post" action="viewtableItem.php" autocomplete="off">
		<div class ="row">
			<div class="col-xs-2">
				<label for="from">From</label>
				<input name="from" type="text" id="from" size="10" value="<?php echo $_REQUEST["from"]; ?>" />
			</div>
			<div class="col-xs-2">
				<label for="to">to</label>
				<input name="to" type="text" id="to" size="10" value="<?php echo $_REQUEST["to"]; ?>"/>
			</div>
			<div  class="col-xs-2">
				<label>Search</label>&nbsp;
				<input id ="searchitem" type="text" name="string" id="string" size="7" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
			</div>
			<div  class="col-xs-2">
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
				<label>Status</label>
				<select name ="status">
					<option ><?php echo stripcslashes($_REQUEST["status"]); ?></option>
					<option value="Available">Available</option>
					<option value="On Loan">On Loan</option>
					<option value="Overdue">Overdue</option>
				</select>
			</div>

			<div  class="col-xs-2">
				<input type="submit" name="button" id="button" value="Filter" />
				</label>
				<button type="button"><a href="viewtableItem.php"> Reset</a></button>
			</div>

		</form>
		<!-- </div>
	</div>-->

<br /><br /><br />
<table width="500" border="1" cellspacing="0" cellpadding="4" id="tableitem" class="table tablesort">
 <thead>
  <tr>
	  <th width="159">Category</th>
	  <th width="95">ID</th>
      <th width="159">Name</th>
	  <th width="95">OS</th>
	  <th width="95">UDID</th>
	  <th width="95"> Start Date</th>
	  <th width="95">End Date</th>
      <th width="191">Client</th>
	  <th width="30">Status</th>
  </tr>
 </thead>
	<tbody>
<?php

if ($_REQUEST["string"]<>'') {
	$search_string = " AND (name LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR description LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR Category LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%') OR OS LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR UDID LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR client LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR id LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'";
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
	$sql = "SELECT * FROM $table WHERE endDate<= '".mysqli_real_escape_string($conn,$_REQUEST["to"])."'".$search_string.$search_category;
}else if($_REQUEST["status"]=="Available")
{
	$sql = "SELECT * FROM $table WHERE client IS NULL".$search_string.$search_category;
}
else if($_REQUEST["status"]=="On Loan")
{

	$sql = "SELECT * FROM $table WHERE client IS NOT NULL AND CURDATE()< endDate ".$search_string.$search_category ;
}
else if($_REQUEST["status"]=="Overdue")
{
	$sql = "SELECT * FROM $table WHERE client IS NOT NULL AND CURDATE()>endDate ".$search_string.$search_category ;
}
else {
	$sql = "SELECT * FROM $table WHERE id>0".$search_string.$search_category;
}

$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
if (mysqli_num_rows($sql_result)>0) {
	while ($row=$sql_result->fetch_assoc()) {
?>
  <tr>
	  <td><?php echo $row["category"]; ?></td>
	  <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
	  <td><?php echo $row["OS"]; ?></td>
	  <td><?php echo $row["UDID"]; ?></td>
	  <td><?php echo $row["beginDate"]; ?></td>
	  <td><?php echo $row["endDate"]; ?></td>
      <td><?php echo $row["client"]; ?></td>
		<?php
			$endDate = $row['endDate'];
			if ($row["client"]!= NULL)
			{
				if (date("Y-m-d") > $endDate) {
					echo "<td> <span class=\"label label-danger\">Overdue</span></td>";
				} else {
					echo "<td><span class=\"label label-success\">On Loan</span></td>";
				}
			}
			else
				echo "<td><span class=\"label label-info\">Available</span></td>"
		?>

	  <!-- <td> <form $row  id ='checkbox $i' action="" method="post">
			  <input type="checkbox" name=<?php echo "box "+$row["id"]?> value="Available" class="group1" >
			  </td>-->
  </tr>
<?php
	}
} else {
?>
<tr><td colspan="9">No results found.</td>
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

<script type="text/javascript">
	$(document).ready(function()
		{
			$("#tableitem").tablesorter();
		}
	);

</script>
<script type="text/javascript" src="tablesort.js"></script>
<div id = resp>

</div>
</body>
</html>