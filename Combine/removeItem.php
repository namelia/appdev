<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("index.html"); ?>
</div>
<body>


<div class="container">


</div>
</body>
<div id ="responseitem">
<<<<<<< HEAD
    <?php
    include("config.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $someID = $_GET['id'];
=======
<?php
include("config.php");
// if(isset($_POST['submitt']))
// {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $someID = $_GET['id'];
    

>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1
    // $device_name = "axemax213";
    // $color_ = "Silver";
    // $os_ = "IOS";
    // $details_ = "someotherdetails";
<<<<<<< HEAD
    $sql = "DELETE FROM additem WHERE `additem`.`id` = $someID ";
    if ($conn->query($sql) === TRUE) {
        echo 'This entry has been deleted !! ID: ';
        echo $someID ;
=======

    $sql = "DELETE FROM additem WHERE id = $someID ";

    if ($conn->query($sql) === TRUE) {
        echo 'This entry has been deleted !! ID: ';
        echo $someID ;
        
>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //echo "  ID: " . $someID;
    }
<<<<<<< HEAD
    $conn->close();

    ?>
=======

    $conn->close();
//}
?>
>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1
</div>
</html>