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


<div class="container">
    <form action="editItem.php?id=<?php echo $_GET['id']?>&name=<?php echo $_GET['name']?>&description=<?php echo $_GET['description']?>&category=<?php echo $_GET['category']?>&OS=<?php echo $_GET['OS']?>&IMEI=<?php echo $_GET['IMEI']?>&Serial=<?php echo $_GET['Serial']?>&UDID=<?php echo $_GET['UDID']?>&Manufacturer=<?php echo $_GET['Manufacturer']?>" method="post">
        Category:
        <select  class ="tb5"name="category">
            <option value="<?php echo $_GET['category']?>"> <?php echo $_GET["category"]; ?></option>
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
        Device Name: <input   class ="tb5" type="text" name="devicename" required value="<?php echo $_GET['name']?> " ><br><br>
        ID: <input  class ="tb5"  type="text" name="ID" required  value="<?php echo $_GET['id']?> " readonly><br><br>
        Manufacturer: <input   class ="tb5" type="text" name="manufacturer" value="<?php echo $_GET['Manufacturer']?>" ><br><br>
        Operating System : <input   class ="tb5" type="text" name="OS" value="<?php echo $_GET['OS']?>" ><br><br>
        UDID: <input   class ="tb5" type="text" name="udid"  value="<?php echo $_GET['UDID']?>"> <br><br>
        Description:
        <br>
        <textarea  class ="tb6" name="message"rows="10"cols="20" class="form-control" rows="10"><?php echo $_GET['description']?></textarea>
        <br><br>
        <button type="button" style=" border-radius:10px;   border:2px solid #456879;" data-toggle="collapse" data-target="#more">
            <span data-toggle="tooltip" data-placement="right" title="Add more Details"> Add More Details</span>
        </button>
        <br><br>
        <div id="more" class="collapse" >
            IMEI: <input   class ="tb5" type="text" name="imei"  value=" <?php echo $_GET['IMEI']?>" ><br><br>
            Serial Number: <input   class ="tb5" type="text" name="serialno" value="<?php echo $_GET['Serial']?> " ><br><br>
        </div>
        <input type= "submit" value="Update" name="Update">
    </form>

</div>
</body>
<div id ="responseitem">
    <?php
    include("config.php");
    if(isset($_POST['Update']))
     {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
         $someID = $_GET['id'];
         $device_name = $_POST['devicename'];
         $os_ = $_POST['OS'];
         $details_ = $_POST['message'];
         $category_ = $_POST['category'];
         $id_ = ($_GET['id']);
         $manu_ = $_POST['manufacturer'];
         $udid_ = $_POST['udid'];
         $serial_ = $_POST['serialno'];
         $imei_ = $_POST['imei'];

    $sql = "UPDATE objects SET name = '$device_name', OS ='$os_' ,description=' $details_',category='$category_',UDID='$udid_',IMEI='$imei_',serial=' $serial_',manufacturer='$manu_'WHERE id = '$id_' ";
    if ($conn->query($sql) === TRUE) {
        echo 'Details have been modified in the database! In the entry: ';
        echo $someID ;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    }
    ?>
</div>

</html>