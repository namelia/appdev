<!--Just some quick pseudocode bcs i forgot the syntax lol 
I ll complete this bit by bit when i have the time don t worry :p
1st
Get the id of the object we want to edit
2nd
Make a form of what you want to write for that object
3nd
Send that form to editDevice.php

$servername="localhost";
    $username="root";
    $password="";
    $database="MOBILEDEVICELENDINGPROJECT";
    $conn=New mysqli($servername,$username,$password,$database);
    
    
-->
<!DOCTYPE HTML>
<html> 
<body>

<?php> 
//Get the object's ID with GET which holds the value of the parameter sent earlier (with the line editDevicehp.php?deviceID=$id in the file displaytable.php)
idDevice = $_GET['deviceID'] ; //is this how you do it though? :/

<form action="editDevice.php" method="post"> //This form takes all the user wants to change in the object's details
Name: <input type="text" name="Name"><br>
Color: <input type="text" name="Color"><br>
OS: <input type="text" name="OS"><br>
Details: <input type="text" name="Details"><br>
<input type="submit">
</form> //Then those details are sent to editDevice.php thanks to the superglobal variable POST['blablbla']

</body>
</html>