<?php
// Initialize the session
session_start();

require './includes/config_admin.php';
$msg = "";

if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['adid'];
        $query = mysqli_query($conn, "select ID, Password from tbladmin where ID='$adminid'");
    $row = mysqli_fetch_array($query);
        if (password_verify($_POST['currentpassword'], $row['Password'])) {
            $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
            mysqli_query($conn, "update tbladmin set Password='$newpassword' where ID='$adminid'");
            $msg = "Your password successully changed";
        } else {
            $msg = "Your current password is wrong";
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
        <title>GARAGE92 - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php include('./includes/headeradmin.php'); ?>
        <?php include './includes/sidenavadmin.php' ?>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">



                    <div class="content-wrapper">

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- Start Page content -->
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box">
                                                    <h4 class="m-t-0 header-title">Change Password</h4>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-20">
                                                                <p style="font-size:16px; color:red" align="center">
                                                                    <?php if ($msg) {
                                                                        echo $msg;
                                                                    }  ?> </p>

                                                                <form class="form-horizontal" role="form" method="post" name="changepassword" onsubmit="return checkpass();">
                                                                    <?php
                                                                    $adminid = $_SESSION['adid'];
                                                                    $ret = mysqli_query($conn, "select * from tbladmin where ID='$adminid'");
                                                                    $cnt = 1;
                                                                    while ($row = mysqli_fetch_array($ret)) {

                                                                    ?>

                                                                        <div class="form-group row">
                                                                            <label class="col-2 col-form-label" for="example-email">Current Password</label>
                                                                            <div class="col-10">
                                                                                <input type="password" id="currentpassword" name="currentpassword" class="form-control" required="true">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-2 col-form-label">New Password</label>
                                                                            <div class="col-10">
                                                                                <input type="password" class="form-control" name="newpassword" id="newpassword" required="true">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-2 col-form-label">Confirm Password</label>
                                                                            <div class="col-10">
                                                                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="true">
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>


                                                                    <div class="form-group row">
                                                                        <div class="col-12">
                                                                            <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Change</button>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- end row -->
                                                </div> <!-- end card-box -->
                                            </div><!-- end col -->
                                        </div>

                                    </div> <!-- container -->

                                </div> <!-- content -->
                            </div>
                        </section>
                    </div>
            </main>
            <?php include './includes/footeradmin.php' ?>
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