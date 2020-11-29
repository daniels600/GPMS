<?php 

require_once('config/db_conn.php');

if (isset($_GET['error'])){
    $err_msg ="Oops! Something went wrong check your information again";
}


if(isset($_GET['id'])){
    $visitorId = $_GET['id'];



    $sql = "SELECT * FROM Visitor WHERE visitor_id = '$visitorId'";
    
    $result = mysqli_query($conn, $sql);

    if(isset($result)){
        $n = mysqli_fetch_assoc($result);
        $vFname = $n['v_fname'];
        $vLname = $n['v_lname'];
        $rel = $n['relationship'];
        $vContact = $n['v_ph_number'];
        $sex = $n['sex'];
        $visitDate = $n['date_of_visit'];
        $visitTime = $n['time_of_visit'];
        $prisonerName= $n['prisoner_name'];
        $prison_name= $n['Prison_name'];
    }

}

if (isset($_POST['update'])) { 
    $id = mysqli_real_escape_string($conn,$_POST['visitor_id']);
    $vFname =  mysqli_real_escape_string($conn,$_POST['fName']);
    $vLname = mysqli_real_escape_string($conn,$_POST['lName']);
    $rel = mysqli_real_escape_string($conn,$_POST['rel']);
    $vContact = mysqli_real_escape_string($conn,$_POST['telephone']);
    $sex = mysqli_real_escape_string($conn,$_POST['sex']);
    $visitDate = mysqli_real_escape_string($conn,$_POST['visitDate']);
    $visitTime = mysqli_real_escape_string($conn,$_POST['visitTime']);
    $prisonerName= mysqli_real_escape_string($conn,$_POST['prisonerName']);
    $prison_name= mysqli_real_escape_string($conn,$_POST['prison']);

    $result = mysqli_query($conn, "UPDATE Visitor SET v_fname='$vFname', v_lname='$vLname',relationship='$rel', prisoner_name='$prisonerName', time_of_visit='$visitTime', date_of_visit='$visitDate', sex='$sex', Prison_name ='$prison_name' WHERE visitor_id='$id'");
     
    if(isset($result)){
        header('location: visitor.php?edit=success');
    }else{
        header('location: updateVisitor.php?error=failed');
        exit();
    }
   

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link rel="icon" href="images/imageedit_28_3939584200.png" type="image/png">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="css/parsley.css" rel="stylesheet" />
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Visitor Details</h3>
                                </div>
                                <div class="card-body">
                                <?php
                                if (isset($err_msg)) {
                                    echo '<div class="alert alert-danger">' .
                                    $err_msg
                                    . '</div>';
                                }

                                ?>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id='visitor_info' data-parsley-validate>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="FirstName">Visitor First Name</label>
                                                    <input class="form-control py-4" name="fName" type="text" placeholder="Enter first name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup" value="<?php echo $vFname; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="LastName">Visitor Last Name</label>
                                                    <input class="form-control py-4" name="lName" type="text" placeholder="Enter last name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup" value="<?php echo $vLname; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="rel">Relation</label>
                                            <input class="form-control py-4" name="rel" type="text" placeholder="Enter relation" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid relation" value="<?php echo $rel; ?>"/>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="md-form md-outline">
                                                    <label for="visitTime">Time of Visit</label>
                                                    <input type="time" name="visitTime" class="form-control" placeholder="Select time" data-parsley-required="true" value="<?php echo $visitTime; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dateofvisit">Date of Visit</label><br>
                                                <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="visitDate" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $visitDate; ?>">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                                <label for="tel">Telephone</label>
                                                <input type="tel" class="form-control" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" value="<?php echo $vContact; ?>"/>
                                        </div>
                                            <div class="form-group col-md-6">
                                                    <label for="sex">Sex</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="sex"  data-parsley-trigger="keyup" required>
                                                        <option value="">Choose...</option>
                                                        <option value="M" <?= ($sex == 'M')? "selected" : "" ?>>Male</option>
                                                        <option value="F" <?= ($sex == 'F')? "selected" : "" ?>>Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="visitor_id" value="<?php echo $visitorId; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="prisonername">Visited Inmate Name</label>
                                            <input class="form-control py-4" name="prisonerName" type="text" placeholder="Enter Prisoner name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid Prisoner name" value="<?php echo $prisonerName; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="prison">Prison</label>
                                            <select class="form-control" id="prison" name="prison" data-parsley-required="true">
                                                <option value="">Choose...</option>
                                                <option value="Nsawam Medium Security Prisons" <?= ($prison_name == 'Nsawam Medium Security Prisons') ? 'selected' : "" ?>> Nsawam Medium Security Prisons</option>
                                                <option value="Ankaful Prison" <?= ($prison_name == 'Ankaful Prison') ? 'selected' : "" ?>>Ankaful Prison</option>
                                                <option value="Kete Krachi Prisons" <?= ($prison_name == 'Kete Krachi Prisons') ? 'selected' : "" ?>> Kete Krachi Prisons</option>
                                                <option value="Akuse Prison" <?= ($prison_name == 'Akuse Prison') ? 'selected' : "" ?>>Akuse Prison</option>
                                                <option value="Tamale Prison" <?= ($prison_name == 'Tamale Prison') ? 'selected' : "" ?>>Tamale Prison</option>
                                                <option value="Sekondi Female Prison" <?= ($prison_name == 'Sekondi Female Prison') ? 'selected' : "" ?>>Sekondi Female Prison</option>
                                                <option value="Borstal Institute for Juveniles" <?= ($prison_name == 'Borstal Institute for Juveniles') ? 'selected' : "" ?>>Borstal Institute for Juveniles</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary btn-lg btn-block">Update Record</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php if(isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
    

    </script>
</body>

</html>