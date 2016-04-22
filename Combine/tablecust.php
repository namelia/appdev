<?php
error_reporting(0);
if(isset($_POST["submitri"])) {
	$someID = $_GET['id'];
} else {
	$someID = 0;
}
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
	<title>Manage Customers</title>

	<link href="table.css" rel="stylesheet" type="text/css">
	<link href="css/buttons.css" rel="stylesheet" type="text/css" media="all">
<!-- added table sorter-->
		<script type="text/javascript" src="tablesort.js"></script>
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>


<body>
<div class = "row">
	<div class = "sidebar" class="container">
		<?php include("sidebar.php"); ?>
	</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<div id="table" class="inner-block container" style="overflow-x:auto;">
<form id="form1" name="form1" method="post" action="tablecust.php" autocomplete="off">
	<label>Search:</label>
	<input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
	<label>Category</label>
	<select name="category">
	<option value="">--</option>
	<?php
		$query= $conn->query("SELECT * FROM clients GROUP BY category ORDER BY category")or die ('request "Could not execute SQL query here" '.$sql);
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

<table  border="0" cellspacing="0" cellpadding="4" class="table tablesorter" id="tablecust">
<thead>
	  <th> ID</th>
	  <th> Category</th>
      <th> Name</th>
	  <th> Email</th>
	  <th> Phone</th>
	  <th> Address</th>
      <th> Description</th>
	  <th colspan="2"> Manage</th>
  </tr>
</thead>
	<tbody>
<?php

if ($_REQUEST["string"]<>'')  {
	$search_string = " AND (name LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%' OR details LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR email LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR phone LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR address LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR id LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%'OR category LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["string"])."%')";
}
if ($_REQUEST["category"]<>'') {
	$search_category = " AND category= '".mysqli_real_escape_string($conn,$_REQUEST["category"])."'".$search_string.$search_category;
}
	$sql = "SELECT * FROM clients WHERE id != $someID".$search_string .$search_category;
	$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
if (mysqli_num_rows($sql_result)>0) {
	$count=0;
	while ($row=$sql_result->fetch_assoc()) {

		$id_=$row['id'];
		$category_=$row['category'];
		$name_=$row['name'];
		$email_=$row['email'];
		$phone_=$row['phone'];
		$address_=$row['address'];
		$details_=$row['details'];
		echo"
  <tr>


	  <td> $id_</td>
	  <td> $category_</td>
	  <td> $name_</td>
	  <td> $email_</td>
	  <td> $phone_</td>
	  <td> $address_</td>
	  <td> $details_</td>
	  <td><form action=\"editCustomer.php?category=$category_&customername=$name_&email=$email_&phone=$phone_&address=$address_&details=$details_&id=$id_ \" method=\"POST\">
		  <input type=\"submit\" name=\"submitec\" value=\"Edit\" class = \"tb5-2\"> </input></form></td>

	  <td><form action=\"tablecust.php?id=$id_\" method=\"POST\">
			  <input type=\"submit\" name=\"submitrc\" value=\"X\" class = \"tb5\"> </input></form></td>
			    </tr>
";


?>


<?php
	}
} else {
?>
<tr><td colspan="9">No results found.</td>
<?php
}
?>
	</tbody>
</table>
</div>



</div>
<script type="text/javascript">
	$(document).ready(function()
		{
			$("#tablecust").tablesorter();
		}
	);

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript src="simple-confirmation-popup/js/main.js"></script> <!-- Resource jQuery -->

<?php
if(isset ($_POST['submitrc'])) {
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "DELETE FROM clients WHERE `id` = $someID ";
		if ($conn->query($sql) === TRUE) {
			echo '<div id="boxes">
				  <div id="dialog" class="window">
	
				  <h1>Entry has been deleted!</h1>
				  </div>
				  <div id="mask"></div>
				  </div>';
			echo $someID;

		} else {
			echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Error: '. $sql . '<br>' . $conn->error .'</h1>
              </div>
              <div id="mask"></div>
              </div>';
		}
		$conn->close();
}
?>

<script  type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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
			<?php header(tablecust.php)?>
			$(this).hide();
			$('.window').hide();

		});

	});
</script>
</body>
	<script type="text/javascript" src="tablesort.js"></script>
</html>