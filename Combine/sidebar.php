<?php
session_name('DeviceLabSystem');
session_start();

include("config.php");
?>

<?php if (!(isset($_SESSION['user_info']) && is_array($_SESSION['user_info']))) {
    header("Location:logout.php");
    exit();
}?>

<head>
    <title>Mobile Device Lending Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--js-->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!--icons-css-->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--static chart-->
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>
    <!--//skycons-icons-->
</head>
<body>

<!--slider menu-->
<div id="sidebar" class="sidebar-menu" >
    <div id class="menu">
        <ul id="menu" >
            <li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li><a href="addorder.php"><i class="fa fa-plus"></i><span>Add Order</span></span></a>
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-tablet nav_icon"></i><span>Products</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-arquivos" ><a href="additem.php">Add Product</a></li>
                    <li id="menu-arquivos" ><a href="tableItem.php">Manage Product</a></li>
                </ul>
            </li>
            <li id="menu--comunicacao" ><a href="#"><i class="fa fa-user nav_icon"></i><span>Customers</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-arquivos" ><a href="addcustomer.php">Add Customers</a></li>
                    <li id="menu-arquivos" ><a href="tablecust.php">Manage Customers</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-table"></i><span>Table</span></span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="viewtableItem.php">Products</a></li>
                    <li id="menu-academico-boletim" ><a href="viewtablecust.php">Customer</a></li>
                </ul>
            </li>

            <li><a href="statistics.php"><i class="fa fa-star"></i><span>Statistics</a>

            <li><a href="inbox.php"><i class="fa fa-envelope"></i><span>Email</a>

            </li>
            <li id="menu--comunicacao" ><a href="#"><i class="fa fa-download"></i><span>Download</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-arquivos" ><a href="download.php">Product Table </a></li>
                    <li id="menu-arquivos" ><a href="downloadcust.php">Customer Table</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-user-plus"></i><span>Administrator</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li> <a href="profile.php"><i class="fa fa-user-plus"></i> Profile</a> </li>
                    <li> <a href="logout.php?ac=logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="clearfix"> </div>
</div>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->

<script type="text/javascript"  src="js/bootstrap.js"> </script>

<!-- mother grid end here-->

</body>