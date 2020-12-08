<?php 

require_once '../controllers/employeeController.php';


$employee = new Employee();

if(isset($_GET['id'])){
    $employeeId = $_GET['id'];

    $employeeData =  $employee->DisplayEmployee($employeeId);
   

}

//checking if the is a post update
if (isset($_POST['update'])) {
    $employee->UpdateEmployee($_POST);
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
    <title>GPMS</title>
    <link rel="icon" href="../assets/images/imageedit_28_3939584200.png" type="image/png">
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/parsley.css" rel="stylesheet" />
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
                                                    <input class="form-control py-4" id="FirstName" type="text" placeholder="Enter first name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup" name='fname' value="<?php echo $employeeData['Employee_fname']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="LastName">Last Name</label>
                                                    <input class="form-control py-4" id="LastName" type="text" placeholder="Enter last name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup" name="lname" value="<?php echo $employeeData['Employee_lname']; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="EmailAddress">Nationality</label>
                                            <input class="form-control py-4" id="nationality" type="text" placeholder="Enter nationality" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" name="nationality" value="<?php echo $employeeData['nationality']; ?>"/>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="prison">Prison</label>
                                                <select  class="custom-select mr-sm-2" id="prison" name="prison" data-parsley-required="true" >
                                                    <option value="">Choose...</option>
                                                    <!-- checking for the option selected -->
                                                    <option value="Nsawam Medium Security" <?= ($employeeData['Prison_name'] == 'Nsawam Medium Security')? "selected" : "" ?> > Nsawam Medium Security Prisons</option>
                                                    <option value="Ankaful" <?= ($employeeData['Prison_name'] == 'Ankaful')? "selected" : "" ?> >Ankaful Prison</option>
                                                    <option value="Kete Krachi" <?= ($employeeData['Prison_name'] == 'Kete Krachi')? "selected" : "" ?> > Kete Krachi Prisons</option>
                                                    <option value="Akuse" <?= ($employeeData['Prison_name'] == 'Akuse')? "selected" : "" ?> >Akuse Prison</option>
                                                    <option value="Tamale" <?= ($employeeData['Prison_name'] == 'Tamale')? "selected" : "" ?> >Tamale Prison</option>
                                                    <option value="Sekondi Female" <?= ($employeeData['Prison_name']== 'Sekondi Female')? "selected" : "" ?> >Sekondi Female Prison</option>
                                                    <option value="Borstal Juveniles" <?= ($employeeData['Prison_name'] == 'Borstal Juveniles')? "selected" : "" ?> >Borstal Institute for Juveniles</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="dept_name">Department name</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" id="dept_id" name='dept_name' data-parsley-trigger="keyup" required>
                                                    <option value="">Choose...</option>
                                                     <!-- checking for the option selected -->
                                                    <option value="Finance and Administration" <?= ($employeeData['Dept_name'] == 'Finance and Administration')? "selected" : "" ?>>Finance and Administration</option>
                                                    <option value="Human Resource" <?= ($employeeData['Dept_name'] == 'Human Resource')? "selected" : "" ?>>Human Resource</option>
                                                    <option value="Agricultural" <?= ($employeeData['Dept_name'] == 'Agricultural')? "selected" : "" ?>>Agricultural</option>
                                                    <option value="Welfare and Support Services" <?= ($employeeData['Dept_name'] == 'Welfare and Support Services')? "selected" : "" ?>>Welfare and Support Services</option>
                                                    <option value="Service and Technical" <?= ($employeeData['Dept_name'] == 'Service and Technical')? "selected" : "" ?>>Service and Technical</option>
                                                    <option value="Security Service" <?= ($employeeData['Dept_name'] == 'Security Service')? "selected" : "" ?>>Security Service</option>
                                                    <option value="Inmates skills and development" <?= ($employeeData['Dept_name'] == 'Inmates skills and development')? "selected" : "" ?>>Inmates skills and development</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="Salary">Salary</label>
                                                    <input class="form-control py-2" id="salary" type="number" placeholder="Enter Salary" step="0.01"  name="salary" data-parsley-required="true" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid salary" value="<?php echo $employeeData['Salary']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="edu">Level of education</label>
                                                    <select class="custom-select mr-sm-2" id="edu" name="edu" data-parsley-trigger="keyup" required>
                                                        <option value="" selected>Choose...</option>
                                                         <!-- checking for the option selected -->
                                                        <option value="Primary School" <?= ($employeeData['level_of_education'] == 'Primary School')? "selected" : "" ?>>Primary School</option>
                                                        <option value="Junior High School" <?= ($employeeData['level_of_education'] == 'Junior High School')? "selected" : "" ?>>Junior High School</option>
                                                        <option value="Senior Secondary School" <?= ($employeeData['level_of_education'] == 'Senior Secondary School')? "selected" : "" ?>>Senior Secondary School</option>
                                                        <option value="Bachelor’s Degree" <?= ($employeeData['level_of_education'] == 'Bachelor’s Degree')? "selected" : "" ?>>University Bachelor’s Degree</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="dob" id="dob" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $employeeData['DOB']; ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="sex">Sex</label>
                                                <select class="custom-select mr-sm-2" id="sex" name="sex"  data-parsley-trigger="keyup" required>
                                                    <option value="">Choose...</option>
                                                     <!-- checking for the option selected -->
                                                    <option value="Male" <?= ($employeeData['sex'] == 'Male')? "selected" : "" ?>>Male</option>
                                                    <option value="Female" <?= ($employeeData['sex'] == 'Female')? "selected" : "" ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="marital_status">Marital Status</label>
                                                <select class="custom-select mr-sm-2" name="marital_status" data-parsley-trigger="keyup" required>
                                                    <option value="">Choose...</option>
                                                     <!-- checking for the option selected -->
                                                    <option value="Single" <?= ($employeeData['Marital_Status'] == 'Single')? "selected" : "" ?>>Single</option>
                                                    <option value="Married" <?= ($employeeData['Marital_Status'] == 'Married')? "selected" : "" ?>>Married</option>
                                                </select>
                                            </div>
                                        </div>
                                
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputSSN">SSN</label>
                                                <input type="text" class="form-control" name="ssn" placeholder="Enter SSN" data-parsley-trigger="keyup" data-parsley-pattern='^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$' value="<?php echo $employeeData['SSN']; ?>" required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Telephone</label>
                                                <input type="tel" class="form-control" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" value="<?php echo $employeeData['emp_tel']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <label class="small mb-1" for="emp_email">Email</label>
                                            <input type="email" class="form-control" placeholder="Enter email" data-parsley-required="true" name="email" data-parsley-trigger="keyup" value="<?php echo $employeeData['email']; ?>">
                                            </div>
                                            <div class="col">
                                            <Role class="small mb-1" for="emp_job">Role/Job</label>
                                            <input type="text" class="form-control" placeholder="Enter Job Type" data-parsley-required="true" name="role" data-parsley-trigger="keyup" value="<?php echo $employeeData['Job']; ?>">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="streetAddress">Street Address</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Street Address" name="streetAddress" data-parsley-required="true" value="<?php echo $employeeData['address_street']; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" name="city" data-parsley-required="true" value="<?php echo $employeeData['address_city']; ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                            <label for="state">Region</label>
                                            <input type="text" class="form-control" id="validationCustom04" placeholder="State" name="state" required value="<?php echo $employeeData['address_region']; ?>">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="postcode">PostalCode</label>
                                            <input type="text" class="form-control" id="validationCustom05" placeholder="PostalCode" name="postcode" required value="<?php echo $employeeData['address_postal_code']; ?>">
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <label for="doc">Date of Commence</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="DOC" id="DOC" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $employeeData['work_commence_date'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="employee_id" value="<?php echo $employeeId; ?>">
                                        </div>
                                        <button type="submit" name="update" class="btn btn-success btn-lg btn-block">Update Record</button>
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
    <!-- checking for an edit in the url which means a success and alerting to the user -->
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