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

<?php 
//Get the object's ID with GET which holds the value of the parameter sent earlier (with the line editDevicehp.php?deviceID=$id in the file displaytable.php)
$deviceID = $_GET['deviceID'] ; //is this how you do it though? :/

$bdd = new PDO('mysql:host=localhost;dbname=MOBILEDEVICELENDINGPROJECT;charset=utf8', 'root', 'root');
  
  //Retrieve the value from the parameter passed: (again, lol, this is the second time that the ID gets retrieved by a page with this parameter passing method)
  $deviceID = $_GET['deviceID'] ;
  
  //Now that everything is set up (we have the connection + the variable values), let s put all of this in the database
  //idk what to write before the sql query, but I know what to write inside:
  //UPDATE deviceTable SET name=$newName , color=newColor,  details=newDetails, OS = newOS WHERE id=$deviceID
  $req = $bdd->prepare('DELETE FROM objects  WHERE id = :idDevice');
  $req->execute(array(
	  'idDevice' => $deviceID
	));

//Now that we're connected, and that we know the ID of the device, let's delete that object:
//Idk how to do the exact query, bcs i learned the old syntax, but i know exactly what the actual sql code is:
//DELETE FROM deviceTable WHERE id=$deviceID

//Last thing to do:
?>

<?php
  
?> 
</body>
</html>
