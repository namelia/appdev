<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer details</title>
    <link href="formstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>
<?php
$id_ = ($_GET['id']);
if (isset($_POST['updateclient']))
{
    $category_ = $_POST['category'];
    $email_ = $_POST['email'];
    $customername_ = $_POST['customername'];
    $address_ = $_POST['address'];
    $phone_ = $_POST['phone'];
    $details_ = $_POST['details'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $prevcustomername_ = $_GET['customername'];
    $sql = "UPDATE clients SET name = '$customername_', email ='$email_' ,category=' $category_',category='$category_',address='$address_',phone='$phone_',details=' $details_'WHERE id = '$id_'";
    $sql2 = "UPDATE objects SET client = '$customername_' WHERE client = '$prevcustomername_'";

    echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>';
    if (($conn->query($sql) === TRUE) && ($conn->query($sql2) === TRUE)) {
        echo 'Client has been updated!';
    } else {
        echo 'Error: '. $sql . '<br>' . $conn->error;
    }
    echo '</h1>
              </div>
              <div id="mask"></div>
              </div>';
} else {
    $category_ = $_GET['category'];
    $email_ = $_GET['email'];
    $customername_ = $_GET['customername'];
    $address_ = $_GET['address'];
    $phone_ = $_GET['phone'];
    $details_ = $_GET['details'];
}
$conn->close();
?>
<div class="inner-block container">
    <form action="editclient.php?category=<?php echo $category_?>&customername=<?php echo $customername_?>&email=<?php echo $email_?>&phone=<?php echo $phone_?>&address=<?php echo $address_?>&details=<?php echo $details_?>&id=<?php echo $id_?>" method="post" autocomplete="off">
        <div style ="font-size:15px">This page will update the client database as well as every order that is currently made under that customer's name.
        <br><br>
        Please note that the order system cannot distinguish between two customers with the same name.
        <br><br></div>
        Category:
        <select  class ="tb5"name="category">
            <option value="<?php echo $category_?>"> <?php echo $_GET["category"]; ?></option>
            <option value="Internal Customer">Internal Customer</option>
            <option value="External UCL Customer">External UCL Customer</option>
            <option value="External Other Customer">External Other Customer</option>
        </select>
        <br><br>
            Customer name: <input   class ="tb5" type="text" name="customername" required value="<?php echo $customername_?>" ><br><br>
            Email address: <input  class ="form-control required tb5" type="email" name="email" required  value="<?php echo $email_?>"><br><br>
            Phone: <input   class ="tb5" type="text" name="phone" value="<?php echo $phone_?>" ><br><br>
            Address: <input   class ="tb5" type="text" name="address"  value="<?php echo $address_?>"> <br><br>
            Other details:
            <br>
            <textarea  class ="tb6" name="details"rows="10"cols="20" class="form-control" rows="10"><?php echo $details_?></textarea>
            <br><br>
        <input class ="tb5" type= "submit" value="Update" name="updateclient">
    </form>
</div>
</body>
</html>