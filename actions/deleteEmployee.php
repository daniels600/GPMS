<?php 

require_once '../controllers/employeeController.php';

//Creating an instance of Employee
$employee = new Employee();

//Checking for an id in the Url to this page
if(isset($_GET['id'])){

    $empId = $_GET['id'];

    //Calling the delete employee method
    $employee->DeleteEmployee($empId);


}








?>