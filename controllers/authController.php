<?php 

session_start();
 
// Include config file
require "config/db_conn.php";


// Validating of Login of Admin

$response = array();
 
// Processing form data when form is submitted
if(isset($_POST['submit']))  {

    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

   
    // Prepare a select statement
    $sql = "SELECT admin_id, email, password FROM ADMIN_LOGIN WHERE email ='$admin_email'";
        
    $result =  mysqli_query($conn, $sql);

    if($result === false){
        
        die(mysqli_error($conn));;
    } 
    else{
        //Checking if the was a result from the query
        if(mysqli_num_rows($result)== 0){
            $response['message'] = "Invalid Credentials";
        } else {
            $row = mysqli_fetch_array($result);
        
            $id =  $row[0];
            $password = $row[2];

            //checking admin email and verifying the password
            if(($row[1] == $admin_email) && password_verify($admin_password,$password)){
                // $response['message'] = "Valid Credentials";
                
                // Creating a Session for the Admin
                $_SESSION['admin_id'] = $row[0];
                $_SESSION['admin_email'] = $row[1];

                header('Location: index.php?login=success');
               

            } else {
                
                $response['message'] = "Invalid Credentials";
            }
        }
        
    } 
       
    
    // Close connection
    $conn->close();


}

//Logout Admin
if(isset($_GET['logout'])){
    session_destroy();

    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_email']);
    
    //redirect admin to the login page
    header('Location: index.php');
    exit();
} 











?>