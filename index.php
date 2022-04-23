<?php //error_reporting(0);
session_start();

include('includes/config.php');

// if(isset($_POST['book']))
// {
// $ptype=$_POST['vehicleType'];
// $wpoint=$_POST['washingpoint'];   
// $fname=$_POST['fname'];
// $mobile=$_POST['contactno'];
// $date=$_POST['serviceDate'];
// $time=$_POST['servicetime'];
// $message=$_POST['message'];
// $status='New';
// $bno=mt_rand(100000000, 999999999);

// $sql="INSERT INTO servicebooking(bookingId,vehicleType,servicePoint,fullName,mobileNumber,serviceDate,servicetime,message,status) VALUES(?,?,?,?,?,?,?,?,?)";

// $stmt = mysqli_prepare($conn, $sql);

// mysqli_stmt_bind_param($stmt,"isisissss", $bno, $ptype, $wpoint, $fname, $mobile, $date, $time,$message, $status);

// mysqli_stmt_execute($stmt);


// if(mysqli_stmt_insert_id($stmt))
// {
 
//   echo '<script>alert("Your booking done successfully. Booking number is "+"'.$bno.'")</script>';
//  echo "<script>window.location.href ='washing-plans.php'</script>";
// }
// else 
// {
//  echo "<script>alert('Something went wrong. Please try again.');</script>";
// }

// }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GARAGE92 | Home Page</title>


        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"> -->

        <!-- <link href="lib/flaticon/font/flaticon.css" rel="stylesheet"> -->
        <!-- <link href="lib/animate/animate.min.css" rel="stylesheet"> -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
<?php include_once('includes/header.php');?>

        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-4.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Car Services</h3>
                            <h1>Keep your Car serviced</h1>
                       
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-6.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Car Services</h3>
                            <h1>Quality Service for you</h1>
                      
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-5.jpeg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Car Services</h3>
                            <h1>Overall Checkup</h1>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        
        
	</body>
        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/about.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>Garage 92</h2>
                        </div>
                        <div class="about-content">
                            <p>
                            Welcome to Garage 92, your number one source for all Vehicle services. We're dedicated to giving you the very best of services, with a focus on dedication,on time services, and expertise mechanics,affortable price Founded in 2015 by Arif.....


                            </p>
                            
                            <a class="btn btn-custom" href="about.php">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2>Premium car Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-service-2"></i>
                            <h3>Vehicle Servicing</h3>
                        </div>
                    </div>
                   
                    
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-wash"></i>
                            <h3>Oil Changing</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-brush-1"></i>
                            <h3>Brake Reparing</h3>
                        </div>
                        <div class="section-header text-center">
                    <p>and many more</p>
                   
                </div>
               </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        
        <!-- Facts Start -->
        <!-- <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">3</h3>
                                <p>branches</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-user"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">50</h3>
                                <p>Engineers & Workers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-users"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">1500</h3>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Facts End -->
        
        
        
        


        <!-- Footer Start -->
   <?php include_once('includes/footer.php');?>
        

        <!-- JavaScript Libraries -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        
        <!-- Contact Javascript File -->
        <!-- <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script> -->

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

