<?php
// Initialize the session
session_start();

require './includes/config_admin.php';

$msg = "";

if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit-view-enquiry'])) {
        $cid = $_GET['aticid'];
        $adresp = $_POST['adminresponse'];
        $admsta = $_POST['status'];
        $query = mysqli_query($conn, "update  tblenquiry set AdminResponse='$adresp',AdminStatus='$admsta' where ID='$cid'");
        if ($query) {
            $msg = "Enquiry has been responded successfully.";
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
                    <!-- Start Page content -->
                    <div class="content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title">View Enquiry</h4>
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
                                                    $ret = mysqli_query($conn, "select * from tblenquiry join tbluser on tbluser.ID=tblenquiry.UserId where tblenquiry.ID='$cid'");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($ret)) {

                                                    ?>

                                                        <table border="1" class="table table-bordered mg-b-0">
                                                            <tr>
                                                                <th>Enquiry Number</th>
                                                                <td><?php echo $row['EnquiryNumber']; ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Full Name</th>
                                                                <td><?php echo $row['FullName']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Enquiry Type</th>
                                                                <td><?php echo $row['EnquiryType']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Description</th>
                                                                <td><?php echo $row['Description']; ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Enquiry Date</th>
                                                                <td><?php echo $row['EnquiryDate']; ?></td>
                                                            </tr>







                                                            <tr>
                                                                <th>Admin Status</th>
                                                                <td> <?php
                                                                        if ($row['AdminStatus'] == "1") {
                                                                            echo "Responded";
                                                                        }; ?></td>
                                                            </tr>
                                                        </table>




                                                        <table class="table mb-0">

                                                            <?php if ($row['AdminResponse'] == "") { ?>


                                                                <form name="submit-view-enquiry" method="post" enctype="multipart/form-data">

                                                                    <tr>
                                                                        <th>Admin Response :</th>
                                                                        <td>
                                                                            <textarea name="adminresponse" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea>
                                                                        </td>
                                                                    </tr>



                                                                    <tr>
                                                                        <th>Admin Status :</th>
                                                                        <td>
                                                                            <select name="status" class="form-control wd-450" required="true">
                                                                                <option value="1" selected="true">Responded</option>

                                                                            </select>
                                                                        </td>
                                                                    </tr>

                                                                    <tr align="center">
                                                                        <td colspan="2"><button type="submit" name="submit-view-enquiry" class="btn btn-primary pd-x-20">Submit</button></td>
                                                                    </tr>
                                                                </form>
                                                            <?php } else { ?>


                                                                <table border="1" class="table table-bordered mg-b-0">
                                                                    <tr>
                                                                        <th>Admin Response</th>
                                                                        <td><?php echo $row['AdminResponse']; ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Admin Remark date</th>
                                                                        <td><?php echo $row['AdminRemarkdate']; ?> </td>
                                                                    </tr>
                                                                </table>
                                                            <?php } ?>
                                                        </table>
                                                    <?php } ?>




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