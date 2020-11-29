<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Officer Form</title>
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
                                    <h3 class="text-center font-weight-light my-4">Police Officer Information</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Form is validated using parsley js and regex -->
                                    <form action='insertPoliceOfficer.php' method="POST" id='Officer info' data-parsley-validate>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="FirstName">First Name</label>
                                                    <input class="form-control py-4" id="FirstName" type="text" placeholder="Enter first name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" name="pFname" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="LastName">Last Name</label>
                                                    <input class="form-control py-4" id="LastName" type="text" placeholder="Enter last name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" name="pLname" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="serviceId">Service ID</label>
                                            <input class="form-control py-4" id="serviceId" type="text" placeholder="Enter Service Id" data-parsley-required="true" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z0-9\- ]+$" name='serviceId'/>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="officerContact">Officer Contact</label>
                                                    <input class="form-control py-4" id="office_contact" type="tel" placeholder="Enter Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" name='pContact'/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="pStation">Police Station Contact </label>
                                                    <input class="form-control py-4" id="station_contact" type="tel" placeholder="Enter Station contact" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-required="true" data-parsley-trigger="keyup" name="stationContact"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Ranks">Ranks</label>
                                                <select class="custom-select mr-sm-2" id="rank" id="ranks"  data-parsley-trigger="keyup"  data-parsley-required="true" name="ranks">
                                                    <option value="">Choose...</option>
                                                    <option value="Sergeant">Sergeant</option>
                                                    <option value="Lance corporal">Lance corporal</option>
                                                    <option value="Sergeant">Sergeant</option>
                                                    <option value="Corporal">Corporal</option>
                                                    <option value="Inspector">Inspector</option>
                                                    <option value="Chief Inspector">Chief Inspector</option>
                                                    <option value="District Sergeant Major">District Sergeant Major</option>
                                                    <option value="constable">constable</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="small mb-1" for="PoliceStation">Police Station</label>
                                            <input class="form-control py-4" id="Police_station" type="text" placeholder="Enter police station" data-parsley-required="true" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z0-9 ]*$" name="stationName"/>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Save Record</button>
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
    <!-- Checking for the message in the url to show an alert to admin -->
    <?php if(isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script >

        const flashdata = $('.flash-data').data('flashdata');

        if(flashdata) {
            Swal.fire({
                icon: 'success',
                title: 'Officer Information saved!',
                text: 'Kindly add Prisoner details',
                allowOutsideClick: false,
                allowEscapeKey: false,
                footer: '<a href=prisonerForm.php>Click here!</a>',  
                type: "success" 
            }).then(function () {
                window.location.href = 'prisonerForm.php';
            });
        }

    </script>
</body>

</html>