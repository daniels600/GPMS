<?php
header('Content-Type: application/json');
require_once "config/db_conn.php";

//a query to get the different prisons and their respective population
$sql = "SELECT Prison_name,COUNT(*) as count 
FROM prisoner 
GROUP BY Prison_name 
ORDER BY count DESC";


//executing the query
$result = mysqli_query($conn,$sql);

//an array to keep the return of the query
$data = array();

//saving the  record in the data array
foreach ($result as $row) {
    $data[] = $row;
}


mysqli_close($conn);
  
// getting back the data in a json format 
echo json_encode($data);













?>

