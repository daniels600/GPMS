<?php 

require_once('config/db_conn.php');

//checking there is an id in the url
if(isset($_GET['id'])){
    $visitorID = $_GET['id'];
}


//a query to delete the visitor record with this id
$sql = "DELETE FROM Visitor WHERE Visitor_id='$visitorID'";


//checking if the query was successful and redirecting to the visitor page
if(mysqli_query($conn,$sql)){
    header('Location: visitor.php?message=success');
}

