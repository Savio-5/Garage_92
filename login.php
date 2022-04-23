<?php
// Initialize the session
session_start();

require "./admin/includes/config_admin.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $emailcon=$_POST['email'];
    $password=$_POST['password'];
    $query=mysqli_query($conn,"select ID, Password from tbluser where  (Email='$emailcon' || MobileNo='$emailcon')");
    $ret=mysqli_fetch_array($query);
    if(!empty($ret['Password'])){
        $pass = $ret['Password'];
        if(password_verify($password, $pass)){
          if($ret>0){
          $_SESSION['sid']=$ret['ID'];
         header('location:index.php');
        }else{
        $msg="Invalid Details.";
        }
        }
    }
    
    
  }

// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//   header("location: index.php");
//   exit;
// }


// require_once "./admin/includes/config_admin.php";


// $email = $password = "";
// $email_err = $password_err = $login_err = "";


// if ($_SERVER["REQUEST_METHOD"] == "POST") {


//   if (empty(trim($_POST["email"]))) {
//     $email_err = "Please enter email.";
//   } else {
//     $email = trim($_POST["email"]);
//   }


//   if (empty(trim($_POST["password"]))) {
//     $password_err = "Please enter your password.";
//   } else {
//     $password = trim($_POST["password"]);
//   }


//   if (empty($email_err) && empty($password_err)) {

//     $sql = "SELECT id, email, name, hashed_password FROM users WHERE email = ?";

//     if ($stmt = mysqli_prepare($link, $sql)) {

//       mysqli_stmt_bind_param($stmt, "s", $param_email);


//       $param_email = $email;


//       if (mysqli_stmt_execute($stmt)) {

//         mysqli_stmt_store_result($stmt);


//         if (mysqli_stmt_num_rows($stmt) == 1) {

//           mysqli_stmt_bind_result($stmt, $id, $email, $name, $hashed_password);
//           if (mysqli_stmt_fetch($stmt)) {
//             if (password_verify($password, $hashed_password)) {

//               session_start();


//               $_SESSION["loggedin"] = true;
//               $_SESSION["id"] = $id;
//               $_SESSION["username"] = $name;
//               $_SESSION["email"] = $email;


//               header("location: index.php");
//             } else {

//               $login_err = "Invalid email or password.";
//             }
//           }
//         } else {

//           $login_err = "Invalid email or password.";
//         }
//       } else {
//         echo "Oops! Something went wrong. Please try again later.";
//       }


//       mysqli_stmt_close($stmt);
//     }
//   }

// }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GARAGE92 | Login Page</title>


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
    <?php include_once('includes/header.php');?>


    <?php
  if (!empty($msg)) {
    echo '<div class="alert alert-danger">' . $msg . '</div>';
  }
  ?>

  <div class="container-fluid h-custom mt-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid d-none d-lg-block d-xxl-none d-xxl-block" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          <div class="form-group form-outline mb-4">
            <label class="form-label" for="email">Email address</label>
            <input type="email" id="email" name="email" class="form-control form-control-lg <?php //echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $email; ?>" placeholder="Enter a valid email address" required />
            <span class="invalid-feedback"><?php //echo $email_err; ?></span>
          </div>

          <div class="form-group form-outline mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter password" required />
            <span class="invalid-feedback"><?php //echo $password_err; ?></span>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              
              <input class="form-check-input me-2" type="checkbox" value="" id="remember-me" />
              <label class="form-check-label" for="remember-me">
                Remember me
              </label>

            </div>
            <a href="update-password/" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg rounded" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login" />
            </div>
          </div>
          <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./register.php">Sign up now</a>.</p>
      </div>

      </form>
    </div>
  </div>
  </div>

        <!-- Footer Start -->
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

