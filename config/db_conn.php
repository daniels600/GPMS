<?php 


    require ('constants.php');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
    


   


?>