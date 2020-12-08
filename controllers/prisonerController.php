<?php

session_start();

// Include config file
include "config/db_conn.php";


class Prisoner {
    
    public function insert_prisoner($post){
                
        //creating an instance of db_connection 
        $db = new DB_connection();

        $tm = md5(time()); //Hashing to make an image unique

        //Getting all the post or submitted input values
        $prisonerFname = mysqli_escape_string($db->connect(), $_POST['pFname']);
        $prisonerLname = mysqli_escape_string($db->connect(), $_POST['pLname']);
        $nationality = mysqli_escape_string($db->connect(), $_POST['nationality']);
        $prison = mysqli_escape_string($db->connect(), $_POST['prison']);
        $height = mysqli_escape_string($db->connect(), $_POST['height']);
        $weight = mysqli_escape_string($db->connect(), $_POST['weight']);
        $dob = mysqli_escape_string($db->connect(), $_POST['dob']);
        $sex = mysqli_escape_string($db->connect(), $_POST['gender']);
        $marital_status = mysqli_escape_string($db->connect(), $_POST['marital_status']);
        $inmateStatus = mysqli_escape_string($db->connect(), $_POST['inmateStatus']);
        $eyeColor = mysqli_escape_string($db->connect(), $_POST['eyeColor']);
        $complexion = mysqli_escape_string($db->connect(), $_POST['complexion']);
        $telephone = mysqli_escape_string($db->connect(), $_POST['telephone']);
        $cellBlock = mysqli_escape_string($db->connect(), $_POST['cellBlock']);
        $streetAddr= mysqli_escape_string($db->connect(), $_POST['streetAddr']);
        $city= mysqli_escape_string($db->connect(), $_POST['city']);
        $state= mysqli_escape_string($db->connect(), $_POST['state']);
        $PostalCode = mysqli_escape_string($db->connect(), $_POST['PostalCode']);
        $nextKinF = mysqli_escape_string($db->connect(), $_POST['nextKinF']);
        $nextKinL = mysqli_escape_string($db->connect(), $_POST['nextKinL']);
        $kinRelation = mysqli_escape_string($db->connect(), $_POST['kinRelation']);
        $release_date= mysqli_escape_string($db->connect(), $_POST['release_date']);

        $policeId = $_SESSION['policeOfficeId'];
        $image_name = $_FILES['image']['name'];
        $dst = "./prisonerImages/".$tm.$image_name;
        $dst1 = "/prisonerImages/".$tm.$image_name;
        $image_type = $_FILES['image']['type']; // getting the type to check if it is an image

        $regex1= "^[a-zA-Z ]*$";
        $regex2 = "/(\d+(\.\d+)?)/";
        $regex3 = "^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$";
        $regex4 = "[ A-Za-z0-9 _.,\/+-]*$";
        $regex5 = "^[ A-Za-z0-9 z.,\/+-]*$";
        

         // checking file upload if it is an image
        if(!empty($_FILES['image']['tmp_name']) 
            && file_exists($_FILES['image']['tmp_name'])) {
            $data= addslashes(file_get_contents($_FILES['image']['tmp_name']));

            $allowed = array("image/jpeg", "image/gif", "image/png", "image/jpg");

            if (!in_array($image_type, $allowed)) {
                //$error_message = 'Only jpg, gif, and png files are allowed.';
                header("Location: prisonerForm.php?error=wrongImage");
                exit(); 
            }else {
                move_uploaded_file($_FILES['image']['tmp_name'],$dst);
            }
        }
        
        if(preg_match($regex1, $prisonerFname) && preg_match($regex1, $prisonerLname) && preg_match($regex1, $nationality) && preg_match($regex1, $prison) && preg_match($regex2, $height) && preg_match($regex2, $weight)
        && preg_match($regex1, $eyeColor) && preg_match($regex1, $complexion) && preg_match($regex1, $inmateStatus)
        && preg_match($regex3, $telephone) && preg_match($regex4, $streetAddr) && preg_match($regex5, $city) 
        && preg_match("^[A-Za-z -]*$", $state) && preg_match("^[ A-Za-z0-9 _.,\/+-]*$", $PostalCode) && 
        preg_match($regex1, $nextKinF) && preg_match($regex1, $nextKinL) &&preg_match($regex1, $kinRelation)) {


        //A query to insert a new prisoner
        $sql = "INSERT INTO Prisoner(Cell_block, P_Officer_Id,Prison_name, Prisoner_fname,Prisoner_lname,DOB,P_complexion,Marital_Status,Sex,Height_feets, Weight_kg,Nationality,Prisoner_tel,Next_of_Kin_fname,Next_of_Kin_lname,Next_of_Kin_Rel,Eye_color,Prisoner_status,address_street,address_city, address_region, address_postal_code, image)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //preparing the query statement 
        $stmt = $db->connect()->prepare($sql);
        $stmt->bind_param('sdsssssssddssssssssssss', $cellBlock, $policeId, $prison,$prisonerFname,$prisonerLname,$dob,$complexion,$marital_status,$sex,$height,$weight,$nationality,$telephone,$nextKinF, $nextKinL,$kinRelation, $eyeColor,$inmateStatus,$streetAddr,$city,$state, $PostalCode,$dst1);


        //checking the execution of the query statement
        if($stmt->execute()){
            $prisonerId = $db->connect()->insert_id;
            $_SESSION['prisonerId'] = $prisonerId;
            $response['message'] = "Success";
            $caseId = $_SESSION['caseId'];

            //query to insert into the prisoner_case table
            $query = "INSERT INTO Prisoner_case(Case_id,Prisoner_id,Latest_Possible_Date)
            VALUES('$caseId', '$prisonerId','$release_date')";

            if ($result = mysqli_query($db->connect(), $query)){
                //unset or removing the session variables from the policeOfficer and case forms
                unset($_SESSION['policeOfficeId']);
                unset($_SESSION['caseId']);
            }

            header('Location: views/prisonerForm.php?message=success');

            //If the statement execution fails
            } else {
                $response['message'] = "Failed";
                header('Location: views/prisonerForm.php?error=failed&');
            }

            
            echo json_encode($response);
            $stmt->close();

    
            
    }
}



















}
