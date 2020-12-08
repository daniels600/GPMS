<?php

//initialize a session
session_start();

// Include config file
include "../config/db_conn.php";

class Visitor {

    //Function to insert visitors data into database 
    public function insertVisitor($post){

        //creating an instance of db_connection 
        $db = new DB_connection();

        $vFname = $db->connect()->real_escape_string( $_POST['fName']);
        $vLname = $db->connect()->real_escape_string( $_POST['lName']);
        $rel = $db->connect()->real_escape_string( $_POST['rel']);
        $vContact = $db->connect()->real_escape_string($_POST['telephone']);
        $sex = $db->connect()->real_escape_string( $_POST['sex']);
        $visitDate = $db->connect()->real_escape_string( $_POST['visitDate']);
        $visitTime = $db->connect()->real_escape_string($_POST['visitTime']);
        $prisonerName= $db->connect()->real_escape_string( $_POST['prisonerName']);
        $prisonName = $db->connect()->real_escape_string($_POST['prison']);

        $regex1= "[a-zA-Z ]";
        $regex2 = "[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]";

        if(true)
        {

            //A query to insert into the database 
            $sql = "INSERT INTO visitor( v_fname,v_lname,relationship,prisoner_name,sex,v_ph_number,time_of_visit,date_of_visit,Prison_name)
            VALUES(?,?,?,?,?,?,?,?,?)";

            //preparing the query
            $stmt = $db->connect()->prepare($sql);
            $stmt->bind_param('sssssssss',$vFname,$vLname,$rel,$prisonerName, $sex,$vContact,$visitTime,$visitDate,$prisonName);

            if($stmt->execute()){
                $response['message'] = "Success";

                //redirecting admin if there is a successful insertion in DB
                header('Location: ../views/forms/visitorForm.php?message=success');

            } else {
                //redirecting admin if there is an error
                $response['message'] = "Failed";
                header('Location: ../views/forms/visitorForm.php?error=failed');
            }

        
            $stmt->close();
            }else{
                header('Location: ../views/forms/visitorForm.php?error=failed');
            }

    }


    //Function to Display all the visitors data in the Database
    public function Display_All_Visitors(){
        //creating an instance of db_connection 
        $db = new DB_connection();

        //A query to select the all visitors data
        $sql = "SELECT 
                visitor.visitor_id,
                visitor.v_fname,
                visitor.v_lname,
                visitor.relationship,
                visitor.prisoner_name,
                visitor.time_of_visit,
                visitor.date_of_visit
                FROM
                Visitor";

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

    //Function to display the a specific visitor data from the DB
    public function DisplayVisitor($id){
        //creating an instance of db_connection 
        $db = new DB_connection();

        $sql = "SELECT * FROM Visitor WHERE visitor_id='$id'";
        
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
    public function DeleteVisitor($id){
         //creating an instance of db_connection 
         $db = new DB_connection();

        //a query to delete the visitor record with this id
        $sql = "DELETE FROM Visitor WHERE Visitor_id='$id'";

        $result = mysqli_query($db->connect(),$sql);

        //checking if the query was successful and redirecting to the visitor page
        if($result){
            header('Location: ../views/visitor.php?message=success');
        }
    }

    //Function to update a specific visitor's data
    public function UpdateVisitorData($visitorData){
        //creating an instance of db_connection 
        $db = new DB_connection();

        $id = $db->connect()->real_escape_string($_POST['visitor_id']);
        $vFname =  $db->connect()->real_escape_string($_POST['fName']);
        $vLname = $db->connect()->real_escape_string($_POST['lName']);
        $rel = $db->connect()->real_escape_string($_POST['rel']);
        $vContact =$db->connect()->real_escape_string($_POST['telephone']);
        $sex = $db->connect()->real_escape_string($_POST['sex']);
        $visitDate = $db->connect()->real_escape_string($_POST['visitDate']);
        $visitTime = $db->connect()->real_escape_string($_POST['visitTime']);
        $prisonerName= $db->connect()->real_escape_string($_POST['prisonerName']);
        $prison_name= $db->connect()->real_escape_string($_POST['prison']);
        
        //Executing the query
        $result = $db->connect()->query("UPDATE Visitor SET v_fname='$vFname', v_lname='$vLname',relationship='$rel', prisoner_name='$prisonerName', time_of_visit='$visitTime', date_of_visit='$visitDate', sex='$sex', Prison_name ='$prison_name' WHERE visitor_id='$id'");
         
        if(isset($result)){
            //redirect admin if there is a success
            header('location: ../views/visitor.php?edit=success');
        }else{
            //redirect admin if update failed
            header('location: ../actions/updateVisitor.php?error=failed');
            exit();
        }

    }

}