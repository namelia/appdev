<?php
session_name('DeviceLabSystem');
session_start();

include("config.php");
?>

<?php if (!(isset($_SESSION['user_info']) && is_array($_SESSION['user_info']))) {
    header("Location:index.php?ac=timeout");
    exit();
}?>

<head>
    <title>UCL Device Lab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="js/jquery-2.1.1.min.js"></script>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="js/skycons.js"></script>
</head>
<body>

<div id="sidebar" class="sidebar-menu" >
    <div id class="menu">
        <ul id="menu" >
            <li id="menu-home" ><a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-tablet nav_icon"></i><span>Products</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-arquivos" ><a href="addproduct.php"><i class="fa fa-plus"></i>Add</a></li>
                    <li id="menu-arquivos" ><a href="tableproducts.php"><i class="fa fa-table"></i>Manage</a></li>
                    <li id="menu-arquivos" ><a href="downloadproducts.php"><i class="fa fa-download"></i>Download</a></li>
                </ul>
            </li>
            <li id="menu--comunicacao" ><a href="#"><i class="fa fa-user nav_icon"></i><span>Customers</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-arquivos" ><a href="addclient.php"><i class="fa fa-plus"></i>Add</a></li>
                    <li id="menu-arquivos" ><a href="tableclients.php"><i class="fa fa-table"></i>Manage</a></li>
                    <li id="menu-arquivos" ><a href="downloadclients.php"><i class="fa fa-download"></i>Download</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-list"></i><span>Orders</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li><a href="addorder.php"><i class="fa fa-plus"></i><span>Add</span></span></a>
                    <li><a href="returns.php"><i class="fa fa-refresh"></i><span>Returns</a>
                    <li><a href="statistics.php"><i class="fa fa-star"></i><span>Statistics</a>
                </ul>
            </li>

            </li>
            <li><a href="#"><i class="fa fa-user-plus"></i><span>Administrator</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li> <a href="administratorinfo.php"><i class="fa fa-user-plus"></i>Profile</a> </li>
                    <li> <a href="index.php?ac=logout"><i class="fa fa-sign-out"></i>Logout</a> </li>
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

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var id = '#dialog';
//Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
        var mask = $('#mask');
//Set heigth and width to mask to fill up the whole screen
        mask.css({'width':maskWidth,'height':maskHeight});
//transition effect
        mask.fadeIn(500);
        mask.fadeTo("slow",0.9);
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
        mask.click(function () {
            $(this).hide();
            $('.window').hide();
        });
    });
</script>

</body>