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
<<<<<<< HEAD
    <form action="editItem.php?id=<?php echo $_GET['id'] ?>" method="post">
        Device Name: <input  type="text" name="devicename" required><br><br>
        Color:
        <select  name="color">
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
        <select  name="OS">
            <option value="IOS">IOS</option>
            <option value="Android">Android</option>
            <option value="Firefox OS">Firefox OS</option>
            <option value="Windows Phone">Windows Phone</option>
            <option value="Blackberry">Blackberry</option>
            <option value="Tizen">Tizen</option>
            <option value="Sailfish OS">Sailfish OS</option>
            <option value="Ubuntu Touch OS">Ubuntu Touch OS</option>
            <option value="None">None</option>
            <option value="Others">Others</option>
        </select>
        <br><br>

        Description:
        <br>
        <textarea name="message"rows="10"cols="20"></textarea>
        <br><br>
        <input type= "submit" value="Submit" name="submitt">
    </form>
=======
<form action="editItem.php?id=<?php echo $_GET['id'] ?>" method="post">
    Device Name: <input  type="text" name="devicename" required><br><br>
    Color:
    <select  name="color">
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
    <select  name="OS">
        <option value="IOS">IOS</option>
        <option value="Android">Android</option>
        <option value="Firefox OS">Firefox OS</option>
        <option value="Windows Phone">Windows Phone</option>
        <option value="Blackberry">Blackberry</option>
        <option value="Tizen">Tizen</option>
        <option value="Sailfish OS">Sailfish OS</option>
        <option value="Ubuntu Touch OS">Ubuntu Touch OS</option>
        <option value="None">None</option>
        <option value="Others">Others</option>
    </select>
    <br><br>
    
    Description:
    <br>
    <textarea name="message"rows="10"cols="20"></textarea>
    <br><br>
    <input type= "submit" value="Submit" name="submitt">
</form>
>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1

</div>
</body>
<div id ="responseitem">
<<<<<<< HEAD
    <?php
    include("config.php");
    if(isset($_POST['submitt']))
     {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
=======
<?php
include("config.php");
// if(isset($_POST['submitt']))
// {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1
    $someID = $_GET['id'];
    $device_name = $_POST['devicename'];
    $color_ = $_POST['color'];
    $os_ = $_POST['OS'];
    $details_ = $_POST['message'];
<<<<<<< HEAD
=======

>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1
    // $device_name = "axemax213";
    // $color_ = "Silver";
    // $os_ = "IOS";
    // $details_ = "someotherdetails";
<<<<<<< HEAD
    $sql = "UPDATE additem SET name = '$device_name',  color = '$color_' , OS ='$os_' , details = '$details_' WHERE id = $someID ";
    if ($conn->query($sql) === TRUE) {
        echo 'Details have been modified in the database! In the entry: ';
        echo $someID ;
=======

    $sql = "UPDATE additem SET name = '$device_name',  color = '$color_' , OS ='$os_' , details = '$details_' WHERE id = $someID ";

    if ($conn->query($sql) === TRUE) {
        echo 'Details have been modified in the database! In the entry: ';
        echo $someID ;
        
>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //echo "  ID: " . $someID;
    }
<<<<<<< HEAD
    $conn->close();
    }
    ?>
=======

    $conn->close();
//}
?>
>>>>>>> 6d0df67a8f31deb51b89980c3b2c5cb8d6c52ef1
</div>
</html>