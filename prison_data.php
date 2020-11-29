<?php
header('Content-Type: application/json');
require_once "config/db_conn.php";

$sql = "SELECT Prison_name,COUNT(*) as count 
FROM prisoner 
GROUP BY Prison_name 
ORDER BY count DESC";

$result = mysqli_query($conn,$sql);

$data = array();

foreach ($result as $row) {
    $data[] = $row;
}

// //free memory associated with result
// $result->close();

mysqli_close($conn);
  

echo json_encode($data);













?>

