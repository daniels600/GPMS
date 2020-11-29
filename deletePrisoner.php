<?php 

require_once('config/db_conn.php');

//checking for the id in the URL
if(isset($_GET['id'])){
    $prisonerID = $_GET['id'];
}

// a query to delete the prisoner record
$sql = "DELETE FROM Prisoner WHERE Prisoner_id='$prisonerID'";


//checking if the query is successful
if(mysqli_query($conn,$sql)){
    header('Location: prisoner.php?message=success');
}


