<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="formstyle.css" type="text/css" rel="stylesheet">
    <script type ="text/javascript" src="js/main.js"></script>

</head>
<div id = page-wrap class="visible">
    <?php include("sidebar.php"); ?>
</div>

<body>
    <div class="inner-block container"id ="itemcont">
        <form action="addproduct.php" method="post" autocomplete="off">
            <div style ="font-size:15px">Please enter the category, name and ID of a single product. The other fields are not required, but make management easier.
            <br><br></div>
            Category:
            <select  class ="tb5"name="category">
                <option value="Phone">Phone</option>
                <option value="Tablet">Tablet</option>
                <option value="iBeacon">iBeacon</option>
                <option value="Media Player">iPod</option>
                <option value="Smart Glasses">Smart Glasses</option>
                <option value="Development Kit">Development Kit</option>
                <option value="Others">Others</option>
            </select>
            <br><br>
            Device Name:       <input   class ="tb5" type="text" name="name" required value="" ><br><br>
            ID:                <input  class ="tb5"  type="text" name="ID" required  value="" ><br><br>
            Manufacturer:      <input   class ="tb5" type="text" name="manufacturer" value="" ><br><br>
            Operating System : <input   class ="tb5" type="text" name="OS" value="" ><br><br>
            UDID:              <input   class ="tb5" type="text" name="udid"  value="" ><br><br>
            Description:
            <br>
            <textarea  class ="tb6" name="description"rows="10"cols="20" class="form-control" rows="10"></textarea>
            <br><br>
            <button type="button" style=" border-radius:10px;   border:2px solid #456879;" data-toggle="collapse" data-target="#more">
                <span data-toggle="tooltip" data-placement="right" title="Add more details"> Add more details</span>
            </button>
            <br><br>
            <div id="more" class="collapse" >
            IMEI:            <input   class ="tb5" type="text" name="imei"  value="" ><br><br>
            Serial Number:   <input   class ="tb5" type="text" name="serial" value="" ><br><br>
            </div>
            <input class ="tb5"  type= "submit" value="Submit" name='addproduct'>
        </form>
    </div>
</body>

<?php
if(isset($_POST['addproduct']))
{
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $category_ = $_POST['category'];
    $name_ = $_POST['name'];
    $id_ = ($_POST['ID']);
    $manufacturer_ = $_POST['manufacturer'];
    $os_ = $_POST['OS'];
    $udid_ = $_POST['udid'];
    $serial_ = $_POST['serial'];
    $description_ = $_POST['description'];
    $imei_ = $_POST['imei'];
    $sql = "INSERT INTO objects (name,id,OS,description,category,UDID,IMEI,serial,manufacturer,client) VALUES ('$name_','$id_','$os_','$description_','$category_','$udid_','$imei_','$serial_ ','$manufacturer_ ',NULL)";
    echo '<div id="boxes">
              <div id="dialog" class="window">
              <h1>';
    if ($conn->query($sql) === TRUE) {
       echo 'Product has been created!';
    } else {
        echo 'Error: '. $sql . '<br>' . $conn->error;
    }
    echo '</h1>
              </div>
              <div id="mask"></div>
              </div>';
    $conn->close();
}
?>
</html>