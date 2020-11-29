<?php


require_once('config/db_conn.php');

if (isset($_GET['id'])) {
    $visitorId = $_GET['id'];

    $sql = "SELECT * FROM Visitor WHERE visitor_id='$visitorId'";

    $result = mysqli_query($conn,$sql);

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



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <title>View Details</title>
  <link rel="icon" href="images/imageedit_28_3939584200.png" type="image/png">
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
                                                    <input class="form-control py-4" name="fName" type="text" placeholder="Enter first name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup" value="<?php echo $vFname; ?>" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="LastName">Visitor Last Name</label>
                                                    <input class="form-control py-4" name="lName" type="text" placeholder="Enter last name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup" value="<?php echo $vLname; ?>" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="rel">Relation</label>
                                            <input class="form-control py-4" name="rel" type="text" placeholder="Enter relation" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid relation" value="<?php echo $rel; ?>" readonly/>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="md-form md-outline">
                                                    <label for="visitTime">Time of Visit</label>
                                                    <input type="time" name="visitTime" class="form-control" placeholder="Select time" data-parsley-required="true" value="<?php echo $visitTime; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dateofvisit">Date of Visit</label><br>
                                                <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="visitDate" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $visitDate; ?>" readonly>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                                <label for="tel">Telephone</label>
                                                <input type="tel" class="form-control" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" value="<?php echo $vContact; ?>" readonly/>
                                        </div>
                                            <div class="form-group col-md-6">
                                                    <label for="sex">Sex</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="sex"  data-parsley-trigger="keyup" required readonly>
                                                        <option selected>Choose...</option>
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
                                            <input class="form-control py-4" name="prisonerName" type="text" placeholder="Enter Prisoner name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid Prisoner name" value="<?php echo $prisonerName; ?>" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="prison">Prison</label>
                                            <select class="form-control" id="prison" name="prison" data-parsley-required="true" readonly>
                                                <option>Choose...</option>
                                                <option value="Nsawam Medium Security Prisons" <?= ($prison_name == 'Nsawam Medium Security Prisons') ? 'selected' : "" ?>> Nsawam Medium Security Prisons</option>
                                                <option value="Ankaful Prison" <?= ($prison_name == 'Ankaful Prison') ? 'selected' : "" ?>>Ankaful Prison</option>
                                                <option value="Kete Krachi Prisons" <?= ($prison_name == 'Kete Krachi Prisons') ? 'selected' : "" ?>> Kete Krachi Prisons</option>
                                                <option value="Akuse Prison" <?= ($prison_name == 'Akuse Prison') ? 'selected' : "" ?>>Akuse Prison</option>
                                                <option value="Tamale Prison" <?= ($prison_name == 'Tamale Prison') ? 'selected' : "" ?>>Tamale Prison</option>
                                                <option value="Sekondi Female Prison" <?= ($prison_name == 'Sekondi Female Prison') ? 'selected' : "" ?>>Sekondi Female Prison</option>
                                                <option value="Borstal Institute for Juveniles" <?= ($prison_name == 'Borstal Institute for Juveniles') ? 'selected' : "" ?>>Borstal Institute for Juveniles</option>
                                            </select>
                                        </div>
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
                        <div class="text-muted">Copyright &copy; Eugene Daniels 2020</div>
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
    
</body>

</html>