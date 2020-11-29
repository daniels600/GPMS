<?php 

require_once('config/db_conn.php');

$prisonerID = $_GET['id'];

$sql = "DELETE FROM Prisoner WHERE Prisoner_id='$prisonerID'";

if(mysqli_query($conn,$sql)){
    header('Location: prisoner.php?message=success');
}


