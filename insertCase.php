<?php 
session_start();

require_once('config/db_conn.php');

$response = array();

if(isset($_POST['submit'])) {
    $magFname = mysqli_escape_string($conn, $_POST['mFname']);
    $magLname = mysqli_escape_string($conn, $_POST['mLname']);
    $court = mysqli_escape_string($conn, $_POST['court']);
    $crime = mysqli_escape_string($conn, $_POST['crime']);
    $catOffence = mysqli_escape_string($conn, $_POST['CatOffence']);
    $caseStartDate = mysqli_escape_string($conn, $_POST['case_start_date']);
    $caseEndDate = mysqli_escape_string($conn, $_POST['case_end_date']);
    $crimeTime = mysqli_escape_string($conn, $_POST['crimeTime']);
    $dateCrime = mysqli_escape_string($conn, $_POST['crimeDate']);
    $sentence = mysqli_escape_string($conn, $_POST['sentenceLength']);

    $sql = "INSERT into cases(case_start_date,case_end_date,crime_committed,Category_of_Offence,Crime_time,Crime_date,
    sentence_length_Years,Court_of_commital,Magistrate_fname,Magistrate_lname) 
    VALUES(?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssdsss', $caseStartDate, $caseEndDate, $crime,$catOffence,$crimeTime,$dateCrime,$sentence,$court, $magFname, $magLname);
    

    if($stmt->execute()){
        
        $caseId = $conn->insert_id;
        $_SESSION['caseId'] = $caseId;
        $response['message'] = "Success";

        header('Location: caseForm.php?message=success');

    } else {
        $response['message'] = "Failed";
    }

    //$stmt->close();
    echo json_encode($response);
    $stmt->close();
}


















