<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>


<div class="container"id ="itemcont">
<form action="additem.php" method="post">
    Category:
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
    </select>
    <br><br>
    Device Name: <input   class ="tb5" type="text" name="devicename" required value=" " ><br><br>
    ID: <input  class ="tb5"  type="text" name="ID" required  value=" " ><br><br>
    Manufacturer: <input   class ="tb5" type="text" name="manufacturer" value=" " ><br><br>
    Operating System : <input   class ="tb5" type="text" name="OS" value=" " ><br><br>
    UDID: <input   class ="tb5" type="text" name="udid"  value=" " ><br><br>
    Description:
    <br>
    <textarea  class ="tb6" name="message"rows="10"cols="20" class="form-control" rows="10"></textarea>
    <br><br>
    <button type="button" style=" border-radius:10px;   border:2px solid #456879;" data-toggle="collapse" data-target="#more">
        <span data-toggle="tooltip" data-placement="right" title="Add more Details"> Add More Details</span>
    </button>
    <br><br>
    <div id="more" class="collapse" >
    IMEI: <input   class ="tb5" type="text" name="imei"  value=" " ><br><br>
    Serial Number: <input   class ="tb5" type="text" name="serialno" value=" " ><br><br>
    </div>

    <!--
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
    $manu_ = $_POST['manufacturer'];
    $os_ = $_POST['OS'];
    $udid_ = $_POST['udid'];
    $serial_ = $_POST['serialno'];
    $details_ = $_POST['message'];
    $imei_ = $_POST['imei'];
    $sql = "INSERT INTO objects (name,id,OS,description,category,UDID,IMEI,serial,manufacturer) VALUES ('$device_name','$id_','$os_','$details_','$category_','$udid_','$imei_','$serial_ ','$manu_ ')";

    if ($conn->query($sql) === TRUE) {
        echo 'Details have been added to the database!';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</div>
</html>