<?php 

require_once '../controllers/visitorController.php';


$visitor = new Visitor();

//checking there is an id in the url
if(isset($_GET['id'])){
    $visitorID = $_GET['id'];

    $visitor->DeleteVisitor($visitorID);
}







