
<!DOCTYPE HTML>
<html> 

<?php>
  //Connection to the database
  
  $bdd = new PDO('mysql:host=localhost;dbname=MOBILEDEVICELENDINGPROJECT;charset=utf8', 'root', 'root');
  
  //Retrieve the value from the parameter passed: (again, lol, this is the second time that the ID gets retrieved by a page with this parameter passing method)
  $deviceID = $_GET['deviceID'] ;
  //Retrieve the values from the form:
  $newName = $_POST["name"];
  $newColor = $_POST["color"];
  $newOS = $_POST["OS"];
  $newDetails = $_POST["details"];
  
  //Now that everything is set up (we have the connection + the variable values), let s put all of this in the database
  //idk what to write before the sql query, but I know what to write inside:
  //UPDATE deviceTable SET name=$newName , color=newColor,  details=newDetails, OS = newOS WHERE id=$deviceID
  $req = $bdd->prepare('UPDATE objects SET name = :new_name, OS = :new_OS, color = new_color, details = new_details WHERE id = :idDevice');
  $req->execute(array(
	  'new_name' => $newName,
	  'new_OS' => $newOS,
	  'new_color' => $newColor,
	  'new_details' => $newDetails,
	  'idDevice' => $deviceID
	));
  
  //Last thing:
  //I don t remember how, but here, just add an automatic redirection to the displayTable page

<php>


</html>