<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product details</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>

<?php
$id_ = $_GET['id'];
if (isset($_POST['Update']))
{
    $device_name = $_POST['devicename'];
    $os_ = $_POST['OS'];
    $details_ = $_POST['message'];
    $category_ = $_POST['category'];
    $manu_ = $_POST['manufacturer'];
    $udid_ = $_POST['udid'];
    $serial_ = $_POST['serialno'];
    $imei_ = $_POST['imei'];
} else {
    $device_name = $_GET['name'];
    $os_ = $_GET['OS'];
    $details_ = $_GET['description'];
    $category_ = $_GET['category'];
    $manu_ = $_GET['Manufacturer'];
    $udid_ = $_GET['UDID'];
    $serial_ = $_GET['Serial'];
    $imei_ = $_GET['IMEI'];
}
?>
    <div class="inner-block container">
        <form action="editItem.php?id=<?php echo $id_?>&name=<?php echo $device_name?>&description=<?php echo $details_?>&category=<?php echo $category_?>&OS=<?php echo $os_?>&IMEI=<?php echo $imei_?>&Serial=<?php echo $serial_?>&UDID=<?php echo $udid_?>&Manufacturer=<?php echo $manu_?>" method="post" autocomplete="off">
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
            Device Name: <input   class ="tb5" type="text" name="devicename" required value="<?php echo $device_name?>"><br><br>
            Manufacturer: <input   class ="tb5" type="text" name="manufacturer" value="<?php echo $manu_?>"><br><br>
            Operating System : <input   class ="tb5" type="text" name="OS" value="<?php echo $os_?>"><br><br>
            UDID: <input   class ="tb5" type="text" name="udid"  value="<?php echo $udid_?>"> <br><br>
            Description:
            <br>
            <textarea  class ="tb6" name="message"rows="11"cols="20" class="form-control" rows="11"><?php echo $details_?></textarea>
            <br><br>
            <button type="button" style=" border-radius:10px;   border:2px solid #456879;" data-toggle="collapse" data-target="#more">
                <span data-toggle="tooltip" data-placement="right" title="Add more Details"> Add More Details</span>
            </button>
            <br><br>
            <div id="more" class="collapse" >
                IMEI: <input   class ="tb5" type="text" name="imei"  value="<?php echo $imei_?>"><br><br>
                Serial Number: <input   class ="tb5" type="text" name="serialno" value="<?php echo $serial_?>" ><br><br>
            </div>
            <input class ="tb5" type= "submit" value="Update" name="Update">
        </form>
    </div>
</body>

    <?php
    if(isset($_POST['Update']))
     {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE objects SET name = '$device_name', OS ='$os_' ,description=' $details_',category='$category_',UDID='$udid_',IMEI='$imei_',serial=' $serial_',manufacturer='$manu_'WHERE id = '$id_' ";
         echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>';
         if ($conn->query($sql) === TRUE) {
             echo 'Details have been modified!';
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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