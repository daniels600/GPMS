<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Visitor Page</title>
    <link rel="icon" href="../../assets/images/imageedit_28_3939584200.png" type="image/png">
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="../../assets/css/parsley.css" rel="stylesheet" />
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
                                     <!-- Using parsley js to validate the form inputs -->
                                    <form action='../../actions/insertVisitor.php' method="POST" id='visitor_info' data-parsley-validate>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="FirstName">Visitor First Name</label>
                                                    <input class="form-control py-4" name="fName" type="text" placeholder="Enter first name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="LastName">Visitor Last Name</label>
                                                    <input class="form-control py-4" name="lName" type="text" placeholder="Enter last name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="rel">Relation</label>
                                            <input class="form-control py-4" name="rel" type="text" placeholder="Enter relation" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z- ]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid relation" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="md-form md-outline">
                                                    <label for="visitTime">Time of Visit</label>
                                                    <input type="time" name="visitTime" class="form-control" placeholder="Select time" data-parsley-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dateofvisit">Date of Visit</label><br>
                                                <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="visitDate" data-parsley-required="true" data-parsley-trigger="keyup">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                                <label for="tel">Telephone</label>
                                                <input type="tel" class="form-control" name="telephone" placeholder="Telephone" data-parsley-required="true" data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup" />
                                        </div>
                                            <div class="form-group col-md-6">
                                                    <label for="sex">Sex</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="sex"  data-parsley-trigger="keyup" required>
                                                        <option value="">Choose...</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="prisonername">Visited Inmate Name</label>
                                            <input class="form-control py-4" name="prisonerName" type="text" placeholder="Enter Prisoner name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid Prisoner name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="prison">Prison</label>
                                            <select class="form-control" id="prison" name="prison" data-parsley-required="true" >
                                                <option value="">Choose...</option>
                                                <option value="Nsawam Medium Security"> Nsawam Medium Security</option>
                                                <option value="Ankaful">Ankaful</option>
                                                <option value="Kete Krachi"> Kete Krachi</option>
                                                <option value='Akuse'>Akuse</option>
                                                <option value="Tamale">Tamale</option>
                                                <option value='Sekondi Female Prison'>Sekondi Female Prison</option>
                                                <option value="Borstal Juveniles">Borstal Juveniles</option>
                                            </select>
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
    <?php if(isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
    const flashdata = $('.flash-data').data('flashdata');

        if(flashdata) {
            Swal.fire({
                icon: 'success',
                title: 'Visitor information saved!',
                text: 'Kindly click to go to the Visitor\'s page',
                allowOutsideClick: false,
                allowEscapeKey: false,
                footer: '<a href= ../visitor.php>Click here!</a>',  
                type: "success" 
            }).then(function () {
                window.location.href = '../visitor.php';
            });
        }

    </script>
</body>

</html>