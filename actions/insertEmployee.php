<?php 

session_start();

require_once '../controllers/employeeController.php';

$employee = new Employee();

$response = array();

if(isset($_POST['submit'])) {

   $employee->insertEmployee($_POST);


}