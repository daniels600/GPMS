<?php 


require_once '../controllers/visitorController.php';

//creating an instance of visitor
$visitor = new Visitor();

$response = array();


//checking for a post inputs here
if(isset($_POST['submit'])) {

    $visitor->insertVisitor($_POST);

    
}















?>