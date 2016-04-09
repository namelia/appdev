<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("index.php"); ?>
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
    Color:
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
    Description:
    <br>
    <textarea  class ="tb6" name="message"rows="10"cols="20" class="form-control" rows="10"></textarea>
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
</div>
</html>