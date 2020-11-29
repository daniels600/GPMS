<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Prisoner Form</title>
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
                                    <form action='insertPrisoner.php' method='POST' id='Prisoner_info' enctype="multipart/form-data" data-parsley-validate>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="FirstName">First Name</label>
                                                    <input class="form-control py-4" id="FirstName" type="text" placeholder="Enter first name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-error-message="Please enter a valid First name" data-parsley-trigger="keyup" name='pFname' />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="LastName">Last Name</label>
                                                    <input class="form-control py-4" id="LastName" type="text" placeholder="Enter last name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-error-message="Please enter a valid Last name" data-parsley-trigger="keyup" name='pLname' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="nationality">Nationality</label>
                                            <input class="form-control py-4" id="nationality" type="text" placeholder="Enter nationality" data-parsley-required="true"  data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"name='nationality' />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="prison">Prison</label>
                                            <select class="form-control" id="prison" name="prison" data-parsley-required="true" >
                                                <option>Choose...</option>
                                                <option value="Nsawam Medium Security"> Nsawam Medium Security</option>
                                                <option value="Ankaful">Ankaful</option>
                                                <option value="Kete Krachi"> Kete Krachi</option>
                                                <option value='Akuse'>Akuse</option>
                                                <option value="Tamale">Tamale</option>
                                                <option value='Sekondi Female Prison'>Sekondi Female Prison</option>
                                                <option value="Borstal Juveniles">Borstal Juveniles</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="height">Height</label>
                                                    <input class="form-control py-4" id="height" type="number" placeholder="Enter Height" step="0.01" min="0" data-parsley-required="true" data-parsley-type="number" data-parsley-trigger="keyup" name='height' />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="weight">Weight </label>
                                                    <input class="form-control py-4" id="weight" type="number" placeholder="Enter Weight" step="0.01" min="0" data-parsley-required="true" data-parsley-type="number" data-parsley-trigger="keyup" name='weight' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="dob" id="dob" data-parsley-required="true" data-parsley-trigger="keyup">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="sex">Sex</label>
                                                <select class="custom-select mr-sm-2" id="sex" data-parsley-trigger="keyup" name='gender' required>
                                                    <option selected>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="marital_status">Marital Status</label>
                                                <select class="custom-select mr-sm-2" id="marital_status" data-parsley-trigger="keyup" name='marital_status' required>
                                                    <option selected>Choose...</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inmateStatus">Inmate Status</label>
                                                    <select class="custom-select mr-sm-2" id="inmateStatus" data-parsley-trigger="keyup" name="inmateStatus" required>
                                                        <option selected>Choose...</option>
                                                        <option value="Remand">Remand</option>
                                                        <option value="Convict">Convict</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="eyeColor">Eye Color </label>
                                                    <input class="form-control py-4" id="eye-color" type="text" placeholder="Enter Eye Color" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]*$" data-parsley-trigger="keyup" name="eyeColor" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Complexion">Complexion</label>
                                                <select class="custom-select mr-sm-2" id="complexion" name="complexion" data-parsley-trigger="keyup" required>
                                                    <option selected>Choose...</option>
                                                    <option value="Fair">Fair</option>
                                                    <option value="Dark">Dark</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telephone">Telephone</label>
                                                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 mb-3">
                                                <label for="cellBlock">Cell Block</label>
                                                <input type="text" class="form-control py-4" id="cellBlock" placeholder="Enter Block " name="cellBlock" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="nationality">Latest Possible Date</label>
                                            <input class="form-control py-4" id="release_date" type="date" placeholder="yyyy-mm-dd" class="form-control" name="release_date" data-parsley-required="true" data-parsley-trigger="keyup" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="streetAddr">Street Address</label>
                                                <input type="text" class="form-control" id="streetAddr" placeholder="Street Address" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z0-9.,\- ]*$" name="streetAddr">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="City" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z0-9.,- ]*$">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="state">Region</label>
                                                <input type="text" class="form-control" id="state" placeholder="State" name="state" data-parsley-pattern="^[a-zA-Z ]*$" required>

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="PostalCode">PostalCode</label>
                                                <input type="text" class="form-control" id="PostalCode" placeholder="PostalCode" data-parsley-pattern="^[a-zA-Z0-9., \/ ]*$" name="PostalCode" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label class="small mb-1" for="nextKin">Next of Kin</label>
                                                <input type="text" class="form-control" placeholder="Next of Kin First name" name="nextKinF" data-parsley-pattern="^[a-zA-Z]*$" data-parsley-required="true">
                                            </div>
                                            <div class="col">
                                                <label class="small mb-1" for="nextKin">Next of Kin</label>
                                                <input type="text" class="form-control" placeholder="Next of Kin Last name" name="nextKinL" data-parsley-pattern="^[a-zA-Z]*$" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label class="small mb-1" for="kinRelation">Next of Kin Relationship</label>
                                            <input class="form-control py-4" name="kinRelation" type="text" placeholder="Enter Relation" data-parsley-pattern="^[a-zA-Z]*$" data-parsley-required="true" />
                                        </div>
                                    
                                        <!-- <div class="form-group">
                                            <label for="image">Upload Inmate's Image</label>
                                            <input type="file" name="image" class="form-control-file" id="image" data-parsley-required="true" >
                                        </div> -->
                                        <div class="form-group">
                                            <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                                            <p><label class="btn btn-primary"for="file" style="cursor: pointer;">Upload Image</label></p>
                                            <p><img id="output" width="200" name="image"/></p>
                                            <!-- <input type="file" name="image" class="form-control-file" id="image" data-parsley-required="true" value="<?php echo $imageSrc; ?>"> -->
                                        </div>
                                        <?php if(isset($_GET['error'])){if($_GET['error'] == 'wrongImage') {echo "Upload a *jpeg  *gif *png *jpg";}}?>
                                        <br />
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" required>Save Info</button>
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
    <?php if(isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
    const flashdata = $('.flash-data').data('flashdata');

        if(flashdata) {
            Swal.fire({
                icon: 'success',
                title: 'Record saved successfully',
                text: 'Prisoner record saved!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                footer: '<a href=prisoner.php>Click here!</a>',  
                type: "success" 
            }).then(function () {
                window.location.href = 'prisoner.php';
            });
        }

        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</body>

</html>