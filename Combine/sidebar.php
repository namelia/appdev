<head>
    <title>Mobile Device Lending Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="trial/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href="trial/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--js-->
    <script src="trial/js/jquery-2.1.1.min.js"></script>
    <!--icons-css-->
    <link href="trial/css/font-awesome.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <!--static chart-->
    <!--skycons-icons-->
    <script src="trial/js/skycons.js"></script>
    <!--//skycons-icons-->
</head>
<body>

<div id="sidebar" class=" sidebar-menu" >

    <div id class="menu">
        <ul id="menu" >
            <li id="menu-home" ><a href="index22.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
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

            <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Table</span></span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="viewtableItem.php">Products</a></li>
                    <li id="menu-academico-boletim" ><a href="viewtablecust.php">Customer</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-envelope"></i><span>Email</a>

            </li>
            <li><a href="#"><i class="fa fa-user"></i><span>Administrator</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                    <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                    <li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="clearfix"> </div>
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
<script src="trial/js/jquery.nicescroll.js"></script>
<script src="trial/js/scripts.js"></script>
<!--//scrolling js-->
<script src="trial/js/bootstrap.js"> </script>
<div class="clearfix"></div>
<!-- mother grid end here-->

</body>