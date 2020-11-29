<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GPMS</title>
    <link rel="icon" href="images/imageedit_28_3939584200.png" type="image/png">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Theme Layout Change</h3>
                                </div>
                                <div class="card-body">
                                <form>
                                    <div class="form-check">
                                        <input type="checkbox" id='light-theme'> 
                                        <label class="form-check-label" for="defaultCheck1">
                                            Light Theme Layout
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id='dark-theme'> 
                                        <label class="form-check-label" for="defaultCheck1">
                                            Dark Theme Layout
                                        </label>
                                    </div>
                                </form>
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script> 
        $(document).ready(function(){
            //checking if there is a click 
            $('#light-theme').click(function(){
                if($(this).prop("checked") == true){
                    console.log("lIght check was done");
                    window.location.href= './light-Dashboard.php';
                } else {
                    
                }
            });
            //checking if there is a click 
            $('#dark-theme').click(function(){
                if($(this).prop("checked") == true){
                    window.location.href= './Dashboard.php';
                }
            });
            
        });
    </script>
</body>

</html>