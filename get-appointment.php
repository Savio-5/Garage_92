<?php //error_reporting(0);
session_start();

require "./includes/config.php";

if(!isset($_SESSION["sid"])){
    header("location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $query = mysqli_query($conn, "insert into tblservicerequest(UserId,Category,ServiceNumber,VehicleName,VehicleModel,VehicleBrand,VehicleRegno,ServiceDate,ServiceTime,DeliveryType,PickupAddress) value('$uid','$category','$sernumber','$vehname','$vehmodel','$vehbrand','$vehrego','$vehservicedate','$vehservicetime','$deltype','$pickupadd')");
        if ($query) {
            echo "<script>alert('Data has been added successfully.');</script>";
            echo "<script>window.location.href = get-appointment.php'</script>";
        } else {
            echo "<script>alert('Something went wrong.Please try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Service Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- <script src="lib/select2/js/select2.full.min.js"></script> -->

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pickupaddress').hide();
            $('#deltype').change(function() {
                var v = $("#deltype").val();


                if (v == 'dropservice') {
                    $('#pickupaddress').hide();
                }

                if (v == 'pickupservice') {
                    $('#pickupaddress').show();
                }
            });
        });
    </script>
    <script language="Javascript" type="text/javascript">    
    
    function allowOnlyLetters(e, t)   
    {    
       if (window.event)    
       {    
          var charCode = window.event.keyCode;    
       }    
       else if (e)   
       {    
          var charCode = e.which;    
       }    
       else { return true; }    
       if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))    
           return true;    
       else  
       {    
          alert("Please enter only alphabets");    
          return false;    
       }           
    }      
    </script> 
</head>

<body>

    <?php include_once('includes/header.php'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Service Booking</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="washing-plans.php">Price</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Price Start -->
    <div class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Service Booking</p>
                <h2>Book your Vehicle Service Now</h2>
            </div>
            <!-- <div class="row">
                <div class="col-md-6">
                    <div class="price-item featured">
                        <div class="price-header">
                            <h3>Basic Service</h3>
                            <h2><span>₹</span><strong>3000</strong><span> Rupee</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>Oil Changing</li>
                                <li><i class="far fa-check-circle"></i>Engine Checkup</li>
                                <li><i class="far fa-check-circle"></i>Sensor Checkup</li>
                                <li><i class="far fa-check-circle"></i>Vehicle Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Window Wiping</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" data-toggle="modal" data-target="#myModal1">Book Now</a>
                        </div>
                    </div>
                </div> -->
            <div class="col-md-6 ml-auto mr-auto">
                <div class="price-item featured-item">
                    <div class="price-header">
                        <h3>GARAGE92</h3>
                        <h5><span>Affordable prices for Professional Services</span></h>
                    </div>
                    <!-- <div class="price-body">
                        <ul>
                            <li><i class="far fa-check-circle"></i>Oil Changing</li>
                            <li><i class="far fa-check-circle"></i>Spark Plug Replacement</li>
                            <li><i class="far fa-check-circle"></i>Extensive Brake Inspection</li>
                            <li><i class="far fa-check-circle"></i>Filters Changing </li>
                            <li><i class="far fa-check-circle"></i>Electricle Component(e.g) battery,alternator,and Starter motor) Testing</li>
                            <li><i class="far fa-check-circle"></i>Wheel bearing and Shock absorber Inspection</li>
                            <li><i class="far fa-check-circle"></i>Free Vehicle Cleaning</li>


                        </ul>
                    </div> -->
                    <div class="price-footer">
                        <a class="btn btn-custom" data-toggle="modal" data-modal-id="myModel1" data-target="#myModal">Book Now</a>
                    </div>
                </div>
            </div>

        </div>

    </div>




    </div>
    <!-- Price End -->



    <?php include_once('includes/footer.php'); ?>


    <!-- Model2 -->



    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog rounded-0 modal-md modal-dialog-centered modal-xl" role="document" data-select2-id="13">
            <div class="modal-content  rounded-0" data-select2-id="12">
                <div class="modal-header">
                    <h5 class="modal-title">Fill the Service Request Form</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <form class="form-horizontal" role="form" method="post" name="submit">
                            <!-- Start Page content -->
                            <!-- <div class="content mr-5 ml-5"> -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-20">

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Category</label>
                                                        <div class="col-10">
                                                            <select name='category' id="category" class="form-control" required="true">
                                                                <option value="">Category</option>
                                                                <?php $link = mysqli_query($conn, "select * from tblcategory");
                                                                while ($row = mysqli_fetch_array($link)) {
                                                                ?>
                                                                    <option value="<?php echo $row['VehicleCat']; ?>"><?php echo $row['VehicleCat']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Vehicle Name</label>
                                                        <div class="col-10">
                                                            <input type="text" id="vehiclename" name="vehiclename" class="form-control" placeholder="Vehicle Name"  onkeypress="return allowOnlyLetters(event,this);" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Vehicle Model</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="vehilemodel" id="vehilemodel" pattern="[0-9]{4}" placeholder="Year" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Vehicle Brand</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="Brand" name="vehiclebrand" id="vehiclebrand"  onkeypress="return allowOnlyLetters(event,this);" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Vehicle Registration Number</label>
                                                        <div class="col-10">
                                                            <!-- <input type="text" class="form-control" name="vehicleregno" id="vehicleregno" pattern="[A-Za-z]{2}-[0-9]{2}-[0-9]{4}" required="true"> -->
                                                            <input type="text" class="form-control" name="vehicleregno" id="vehicleregno" placeholder="Example DL-01-XL-1234,DL-01-X-1234"  pattern="^[A-Za-z]{2,3}(-\d{2}(-[A-Za-z]{1,2})?)?-\d{3,4}$" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Service Date</label>
                                                        <div class="col-10">
                                                            <input type="date" class="form-control" name="servicedate" id="servicedate" min="<?php echo date("Y-m-d"); ?>" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Service Time</label>
                                                        <div class="col-10">
                                                            <input type="time" class="form-control" name="servicetime" id="servicetime" min="08:00" max="18:00" required="true">
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
                                                                I accept <a href="#" class="text-custom" target="_blank">Terms and Conditions</a>
                                                            </label>
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">

                                                        <div class="col-12">
                                                            <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                    </div> <!-- end card-box -->
                                </div><!-- end col -->
                            </div>
                            <div class="w-100 d-flex justify-content-end mx-2">
                                <div class="col-auto">
                                    <!-- <input type="submit" class="btn btn-primary btn-sm rounded-0" value="Submit Request"> -->
                                    <!-- <button class="btn btn-primary btn-sm rounded-0">Submit Request</button> -->
                                    <button class="btn btn-dark btn-sm rounded-0" type="button" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>


