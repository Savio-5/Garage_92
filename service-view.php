<?php
session_start();
require "./includes/config.php";

$msg = "";
if (!isset($_SESSION['sid'])) {
    header('login.php');
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
        <link href="./lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Template Stylesheet -->
        <link href="./css/style.css" rel="stylesheet">
        <script type="text/javascript">
            function printdata() {
                window.print();
            }
        </script>
    </head>

    <body>

        <?php include('./includes/header.php') ?>
            <!-- Start Page content -->
            <div class="content ml-auto mr-auto">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box mt-5">
                                <h4 class="m-t-0 header-title">Service History View</h4>
                                <p class="text-muted m-b-30 font-14">

                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">

                                            <form method="post">
                                                <p style="font-size:16px; color:red" align="left"> <?php if ($msg) {
                                                                                                        echo $msg;
                                                                                                    }  ?> </p>
                                                <?php
                                                $cid = substr(base64_decode($_GET['srid']), 0, -4);
                                                $uid = $_SESSION['sid'];
                                                $ret = mysqli_query($conn, "select * from tblservicerequest where ID='$cid' and UserId='$uid'");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {

                                                ?>

                                                    <table border="1" class="table table-bordered mg-b-0">

                                                        <tr>
                                                            <th>Service Request Date</th>
                                                            <td><?php echo $row['ServicerequestDate']; ?></td>

                                                            <th>Service Number</th>
                                                            <td><?php echo $row['ServiceNumber']; ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Category</th>
                                                            <td><?php echo $row['Category']; ?></td>

                                                            <th>Vehicle Name</th>
                                                            <td><?php echo $row['VehicleName']; ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Vehicle Model</th>
                                                            <td><?php echo $row['VehicleModel']; ?></td>

                                                            <th>Vehicle Brand</th>
                                                            <td><?php echo $row['VehicleBrand']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Vehicle Registration Number</th>
                                                            <td><?php echo $row['VehicleRegno']; ?></td>

                                                            <th>Service Date</th>
                                                            <td><?php echo $row['ServiceDate']; ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Service Time</th>
                                                            <td><?php echo $row['ServiceTime']; ?></td>

                                                            <th>Delivery Type</th>
                                                            <td><?php echo $row['DeliveryType']; ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Pickup Address</th>
                                                            <td><?php echo $row['PickupAddress']; ?></td>

                                                            <th>Service Request Date</th>
                                                            <td><?php echo $row['ServicerequestDate']; ?></td>
                                                        </tr>






                                                        <tr>
                                                            <th>Admin Remark</th>
                                                            <td><?php
                                                                if ($row['AdminRemark'] == "") {
                                                                    echo "No action taken yet";
                                                                } else {
                                                                    echo $row['AdminRemark'];
                                                                } ?></td>

                                                            <th>Admin Remark date</th>
                                                            <td>
                                                                <?php
                                                                if ($row['AdminRemarkdate'] == "") {
                                                                    echo "No action taken yet";
                                                                } else {
                                                                    echo $row['AdminRemarkdate'];
                                                                } ?>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Service Charge</th>
                                                            <td><?php echo $schrg = $row['ServiceCharge']; ?></td>

                                                            <th>Parts Charge</th>
                                                            <td><?php echo $pchrg = $row['PartsCharge']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Other Charge(if any)</th>
                                                            <td><?php echo $ochrg = $row['OtherCharge']; ?></td>

                                                            <th>Total Amount</th>
                                                            <td><?php echo $ochrg + $schrg + $pchrg; ?></td>
                                                        </tr>



                                                    </table>
                                                    <p style="text-align: center;"><button type="text" name='print' id="print" onclick="return printdata();" class="btn btn-info btn-min-width mr-1 mb-1">Print</button></p>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include('./includes/footer.php') ?>



        <!-- JavaScript Libraries -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
        <script src="./lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="./lib/waypoints/waypoints.min.js"></script>
        <script src="./lib/counterup/counterup.min.js"></script>


        <!-- Contact Javascript File -->
        <!-- <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script> -->

        <!-- Template Javascript -->
        <script src="./js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

    </html>

<?php } ?>