<?php

//initialize a session
session_start();

// Include config file
include "../config/db_conn.php";

class Employee {

    //Function to insert an employee details
    public function insertEmployee($post){
        //creating an instance of db_connection 
        $db = new DB_connection();

        $empFname = $db->connect()->real_escape_string($_POST['fname']);
        $empLname = $db->connect()->real_escape_string( $_POST['lname']);
        $nationality = $db->connect()->real_escape_string( $_POST['nationality']);
        $prison = $db->connect()->real_escape_string( $_POST['prison']);
        $Dept = $db->connect()->real_escape_string($_POST['dept_name']);
        $salary = $db->connect()->real_escape_string( $_POST['salary']);
        $dob = $db->connect()->real_escape_string($_POST['dob']);
        $sex = $db->connect()->real_escape_string( $_POST['sex']);
        $marital_status = $db->connect()->real_escape_string($_POST['marital_status']);
        $edu = $db->connect()->real_escape_string($_POST['edu']);
        $ssn = $db->connect()->real_escape_string($_POST['ssn']);
        $telephone = $db->connect()->real_escape_string($_POST['telephone']);
        $email = $db->connect()->real_escape_string( $_POST['email']);
        $role = $db->connect()->real_escape_string( $_POST['role']);
        $streetAddress = $db->connect()->real_escape_string( $_POST['streetAddress']);
        $city = $db->connect()->real_escape_string( $_POST['city']);
        $state = $db->connect()->real_escape_string( $_POST['state']);
        $postcode = $db->connect()->real_escape_string($_POST['postcode']);
        $DOC = $db->connect()->real_escape_string($_POST['DOC']);
        
        // a query to insert a new employee record
        $sql = "INSERT INTO Employees(Employee_fname,Employee_lname,Prison_name, Dept_name,nationality,work_commence_date,email,emp_tel,Job, sex,Marital_Status,level_of_education,Salary,DOB,SSN,address_street,address_city,address_region,address_postal_code)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


        $stmt =  $db->connect()->prepare($sql);
        $stmt->bind_param('ssssssssssssdssssss', $empFname ,$empLname,$prison,$Dept,$nationality,$DOC,$email,$telephone,$role,$sex,$marital_status,$edu,$salary,$dob,$ssn,$streetAddress,$city,$state, $postcode);

        if($stmt->execute()){
            $response['message'] = "Success";

            header('Location: ../views/forms/employeeForm.php?message=success');

        } else {
            $response['message'] = "Failed";
        }

        //$stmt->close();
        echo json_encode($response);
        $stmt->close();

        }



        public function Display_All_Employees(){
             //creating an instance of db_connection 
            $db = new DB_connection();

            //a query to select all employees data from the DB
            $sql = "SELECT 
            Employees.Employee_ID,
            Employees.Employee_fname,
            Employees.Employee_lname,
            Employees.salary,
            Employees.SSN,
            Employees.Job,
            Employees.Prison_name
            FROM
            Employees";

             //executing the query
            $result = $db->connect()->query($sql);

            //Checking if rows have been affected 
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {

                    //Saving data in an associative array
                    $data[] = $row;
                }

                //returning the data
                return $data;

                }else{
                echo "No found records";
                }

        }



        public function DisplayEmployee($id){
             //creating an instance of db_connection 
             $db = new DB_connection();

              //query the record of an employee with this id
            $sql = "SELECT * FROM Employees WHERE Employee_ID = '$id'";

            $result =  $db->connect()->query($sql);
                                                
            $result = $db->connect()->query($sql);
        
                //checking if the query affected any row then is a success
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row;

                }else{
                    echo "Record not found";
                }
           
        }

        //A function to delete a specific visitor data from the DB
        public function DeleteEmployee($id){
            //creating an instance of db_connection 
            $db = new DB_connection();

            //a query to delete the employee record with this id
            $sql = "DELETE FROM Employees where Employee_ID='$id'";

            $result = mysqli_query($db->connect(),$sql);

            //checking if the query was successful and redirecting to the visitor page
            if($result){
                header('Location: ../views/employee.php?message=success');
            }
        }


        public function UpdateEmployee($employeeData){
             //creating an instance of db_connection 
             $db = new DB_connection();

             $id = $db->connect()->real_escape_string($_POST['employee_id']);
             $empFname = $db->connect()->real_escape_string($_POST['fname']);
             $empLname = $db->connect()->real_escape_string($_POST['lname']);
             $nationality = $db->connect()->real_escape_string($_POST['nationality']);
             $prison = $db->connect()->real_escape_string($_POST['prison']);
             $Dept = $db->connect()->real_escape_string($_POST['dept_name']);
             $salary = $db->connect()->real_escape_string($_POST['salary']);
             $dob = $db->connect()->real_escape_string($_POST['dob']);
             $sex = $db->connect()->real_escape_string($_POST['sex']);
             $marital_status = $db->connect()->real_escape_string($_POST['marital_status']);
             $edu = $db->connect()->real_escape_string($_POST['edu']);
             $ssn = $db->connect()->real_escape_string($_POST['ssn']);
             $telephone = $db->connect()->real_escape_string($_POST['telephone']);
             $email = $db->connect()->real_escape_string($_POST['email']);
             $role = $db->connect()->real_escape_string($_POST['role']);
             $streetAddress = $db->connect()->real_escape_string($_POST['streetAddress']);
             $city = $db->connect()->real_escape_string($_POST['city']);
             $state = $db->connect()->real_escape_string($_POST['state']);
             $postcode =$db->connect()->real_escape_string($_POST['postcode']);
             $DOC = $db->connect()->real_escape_string($_POST['DOC']);
         
             //executing the query to update the employee record
             $result = $db->connect()->query("UPDATE Employees SET Employee_fname='$empFname', Employee_lname='$empLname', Prison_name='$prison', Dept_name='$Dept', nationality='$nationality', work_commence_date='$DOC', email='$email', emp_tel='$telephone', Job='$role', sex='$sex', Marital_Status='$marital_status', level_of_education='$edu', Salary='$salary', DOB='$dob',SSN='$ssn',address_street='$streetAddress ',address_city='$city', address_region='$state',address_postal_code='$postcode' WHERE Employee_ID='$id'");
             
             if (isset($result)){
                 //redirecting if there is a success
                 header('location: ../views/employee.php?edit=success');
                
             }else{
                //redirect admin if update failed
                header('location: ../actions/updateEmployee.php?error=failed');
                exit();
            }
        }







}