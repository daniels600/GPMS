<?php 

session_start();

require_once('config/db_conn.php');

$response = array();

if(isset($_POST['submit'])) {

    $empFname = mysqli_escape_string($conn, $_POST['fname']);
    $empLname = mysqli_escape_string($conn, $_POST['lname']);
    $nationality = mysqli_escape_string($conn, $_POST['nationality']);
    $prison = mysqli_escape_string($conn, $_POST['prison']);
    $Dept = mysqli_escape_string($conn, $_POST['dept_name']);
    $salary = mysqli_escape_string($conn, $_POST['salary']);
    $dob = mysqli_escape_string($conn, $_POST['dob']);
    $sex = mysqli_escape_string($conn, $_POST['sex']);
    $marital_status = mysqli_escape_string($conn, $_POST['marital_status']);
    $edu = mysqli_escape_string($conn, $_POST['edu']);
    $ssn = mysqli_escape_string($conn, $_POST['ssn']);
    $telephone = mysqli_escape_string($conn, $_POST['telephone']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $role = mysqli_escape_string($conn, $_POST['role']);
    $streetAddress = mysqli_escape_string($conn, $_POST['streetAddress']);
    $city = mysqli_escape_string($conn, $_POST['city']);
    $state = mysqli_escape_string($conn, $_POST['state']);
    $postcode = mysqli_escape_string($conn, $_POST['postcode']);
    $DOC = mysqli_escape_string($conn, $_POST['DOC']);
    

    $sql = "INSERT INTO Employees(Employee_fname,Employee_lname,Prison_name, Dept_name,nationality,work_commence_date,email,emp_tel,Job, sex,Marital_Status,level_of_education,Salary,DOB,SSN,address_street,address_city,address_region,address_postal_code)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssssdssssss', $empFname ,$empLname,$prison,$Dept,$nationality,$DOC,$email,$telephone,$role,$sex,$marital_status,$edu,$salary,$dob,$ssn,$streetAddress,$city,$state, $postcode);

    if($stmt->execute()){
        $response['message'] = "Success";

        header('Location: employeeForm.php?message=success');

    } else {
        $response['message'] = "Failed";
    }

    //$stmt->close();
    echo json_encode($response);
    $stmt->close();


}