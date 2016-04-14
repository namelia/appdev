
<?php if(!isset($_SESSION['login'])==0) {
	 header('Location: logout.php');}
 	?>


<!DOCTYPE html>
<html>
<head>
	<title>Mobile Device Lending System </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href= "../Combine/sidebarstyle.css">

</head>
<body>
<div class="row">
	<div id ="sidebar" class="visible" >
		<ul>
			<li><a href ="addorder.php" style="font-size:16px;font-family: Segoe UI;" ><span class="glyphicon glyphicon-plus"></span> Add Order</a></li>
			<li><a href ="additem.php" style="font-size:16px;font-family: Segoe UI;"><span class="glyphicon glyphicon-book"></span> Add item </a></li>
			<li><a href ="tableItem.php" style="font-size:16px;font-family: Segoe UI;"><span class="glyphicon glyphicon-search"></span> Search item </a></li>
			<li><a href ="addcustomer.php"style="font-size:16px;  font-family: Segoe UI;"> <span class="glyphicon glyphicon-user"> </span> Add Customer </a></li>
			<li><a href ="tablecust.php"style="font-size:16px; font-family: Segoe UI;"> <span class="glyphicon glyphicon-user"></span> Display Customers </a></li>
			<li id ="download"><a href ="download.php"style="font-size:16px;font-family: Segoe UI;"> <span class="glyphicon glyphicon-download"></span> Download Table </a></li>
			</li>


			<li style="vertical-align: bottom"><a href ="logout.php?ac=logout"style="font-size:16px; font-family: Segoe UI;"> <span class="glyphicon glyphicon-off" style="font-size:20px"></span>  Logout</a><li>
		</ul>
	</div>
	<div id =title>
		<h1>DashBoard</h1>
	</div>
	<div class="col-md-10">.col-md-10</div>
	<div id =g>
		<!-- <h1>Welcome!</h1>-- reetings>
		<!--<div id="form-content">-->
			<div class>

			</div>
		</div>
		</p>
		</p>
	</div>
	<div>
	</div>


	<!-- for hamburger looking lines -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!--
	<script>
	$(document).ready(function()
	{
		$('#sidebar-btn').click(function()
		{
			$('#sidebar').toggleClass('visible');
		});
	});
	</script>-->
</div>
</body>

</html>