<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
    <script src="js/jquery.validate.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<?php include("index.php") ?>
<div class="container" id ="custcont">
    <form action="addcustomer.php" method="post">
        Customers Name: <input  class ="tb5" type="text" name="custname" required><br><br>
        Email address: <input  class ="tb5" type="text" name="custemail" class="form-control required" type="email" required><br><br>
        Category:
        <select class ="tb5"  name="category">
            <option value="Internal Customer">Internal Customer</option>
            <option value="External UCL Customer">External UCL Customer</option>
            <option value="External Other Customer">External Other Customer</option>
        </select>
        <br><br>
        Phone: <input  class ="tb5" type="text" name="phoneno" ><br><br>
        Address:
        <br>
        <textarea  class ="tb6" name="address" rows="3" cols="10"></textarea>
        <br><br>
        Other Details:
        <br>
        <textarea  class ="tb6" name="details" rows="10" cols="20"></textarea>
        <br><br>
        <input class ="tb5"  type= "submit" value="Submit" name="submit">
    </form>

</div>
</body>

</html>

<div id ="responseitem">
<?php
include("config.php");
if(isset($_POST['submit'])) {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'MOBILEDEVICELENDINGPROJECT';
    $conn = New mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $cust_name = $_POST['custname'];
    $email_ = $_POST['custemail'];
    $category_ = $_POST['category'];
    $details_ = $_POST['details'];
    $phone_ =$_POST['phoneno'];
    $address_ =$_POST['address'];
    $sql = "INSERT INTO clients (name,email,category,details,phone,address) VALUES ('$cust_name','$email_','$category_','$details_','$phone_','$address_')";

    if ($conn->query($sql) === TRUE) {
        echo 'Details have been added to the database!';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</div>
