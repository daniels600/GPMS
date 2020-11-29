<?php 

require_once('config/db_conn.php');


if(isset($_GET['id'])){
    $empId = $_GET['id'];
}


//a query to delete the employee record with this id
$sql = "DELETE FROM Employees where Employee_ID='$empId'";


//checking if the query was successful and redirecting to the employee page
if(mysqli_query($conn,$sql)){
    header('Location: employee.php?message=success');
}









?>