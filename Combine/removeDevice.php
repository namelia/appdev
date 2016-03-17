<!--Just some quick pseudocode bcs i forgot the syntax lol 
I ll complete this bit by bit when i have the time don t worry :p
1st
Get the id of the object we want to edit
2nd
Make an SQL connection to delete the object that has that id, in the database
3nd
Delete the object
4th
Go back to the displayDevice page, which is now updated

-->


<!DOCTYPE HTML>
<html> 
<body>

<?php> 
//Get the object's ID with GET which holds the value of the parameter sent earlier (with the line editDevicehp.php?deviceID=$id in the file displaytable.php)
$deviceID = $_GET['deviceID'] ; //is this how you do it though? :/

//Connection to the database
$servername="localhost";
$username="root";
$password="";
$database="MOBILEDEVICELENDINGPROJECT";
$conn=New mysqli($servername,$username,$password,$database);

//Now that we're connected, and that we know the ID of the device, let's delete that object:
//Idk how to do the exact query, bcs i learned the old syntax, but i know exactly what the actual sql code is:
//DELETE FROM deviceTable WHERE id=$deviceID


</body>
</html>
