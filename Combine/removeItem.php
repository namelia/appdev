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


<div class="container">


</div>
</body>
<div id ="responseitem">
    <?php
    include("config.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $someID = $_GET['id'];
    // $device_name = "axemax213";
    // $color_ = "Silver";
    // $os_ = "IOS";
    // $details_ = "someotherdetails";
    $sql = "DELETE FROM additem WHERE `additem`.`id` = $someID ";
    if ($conn->query($sql) === TRUE) {
        echo 'This entry has been deleted !! ID: ';
        echo $someID ;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //echo "  ID: " . $someID;
    }
    $conn->close();

    ?>
</div>
</html>