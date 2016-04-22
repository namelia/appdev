<?php
// Written by Pierce.
include("config.php");
// Query...
$resultSet= $conn->query("SELECT name,category,email,phone,address,details FROM clients");

// Don't look... Download!
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=customer.csv');

// Rev up those filepointers!
$output = fopen('php://output', 'w');

// Headings...
fputcsv($output, array('Name','Category','Email','Phone','Address','Details'));

// ...and rows!
while ($rows = $resultSet->fetch_assoc()) fputcsv($output, $rows);

fclose($output);
?>