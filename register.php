<?php

session_start();
require "./includes/config.php";


// $fname = $lname = $email = $password = $confirm_password = $errMsg = "";
// $fname_err = $lname_err = $email_err = $password_err = $confirm_password_err = "";

// if($_SERVER["REQUEST_METHOD"] == "POST"){

//   $email = $_POST["emails"];
//   $name = $_POST["name"];
//   $mobile_no = $_POST["m_no"];
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $emailErr = "Invalid email format";
//     }

//     if(preg_match("/^[a-zA-z]*$/", $name)){
//         $errMsg = "Error! You didn't enter the Name.";
//         $name_err = "Only alphabets and whitespace are allowed.";
//     }else{
//         $name_err = "Only alphabets and whitespace are allowed.";
//         $errMsg = "Only alphabets and whitespace are allowed.";
//     }

//     if(empty(trim($_POST["emails"]))){
//         $email_err = "Please enter a email.";
//     } elseif(!filter_var($_POST["emails"], FILTER_VALIDATE_EMAIL)){
//         $email_err = "Invalid email format.";
//     } else{
//         $sql = "select Email from tbluser where Email= ? || MobileNo = ?";
//         //"SELECT id FROM users WHERE email = ?";


//         if($stmt = mysqli_prepare($conn, $sql)){
//             mysqli_stmt_bind_param($stmt, "si", $param_email, $mobile_no);

//             $param_email = trim($_POST["emails"]);

//             if(mysqli_stmt_execute($stmt)){
//                 mysqli_stmt_store_result($stmt);

//                 if(mysqli_stmt_num_rows($stmt) == 1){
//                     $email_err = "This email is already exists.";
//                 } else{
//                     $email = trim($_POST["emails"]);
//                 }
//             } else{
//                 echo "Oops! Something went wrong. Please try again later1.";
//             }

//             mysqli_stmt_close($stmt);
//         }
//     }

//     if(empty(trim($_POST["password"]))){
//         $password_err = "Please enter a password.";
//     } elseif(strlen(trim($_POST["password"])) < 6){
//         $password_err = "Password must have atleast 6 characters.";
//     } else{
//         $password = trim($_POST["password"]);
//     }

//     if(empty(trim($_POST["confirm-password"]))){
//         $confirm_password_err = "Please confirm password."; 
//     } else{
//         $confirm_password = trim($_POST["confirm-password"]);
//         if(empty($password_err) && ($password != $confirm_password)){
//             $confirm_password_err = "Password did not match.";
//         }
//     }

//     echo $errMsg.$email_err.$password_err.$confirm_password_err;
//     if($errMsg == "" && $email_err == "" && $password_err == "" && $confirm_password_err == ""){

//         $sql = "insert into tbluser(FullName, MobileNo, Email,  Password) value(?, ?, ?, ?)";
//         //"INSERT INTO users (id, email, hashed_password, name) VALUES (?, ?, ?, ?)";


//         if($stmt = mysqli_prepare($conn, $sql)){

//             $param_email = $email;
//             $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

//             mysqli_stmt_bind_param($stmt, "siss", $name, $mobile_no, $param_email, $param_password, );


//             if(mysqli_stmt_execute($stmt)){
//                 header("location: login.php");
//             } else{
//                 echo "Oops! Something went wrong. Please try again later.";
//             }

//             mysqli_stmt_close($stmt);
//         }
//     }

//     mysqli_close($conn);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $mobno = $_POST['mobile'];
  $email = $_POST['emails'];
  $password = password_hash($_POST['confirm-password'], PASSWORD_DEFAULT);
  $ret = mysqli_query($conn, "select Email from tbluser where Email='$email' || MobileNo='$mobno'");
  $result = mysqli_fetch_array($ret);
  if ($result > 0) {
    $errMsg = "This email or Contact Number already associated with another account";
  } else {
    $query = mysqli_query($conn, "insert into tbluser(FullName, MobileNo, Email,  Password) value('$name', '$mobno', '$email', '$password' )");
    if ($query) {
      header("location: login.php");
    } else {
      $errMsg = "Something Went Wrong. Please try again";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>GARAGE92 | SignUp Page</title>


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
  <script type="text/javascript">
    function checkpass() {
      if (document.signup.password.value != document.signup.confirm-password.value) {
        alert('Password and Repeat Password field does not match');
        document.signup.repeatpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>

<body>
  <?php include_once('includes/header.php'); ?>

  <?php
  if (!empty($errMsg)) {
    echo '<div class="alert alert-danger">' . $errMsg . '</div>';
  }
  ?>
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid d-none d-lg-block d-xxl-none d-xxl-block" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-4">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="submit" method="post">

          <div class="form-group form-outline mb-4">
            <label class="form-label" for="name">Name:</label>
            <!-- pattern="^[a-zA-Z]+$" -->
            <input type="text" name="name" id="name" class="form-control form-control-mg" placeholder="Name" required />
            <span class="invalid-feedback">Invalid Name Format<?php //echo $name_err; 
                                            ?></span>
          </div>

          <div class="form-group form-outline mb-4">
            <label class="form-label" for="mobile">Mobile Number:</label>
            <!-- pattern="/(7|8|9)\d{9}/" -->
            <input type="tel" name="mobile" id="mobile" class="form-control form-control-mg" placeholder="Mobile Number" pattern="[0-9]{10}" required />
            <span class="invalid-feedback"><?php //echo $mobile_err; 
                                            ?></span>
          </div>

          <!-- Email input -->
          <div class="form-group form-outline mb-4">
            <label class="form-label" for="emails">Email:</label>
            <input type="email" name="emails" id="emails" class="form-control form-control-mg" value="" placeholder="Email Address" required />
            <span class="invalid-feedback">Invalid Email Address<?php //echo $email_err; 
                                            ?></span>
          </div>

          <!-- Password input -->
          <div class="form-group">
            <div class="form-group form-outline mb-3">
              <label class="form-label" for="password">Password:</label>
              <input type="password" name="password" id="password" class="form-control form-control-mg" pattern=".{6,}" placeholder="Enter password" required />
            </div>

            <div class="form-group form-outline mb-3">
              <label class="form-label" for="confirm-password">Confirm Password:</label>
              <input type="password" name="confirm-password" id="confirm-password" class="form-control form-control-mg" pattern=".{6,}" placeholder="Confirm password" required />
            </div>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2 mb-4 rounded">
            <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit" value="Sign Up">
          </div>

          <div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Footer Start -->
  <?php include_once('includes/footer.php'); ?>



  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>