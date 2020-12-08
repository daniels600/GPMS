<?php 

session_start();
 
// Include config file

include "config/db_conn.php";

//creating an instance of db_connection 
$db = new DB_connection();


// Validating of Login of Admin

$response = array();
 
// Processing form data when form is submitted
if(isset($_POST['submit']))  {

    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

   
    // Prepare a select statement
    $sql = "SELECT admin_id, email, password FROM ADMIN_LOGIN WHERE email ='$admin_email'";
        
    //Executing the query 
    $result =  mysqli_query($db->connect(),$sql);

    if($result === false){
        //end connection
        die(mysqli_error($db->connect()));
    } 
    else{
        //Checking if the was a result from the query
        if(mysqli_num_rows($result)== 0){
            $response['message'] = "Invalid Credentials";
        } else {
            $row = mysqli_fetch_array($result);
            
            //creating variables for the fields from the DB
            $id =  $row[0];
            $password = $row[2];

            //checking admin email and verifying the password
            if(($row[1] == $admin_email) && password_verify($admin_password,$password)){
                // $response['message'] = "Valid Credentials";
                
                // Creating a Session for the Admin
                $_SESSION['admin_id'] = $row[0];
                $_SESSION['admin_email'] = $row[1];

                //redirect to login with an addition to the url
                header('Location: index.php?login=success');
               

            } else {
                //error message
                $response['message'] = "Invalid Credentials";
            }
        }
        
    } 
       

}

//Logout Admin and destroy all sessions 
if(isset($_GET['logout'])){
    session_destroy();

    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_email']);
    
    //redirect admin to the login page
    header('Location: index.php');
    exit();
} 











?>