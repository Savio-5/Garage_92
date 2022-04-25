<?php
session_start();
require "../includes/config.php";

$msg = "";
if (!isset($_SESSION['sid'])) {
    header('./login.php');
} else {
    if (isset($_POST['submit'])) {
        $pid = $_SESSION['sid'];
        $FName = $_POST['fullname'];
        $mobno = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $query = mysqli_query($conn, "update tbluser set FullName='$FName',  MobileNo='$mobno',  Email='$email' where ID='$pid'");
        if ($query) {
            $msg = "Your profile has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again.";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>GARAGE92 | Home Page</title>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


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
                            <a class="nav-link" href="service-request.php" id="account-tab" >
                                <!-- <i class="fa fa-home text-center mr-1"></i> -->
                                Service Request Form
                            </a>
                            <a class="nav-link" href="service-history.php" id="">
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
            <div class="content ml-auto mr-auto">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box mt-5">
                                <h4 class="m-t-0 header-title">Update Profile</h4>
                                <p class="text-muted m-b-30 font-14">

                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                        echo $msg;
                                                                                                    }  ?> </p>

                                            <form class="form-horizontal" role="form" method="post">
                                                <?php
                                                $userid = $_SESSION['sid'];
                                                $ret = mysqli_query($conn, "select * from tbluser where ID='$userid'");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {

                                                ?>


                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Full Name</label>
                                                        <div class="col-10">
                                                            <input type="text" id="fullname" name="fullname" class="form-control" required="true" value="<?php echo $row['FullName']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Mobile Number</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" required="true" readonly="true" value="<?php echo $row['MobileNo']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Email</label>
                                                        <div class="col-10">
                                                            <input type="email" class="form-control" name="email" id="email" required="true" readonly="true" value="<?php echo $row['Email']; ?>">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Registration Date</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="regdate" id="regdate" required="true" readonly="true" value="<?php echo $row['RegDate']; ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>


                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button></p>
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
        <?php include('../includes/user/footer.php') ?>



        <!-- JavaScript Libraries -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/counterup/counterup.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

    </html>

<?php } ?>