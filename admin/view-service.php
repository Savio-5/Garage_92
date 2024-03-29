<?php
// Initialize the session
session_start();

require './includes/config_admin.php';

$msg = "";

if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
} else {

    $sercharge = "";
    $addcharge = "";
    $partcharge = "";
    $serviceby = "";


    if (isset($_POST['submit-service-completed'])) {

        $cid = $_GET['aticid'];
        $admrmk = $_POST['AdminRemark'];
        $admsta = $_POST['status'];
        $sercharge = $_POST['servicecharge'];
        $addcharge = $_POST['addcharge'];
        $partcharge = $_POST['partcharge'];
        $serviceby = implode(" ,",$_POST['serper']);
        // $serviceby = implode(" ,",$serviceby_);

        $query = mysqli_query($conn, "update  tblservicerequest set AdminRemark='$admrmk',AdminStatus='$admsta', ServiceCharge='$sercharge',OtherCharge='$addcharge', PartsCharge='$partcharge', ServiceBy='$serviceby' where ID='$cid'");
        if ($query) {
            $msg = "Service has been completed.";

            $total =  $sercharge + $addcharge + $partcharge;
            $result = mysqli_query($conn, "select * from tblservicerequest join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.ID='$cid'");
            $res_row = mysqli_fetch_array($result);

            $subject = "Your Vehicle Servicing has been Completed";

            $body = "Hi <br>Your Vehicle Service Number " . $res_row['ServiceNumber'] . " is Complete <br> Total amount due is Rs " . $total . "<br><br> Thanks GARAGE92 Team";


            require('../includes/email.php');

            $mail->FromName   = 'GARAGE92';
            $mail->AddAddress($res_row['Email']);
            $mail->Subject    =  $subject;
            $mail->IsHTML(true);
            $mail->Body       = $body;
            if ($mail->Send()) {
                echo "<script>alert('Email Sent');</script>";
            } else {
                echo "Mail Error - >" . $mail->ErrorInfo;
            }
        } else {
            $msg = "Something Went Wrong. Please try again";
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
        <?php include('./includes/sidenavadmin.php'); ?>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">
                    <div class="content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title">View Services</h4>
                                        <p class="text-muted m-b-30 font-14">

                                        </p>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-20">

                                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                                echo $msg;
                                                                                                            }  ?> </p>


                                                    <?php
                                                    $cid = $_GET['aticid'];
                                                    $ret = mysqli_query($conn, "select * from tblservicerequest join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.ID='$cid'");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <table border="1" class="table table-bordered mg-b-0">
                                                            <tr>
                                                                <th>Service Number</th>
                                                                <td><?php echo $row['ServiceNumber']; ?></td>
                                                                <th>Full Name</th>
                                                                <td><?php echo $row['FullName']; ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Vehicle Category</th>
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
                                                                <th> Vehicle Registration Number</th>
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
                                                                <th>Admin Status</th>
                                                                <td> <?php
                                                                        if ($row['AdminStatus'] == "1") {
                                                                            echo "Selected";
                                                                        }

                                                                        if ($row['AdminStatus'] == "2") {
                                                                            echo "Rejected";
                                                                        }
                                                                        if ($row['AdminStatus'] == "3") {
                                                                            echo "Completed";
                                                                        }; ?></td>
                                                            </tr>
                                                        </table>




                                                        <table class="table mb-0">
                                                            <?php if ($row['AdminRemark'] == "") { ?>
                                                                <form name="submit-service-completed" method="post" enctype="multipart/form-data">

                                                                    <tr>
                                                                        <th>Admin Remark :</th>
                                                                        <td>
                                                                            <textarea name="AdminRemark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Service By :</th>
                                                                        <td>
                                                                            
                                                                            <?php $query = mysqli_query($conn, "select * from tblmechanics");
                                                                                while ($row = mysqli_fetch_array($query)) {
                                                                                ?>
                                                                                    <input type="checkbox" value="<?php echo $row['FullName']; ?>" name="serper[]"><?php echo $row['FullName']; ?></input>
                                                                                <?php } ?>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Service Charge: </th>
                                                                        <td>
                                                                            <input type="text" name="servicecharge" id="servicecharge" class="form-control wd-450">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Parts Charge: </th>
                                                                        <td>
                                                                            <input type="text" name="partcharge" id="partcharge" class="form-control wd-450">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Additional Charge: </th>
                                                                        <td>
                                                                            <input type="text" name="addcharge" id="addcharge" class="form-control wd-450">
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Admin Status :</th>
                                                                        <td>
                                                                            <select name="status" class="form-control wd-450" required="true">
                                                                                <option value="3" selected="true">Completed</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>

                                                                    <tr align="center">
                                                                        <td colspan="2"><button type="submit" name="submit-service-completed" class="btn btn-primary pd-20">Service Completed</button></td>
                                                                    </tr>
                                                                </form>
                                                            <?php } else { ?>


                                                                <table border="1" class="table table-bordered mg-b-0">
                                                                    <tr>
                                                                        <th colspan="4" style="font-size:16px;text-align:center;">Servicing Details</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Service Completion Date</th>
                                                                        <td><?php echo $row['AdminRemarkdate']; ?> </td>

                                                                        <th>Service By</th>
                                                                        <td><?php echo $row['ServiceBy']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Admin Remark</th>
                                                                        <td colspan="3"><?php echo $row['AdminRemark']; ?></td>
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

                                                                





                                                            <?php } ?>




                                                        </table>

                                                        

                                                    <?php } ?>




                                                </div>

                                                <div class="ml-auto">
<a href="invoices.php?id=<?php echo $cid; ?>">
                                                                    <td colspan="2"><input type="button" class="btn btn-primary pd-20" value="Generate Invoice" /></td>
                                                                    </a>
        
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