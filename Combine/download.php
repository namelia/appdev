 <?php
// Written by Pierce.

// Data base connection hyper force GO!
$servername="localhost";
$username="root";
$password="";
$database="MOBILEDEVICELENDINGPROJECT";
$conn=New mysqli($servername,$username,$password,$database);
// Query...
$resultSet= $conn->query("SELECT name,id,color,os,details FROM additem");

// Don't look... Download!
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// Rev up those file pointers!
$output = fopen('php://output', 'w');

// Headings...
fputcsv($output, array('name', 'id', 'color', 'os', 'details'));

// ...and rows!
while ($rows = $resultSet->fetch_assoc()) fputcsv($output, $rows);

// Never did want to live forever.
fclose($output);
?>