<?php 

require_once '../controllers/employeeController.php';

//checking for an id in the url to this page 
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //creating an instance of Employee 
    $visitor = new Employee();

    //storing the return associative array in a variable
    $employeeData = $visitor->DisplayEmployee($id);
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
    <title>Employee Form</title>
    <link rel="icon" href="../assets/images/imageedit_28_3939584200.png" type="image/png">
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/parsley.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

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
                                    <h3 class="text-center font-weight-light my-4">Employee's Information</h3>
                                </div>
                                <div class="card-body">
                                     <!-- Using parsley js to validate the form inputs -->
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id='Employee_info' data-parsley-validate>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="FirstName">First Name</label>
                                                    <input class="form-control py-4" id="FirstName" type="text" placeholder="Enter first name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup" name='fname' value="<?php echo  $employeeData['Employee_fname']; ?>" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="LastName">Last Name</label>
                                                    <input class="form-control py-4" id="LastName" type="text" placeholder="Enter last name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup" name="lname" value="<?php echo $employeeData['Employee_lname']; ?>" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="EmailAddress">Nationality</label>
                                            <input class="form-control py-4" id="nationality" type="text" placeholder="Enter nationality" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" name="nationality" value="<?php echo $employeeData['nationality']; ?>" readonly/>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="prison">Prison</label>
                                                <input type='text' class="form-control py-2" value="<?php echo $employeeData['Prison_name']; ?>" required readonly/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="dept_name">Department name</label>
                                                <input type='text' class="form-control py-2" value="<?php echo $employeeData['Dept_name']; ?>" required readonly/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="Salary">Salary</label>
                                                    <input class="form-control py-2" id="salary" type="number" placeholder="Enter Salary" step="0.01"  name="salary" data-parsley-required="true" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid salary" value="<?php echo $employeeData['Salary']; ?>" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="edu">Level of education</label>
                                                    <input type='text' class="form-control py-2" value="<?php echo $employeeData['level_of_education']; ?>" required readonly/>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="dob" id="dob" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $employeeData['DOB']; ?>" readonly>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="sex">Sex</label>
                                                <input type='text' class="form-control py-2" value="<?php echo $employeeData['sex']; ?>" required readonly/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="marital_status">Marital Status</label>
                                                <input type='text' class="form-control py-2" value="<?php echo $employeeData['Marital_Status']; ?>" required readonly/>
                                            </div>
                                        </div>
                                
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputSSN">SSN</label>
                                                <input type="text" class="form-control" name="ssn" placeholder="Enter SSN" data-parsley-trigger="keyup" data-parsley-pattern='^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$' value="<?php echo $employeeData['SSN']; ?>" readonly/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Telephone</label>
                                                <input type="tel" class="form-control" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" value="<?php echo $employeeData['emp_tel']; ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <label class="small mb-1" for="emp_email">Email</label>
                                            <input type="email" class="form-control" placeholder="Enter email" data-parsley-required="true" name="email" data-parsley-trigger="keyup" value="<?php echo $employeeData['email']; ?>" readonly>
                                            </div>
                                            <div class="col">
                                            <Role class="small mb-1" for="emp_job">Role/Job</label>
                                            <input type="text" class="form-control" placeholder="Enter Job Type" data-parsley-required="true" name="role" data-parsley-trigger="keyup" value="<?php echo $employeeData['Job']; ?>" readonly>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="streetAddress">Street Address</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Street Address" name="streetAddress" data-parsley-required="true" value="<?php echo $employeeData['address_street']; ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" name="city" data-parsley-required="true" value="<?php echo $employeeData['address_city']; ?>" readonly>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                            <label for="state">Region</label>
                                            <input type="text" class="form-control" id="validationCustom04" placeholder="State" name="state" required value="<?php echo $employeeData['address_region']; ?>" readonly>
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="postcode">PostalCode</label>
                                            <input type="text" class="form-control" id="validationCustom05" placeholder="PostalCode" name="postcode" required value="<?php echo $employeeData['address_postal_code']; ?>" readonly>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <label for="doc">Date of Commence</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="DOC" id="DOC" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $employeeData['work_commence_date']; ?>" readonly>
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="hidden" name="employee_id" value="<?php echo $employeeId; ?>">
                                        </div> -->
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