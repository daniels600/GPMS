<?php

require_once '../controllers/visitorController.php';

//checking for an id in the url to this page 
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //creating an instance of Visitor 
    $visitor = new Visitor();

    $visitorData = $visitor->DisplayVisitor($id);
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
  <link rel="stylesheet" href="../assets/styles.css">
  <title>View Details</title>
  <link rel="icon" href="../assets/images/imageedit_28_3939584200.png" type="image/png">
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
                                //checking for an error message
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
                                                    <input class="form-control py-2" name="fName" type="text" placeholder="Enter first name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup" value="<?php echo $visitorData['v_fname']; ?>" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="LastName">Visitor Last Name</label>
                                                    <input class="form-control py-2" name="lName" type="text" placeholder="Enter last name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup" value="<?php echo $visitorData['v_lname']; ?>" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="rel">Relation</label>
                                            <input class="form-control py-2" name="rel" type="text" placeholder="Enter relation" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid relation" value="<?php echo $visitorData['relationship']; ?>" readonly/>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="md-form md-outline">
                                                    <label for="visitTime">Time of Visit</label>
                                                    <input type="time" name="visitTime" class="form-control" placeholder="Select time" data-parsley-required="true" value="<?php echo $visitorData['time_of_visit']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dateofvisit">Date of Visit</label><br>
                                                <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="visitDate" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $visitorData['date_of_visit']; ?>" readonly>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <div class="col-md-6">
                                                <label for="tel">Telephone</label>
                                                <input type="tel" class="form-control" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" value="<?php echo $visitorData['v_ph_number']; ?>" readonly/>
                                        </div>
                                            <div class="col-md-6">
                                                    <label for="sex">Sex</label>
                                                    <input  type='text' class="form-control py-2" value="<?php echo $visitorData['sex']; ?>" readonly />
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="hidden" name="visitor_id" value="<?php echo $visitorId; ?>">
                                        </div> -->

                                        <div class="form-group">
                                            <label class="small mb-1" for="prisonername">Visited Inmate Name</label>
                                            <input class="form-control py-2" name="prisonerName" type="text" placeholder="Enter Prisoner name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid Prisoner name" value="<?php echo $visitorData['prisoner_name']; ?>" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="prison">Prison</label>
                                            <input class="form-control py-2" name="rel" type="text" placeholder="Enter relation" value="<?php echo $visitorData['Prison_name']; ?>" readonly/>
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