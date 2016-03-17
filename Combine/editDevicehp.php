<!--Just some quick pseudocode bcs i forgot the syntax lol 
I ll complete this bit by bit when i have the time don t worry :p
1st
Get the id of the object we want to edit
2nd
Make a form of what you want to write for that object
3nd
Make an SQL connection to modify the database with the submitted form
4th
Go back to the displayDevice page, which is now updated
$servername="localhost";
    $username="root";
    $password="";
    $database="MOBILEDEVICELENDINGPROJECT";
    $conn=New mysqli($servername,$username,$password,$database);
    
    //Get the object's ID
    idDevice = $_GET['deviceID'] ; //is this how you do it? :/
-->
<!DOCTYPE HTML>
<html> 
<body>

<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>
