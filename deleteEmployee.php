<?php 

require_once('config/db_conn.php');

$empId = $_GET['id'];


$sql = "DELETE FROM Employees where Employee_ID='$empId'";


if(mysqli_query($conn,$sql)){
    header('Location: employee.php?message=success');
}









?>