<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/28/2016
 * Time: 3:10 AM
 */
$servername='localhost';
$username='root';
$password='';
$database='MOBILEDEVICELENDINGPROJECT';
$conn=New mysqli($servername,$username,$password,$database);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}


    $cust_name= $_POST['custname'];
    $email_ =$_POST['custemail'];
    $category_=$_POST['category'];
    $details_ = $_POST['details'];
    $sql = "INSERT INTO addcustomers (name,email,category,details) VALUES ('$cust_name','$email_','$category_','$details_')";

    if ($conn->query($sql) === TRUE)
    {
       echo 'Details have been added to the database!';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>