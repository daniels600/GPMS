<?php 

require_once('config/db_conn.php');

$visitorID = $_GET['id'];

$sql = "DELETE FROM Visitor WHERE Visitor_id='$visitorID'";

if(mysqli_query($conn,$sql)){
    header('Location: visitor.php?message=success');
}

