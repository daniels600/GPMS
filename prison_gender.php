<?php
header('Content-Type: application/json');
require_once "config/db_conn.php";

$sql = "SELECT Sex,COUNT(*) as count 
FROM prisoner 
GROUP BY Sex 
ORDER BY count DESC";

$result = mysqli_query($conn,$sql);

$data2 = array();

foreach ($result as $row) {
    $data2[] = $row;
}

// //free memory associated with result
// $result->close();

mysqli_close($conn);
  

echo json_encode($data2);













?>

