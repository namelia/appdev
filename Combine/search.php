<?php
$servername='localhost';
$username='root';
$password='';
$database='MOBILEDEVICELENDINGPROJECT';
$conn=New mysqli($servername,$username,$password,$database);
$searchq=$_POST['search'];
$query= $conn->query("SELECT * FROM additem WHERE name like ('%$searchq%') OR color like ('%$searchq%')or  details like ('%$searchq%')");
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}
if ($_POST['search'])
{

    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    $count= mysqli_num_rows($query);
if($count ==0)
{
    echo("Search not found");
}
else{
    echo "<table> <style>table,td,th,tr{border:1px solid black; border-collapse: collapse} </style>
    <tr> <th>ID</th>  <th>Name</th>   <th>Color</th>    <th>Details</th>  </tr>";

while($row= $query->fetch_assoc())
{
    $name= $row['name'];
    $id=$row['id'];
    $color=$row['color'];
    $details=$row['details'];
echo"<tr>
     <td>$id</td>
     <td>$name</td>
     <td>$color</td>
     <td>$details</td>
     </tr>";
}
 echo "</table>";
}

}
?>