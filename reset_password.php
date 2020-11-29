<?php
require_once "config/db_conn.php";
 
 
// Processing form data when form is submitted
if(isset($_POST['submit'])){
 
    $admin_mail = mysqli_real_escape_string($conn,$_POST['email']);
    $new_password = mysqli_real_escape_string($conn,  $_POST['new_password']);
    
    
    $sql =  "SELECT * from ADMIN_LOGIN WHERE email = '$admin_mail'";

    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);

    
    if (mysqli_num_rows($results) > 0) {
        
        $password = $row['password'];

        // Check input errors before updating the database
        if ( $row['email'] == $admin_mail) {
            
            //hash new password 
            $new_password = password_hash($new_password,PASSWORD_DEFAULT);

            // Prepare an update statement
            $sql_up = "UPDATE ADMIN_LOGIN SET password = '$new_password' WHERE email = '$admin_mail'";

            $updatePass = mysqli_query($conn, $sql_up);

            if (isset($updatePass)) {
                header('Location: password.php?reset=success');
            } else {
                header('Location: password.php?error=resetfailed');
            }

        } else{
            header('Location: password.php?error=resetfailed');
        }
    } else {
        header('Location: password.php?error=resetfailed');
    }

    // Close connection
    $conn->close();
}
?>
 