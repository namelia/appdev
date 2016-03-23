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
<?php include ("index.html") ?>
<div class="container">
    <form action="addcustomerhp.php" method="post">
        Customers Name: <input  type="text" name="custname" required><br><br>
        Email address: <input  type="text" name="custemail" class="form-control required" type="email" required><br><br>
        Category:
        <select  name="category">
            <option value="Internal customer">Internal customer</option>
            <option value="External UCL customer">External UCL customer</option>
            <option value="External other customers">External other customers</option>
        </select>
        <br><br>
        <!--data from wikipedia-->
        Other Details:
        <br>
        <textarea name="details" rows="10" cols="20"></textarea>
        <br><br>
        <input type= "submit" value="Submit" name="submitt">
    </form>

</div>
</body>

<div id =responsecust>
<?php
include("config.php");
if(isset($_POST['submitt']))
{
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $cust_name = $_POST['custname'];
    $email_ = $_POST['custemail'];
    $category_ = $_POST['category'];
    $details_ = $_POST['details'];
    $sql = "INSERT INTO addcustomers (name,email,category,details) VALUES ('$cust_name','$email_','$category_','$details_')";

    if ($conn->query($sql) === TRUE) {
        echo 'Details have been added to the database!';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


</div>
</html>