<?php
header('Content-Type: application/json');
require_once "config/db_conn.php";


// a query to get the different sex and their population 
$sql = "SELECT Sex,COUNT(*) as count 
FROM prisoner 
GROUP BY Sex 
ORDER BY count DESC";


$result = mysqli_query($conn,$sql);

$data2 = array();


//saving the record in an array
foreach ($result as $row) {
    $data2[] = $row;
}


mysqli_close($conn);
  
// getting the array in a json format
echo json_encode($data2);













?>

