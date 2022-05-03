<?php
// Initialize the session
session_start();

require './includes/config_admin.php';
require '../razorpay/config.php';
require '../razorpay/razorpay-php/Razorpay.php';

use Razorpay\Api\Api;

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

                                                                    <th>Invoice ID</th>
                                                                    <th>Status</th>


                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            $ret = mysqli_query($conn, "select tblservicerequest.ServiceNumber,tblservicerequest.Category, tblservicerequest.invoice_id, tblservicerequest.Pay_Status,tblservicerequest.ID as apid, tbluser.FullName,tbluser.MobileNo,tbluser.Email from  tblservicerequest inner join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.AdminStatus ='3'");
                                                            $cnt = 1;
                                                            while ($row = mysqli_fetch_array($ret)) {

                                                            ?>

                                                                <tr>

                                                                    <?php
                                                                    $api = new Api($keyId, $keySecret);



                                                                    // $invoice_res = mysqli_query($conn, "select tblservicerequest.ServiceNumber,tblservicerequest.Category, tblservicerequest.invoice_id, tblservicerequest.Pay_Status,tblservicerequest.ID as apid, tbluser.FullName,tbluser.MobileNo,tbluser.Email from  tblservicerequest inner join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.AdminStatus ='3'");
                                                                    // $row1 = mysqli_fetch_array($invoice_res);

                                                                    if($row['invoice_id'] !== null){
                                                                        $invoiceId = $row['invoice_id'];
                                                                        $result = $api->invoice->fetch($invoiceId);
                                                                        if($result['amount_due'] == 0){
                                                                            $update = mysqli_query($conn, "UPDATE tblservicerequest SET Pay_Status = 'Paid' WHERE invoice_id='$invoiceId'");
                                                                        }
                                                                    }

                                                                    // if ($row['invoice_id'] !== null) {
                                                                    //     $invoiceId = $row['invoice_id'];
                                                                    //     $result = $api->invoice->fetch($invoiceId);
                                                                    //     if ($row['Pay_Status'] !== 'Payed') {

                                                                    //         $result1 = mysqli_query($conn, "select tblservicerequest.ServiceNumber,tblservicerequest.Category, tblservicerequest.invoice_id, tblservicerequest.Pay_Status,tblservicerequest.ID as apid, tbluser.FullName,tbluser.MobileNo,tbluser.Email from  tblservicerequest inner join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.AdminStatus ='3'");
                                                                    //         $row1 = mysqli_fetch_array($invoice_res);

                                                                    //         $res1 = $result['amount_due'];

                                                                    //         if ($res1 == 0) {
                                                                    //             $update = mysqli_query($conn, "UPDATE tblservicerequest SET Pay_Status = 'Payed' WHERE invoice_id='$invoiceId'");
                                                                    //         }
                                                                    //     }
                                                                    // }
                                                                    ?>


                                                                    <td><?php echo $cnt; ?></td>
                                                                    <td><?php echo $row['ServiceNumber']; ?></td>
                                                                    <td><?php echo $row['Category']; ?></td>

                                                                    <td><?php echo $row['FullName']; ?></td>
                                                                    <td><?php echo $row['MobileNo']; ?></td>
                                                                    <td><?php echo $row['Email']; ?></td>
                                                                    <td><?php echo $row['invoice_id']; ?></td>
                                                                    <td><?php echo $row['Pay_Status']; ?></td>





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