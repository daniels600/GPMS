<?php 

require_once('config/db_conn.php');

if(isset($_GET['id'])){
    $employeeId = $_GET['id'];



    $sql = "SELECT * FROM Employees WHERE Employee_ID = '$employeeId'";

    $result = mysqli_query($conn, $sql);
                                        

    if (isset($result)) {
        $n = mysqli_fetch_assoc($result);
        $empFname = $n['Employee_fname'];
        $empLname = $n['Employee_lname'];
        $nationality = $n['nationality'];
        $prison = $n['Prison_name'];
        $salary = $n['Salary'];
        $Dept = $n['Dept_name'];
        $dob = $n['DOB'];
        $sex = $n['sex'];
        $marital_status = $n['Marital_Status'];
        $edu = $n['level_of_education'];
        $ssn = $n['SSN'];
        $telephone = $n['emp_tel'];
        $email = $n['email'];
        $role = $n['Job'];
        $streetAddress = $n['address_street'];
        $city = $n['address_city'];
        $state = $n['address_region'];
        $postcode = $n['address_postal_code'];
        $DOC = $n['work_commence_date'];

    }




}

if (isset($_POST['update'])) {
    $id = $_POST['employee_id'];

    $empFname = $_POST['fname'];
    $empLname = $_POST['lname'];
    $nationality = $_POST['nationality'];
    $prison = $_POST['prison'];
    $Dept = $_POST['dept_name'];
    $salary = $_POST['salary'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $marital_status = $_POST['marital_status'];
    $edu = $_POST['edu'];
    $ssn = $_POST['ssn'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $streetAddress = $_POST['streetAddress'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode =$_POST['postcode'];
    $DOC = $_POST['DOC'];

    if (mysqli_query($conn, "UPDATE Employees SET Employee_fname='$empFname', Employee_lname='$empLname', Prison_name='$prison', Dept_name='$Dept', nationality='$nationality', work_commence_date='$DOC', email='$email', emp_tel='$telephone', Job='$role', sex='$sex', Marital_Status='$marital_status', level_of_education='$edu', Salary='$salary', DOB='$dob',SSN='$ssn',address_street='$streetAddress ',address_city='$city', address_region='$state',address_postal_code='$postcode' WHERE Employee_ID='$id'")){


        header('location: employee.php?edit=success');
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
    <link href="css/parsley.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id='Employee_info' data-parsley-validate>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="FirstName">First Name</label>
                                                    <input class="form-control py-4" id="FirstName" type="text" placeholder="Enter first name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup" name='fname' value="<?php echo $empFname; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="LastName">Last Name</label>
                                                    <input class="form-control py-4" id="LastName" type="text" placeholder="Enter last name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup" name="lname" value="<?php echo $empLname; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="EmailAddress">Nationality</label>
                                            <input class="form-control py-4" id="nationality" type="text" placeholder="Enter nationality" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" name="nationality" value="<?php echo $nationality; ?>"/>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="prison">Prison</label>
                                                <select  class="custom-select mr-sm-2" id="prison" name="prison" data-parsley-required="true" >
                                                    <option>Choose...</option>
                                                    <option value="Nsawam Medium Security Prisons" <?= ($prison == 'Nsawam Medium Security Prisons')? "selected" : "" ?> > Nsawam Medium Security Prisons</option>
                                                    <option value="Ankaful Prison" <?= ($prison == 'Ankaful Prison')? "selected" : "" ?> >Ankaful Prison</option>
                                                    <option value="Kete Krachi Prisons" <?= ($prison == 'Kete Krachi Prisons')? "selected" : "" ?> > Kete Krachi Prisons</option>
                                                    <option value="Akuse Prison" <?= ($prison == 'Akuse Prison')? "selected" : "" ?> >Akuse Prison</option>
                                                    <option value="Tamale Prison" <?= ($prison == 'Tamale Prison')? "selected" : "" ?> >Tamale Prison</option>
                                                    <option value="Sekondi Female Prison" <?= ($prison == 'Sekondi Female Prison')? "selected" : "" ?> >Sekondi Female Prison</option>
                                                    <option value="Borstal Institute for Juveniles" <?= ($prison == 'Borstal Institute for Juveniles')? "selected" : "" ?> >Borstal Institute for Juveniles</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="dept_name">Department name</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" id="dept_id" name='dept_name' data-parsley-trigger="keyup" required>
                                                    <option selected>Choose...</option>
                                                    <option value="Finance and Administration" <?= ($Dept == 'Finance and Administration')? "selected" : "" ?>>Finance and Administration</option>
                                                    <option value="Human Resource" <?= ($Dept == 'Human Resource')? "selected" : "" ?>>Human Resource</option>
                                                    <option value="Agricultural" <?= ($Dept == 'Agricultural')? "selected" : "" ?>>Agricultural</option>
                                                    <option value="Welfare and Support Services" <?= ($Dept == 'Welfare and Support Services')? "selected" : "" ?>>Welfare and Support Services</option>
                                                    <option value="Service and Technical" <?= ($Dept == 'Service and Technical')? "selected" : "" ?>>Service and Technical</option>
                                                    <option value="Security Service" <?= ($Dept == 'Security Service')? "selected" : "" ?>>Security Service</option>
                                                    <option value="Inmates skills and development" <?= ($Dept == 'Inmates skills and development')? "selected" : "" ?>>Inmates skills and development</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="Salary">Salary</label>
                                                    <input class="form-control py-4" id="salary" type="number" placeholder="Enter Salary" step="0.01"  name="salary" data-parsley-required="true" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid salary" value="<?php echo $salary; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="edu">Level of education</label>
                                                    <select class="custom-select mr-sm-2" id="edu" name="edu" data-parsley-trigger="keyup" required>
                                                        <option selected>Choose...</option>
                                                        <option value="Primary School" <?= ($edu == 'Primary School')? "selected" : "" ?>>Primary School</option>
                                                        <option value="Junior High School" <?= ($edu == 'Junior High School')? "selected" : "" ?>>Junior High School</option>
                                                        <option value="Senior Secondary School" <?= ($edu == 'Senior Secondary School')? "selected" : "" ?>>Senior Secondary School</option>
                                                        <option value="Bachelor’s Degree" <?= ($edu == 'Bachelor’s Degree')? "selected" : "" ?>>University Bachelor’s Degree</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="dob" id="dob" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $dob; ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="sex">Sex</label>
                                                <select class="custom-select mr-sm-2" id="sex" name="sex"  data-parsley-trigger="keyup" required>
                                                    <option selected>Choose...</option>
                                                    <option value="M" <?= ($sex == 'M')? "selected" : "" ?>>Male</option>
                                                    <option value="F" <?= ($sex == 'F')? "selected" : "" ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="marital_status">Marital Status</label>
                                                <select class="custom-select mr-sm-2" name="marital_status" data-parsley-trigger="keyup" required>
                                                    <option selected>Choose...</option>
                                                    <option value="Single" <?= ($marital_status == 'Single')? "selected" : "" ?>>Single</option>
                                                    <option value="Married" <?= ($marital_status == 'Married')? "selected" : "" ?>>Married</option>
                                                </select>
                                            </div>
                                        </div>
                                
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputSSN">SSN</label>
                                                <input type="text" class="form-control" name="ssn" placeholder="Enter SSN" data-parsley-trigger="keyup" data-parsley-pattern='^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$' value="<?php echo $ssn; ?>"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Telephone</label>
                                                <input type="tel" class="form-control" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" value="<?php echo $telephone; ?>"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <label class="small mb-1" for="emp_email">Email</label>
                                            <input type="email" class="form-control" placeholder="Enter email" data-parsley-required="true" name="email" data-parsley-trigger="keyup" value="<?php echo $email; ?>">
                                            </div>
                                            <div class="col">
                                            <Role class="small mb-1" for="emp_job">Role/Job</label>
                                            <input type="text" class="form-control" placeholder="Enter Job Type" data-parsley-required="true" name="role" data-parsley-trigger="keyup" value="<?php echo $role; ?>">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="streetAddress">Street Address</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Street Address" name="streetAddress" data-parsley-required="true" value="<?php echo $streetAddress; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" name="city" data-parsley-required="true" value="<?php echo $city; ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="validationCustom04" placeholder="State" name="state" required value="<?php echo $state; ?>">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="postcode">PostalCode</label>
                                            <input type="text" class="form-control" id="validationCustom05" placeholder="PostalCode" name="postcode" required value="<?php echo $postcode; ?>">
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <label for="doc">Date of Commence</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="DOC" id="DOC" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $DOC; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="employee_id" value="<?php echo $employeeId; ?>">
                                        </div>
                                        <button type="submit" name="update" class="btn btn-success btn-lg btn-block">Update Info</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.html">Have an account? Go to login</a></div>
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
    <?php if(isset($_GET['edit'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['edit'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
    const flashdata = $('.flash-data').data('flashdata');

        if(flashdata) {
            Swal.fire({
                icon: 'success',
                title: 'Congratulation',
                text: 'Employee record updated!',
                footer: '<a href=employee.php>Click here!</a>',  
                type: "success" 
            }).then(function () {
                window.location.href = 'employee.php';
            });
        }

    </script>
    
</body>

</html>