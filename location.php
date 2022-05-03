<?php error_reporting(0);
session_start();


include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GARAGE92 | Location</title>


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

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>

    <body>
        <!-- Top Bar Start -->
<?php include_once('includes/header.php');?>
        
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Our Garage location</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="location.php">Location</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-header text-left">
                            <p>you can visit our Garage</p>
                            <h2>our location</h2>
                        </div>
                        <div class="row">
                              
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15381.614704587597!2d73.83927712135156!3d15.462703828128179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfbf5139b55ca5%3A0x9562971f589c401c!2sCabesa%20Ward%2C%20St%20Cruz%2C%20Goa%20403202!5e0!3m2!1sen!2sin!4v1651076213527!5m2!1sen!2sin" width="1620" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           
                
                        
                          </div>
                    </div>
           
                </div>
            </div>
        </div>
        <!-- Location End -->
        
        
<?php include_once('includes/footer.php');?>

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