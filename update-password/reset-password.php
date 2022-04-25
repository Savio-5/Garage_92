<?php
session_start();

if(isset($_SESSION["sid"])){
  header("location: ./index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GARAGE92 | Reset Password</title>


        <!-- Favicon -->
        <link href="../img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="../lib/animate/animate.min.css" rel="stylesheet">
        <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>

    <body>
    <?php include_once('../includes/user/header.php');?>


    <div class="container mt-5">
          <div class="card">
            <div class="card-header text-center">
              Reset Password
            </div>
            <div class="card-body">
          <?php
            if($_GET['key'] && $_GET['token'])
            {
              require("../includes/config.php");
              
              $email = $_GET['key'];
              $token = $_GET['token'];
              $query = mysqli_query($conn,
              "SELECT * FROM `tbluser` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
              );
              $curDate = date("Y-m-d H:i:s");
              if (mysqli_num_rows($query) > 0) {
               $row= mysqli_fetch_array($query);
              if($row['exp_date'] >= $curDate){ ?>
              <form action="update-forgot-password.php" method="post">
                <input type="hidden" name="email" value="<?php echo $email;?>">
                <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name='password' id="password" class="form-control">
                </div>                
                <div class="form-group">
                  <label for="cpassword">Confirm Password</label>
                  <input type="password" name='cpassword' id="cpassword" class="form-control">
                </div>
                <input type="submit" name="new-password" class="btn btn-primary">
              </form>
            <?php } } else{
                echo "<script>alert('This forget password link has been expired.');</script>";
      echo "<script>window.location.href ='index.php'</script>";
              }
            }
            ?>
            </div>
          </div>
      </div>

        <!-- Footer Start -->
    <?php include_once('../includes/user/footer.php');?>

    

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="../lib/easing/easing.min.js"></script>
        <!-- <script src="../lib/owlcarousel/owl.carousel.min.js"></script> -->
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/counterup/counterup.min.js"></script>

        <!-- Template Javascript -->
        <script src="../js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

