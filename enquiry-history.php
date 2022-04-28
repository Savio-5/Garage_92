<?php
session_start();
require "./includes/config.php";

$msg = "";
if (strlen($_SESSION['sid'] == 0)) {
    header('location:logout.php');
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
    </head>

    <body>

        <?php include('./includes/header.php') ?>

        <!-- Start Page content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Enquiry History</h4>
                            <p class="text-muted m-b-30 font-14">

                            </p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">

                                        <table class="table table-bordered mg-b-0">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Enquiry Number</th>
                                                    <th>Enquiry Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $enid = $_SESSION['sid'];
                                            $rno = mt_rand(10000, 99999);
                                            $ret = mysqli_query($conn, "select * from  tblenquiry where UserId=$enid");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {

                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['EnquiryNumber']; ?></td>
                                                        <td><?php echo $row['EnquiryDate']; ?></td>
                                                        <td><a href="enquiry-view.php?ticid=<?php echo base64_encode($row['ID'] . $rno); ?>">View Detail</a></td>
                                                    </tr>
                                                <?php
                                                $cnt = $cnt + 1;
                                            } ?>

                                                </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box -->
                    </div><!-- end col -->
                </div>
            </div> <!-- container -->

        </div> <!-- content -->
        <?php include('./includes/footer.php') ?>



        <!-- JavaScript Libraries -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
        <script src="./lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="./lib/waypoints/waypoints.min.js"></script>
        <script src="./lib/counterup/counterup.min.js"></script>


        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

    </html>

<?php } ?>