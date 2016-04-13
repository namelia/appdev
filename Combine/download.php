 <?php
// Written by Pierce.
include("config.php");
// Data base connection hyper force GO!
// Query...
$resultSet= $conn->query("SELECT category,name,id,OS,manufacturer,description,UDID,IMEI,serial FROM objects");

// Don't look... Download!
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// Rev up those file pointers!
$output = fopen('php://output', 'w');

// Headings...
fputcsv($output, array('category','name', 'id', 'os','manufacturer', 'description','UDID','IMEI','serial'));

// ...and rows!
while ($rows = $resultSet->fetch_assoc()) fputcsv($output, $rows);

// Never did want to live forever.
fclose($output);
?>