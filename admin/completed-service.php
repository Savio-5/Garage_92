<?php
// Initialize the session
session_start();

require './includes/config_admin.php';

$msg = "";
if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
} else {
?>
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
                <div class="container-fluid px-4 mt-3">
                    <div class="content-wrapper">

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- Start Page content -->

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box card-header">
                                                    <h4 class="m-t-0 "></h4>
                                                    <i class="fas fa-table me-1"></i>
                                                    Complete Services
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card-body">
                                                                <table class="table datatablesSimple">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>S.NO</th>
                                                                            <th>Service number</th>
                                                                            <th>Vehicle Category</th>
                                                                            <th>Full Name</th>
                                                                            <th>Mobile Number</th>
                                                                            <th>Email</th>


                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    $ret = mysqli_query($conn, "select tblservicerequest.ServiceNumber,tblservicerequest.Category,tblservicerequest.ID as apid, tbluser.FullName,tbluser.MobileNo,tbluser.Email from  tblservicerequest inner join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.AdminStatus ='3'");
                                                                    $cnt = 1;
                                                                    while ($row = mysqli_fetch_array($ret)) {

                                                                    ?>

                                                                        <tr>
                                                                            <td><?php echo $cnt; ?></td>
                                                                            <td><?php echo $row['ServiceNumber']; ?></td>
                                                                            <td><?php echo $row['Category']; ?></td>

                                                                            <td><?php echo $row['FullName']; ?></td>
                                                                            <td><?php echo $row['MobileNo']; ?></td>
                                                                            <td><?php echo $row['Email']; ?></td>



                                                                            <td><a href="view-service.php?aticid=<?php echo $row['apid']; ?>">View Details</a></td>
                                                                        </tr>
                                                                    <?php
                                                                        $cnt = $cnt + 1;
                                                                    } ?>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-box -->
                                            </div><!-- end col -->
                                        </div>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
            <?php include('./includes/footeradmin.php'); ?>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

<?php }  ?>