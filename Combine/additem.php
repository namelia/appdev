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


    $device_name= $_POST['devicename'];
    $id_ =($_POST['ID']);
    $color_ =$_POST['color'];
    $os_=$_POST['OS'];
    $details_ = $_POST['message'];
    $sql = "INSERT INTO additem (name,id,color,OS,details) VALUES ('$device_name','$id_','$color_','$os_','$details_')";

    if ($conn->query($sql) === TRUE)
    {
       echo 'Details have been added to the database!';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>