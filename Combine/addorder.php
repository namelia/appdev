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
d
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
    Device Name: <input class ="tb5" type="text" name="orddevicename" required value=" " ><br><br>
    ID: <input  class ="tb5"  type="text" name="ordID" required  value=" " ><br><br>
    <label for="from">From Date :</label>
    <input class ="tb5" name="from" type="text" id="from" size="10" />
    <br><br>
    <label for="to">To Date :</label>
    <input class ="tb5" name="to" type="text" id="to" size="10"/>
    <br><br>
    Customers Name: <input  class ="tb5" type="text" name="ordcustname" required><br><br>
    <!--Email address: <input  class ="tb5" type="text" name="ordcustemail" class="form-control required" type="email" required><br><br>-->
    <!--Color:
    <select  class ="tb5"name="color" class="form-control">
        <option value="none"></option>
        <option value="Black">Black</option>
        <option value="White">White</option>
        <option value="Gray">Gray</option>
        <option value="Silver">Silver</option>
        <option value="Gold">Gold</option>
        <option value="Blue">Blue</option>
        <option value="Red">Red</option>
        <option value="Others">Others</option>
    </select>
    <br><br>
    Operating System:
    <select class ="tb5"   name="OS">
        <option value="IOS">  IOS</option>
        <option value="Android">  Android</option>
        <option value="Firefox OS">  Firefox OS</option>
        <option value="Windows Phone">  Windows Phone</option>
        <option value="Blackberry">  Blackberry</option>
        <option value="Tizen">  Tizen</option>
        <option value="Sailfish OS">  Sailfish OS</option>
        <option value="Ubuntu Touch OS">  Ubuntu Touch OS</option>
        <option value="None">None</option>
        <option value="Others">Others</option>
    </select>
    <br><br>
    <!--data from wikipedia-->
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

</div>

</html>