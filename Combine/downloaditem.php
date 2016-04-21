 <?php
// Written by Pierce.
include("config.php");
// Query...
$resultSet= $conn->query("SELECT category,name,id,OS,manufacturer,description,UDID,IMEI,serial FROM objects");

// Don't look... Download!
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=product.csv');

// Rev up those filepointers!
$output = fopen('php://output', 'w');

// Headings...
fputcsv($output, array('category','name', 'id', 'os','manufacturer', 'description','UDID','IMEI','serial'));

// ...and rows!
while ($rows = $resultSet->fetch_assoc()) fputcsv($output, $rows);

fclose($output);
?>