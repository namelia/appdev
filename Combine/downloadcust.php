<?php
// Written by Pierce.
include("config.php");
// Data base connection hyper force GO!
// Query...
$resultSet= $conn->query("SELECT id,name,category,email,phone,address,details FROM clients");

// Don't look... Download!
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=customer.csv');

// Rev up those file pointers!
$output = fopen('php://output', 'w');

// Headings...
fputcsv($output, array('id','name','category', 'email', 'phone','address', 'details'));

// ...and rows!
while ($rows = $resultSet->fetch_assoc()) fputcsv($output, $rows);

// Never did want to live forever.
fclose($output);
?>