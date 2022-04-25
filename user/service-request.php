<?php
session_start();
require "../includes/config.php";

$msg = "";
if (!isset($_SESSION['sid'])) {
    header('./login.php');
} else {

    if (isset($_POST['submit'])) {
        $uid = $_SESSION['sid'];
        $category = $_POST['category'];
        $vehname = $_POST['vehiclename'];
        $vehmodel = $_POST['vehilemodel'];
        $vehbrand = $_POST['vehiclebrand'];
        $vehrego = $_POST['vehicleregno'];
        $vehservicedate = $_POST['servicedate'];
        $vehservicetime = $_POST['servicetime'];
        $deltype = $_POST['deltype'];
        $pickupadd = $_POST['pickupadd'];
        $sernumber = mt_rand(100000000, 999999999);

        $query = mysqli_query($con, "insert into tblservicerequest(UserId,Category,ServiceNumber,VehicleName,VehicleModel,VehicleBrand,VehicleRegno,ServiceDate,ServiceTime,DeliveryType,PickupAddress) value('$uid','$category','$sernumber','$vehname','$vehmodel','$vehbrand','$vehrego','$vehservicedate','$vehservicetime','$deltype','$pickupadd')");
        if ($query) {
            echo "<script>alert('Data has been added successfully.');</script>";
            echo "<script>window.location.href ='service-request.php'</script>";
        } else {
            echo "<script>alert('Something went wrong.Please try again.');</script>";
        }
    }

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
                            <a class="nav-link active" href="service-request.php" id="account-tab">
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
                            <div class="card-box">
                                <h4 class="m-t-0 header-title mt-5">Service Request Form</h4>
                                <p class="text-muted m-b-30 font-14">

                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                        echo $msg;
                                                                                                    }  ?> </p>
                                            <form class="form-horizontal" role="form" method="post" name="submit">
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Category</label>
                                                    <div class="col-10">
                                                        <select name='category' id="category" class="form-control" required="true">
                                                            <option value="">Category</option>
                                                            <?php $query = mysqli_query($conn, "select * from tblcategory");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                                <option value="<?php echo $row['VehicleCat']; ?>"><?php echo $row['VehicleCat']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="example-email">Vehicle Name</label>
                                                    <div class="col-10">
                                                        <input type="text" id="vehiclename" name="vehiclename" class="form-control" placeholder="Vehicle Name" required="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Vehicle Model</label>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="vehilemodel" id="vehilemodel" required="true">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Vehicle Brand</label>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" placeholder="Brand" name="vehiclebrand" id="vehiclebrand" required="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Vehicle Registration Number</label>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="vehicleregno" id="vehicleregno" required="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Service Date</label>
                                                    <div class="col-10">
                                                        <input type="date" class="form-control" name="servicedate" id="servicedate" required="true">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Service Time</label>
                                                    <div class="col-10">
                                                        <input type="time" class="form-control" name="servicetime" id="servicetime" required="true">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Delivery Type</label>
                                                    <div class="col-10">
                                                        <select name="deltype" id="deltype" required="true" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="pickupservice">Pickup Service</option>
                                                            <option value="dropservice">Drop Service</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="pickupaddress">
                                                    <label class="col-2 col-form-label">Pickup Address</label>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="pickupadd" id="pickupadd">
                                                    </div>
                                                </div>

                                                <div class="col-12">

                                                    <div class="checkbox checkbox-custom">
                                                        <input id="remember" type="checkbox" checked="true">
                                                        <label for="remember">
                                                            I accept <a href="terms-conditions.php" class="text-custom" target="_blank">Terms and Conditions</a>
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-12">
                                                        <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button></p>
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