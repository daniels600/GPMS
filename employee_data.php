<?php
header('Content-Type: application/json');
require_once "config/db_conn.php";


// A query to get the different sex and their respective population
$sql = "SELECT sex,COUNT(*) as count 
        FROM Employees 
        GROUP BY sex 
        ORDER BY count DESC";


//executing the query
$result = mysqli_query($conn,$sql);

$data = array();

// storing the record in an array
foreach ($result as $row) {
    $data[] = $row;
}


mysqli_close($conn);
  

echo json_encode($data);













?>

