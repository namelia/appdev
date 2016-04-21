<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
    <script type ="text/javascript" src="js/main.js"></script>
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>
    <div class="inner-block container"id ="itemcont">
        <form action="additem.php" method="post" autocomplete="off">
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
            Device Name:       <input   class ="tb5" type="text" name="devicename" required value="" ><br><br>
            ID:                <input  class ="tb5"  type="text" name="ID" required  value="" ><br><br>
            Manufacturer:      <input   class ="tb5" type="text" name="manufacturer" value="" ><br><br>
            Operating System : <input   class ="tb5" type="text" name="OS" value="" ><br><br>
            UDID:              <input   class ="tb5" type="text" name="udid"  value="" ><br><br>
            Description:
            <br>
            <textarea  class ="tb6" name="message"rows="10"cols="20" class="form-control" rows="10"></textarea>
            <br><br>
            <button type="button" style=" border-radius:10px;   border:2px solid #456879;" data-toggle="collapse" data-target="#more">
                <span data-toggle="tooltip" data-placement="right" title="Add more Details"> Add More Details</span>
            </button>
            <br><br>
            <div id="more" class="collapse" >
            IMEI:            <input   class ="tb5" type="text" name="imei"  value="" ><br><br>
            Serial Number:   <input   class ="tb5" type="text" name="serialno" value="" ><br><br>
            </div>
            <input class ="tb5"  type= "submit" value="Submit" name='submitt'>
        </form>
    </div>
</body>


<?php
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
    $sql = "INSERT INTO objects (name,id,OS,description,category,UDID,IMEI,serial,manufacturer,client) VALUES ('$device_name','$id_','$os_','$details_','$category_','$udid_','$imei_','$serial_ ','$manu_ ',NULL)";
    if ($conn->query($sql) === TRUE) {
       echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Database has been updated!</h1>
              </div>
              <div id="mask"></div>
              </div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        var id = '#dialog';

//Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();

//Set heigth and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});

//transition effect
        $('#mask').fadeIn(500);
        $('#mask').fadeTo("slow",0.9);

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
        $('#mask').click(function () {
            $(this).hide();
            $('.window').hide();
        });

    });
</script>
</html>