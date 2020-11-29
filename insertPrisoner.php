<?php 
session_start();

require_once('config/db_conn.php');

$response = array();

if(isset($_POST['submit'])) {
    $tm = md5(time());

    $prisonerFname = mysqli_escape_string($conn, $_POST['pFname']);
    $prisonerLname = mysqli_escape_string($conn, $_POST['pLname']);
    $nationality = mysqli_escape_string($conn, $_POST['nationality']);
    $prison = mysqli_escape_string($conn, $_POST['prison']);
    $height = mysqli_escape_string($conn, $_POST['height']);
    $weight = mysqli_escape_string($conn, $_POST['weight']);
    $dob = mysqli_escape_string($conn, $_POST['dob']);
    $sex = mysqli_escape_string($conn, $_POST['gender']);
    $marital_status = mysqli_escape_string($conn, $_POST['marital_status']);
    $inmateStatus = mysqli_escape_string($conn, $_POST['inmateStatus']);
    $eyeColor = mysqli_escape_string($conn, $_POST['eyeColor']);
    $complexion = mysqli_escape_string($conn, $_POST['complexion']);
    $telephone = mysqli_escape_string($conn, $_POST['telephone']);
    $cellBlock = mysqli_escape_string($conn, $_POST['cellBlock']);
    $streetAddr= mysqli_escape_string($conn, $_POST['streetAddr']);
    $city= mysqli_escape_string($conn, $_POST['city']);
    $state= mysqli_escape_string($conn, $_POST['state']);
    $PostalCode = mysqli_escape_string($conn, $_POST['PostalCode']);
    $nextKinF = mysqli_escape_string($conn, $_POST['nextKinF']);
    $nextKinL = mysqli_escape_string($conn, $_POST['nextKinL']);
    $kinRelation = mysqli_escape_string($conn, $_POST['kinRelation']);
    $release_date= mysqli_escape_string($conn, $_POST['release_date']);
    $policeId = $_SESSION['policeOfficeId'];
    $image_name = $_FILES['image']['name'];
    $dst = "./prisonerImages/".$tm.$image_name;
    $dst1 = "/prisonerImages/".$tm.$image_name;
    $image_type = $_FILES['image']['type']; // getting the type to check if it is an image
    

    // checking file upload if it is an image
    if(!empty($_FILES['image']['tmp_name']) 
        && file_exists($_FILES['image']['tmp_name'])) {
        $data= addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $allowed = array("image/jpeg", "image/gif", "image/png", "image/jpg");

        if (!in_array($image_type, $allowed)) {
            $error_message = 'Only jpg, gif, and png files are allowed.';
            header("Location: prisonerForm.php?error=wrongImage");
            exit(); 
        }else {
            move_uploaded_file($_FILES['image']['tmp_name'],$dst);
        }
    } 


    $sql = "INSERT INTO Prisoner(Cell_block, P_Officer_Id,Prison_name, Prisoner_fname,Prisoner_lname,DOB,P_complexion,Marital_Status,Sex,Height_feets, Weight_kg,Nationality,Prisoner_tel,Next_of_Kin_fname,Next_of_Kin_lname,Next_of_Kin_Rel,Eye_color,Prisoner_status,address_street,address_city, address_region, address_postal_code, image)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdsssssssddssssssssssss', $cellBlock, $policeId, $prison,$prisonerFname,$prisonerLname,$dob,$complexion,$marital_status,$sex,$height,$weight,$nationality,$telephone,$nextKinF, $nextKinL,$kinRelation, $eyeColor,$inmateStatus,$streetAddr,$city,$state, $PostalCode,$dst1);


    if($stmt->execute()){
        $prisonerId = $conn->insert_id;
        $_SESSION['prisonerId'] = $prisonerId;
        $response['message'] = "Success";
        $caseId = $_SESSION['caseId'];

        $query = "INSERT INTO Prisoner_case(Case_id,Prisoner_id,Latest_Possible_Date)
        VALUES('$caseId', '$prisonerId','$release_date')";

        if ($result = mysqli_query($conn, $query)){
            echo "inserted into prisoner case";

            unset($_SESSION['policeOfficeId']);
            unset($_SESSION['caseId']);
        }

        header('Location: prisonerForm.php?message=success');

    } else {
        $response['message'] = "Failed";
    }

    
    echo json_encode($response);
    $stmt->close();

    





}
