<?php 

session_start();

require_once('config/db_conn.php');

// an array to keep the messages
$response = array();

if(isset($_POST['submit'])) {
    $officerFname = mysqli_escape_string($conn, $_POST['pFname']);
    $officerLname = mysqli_escape_string($conn, $_POST['pLname']);
    $serviceId = mysqli_escape_string($conn, $_POST['serviceId']);
    $officerContact = mysqli_escape_string($conn, $_POST['pContact']);
    $stationContact = mysqli_escape_string($conn, $_POST['stationContact']);
    $ranks = mysqli_escape_string($conn, $_POST['ranks']);
    $stationName = mysqli_escape_string($conn, $_POST['stationName']);

    // A query to insert a new policeOfficer record 
    $sql = "INSERT INTO Police_Officer(Service_ID, P_fname, P_lname,Ranks, Officer_contact,Police_Station,Station_Tel)
    VALUES(?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss',$serviceId,$officerFname,$officerLname,$ranks,$officerContact,$stationName,$stationContact);


    // checking if query was a success
    if($stmt->execute()){
        $response['message'] = "Success";

        $policeOfficerId = $conn->insert_id;

        $_SESSION['policeOfficeId'] =  $policeOfficerId;

        header('Location: policeOfficerForm.php?message=success');

    } else {
        $response['message'] = "Failed";
        echo ("The error is ".mysqli_error($conn));
    }

    //$stmt->close();
    echo json_encode($response);
    $stmt->close();
}


















?>