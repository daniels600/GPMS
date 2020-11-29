<?php

require_once('config/db_conn.php');


if (isset($_GET['error'])){
    $err_msg ="Oops! Something went wrong check your information again";
}

if (isset($_GET['id']) || isset($idUpdate)) {
    $prisonerId = isset($_GET['id'])? $_GET['id'] : $idUpdate;



    $sql1 = "SELECT * from prisoner where Prisoner_id = '$prisonerId'";
    $sql2 = "SELECT * from Prisoner_case where Prisoner_id = '$prisonerId'";


    $result = mysqli_query($conn, $sql1);
    $record =  mysqli_query($conn, $sql2);

    if (isset($result)) {
        $n = mysqli_fetch_assoc($result);
        $fname = isset($n['Prisoner_fname'])?$n['Prisoner_fname'] : "";
        $lname = isset($n['Prisoner_lname'])?$n['Prisoner_lname'] : "";
        $prison_name = isset($n['Prison_name'])?$n['Prison_name']:"";
        $pComplexion = isset($n['P_complexion'])?$n['P_complexion'] :"";
        $dob = isset($n['DOB'])?$n['DOB']:"";
        $Marital_Status = isset($n['Marital_Status'])?$n['Marital_Status']:"";
        $Height_feets = isset($n['Height_feets'])?$n['Height_feets']:"";
        $Weight_kg = isset($n['Weight_kg'])?$n['Weight_kg']:"";
        $Sex = isset($n['Sex'])?$n['Sex']:"";
        $cell_block = isset($n['cell_block'])?$n['cell_block']:"";
        $Nationality = isset($n['Nationality'])?$n['Nationality']:"";
        $Prisoner_tel = isset($n['Prisoner_tel'])?$n['Prisoner_tel']:"";
        $Next_of_Kin_fname = isset($n['Next_of_Kin_fname'])?$n['Next_of_Kin_fname']:"";
        $Next_of_Kin_lname = isset($n['Next_of_Kin_lname'])?$n['Next_of_Kin_lname']:"";
        $Next_of_Kin_Rel = isset($n['Next_of_Kin_Rel'])?$n['Next_of_Kin_Rel']:"";
        $Eye_color = isset($n['Eye_color'])?$n['Eye_color']:"";
        $Prisoner_status = isset($n['Prisoner_status'])?$n['Prisoner_status']:"";
        $address_street = isset($n['address_street'])?$n['address_street']:"";
        $address_city = isset($n['address_city'])?$n['address_city']:"";
        $address_region = isset($n['address_region'])?$n['address_region']:"";
        $address_postal_code = isset($n['address_postal_code'])?$n['address_postal_code']:"";
        $image = $n['image'];
        $imageSrc = '.'  . '/' . $image;
    }
}
if (isset($record)) {
    $row = mysqli_fetch_assoc($record);
    $Latest_Possible_Date = $row['Latest_Possible_Date'];
}


if (isset($_POST['update'])) {
    $idUpdate = mysqli_real_escape_string($conn,$_POST['prisoner_id']);
    $fname = mysqli_real_escape_string($conn,$_POST['pFname']);
    $lname = mysqli_real_escape_string($conn,$_POST['pLname']);
    $prison_name = mysqli_real_escape_string($conn,$_POST['prison']);
    $pComplexion = mysqli_real_escape_string($conn,$_POST['complexion']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $Marital_Status = mysqli_real_escape_string($conn,$_POST['marital_status']);
    $Height_feets = mysqli_real_escape_string($conn,$_POST['height']);
    $Weight_kg = mysqli_real_escape_string($conn,$_POST['weight']);
    $Sex = mysqli_real_escape_string($conn,$_POST['gender']);
    $cell_block = mysqli_real_escape_string($conn,$_POST['cellBlock']);
    $Nationality = mysqli_real_escape_string($conn,$_POST['nationality']);
    $Prisoner_tel = mysqli_real_escape_string($conn,$_POST['telephone']);
    $Next_of_Kin_fname = mysqli_real_escape_string($conn,$_POST['nextKinF']);
    $Next_of_Kin_lname = mysqli_real_escape_string($conn,$_POST['nextKinL']);
    $Next_of_Kin_Rel = mysqli_real_escape_string($conn,$_POST['kinRelation']);
    $Eye_color = mysqli_real_escape_string($conn,$_POST['eyeColor']);
    $Prisoner_status = mysqli_real_escape_string($conn,$_POST['inmateStatus']);
    $address_street = mysqli_real_escape_string($conn,$_POST['streetAddr']);
    $address_city = mysqli_real_escape_string($conn,$_POST['city']);
    $address_region = mysqli_real_escape_string($conn,$_POST['state']);
    $address_postal_code = mysqli_real_escape_string($conn,$_POST['PostalCode']);
    // $image = $n['image'];



    $updatePrisoner = mysqli_query($conn, "UPDATE prisoner SET Prisoner_fname='$fname', Prisoner_lname=' $lname', Prison_name ='$prison_name', P_complexion='$pComplexion', dob='$dob',marital_status='$Marital_Status',Height_feets='$Height_feets', Weight_kg='$Weight_kg',Sex='$Sex',cell_block='$cell_block',nationality='$Nationality',Prisoner_tel='$Prisoner_tel', Next_of_Kin_fname='$Next_of_Kin_fname',Next_of_Kin_lname= '$Next_of_Kin_lname',Next_of_Kin_Rel='$Next_of_Kin_Rel', Eye_color ='$Eye_color', Prisoner_status = '$Prisoner_status',address_street='$address_street',address_city='$address_city',address_region='$address_region',address_postal_code='$address_postal_code' WHERE Prisoner_id=$idUpdate");

    if($updatePrisoner){
        header('location: prisoner.php?edit=success');
    }else{
        header('location: updatePrisoner.php?error=failed');
        
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
    <title>Update Prisoner Info</title>
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
                                    <h3 class="text-center font-weight-light my-4">Inmate Information</h3>
                                </div>
                                <div class="card-body">
                                <?php
                                if (isset($err_msg)) {
                                    echo '<div class="alert alert-danger">' .
                                    $err_msg
                                    . '</div>';
                                }

                                ?>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST' id='Prisoner_info' enctype="multipart/form-data" data-parsley-validate>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="FirstName">First Name</label>
                                                    <input class="form-control py-4" id="FirstName" type="text" placeholder="Enter first name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup" name='pFname' value="<?php echo $fname; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="LastName">Last Name</label>
                                                    <input class="form-control py-4" id="LastName" type="text" placeholder="Enter last name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup" name='pLname' value="<?php echo $lname; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="nationality">Nationality</label>
                                            <input class="form-control py-4" id="nationality" type="text" placeholder="Enter nationality" data-parsley-required="true" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$" name='nationality' value="<?php echo $Nationality; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="prison">Prison</label>
                                            <select class="form-control" id="prison" name="prison" data-parsley-required="true">
                                                <option value="">Choose...</option>
                                                <option value="Nsawam Medium Security" <?= ($prison_name == 'Nsawam Medium Security') ? 'selected' : "" ?>> Nsawam Medium Security Prisons</option>
                                                <option value="Ankaful" <?= ($prison_name == 'Ankaful') ? 'selected' : "" ?>>Ankaful Prison</option>
                                                <option value="Kete Krachi" <?= ($prison_name == 'Kete Krachi') ? 'selected' : "" ?>> Kete Krachi Prisons</option>
                                                <option value="Akuse" <?= ($prison_name == 'Akuse') ? 'selected' : "" ?>>Akuse Prison</option>
                                                <option value="Tamale" <?= ($prison_name == 'Tamale') ? 'selected' : "" ?>>Tamale Prison</option>
                                                <option value="Sekondi Female" <?= ($prison_name == 'Sekondi Female') ? 'selected' : "" ?>>Sekondi Female Prison</option>
                                                <option value="Borstal Juveniles" <?= ($prison_name == 'Borstal Juveniles') ? 'selected' : "" ?>>Borstal Institute for Juveniles</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="height">Height</label>
                                                    <input class="form-control py-4" id="height" type="number" placeholder="Enter Height" step="0.01" min="0" data-parsley-required="true" data-parsley-type="number" data-parsley-trigger="keyup" name='height' value="<?php echo $Height_feets; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="weight">Weight </label>
                                                    <input class="form-control py-4" id="weight" type="number" placeholder="Enter Weight" step="0.01" min="0" data-parsley-required="true" data-parsley-type="number" data-parsley-trigger="keyup" name='weight' value="<?php echo $Weight_kg; ?>" />
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
                                                <select class="custom-select mr-sm-2" id="sex" data-parsley-trigger="keyup" name='gender' required>
                                                    <option value="">Choose...</option>
                                                    <option value="Male" <?= ($Sex == 'Male') ? 'selected' : "" ?>>Male</option>
                                                    <option value="Female" <?= ($Sex == 'Female') ? 'selected' : "" ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="marital_status">Marital Status</label>
                                                <select class="custom-select mr-sm-2" id="marital_status" data-parsley-trigger="keyup" name='marital_status'>
                                                    <option value="">Choose...</option>
                                                    <option value="Single" <?= ($Marital_Status == "Single") ? 'selected' : "" ?>>Single</option>
                                                    <option value="Married" <?= ($Marital_Status == "Married") ? "selected" : "" ?>>Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inmateStatus">Inmate Status</label>
                                                    <select class="custom-select mr-sm-2" id="inmateStatus" data-parsley-trigger="keyup" name="inmateStatus" required>
                                                        <option value="">Choose...</option>
                                                        <option value="Convict" <?= ($Prisoner_status == "Convict") ? "selected" : "" ?>>Convict</option>
                                                        <option value="Remand" <?= ($Prisoner_status == "Remand") ? "selected" : "" ?>> Remand</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="eyeColor">Eye Color </label>
                                                    <input class="form-control py-4" id="eye-color" type="text" placeholder="Enter Eye Color" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]*$" data-parsley-trigger="keyup" name="eyeColor" value="<?php echo $Eye_color; ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Complexion">Complexion</label>
                                                <select class="custom-select mr-sm-2" id="complexion" name="complexion" data-parsley-trigger="keyup" required value="<?php echo $pComplexion; ?>">
                                                    <option value="">Choose...</option>
                                                    <option value="Fair" <?= ($pComplexion == 'Fair') ? "selected" : "" ?>>Fair</option>
                                                    <option value="Dark" <?= ($pComplexion == 'Dark') ? "selected" : "" ?>>Dark</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Telephone</label>
                                                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" value="<?php echo $Prisoner_tel; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 mb-3">
                                                <label for="cellBlock">Cell Block</label>
                                                <input type="text" class="form-control" id="cellBlock" placeholder="Enter Block " name="cellBlock" data-parsley-required="true" value="<?php echo $cell_block; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="nationality">Latest Possible Date</label>
                                            <input class="form-control py-4" id="release_date" type="date" placeholder="yyyy-mm-dd" class="form-control" name="release_date" data-parsley-required="true" data-parsley-trigger="keyup" value="<?php echo $Latest_Possible_Date; ?>" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="streetAddr">Street Address</label>
                                                <input type="text" class="form-control" id="streetAddr" placeholder="Street Address" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z0-9.,\- ]*$" name="streetAddr" value="<?php echo $address_street; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="City" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z0-9.,- ]*$" value="<?php echo $address_city; ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="region">Region</label>
                                                <input type="text" class="form-control" id="region" placeholder="region" name="state" data-parsley-pattern="^[a-zA-Z ]*$" required value="<?php echo $address_region; ?>">

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="PostalCode">PostalCode</label>
                                                <input type="text" class="form-control" id="PostalCode" placeholder="PostalCode" data-parsley-pattern="^[a-zA-Z0-9., \/ ]*$" name="PostalCode" required value="<?php echo $address_postal_code; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label class="small mb-1" for="nextKin">Next of Kin</label>
                                                <input type="text" class="form-control" placeholder="Next of Kin First name" name="nextKinF" data-parsley-pattern="^[a-zA-Z]*$" data-parsley-required="true" value="<?php echo $Next_of_Kin_fname; ?>">
                                            </div>
                                            <div class="col">
                                                <label class="small mb-1" for="nextKin">Next of Kin</label>
                                                <input type="text" class="form-control" placeholder="Next of Kin Last name" name="nextKinL" data-parsley-pattern="^[a-zA-Z]*$" data-parsley-required="true" value="<?php echo $Next_of_Kin_lname; ?>">
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label class="small mb-1" for="kinRelation">Next of Kin Relationship</label>
                                            <input class="form-control py-4" name="kinRelation" type="text" placeholder="Enter Relation" data-parsley-pattern="^[a-zA-Z]*$" data-parsley-required="true" value="<?php echo $Next_of_Kin_Rel; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="prisoner_id" value="<?php echo $prisonerId; ?>">
                                        </div>
                                        <!--     
                                        <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="login.html">Save Info</a></div> -->
                                        <label>Inmate Image</label>
                                        <?php if (isset($_GET['error'])) {
                                            if ($_GET['error'] == 'wrongImage') {
                                                echo "Upload a *jpeg  *gif *png *jpg";
                                            }
                                        } ?>
                                        <br />

                                        <div class="profile-img">
                                            <img src="<?php echo $imageSrc; ?>" />
                                        </div>
                                        <button type="submit" name="update" class="btn btn-success btn-lg btn-block" required>Update Record</button>

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

    <?php if (isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['edit'])) : ?>
        <div class='flash-edit' data-flashedit="<? $_GET['edit'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        const flashdata = $('.flash-data').data('flashdata');

        if (flashdata) {
            Swal.fire({
                icon: 'success',
                title: 'Record updated successfully',
                text: 'Prisoner updated!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                footer: '<a href=prisoner.php>Click here!</a>',
                type: "success"
            }).then(function() {
                window.location.href = 'prisoner.php';
            });
        }


        const flashedit = $('.flash-edit').data('flashedit');

        if (flashedit) {
            Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Record updated',
                text: 'Prisoner record updated!',

            }).then(function() {
                window.location.href = 'prisoner.php';
            });
        }

    </script>
</body>

</html>