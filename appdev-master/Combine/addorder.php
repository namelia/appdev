<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="additemstyle.css" type="text/css" rel="stylesheet">

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>
<div id =sidebar class="visible">
    <?php include("index.php"); ?>
</div>
<body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<div class="container"id ="itemcont">
<form action="additem.php" method="post">

    <!--Category:
    <select  class ="tb5"name="category">
        <option value="none"></option>
        <option value="Development Kit">Development Kit</option>
        <option value="iBeacon">iBeacon</option>
        <option value="iPod">iPod</option>
        <option value="Phone">Phone</option>
        <option value="Tablet">Tablet</option>
        <option value="Smart Glasses">Smart Glasses</option>
        <option value="Tv">Tv</option>
        <option value="Others">Others</option>
    </select>-->
    <br><br>
    <div class="content">
    Device Name: <input class ="search tb5" id ="searchitem" type="text" name="orddevicename" required  >&nbsp; <br><br>
    </div><div id="resultlol"></div>
    ID: <input  class ="tb5"  type="text" name="ordID" required  value=" " ><br><br>
    <label for="from">From Date :</label>
    <input class ="tb5" name="from" type="text" id="from" size="10" />
    <br><br>
    <label for="to">To Date :</label>
    <input class ="tb5" name="to" type="text" id="to" size="10"/>
    <br><br>
    Customers Name: <input  class ="searchC tb5"  id ="searchcust" type="text" name="ordcustname" required>&nbsp;<br><br>
    <div id="resultcust"></div>
    Additional Details:
    <br>
    <textarea  class ="tb6" name="orderdetails"rows="10"cols="20" class="form-control" rows="10"></textarea>
    <br><br>
    <input class ="tb5"  type= "submit" value="Submit" name='submitt'>
</form>

</div>
</body>
<div id ="responseitem">
<?php
include("config.php");
if(isset($_POST['submitt']))
{
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $category_ = $_POST['category'];
    $device_name = $_POST['devicename'];
    $id_ = ($_POST['ID']);
    $color_ = $_POST['color'];
    $os_ = $_POST['OS'];
    $details_ = $_POST['message'];
    $sql = "INSERT INTO additem (name,id,color,OS,details,category) VALUES ('$device_name','$id_','$color_','$os_','$details_','$category_')";

    if ($conn->query($sql) === TRUE) {
        echo 'Details have been added to the database!';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
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


    <script type="text/javascript">
        $(function(){
            $(".search").keyup(function()
            {
                var searchitem = $(this).val();
                var dataString = 'search='+ searchitem;
                if(searchitem!='')
                {
                    $.ajax({
                        type: "POST",
                        url: "resultitem.php",
                        data: dataString,
                        cache: false,
                        success: function(html)
                        {
                            $("#resultlol").html(html).show();
                        }
                    });
                }return false;
            });

            jQuery("#resultlol").live("click",function(e){
                var $clicked = $(e.target);
                var $name = $clicked.find('.name').html();
                var decoded = $("<div/>").html($name).text();
                $('#searchitem').val(decoded);
            });
            jQuery(document).live("click", function(e) {
                var $clicked = $(e.target);
                if (! $clicked.hasClass("search")){
                    jQuery("#resultlol").fadeOut();
                }
            });
            $('#searchitem').click(function(){
            jQuery("#resultlol").fadeIn();
        });
        });
    </script>



    <script type="text/javascript">
        $(function(){
            $(".searchC").keyup(function()
            {
                var searchcust = $(this).val();
                var dataString = 'search='+ searchcust;
                if(searchcust!='')
                {
                    $.ajax({
                        type: "POST",
                        url: "resultcust.php",
                        data: dataString,
                        cache: false,
                        success: function(html)
                        {
                            $("#resultcust").html(html).show();
                        }
                    });
                }return false;
            });

            jQuery("#resultcust").live("click",function(e){
                var $clicked = $(e.target);
                var $name = $clicked.find('.name').html();
                var decoded = $("<div/>").html($name).text();
                $('#searchcust').val(decoded);
            });
            jQuery(document).live("click", function(e) {
                var $clicked = $(e.target);
                if (! $clicked.hasClass("searchC")){
                    jQuery("#resultcust").fadeOut();
                }
            });
            $('#searchcust').click(function(){
                jQuery("#resultcust").fadeIn();
            });
        });
    </script>

</div>

<style type="text/css">

    #searchitem,#searchcust
    {
        border:solid 1px #000;
        padding:5px;
        font-size:14px;
    }
    #resultlol,#resultcust
    {
        position:absolute;
        padding:5px;
        display:none;
        margin-top:-36px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: white;
    }
    .show
    {
        padding:10px;
        border-bottom:1px #999 dashed;
        font-size:15px;
        height:50px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
</style>

</html>