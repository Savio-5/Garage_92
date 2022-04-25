<?php
session_start();
require "../includes/config.php";

$msg = "";
if (!isset($_SESSION['sid'])) {
    header('./login.php');
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- <meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css"> -->

        <title>GARAGE92 | Home Page</title>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"> -->

        <!-- <link href="lib/flaticon/font/flaticon.css" rel="stylesheet"> -->
        <!-- <link href="lib/animate/animate.min.css" rel="stylesheet"> -->
        <!-- <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->


        <!-- Template Stylesheet -->
        <link href="../css/style.css" rel="stylesheet">
    </head>

    <body>

        <?php include('../includes/user/header.php') ?>
        <div class="bg-white rounded-lg d-block d-sm-flex">
            <!-- <div class="profile-tab-nav border-right">
					<div class="p-4"> -->
            <!-- <div class="img-circle text-center mb-3"> -->
            <!-- <img src="img/user2.jpg" alt="Image" class="shadow"> -->
            <?php
            $uid = $_SESSION['sid'];
            $ret = mysqli_query($conn, "select FullName from tbluser where ID='$uid'");
            $row = mysqli_fetch_array($ret);
            $name = $row['FullName'];

            ?>
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="profile-tab-nav border-right">
                        <div class="p-4">
                            <div class="img-circle text-center mb-3 ">
                                <!-- <img src="img/user2.jpg" alt="Image" class="shadow"> -->
                                <?php
                                $uid = $_SESSION['sid'];
                                $ret = mysqli_query($conn, "select FullName from tbluser where ID='$uid'");
                                $row = mysqli_fetch_array($ret);
                                $name = $row['FullName'];

                                ?>
                            </div>
                            <h4 class="text-center"><?php echo $name ?></h4>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" href="service-request.php" id="account-tab">
                                <!-- <i class="fa fa-home text-center mr-1"></i> -->
                                Service Request Form
                            </a>
                            <a class="nav-link active" href="service-history.php" id="">
                                <!-- <i class="fa fa-key text-center mr-1"></i> -->
                                Service Request History
                            </a>
                            <a class="nav-link" href="enquiry-request.php" id="">
                                <!-- <i class="fa fa-user text-center mr-1"></i> -->
                                Enquiry
                            </a>
                            <!-- <a class="nav-link" id="application-tab">
                                <i class="fa fa-tv text-center mr-1"></i>
                                Application
                            </a>
                            <a class="nav-link" id="notification-tab">
                                <i class="fa fa-bell text-center mr-1"></i>
                                Notification
                            </a> -->
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Start Page content -->
            <div class="content  ml-auto mr-auto">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box mt-5">
                                <h4 class="m-t-0 header-title">Service History</h4>
                                <p class="text-muted m-b-30 font-14">

                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">

                                            <table class="table table-bordered mg-b-0">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Category</th>
                                                        <th>Vehicle Name</th>
                                                        <th>Service Request Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $tid = $_SESSION['sid'];
                                                $rno = mt_rand(1000, 9999);
                                                $ret = mysqli_query($conn, "select * from  tblservicerequest where UserId=$tid");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {

                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row['Category']; ?></td>
                                                            <td><?php echo $row['VehicleName']; ?></td>
                                                            <td><?php echo $row['ServicerequestDate']; ?></td>

                                                            <td><a href="service-view.php?srid=<?php echo base64_encode($row['ID'] . $rno); ?>">View Detail</a>
                                                        </tr>
                                                    <?php
                                                    $cnt = $cnt + 1;
                                                } ?>

                                                    </tbody>
                                            </table>



                                        </div>



                                        <!-- end row -->

                                    </div> <!-- end card-box -->
                                </div><!-- end col -->
                            </div>

                        </div> <!-- container -->

                    </div> <!-- content -->
                </div>
            </div>

        </div>
        <?php include('../includes/user/footer.php') ?>



        <!-- JavaScript Libraries -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/counterup/counterup.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

    </html>

<?php } ?>