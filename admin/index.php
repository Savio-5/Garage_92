<?php
// Initialize the session
session_start();

require './includes/config_admin.php';

$msg = "";

if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
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
        <div class="container-fluid px-4">



            <div class="content-wrapper">

                <h1 class="mt-4">CAR SERVICE MANAGEMENT SYSTEM</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>



                <!-- <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Total Bookings</span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="http://localhost/Garage92/admin/?page=booking/all-bookings">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Completed Bookings</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="http://localhost/Garage92/admin/?page=booking/completed-booking">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">New Bookings</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="http://localhost/Garage92/admin/?page=booking/new-booking">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Enquiries</span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="http://localhost/Garage92/admin/?page=manage-enquiries">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
             <!-- Start Page content -->
               
             <div class="content">

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Account Overview</h4>

                <div class="row">
                    <!-- <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right"> -->
<?php //$query=mysqli_query($conn,"Select * from tbluser");
//$usercount=mysqli_num_rows($query);
?>

<!-- <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
data-fgColor="#0acf97" value="" data-skin="tron" data-angleOffset="180"
data-readOnly=true data-thickness=".2"/> -->
<!-- <label><?php //echo $usercount;?></label> -->
                            <!-- </div>
                            <div class="widget-chart-two-content">

                                <p class="text-muted mb-0 mt-2">Total Registered User</p>
                                
                            </div>

                        </div> -->
                    <!-- </div> -->

                    <!-- <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right"> -->
                                <?php //$query1=mysqli_query($conn,"Select * from tblenquiry");
//$enqcount=mysqli_num_rows($query1);
?>
                                <!-- <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#f9bc0b" value="" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".2"/> -->
                                       <!-- <label><?php //echo $enqcount;?></label>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Total Enquiry</p>
                                
                            </div>

                        </div>
                    </div> -->

<div class="col-sm-6 col-lg-6 col-xl-3">
<div class="card-box mb-0 widget-chart-two">
<div class="float-right">
<?php $query2=mysqli_query($conn,"Select * from tblmechanics");
$meccount=mysqli_num_rows($query2);
?>
                                <!-- <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#f1556c" value="" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".2"/> -->
                                       <label><?php echo $meccount;?></label>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Total Mechanics</p>
                                
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right">
                                <?php $query3=mysqli_query($conn,"Select * from tblservicerequest");
$sercount=mysqli_num_rows($query3);
?>
                                <!-- <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#2d7bf4" value="" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".2"/> -->
                                       <label><?php echo $sercount;?></label>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Total Service Requests</p>
                                
                            </div>

                        </div>
                    </div>





                </div>
                <!-- end row -->



<div class="row">
                 

     

   

                    <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right">
<?php $query31=mysqli_query($conn,"Select * from tblservicerequest where AdminStatus is null");
$newrequest=mysqli_num_rows($query31);
?>
                                <!-- <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#2d7bf4" value="" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".2"/> -->
                                       <label><?php echo $newrequest;?></label>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">New Service Requests</p>
                                
                            </div>

                        </div>
                    </div>



<div class="col-sm-6 col-lg-6 col-xl-3">
<div class="card-box mb-0 widget-chart-two">
<div class="float-right">
<?php $query32=mysqli_query($conn,"Select * from tblservicerequest where AdminStatus='2'");
$rejectedrequest=mysqli_num_rows($query32);
?>
                                <!-- <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#f1556c" value="" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".2"/> -->
                                       <label><?php echo $rejectedrequest;?></label>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Rejected Service Requests</p>
                                
                            </div>

                        </div>
                    </div>


<div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right">
<?php $query33=mysqli_query($conn,"Select * from tblservicerequest where AdminStatus='3'");
$compsercount=mysqli_num_rows($query33);
?>
                            <!-- <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#0acf97" value="" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".2"/> -->
                                       <label><?php echo $compsercount;?></label>
                            </div>
                            <div class="widget-chart-two-content">

                                <p class="text-muted mb-0 mt-2">Completed Services </p>
                                
                            </div>

                        </div>
                    </div>


                </div>











            </div>
        </div>
    </div>
    <!-- end row -->



   
    <!-- end row -->


    
    <!-- end row -->




</div> <!-- container -->

</div> <!-- content -->
        </div>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; GARAGE92 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <?php include('./includes/footeradmin.php'); ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
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