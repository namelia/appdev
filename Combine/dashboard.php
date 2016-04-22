<!DOCTYPE HTML>
<div id =sidebar class="visible">
	<?php include("sidebar.php"); ?>
</div>
<html>
<head>
<title>UCL Device Lab</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/clndr.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
	<script type="text/javascript" src="js/clndr.js"></script>
	<script type="text/javascript" src="js/underscore-min.js"></script>
	<script type="text/javascript" src="js/moment-2.2.1.js"></script>
	<script type="text/javascript" src="js/site.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script type="text/javascript"  src="js/skycons.js"></script>
	<script type="text/javascript"  src="js/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--calendar-->
<?php
$tableobjects='objects';
$tableclients='clients';
?>
<!--skycons-icons-->

<!--//skycons-icons-->
</head>
<body>
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="dashboard.php"> <h1 style="width:400px; margin-top: 16px;">UCL DEVICE LAB <i class="fa fa-cubes"> </i></h1>
									<!--<img id="logo" src="" alt="Logo"/>-->
								  </a>
							</div>

							<div class="clearfix" > </div>
						 </div>
						 <div class="header-right">
							<div class="clearfix">
								<p style="color:#007acc;font-size:20px;font-weight:bold; text-align:right;margin-top: 5px;
								   margin-right: 50px;">Hello, <?php echo $_SESSION['user_info']['name'] ?>! <i class="fa fa-smile-o"></i> </p>
								<p style="color:#999999;font-size:14px;font-weight:normal; text-align:right;margin-top: 5px;
								   margin-right: 50px;"> Last log-in on <?php echo $_SESSION['user_info']['last_login'] ?> </p>
							</div>
						</div>
				     <div class="clearfix"> </div>
				</div>

<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
	 <div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1" onclick=window.location.href="returns.php">
					<div class="col-md-8 market-update-left" >
						<?php
						$sql2 ="SELECT * FROM objects WHERE beginDate=CURDATE()";
						$sql  ="SELECT * FROM objects WHERE client IS NOT NULL";
						$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
						$sql_result2 =$conn->query($sql2) or die ('request "Could not execute SQL query" '.$sql);
						$totalorder=(mysqli_num_rows($sql_result));
						$todayorder=(mysqli_num_rows($sql_result2))?>

						<h3><?php echo $todayorder;?></h3>
						<h4>Today's Orders</h4>
						<p>Total Orders : <?php echo $totalorder;?>  </p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd" >
				<div class="market-update-block clr-block-2" onclick=window.location.href="tablecust.php" >
				 <div class="col-md-8 market-update-left">
					 <?php
					 $sql = "SELECT * FROM $tableclients";
					 $sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
					 $numbercust=(mysqli_num_rows($sql_result))?>
					<h3> <?php echo $numbercust;?> </h3>
					<h4>Total Customers</h4>
					<p>in the system</p>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-diamond"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd" >
				<div class="market-update-block clr-block-3" onclick=window.location.href="tableItem.php">
					<?php
					$sql3 = "SELECT * FROM $tableobjects";
					$sql = "SELECT * FROM $tableobjects WHERE client is NULL";
					$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
					$sql_result3 =$conn->query($sql3) or die ('request "Could not execute SQL query" '.$sql);
					$numberita=(mysqli_num_rows($sql_result));
					$numberitems=(mysqli_num_rows($sql_result3))?>
					<div class="col-md-8 market-update-left">
						<h3><?php echo $numberita;?> </h3>
						<h4>Items Available</h4>
						<p>out of <?php echo $numberitems;?> items </p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-cubes"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1">
	<div class="col-md-6 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Orders
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item</th>
                                        <th>Customers</th>
										<th>End Date</th>
										<th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
									<?php
									$sql = "SELECT * FROM $tableobjects WHERE client IS NOT NULL ORDER BY endDate";
									$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
									if ($sql_result-> num_rows!=0)
									{
										while ( $row= $sql_result->fetch_assoc())
										{
											$id=$row['id'];
											$name=$row['name'];
											$client=$row['client'];
											$endDate=$row['endDate'];
									        echo"
											<tr>
											<td>$id</td>
											<td>$name</td>
											<td>$client</td>
											<td>$endDate</td>";

											if( date("Y-m-d")>$endDate  )
												{
													echo"<td> <span class=\"label label-danger\">Overdue</span></td>";
											}
											else {
												     echo "<td><span class=\"label label-success\">On Loan</span></td>";
											}


										}
									}
									?>




                          </tbody>
                      </table>
                  </div>
             </div>
      </div>
      <div class="col-md-6 chit-chat-layer1-rit">
      	  <div class="geo-chart">
					<section id="charts1" class="charts">
				<div class="wrapper-flex">

					<script src="js/clndr.js"> </script>

				    <div class="col geo_main">
						<link rel="stylesheet" href="css/clndr.css" type="text/css" />
						<script src="js/underscore-min.js" type="text/javascript"></script>
						<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
						<script src="js/clndr.js" type="text/javascript"></script>
						<script src="js/site.js" type="text/javascript"></script>
						<div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">April 2016</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2016-03-27"><div class="day-contents">27</div></td><td class="day past adjacent-month last-month calendar-day-2016-03-28"><div class="day-contents">28</div></td><td class="day past adjacent-month last-month calendar-day-2016-03-29"><div class="day-contents">29</div></td><td class="day past adjacent-month last-month calendar-day-2016-03-30"><div class="day-contents">30</div></td><td class="day past adjacent-month last-month calendar-day-2016-03-31"><div class="day-contents">31</div></td><td class="day past calendar-day-2016-04-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2016-04-02"><div class="day-contents">2</div></td></tr><tr><td class="day past calendar-day-2016-04-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2016-04-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2016-04-05"><div class="day-contents">5</div></td><td class="day past calendar-day-2016-04-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2016-04-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2016-04-08"><div class="day-contents">8</div></td><td class="day past calendar-day-2016-04-09"><div class="day-contents">9</div></td></tr><tr><td class="day past event calendar-day-2016-04-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2016-04-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2016-04-12"><div class="day-contents">12</div></td><td class="day past event calendar-day-2016-04-13"><div class="day-contents">13</div></td><td class="day past event calendar-day-2016-04-14"><div class="day-contents">14</div></td><td class="day today calendar-day-2016-04-15"><div class="day-contents">15</div></td><td class="day calendar-day-2016-04-16"><div class="day-contents">16</div></td></tr><tr><td class="day calendar-day-2016-04-17"><div class="day-contents">17</div></td><td class="day calendar-day-2016-04-18"><div class="day-contents">18</div></td><td class="day calendar-day-2016-04-19"><div class="day-contents">19</div></td><td class="day calendar-day-2016-04-20"><div class="day-contents">20</div></td><td class="day event calendar-day-2016-04-21"><div class="day-contents">21</div></td><td class="day event calendar-day-2016-04-22"><div class="day-contents">22</div></td><td class="day event calendar-day-2016-04-23"><div class="day-contents">23</div></td></tr><tr><td class="day calendar-day-2016-04-24"><div class="day-contents">24</div></td><td class="day calendar-day-2016-04-25"><div class="day-contents">25</div></td><td class="day calendar-day-2016-04-26"><div class="day-contents">26</div></td><td class="day calendar-day-2016-04-27"><div class="day-contents">27</div></td><td class="day calendar-day-2016-04-28"><div class="day-contents">28</div></td><td class="day calendar-day-2016-04-29"><div class="day-contents">29</div></td><td class="day calendar-day-2016-04-30"><div class="day-contents">30</div></td></tr></tbody></table></div></div>

				    </div>



				</div><!-- .wrapper-flex -->
				</section>
			</div>
      </div>
     <div class="clearfix"> </div>
</div>
</div>
<!--inner block end here-->
<!--copyrights start here-->
<div class="copyrights">
	 <p>© 2016 UCL CS TEAM 7 - all rights reserved </a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
</html>