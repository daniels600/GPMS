
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/parsley.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/scripts.js"></script>
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
                                    <h3 class="text-center font-weight-light my-4">Case Details</h3>
                                </div>
                                <div class="card-body">
                                    <form action='insertCase.php' id='Case_info' data-parsley-validate method='POST'>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="FirstName">Magistrate First Name</label>
                                                    <input class="form-control py-4" id="FirstName" type="text" placeholder="Enter first name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" name="mFname" data-parsley-error-message="Please enter a valid First name without spaces" data-parsley-trigger="keyup"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-2" for="LastName">Magistrate Last Name</label>
                                                    <input class="form-control py-4" id="LastName" type="text" placeholder="Enter last name"  data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]+$" name="mLname" data-parsley-error-message="Please enter a valid Last name without spaces" data-parsley-trigger="keyup"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="court">Court of Committal</label>
                                            <input class="form-control py-4" id="court" type="text" placeholder="Enter Court name" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]*$" data-parsley-trigger="keyup" data-parsley-error-message="Please enter a valid court name" name="court" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="Crime">Crime Committed</label>
                                            <input class="form-control py-4" id="Crime" type="text" placeholder="Enter crime committed" data-parsley-required="true" data-parsley-pattern="^[a-zA-Z ]*$" data-parsley-trigger="keyup" name="crime"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="CategoryOfOffence">Category of Offence</label>
                                            <select class="form-control" id="catOffence" name="CatOffence"required>
                                                <option value="">Choose ...</option>
                                                <option value="Capital">Capital</option>
                                                <option value="First">First Degree</option>
                                                <option value="Second">Second Degree</option>
                                                <option value="Misdemeanour">Misdemeanour</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Case Start Date</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" value="" class="form-control" name="case_start_date" id="CSD" data-parsley-required="true" data-parsley-trigger="keyup">
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Case End Date</label><br>
                                            <input type="date" placeholder="yyyy-mm-dd" value="" class="form-control" name="case_end_date" id="CED" data-parsley-required="true" data-parsley-trigger="keyup">
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="md-form md-outline">
                                                    <label for="default-picker">Time of Crime</label>
                                                    <input type="time" id="default-picker" class="form-control" placeholder="Select time" data-parsley-required="true" name="crimeTime">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dob">Date of Crime</label><br>
                                                <input type="date" placeholder="yyyy-mm-dd" class="form-control" name="crimeDate" id="CED" data-parsley-required="true" data-parsley-trigger="keyup">
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                                <label class="small mb-1" for="sentenceLength">Sentence Length</label>
                                                <input class="form-control py-4" id="sentenceLength" type="number" placeholder="Enter Duration of sentence" data-parsley-required="true" data-parsley-error-message="Please enter a figure only" name="sentenceLength"/>
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
                title: 'Case information saved!',
                text: 'Kindly move to the next required details',
                allowOutsideClick: false,
                allowEscapeKey: false,
                footer: '<a href=policeOfficerForm.php>Click here!</a>',  
                type: "success" 
            }).then(function () {
                window.location.href = 'policeOfficerForm.php';
            });
        }

    </script>
    
</body>

</html>