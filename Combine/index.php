
<!DOCTYPE HTML>
<html>
<head>
<title>Mobile Device Lending Project</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
									 <a href="index.php"> <h1 style="width:400px">UCL APPLAB <i class="fa fa-cubes"> </i></h1>
									<!--<img id="logo" src="" alt="Logo"/>-->
								  </a>
							</div>

							<div class="clearfix" > </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new messages</h3>
												</div>
											</li>
											<li><a href="#">
											   <div class="user_img"><img src="trial/images/p4.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix" ></div>
											</a></li>
											<li class="odd"><a href="#">
												<div class="user_img"><img src="trial/images/p2.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor </p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>
											</a></li>
											<li><a href="#">
											   <div class="user_img"><img src="trial/images/p3.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
								a				<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="#">See all messages</a>
												</div>
											</li>
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new notification</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="user_img"><img src="trial/images/p5.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>
											 </a></li>
											 <li class="odd"><a href="#">
												<div class="user_img"><img src="trial/images/p6.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>
											 </a></li>
											 <li><a href="#">
												<div class="user_img"><img src="trial/images/p7.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>
											 </a></li>
											 <li>
												<div class="notification_bottom">
													<a href="#">See all notifications</a>
												</div>
											</li>
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">9</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 8 pending task</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Database update</span><span class="percentage">40%</span>
													<div class="clearfix"></div>
												</div>
												<div class="progress progress-striped active">
													<div class="bar yellow" style="width:40%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
												   <div class="clearfix"></div>
												</div>
												<div class="progress progress-striped active">
													 <div class="bar green" style="width:90%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
													<div class="clearfix"></div>
												</div>
											   <div class="progress progress-striped active">
													 <div class="bar red" style="width: 33%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
												   <div class="clearfix"></div>
												</div>
												<div class="progress progress-striped active">
													 <div class="bar  blue" style="width: 80%;"></div>
												</div>
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="#">See all pending tasks</a>
												</div>
											</li>
										</ul>
									</li>
								</ul>

								<div class="clearfix" id="notification"> </div>
							</div>
							<!--notification menu end -->

							<div class="clearfix"> </div>
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
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<?php
						include("config.php");
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
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					 <?php
					 include("config.php");
					 $sql = "SELECT * FROM $tableclients";
					 $sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
					 $numbercust=(mysqli_num_rows($sql_result))?>
					<h3> <?php echo $numbercust;?> </h3>
					<h4>Total Customers</h4>
					<p>Other hand, we denounce</p>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-diamond"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<?php
					include("config.php");
					$sql3 = "SELECT * FROM $tableobjects";
					$sql = "SELECT * FROM $tableobjects WHERE client is NULL";
					$sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
					$sql_result3 =$conn->query($sql3) or die ('request "Could not execute SQL query" '.$sql);
					$numberita=(mysqli_num_rows($sql_result));
					$numberitems=(mysqli_num_rows($sql_result3))?>
					<div class="col-md-8 market-update-left">
						<h3><?php echo $numberita;?> </h3>
						<h4>Items Available</h4>
						<p>Out of <?php echo $numberitems;?> items </p>
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

									<?php include("config.php");?>
									<?php
									$sql = "SELECT * FROM $tableobjects WHERE client IS NOT NULL ORDER BY endDate  LIMIT 6";
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
<!--main page chit chating end here-->
<!--main page chart start here-->
<div class="main-page-charts">
   <div class="main-page-chart-layer1">


	 <div class="clearfix"> </div>
  </div>
 </div>

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 UCL CS TEAM7. All Rights Reserved </a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div id="sidebar" class="sidebar-menu" >
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
			  </a> </div>
		    <div id class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        <li><a href="addorder.php"><i class="fa fa-plus"></i><span>Add Order</span></span></a>
		        <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Products</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >
		            <li id="menu-arquivos" ><a href="additem.php">Add Product</a></li>
		            <li id="menu-arquivos" ><a href="tableItem.php">Manage Product</a></li>
		          </ul>
		        </li>
                  <li id="menu--comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Customers</span><span class="fa fa-angle-right" style="float: right"></span></a>
                      <ul id="menu-comunicacao-sub" >
                          <li id="menu-arquivos" ><a href="addcustomer.php">Add Customers</a></li>
                          <li id="menu-arquivos" ><a href="tablecust.php">Manage Customers</a></li>
                      </ul>
                  </li>

		        <li><a href="#"><i class="fa fa-bar-chart"></i><span>Table</span></span><span class="fa fa-angle-right" style="float: right"></span></a>
                  <ul id="menu-academico-sub" >
                      <li id="menu-academico-avaliacoes" ><a href="viewtableItem.php">Products</a></li>
                      <li id="menu-academico-boletim" ><a href="viewtablecust.php">Customer</a></li>
                  </ul>
                </li>
		        <li><a href="#"><i class="fa fa-envelope"></i><span>Email</a>

		        </li>
		         <li><a href="#"><i class="fa fa-user"></i><span>Administrator</span><span class="fa fa-angle-right" style="float: right"></span></a>
                     <ul id="menu-academico-sub" >
                         <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                         <li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
                     </ul>
		         </li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->

<script type="text/javascript"  src="js/bootstrap.js"> </script>

<!-- mother grid end here-->
</body>
</html>