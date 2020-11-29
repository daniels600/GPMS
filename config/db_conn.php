<?php 


    require ('constants.php');

    //creating a connection with the DB
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    //checking if there is a connection with the database
    if($conn === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
    


   


?>