<?php 

session_start();

require_once('config/db_conn.php');

$response = array();

if(isset($_POST['submit'])) {
    $vFname = mysqli_escape_string($conn, $_POST['fName']);
    $vLname = mysqli_escape_string($conn, $_POST['lName']);
    $rel = mysqli_escape_string($conn, $_POST['rel']);
    $vContact = mysqli_escape_string($conn, $_POST['telephone']);
    $sex = mysqli_escape_string($conn, $_POST['sex']);
    $visitDate = mysqli_escape_string($conn, $_POST['visitDate']);
    $visitTime = mysqli_escape_string($conn, $_POST['visitTime']);
    $prisonerName= mysqli_escape_string($conn, $_POST['prisonerName']);
    $prisonName = mysqli_escape_string($conn, $_POST['prison']);


    $sql = "INSERT INTO visitor( v_fname,v_lname,relationship,prisoner_name,sex,v_ph_number,time_of_visit,date_of_visit,Prison_name)
    VALUES(?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssss',$vFname,$vLname,$rel,$prisonerName, $sex,$vContact,$visitTime,$visitDate,$prisonName);

    if($stmt->execute()){
        $response['message'] = "Success";

        header('Location: visitorForm.php?message=success');

    } else {
        $response['message'] = "Failed";
    }

   
    $stmt->close();
}


















?>