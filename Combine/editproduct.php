<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product details</title>
    <link href="formstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>

<?php
$id_ = $_GET['id'];
if (isset($_POST['updateproduct']))
{
    $name = $_POST['name'];
    $os_ = $_POST['os'];
    $description_ = $_POST['description'];
    $category_ = $_POST['category'];
    $manufacturer_ = $_POST['manufacturer'];
    $udid_ = $_POST['udid'];
    $serial_ = $_POST['serial'];
    $imei_ = $_POST['imei'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE objects SET name = '$name', OS ='$os_' ,description=' $description_',category='$category_',UDID='$udid_',IMEI='$imei_',serial=' $serial_',manufacturer='$manufacturer_'WHERE id = '$id_' ";
    echo '<div id="boxes">
              <div id="dialog" class="window">
              <h1>';
    if ($conn->query($sql) === TRUE) {
        echo 'Product has been updated!';
    } else {
        echo 'Error: '. $sql . '<br>' . $conn->error;
    }
    echo '</h1>
              </div>
              <div id="mask"></div>
              </div>';
} else {
    $name = $_GET['name'];
    $os_ = $_GET['os'];
    $description_ = $_GET['description'];
    $category_ = $_GET['category'];
    $manufacturer_ = $_GET['manufacturer'];
    $udid_ = $_GET['udid'];
    $serial_ = $_GET['serial'];
    $imei_ = $_GET['imei'];
}
$conn->close();
?>
    <div class="inner-block container">
        <form action="editproduct.php?id=<?php echo $id_?>&name=<?php echo $name?>&description=<?php echo $description_?>&category=<?php echo $category_?>&OS=<?php echo $os_?>&IMEI=<?php echo $imei_?>&Serial=<?php echo $serial_?>&UDID=<?php echo $udid_?>&Manufacturer=<?php echo $manufacturer_?>" method="post" autocomplete="off">
            <div style ="font-size:15px">Modifying details for product ID <?php echo $id_?>:
            <br><br></div>
            Category:
            <select  class ="tb5"name="category">
                <option value="<?php echo $_GET['category']?>"> <?php echo $category_;?></option>
                <option value="Phone">Phone</option>
                <option value="Tablet">Tablet</option>
                <option value="iBeacon">iBeacon</option>
                <option value="Media Player">iPod</option>
                <option value="Smart Glasses">Smart Glasses</option>
                <option value="Development Kit">Development Kit</option>
                <option value="Others">Others</option>
                </select>
            <br><br>
            Device Name: <input   class ="tb5" type="text" name="name" required value="<?php echo $name?>"><br><br>
            Manufacturer: <input   class ="tb5" type="text" name="manufacturer" value="<?php echo $manufacturer_?>"><br><br>
            Operating System : <input   class ="tb5" type="text" name="os" value="<?php echo $os_?>"><br><br>
            UDID: <input   class ="tb5" type="text" name="udid"  value="<?php echo $udid_?>"> <br><br>
            Description:
            <br>
            <textarea  class ="tb6" name="description"rows="11"cols="20" class="form-control" rows="11"><?php echo $description_?></textarea>
            <br><br>
            <button type="button" style=" border-radius:10px;   border:2px solid #456879;" data-toggle="collapse" data-target="#more">
                <span data-toggle="tooltip" data-placement="right" title="Add more details"> Add more details</span>
            </button>
            <br><br>
            <div id="more" class="collapse" >
                IMEI: <input   class ="tb5" type="text" name="imei"  value="<?php echo $imei_?>"><br><br>
                Serial Number: <input   class ="tb5" type="text" name="serial" value="<?php echo $serial_?>" ><br><br>
            </div>
            <input class ="tb5" type= "submit" value="Update" name="updateproduct">
        </form>
    </div>
</body>
</html>