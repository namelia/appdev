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


    $cust_name= $_POST['custename'];
    $email_ =$_POST['custemail'];
    
    $sql = "INSERT INTO addcustomer (custename,custemail) VALUES ('$cust_name','$email_')";
    //I know there s only two entries, it looks weird but it s important
    //side note: i didn t have a look at the real actual database you made Nancy lol (but i will soon, promise!),
    //and that s why idk if those variable names actually match with those in the sql database (could u guys quickly check ?)
    
    if ($conn->query($sql) === TRUE)
    {
       echo 'Details have been added to the database!';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //Here, since the guy has been added, we should load the displayCustomer table
    //
    //

$conn->close();
?>
