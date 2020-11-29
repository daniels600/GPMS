<?php 

session_start();

require_once('config/db_conn.php');


$sql = "SELECT 
            prisoner.Prisoner_id,
            prisoner.prisoner_fname,
            prisoner.prisoner_lname,
            prisoner.Marital_Status,
            prisoner.Sex,
            prisoner.Prisoner_status,
            prisoner.Prison_name,
            Prisoner_case.Latest_Possible_Date
            FROM
            prisoner
                INNER JOIN
            Prisoner_case ON prisoner.Prisoner_id = Prisoner_case.Prisoner_id
            ORDER BY prisoner.Prisoner_id DESC";


$countR = "SELECT * FROM Prisoner WHERE prisoner_status= 'Remand'";
$countC =  "SELECT * FROM Prisoner WHERE prisoner_status= 'Convict'";
$countCapa = "SELECT Prison_name, COUNT(*) AS magnitude FROM Prisoner GROUP BY Prison_name 
                    ORDER BY magnitude DESC
                    LIMIT 1";

$countPC= "SELECT * FROM Prisoner";

$countRemand = mysqli_query($conn,$countR);

$countConvict = mysqli_query($conn,$countC);

$countCapacity = mysqli_query($conn,$countCapa);

$countPrisoners = mysqli_query($conn,$countPC);

$result = mysqli_query($conn, $sql);

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
    <link rel="icon" href="images/imageedit_28_3939584200.png" type="image/png">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <img src="images/GPMS_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        <a class="navbar-brand" href="index.html">GPMS</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Dashboard.php?logout=1">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="Dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Administration
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="prisoner.php">Inmates</a>
                            <a class="nav-link" href="employee.php">Employees</a>
                            <a class="nav-link" href="visitor.php">Visitors</a>
                                    <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                                <!-- </a> -->
                                <!-- <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="prisoner.php">Inmates</a>
                                        <a class="nav-link" href="employee.php">Employees</a>
                                        <a class="nav-link" href="visitor.php">Visitors</a>
                                    </nav>
                                </div> -->
                                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div> -->
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <?php echo $_SESSION['admin_email']; ?></div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><b>Total Number of Remands</b></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p ><?php if(mysqli_num_rows($countRemand) !== null){
                                        $num = mysqli_num_rows($countRemand);
                                        echo "<p style='text-align:center'><b>".$num."</b></p>";
                                    }else{
                                        echo 0;
                                    }
                                    ?></p>
                                    <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body" style='color:#0d47a1'><b>Total Number of Convicts</b></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <p ><?php if(mysqli_num_rows($countConvict) !== null){
                                        $num = mysqli_num_rows($countConvict);
                                        echo "<p style='text-align:center'><b>".$num."</b></p>";
                                    }else{
                                        echo 0;
                                    }
                                    ?></p>
                                    <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"><b>Highest capacity prison</b></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <p ><?php 
                                if(mysqli_num_rows($countCapacity) !== null){
                                        $m = mysqli_fetch_assoc($countCapacity);
                                        $prison = isset($m['Prison_name'])?$m['Prison_name']:"";

                                        $fnum = "SELECT * FROM Prisoner WHERE Prison_name='$prison'";
                                        $rnum = mysqli_query($conn,$fnum);
                                        if(isset($rnum)){
                                            $pnum = mysqli_num_rows($rnum);
                                            echo "<p style='text-align:center'><b>".$prison." = ".$pnum."</b></p>";
                                        }else{
                                            echo "Nothing Yet";
                                        }
                                        
                                    }else{
                                        echo "Nothing Yet";
                                    }
                                    ?></p>
                                    <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body"><b>Total Inmate Population</b></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <p ><?php if(mysqli_num_rows($countPrisoners) !== null){
                                        $num = mysqli_num_rows($countPrisoners);
                                        echo "<p style='text-align:center'><b>".$num."</b></p>";
                                    }else{
                                        echo 0;
                                    }
                                    ?></p>
                                    <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i>
                                    Gender Population
                                </div>
                                <div class="card-body"><canvas id="myBarChart2" width="100%" height="60"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Prison Population
                                </div>
                                <div class="card-body"><canvas id="myBarChart1" width="100%" height="60"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Inmates

                            <button class="btn btn-primary" id = 'addPrisoner' style="float:right; margin-right:auto" onclick="document.location='caseForm.php'"><i class="fas fa-user-plus"></i> Add</button>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-toggle ="table" data-show-toggle="true" data-toolbar="#toolbar" data-show-fullscreen="true" data-pagination-pre-text="Previous">
                                    
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Marital Status</th>
                                            <th>Sex</th>
                                            <th>Status</th>
                                            <th>Prison</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Marital Status</th>
                                            <th>Sex</th>
                                            <th>Status</th>
                                            <th>Prison</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if(isset($result)){
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo'
                                                <tr>
                                                    <td>'.$row['prisoner_fname'].'</td>
                                                    <td>'.$row['prisoner_lname'].'</td>
                                                    <td>'.$row['Marital_Status'].'</td>
                                                    <td>'.$row['Sex'].'</td>
                                                    <td>'.$row['Prisoner_status'].'</td>
                                                    <td>'.$row['Prison_name'].'</td>
                                                    <td>'.'<a class="btn btn-primary" href="viewPrisoner.php?id='.$row['Prisoner_id'].'" role="button"><i class="fas fa-eye"></i></a> <a class="btn btn-success" href="updatePrisoner.php?id='.$row['Prisoner_id'].'" role="button"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="deletePrisoner.php?id='.$row['Prisoner_id'].'" role="button"><i class="fas fa-trash-alt"></i></a>'.'</td>
                                                </tr>
                                              
                                                ';
                                            }
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
    <?php if(isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>
    <?php if(isset($_GET['edit'])) : ?>
        <div class='flash-edit' data-flashedit="<? $_GET['edit'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 
    <!-- <script src="assets/demo/chart-area-demo.js"></script> -->
    <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    
    <script>
    $(document).ready(function () {
            showGraph1();
            showGraph2();
        });


        function showGraph1()
        {
            {
                $.post("prison_data.php",
                function (data)
                {
                    console.log(data);
                     var prison_name = [];
                    var count = [];

                    for (var i in data) {
                        prison_name.push(data[i].Prison_name);
                        count.push(data[i].count);
                    }

                    var chartdata = {
                        labels: prison_name,
                        datasets: [
                            {
                                label: 'Prisons population',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: count
                            }
                        ]
                    };

                    var graphTarget = $("#myBarChart1");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 1
                                    }
                                }]
                            }
                        }
                    });
                });
            }
        }


        function showGraph2()
        {
            {
                $.post("prison_gender.php",
                function (data2)
                {
                    console.log(data2);
                     var Sex = [];
                    var count = [];

                    for (var i in data2) {
                        Sex.push(data2[i].Sex);
                        count.push(data2[i].count);
                    }

                    var chartdata = {
                        labels: Sex,
                        datasets: [
                            {
                                label: 'Gender population',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: count
                            }
                        ]
                    };

                    var graphTarget = $("#myBarChart2");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 1
                                    }
                                }]
                            }
                        }
                    });
                });
            }
        }

        
    $(".btn-danger").on('click', function(e){
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                icon:'warning',
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if(result.value){
                        document.location.href = href;
                    }
                    
                })
        })
        
        const flashdata = $('.flash-data').data('flashdata');

        if(flashdata) {
            Swal.fire({
                icon:'success',
                type: 'success',
                title: 'Deleted successfully',
                text: 'Prisoner record deleted!',
                    
            }).then(function () {
                window.location.href = 'prisoner.php';
            });
        }
        const flashedit = $('.flash-edit').data('flashedit');

        if(flashedit) {
            Swal.fire({
                icon:'success',
                type: 'success',
                title: 'Record updated',
                text: 'Inmate record updated!',
                    
            }).then(function () {
                window.location.href = 'prisoner.php';
            });
        }
    </script>
</body>

</html>


  

