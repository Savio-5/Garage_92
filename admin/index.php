<?php
// Initialize the session
session_start();

require './includes/config_admin.php';

$msg = "";

if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
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
    <title>GARAGE92 - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include('./includes/headeradmin.php'); ?>
    <?php include('./includes/sidenavadmin.php'); ?>
    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">
                <div class="content-wrapper">

                    <!-- <h1 class="mt-4">CAR SERVICE MANAGEMENT SYSTEM</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->

                    <h1 class="mt-4">CAR SERVICE MANAGEMENT SYSTEM</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>



                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <!-- <i class="fa fa-list-ul" aria-hidden="true"></i> -->
                                    <?php $query3=mysqli_query($conn,"Select * from tblservicerequest");
                                    $sercount=mysqli_num_rows($query3);
                                    ?>
                                    <label><?php echo $sercount; ?></label><br>

                                    <span> Total Service Requests</span>
                                </div>
                                <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="http://localhost/Garage92/admin1/?page=booking/all-bookings">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                    <!-- <i class="fa fa-list-ul" aria-hidden="true"></i> -->
                                    <?php $query2 = mysqli_query($conn, "Select * from tblmechanics");
                                    $meccount = mysqli_num_rows($query2);
                                    ?>
                                    <label><?php echo $meccount; ?></label><br>

                                    <span> Total Mechanics</span>
                                </div>
                                <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="http://localhost/Garage92/admin1/?page=booking/completed-booking">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                    <!-- <i class="fa fa-list-ul" aria-hidden="true"></i> -->
                                    <?php $query31 = mysqli_query($conn, "Select * from tblservicerequest where AdminStatus is null");
                                                        $newrequest = mysqli_num_rows($query31);
                                                        ?>
                                    <label><?php echo $newrequest; ?></label><br>

                                    <span> New Service Requests</span>
                                </div>
                                <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="http://localhost/Garage92/admin1/?page=booking/new-booking">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                    <!-- <i class="fa fa-list-ul" aria-hidden="true"></i> -->
                                    <?php $query32 = mysqli_query($conn, "Select * from tblservicerequest where AdminStatus='2'");
                                                        $rejectedrequest = mysqli_num_rows($query32);
                                                        ?>
                                    <label><?php echo $rejectedrequest; ?></label><br>

                                    <span> Rejected Service Requests</span>
                                </div>
                                <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="http://localhost/Garage92/admin1/?page=manage-enquiries">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white mb-4">
                            <div class="card-body">
                                    <!-- <i class="fa fa-list-ul" aria-hidden="true"></i> -->
                                    <?php $query33 = mysqli_query($conn, "Select * from tblservicerequest where AdminStatus='3'");
                                                        $compsercount = mysqli_num_rows($query33);
                                                        ?>
                                    <label><?php echo $compsercount; ?></label><br>

                                    <span> Completed Services</span>
                                </div>
                                <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="http://localhost/Garage92/admin1/?page=manage-enquiries">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('./includes/footeradmin.php'); ?>
    </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('DOMContentLoaded', event => {

            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>