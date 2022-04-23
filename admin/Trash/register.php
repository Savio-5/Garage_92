<?php
// Include config file
require "./config.php";

// Define variables and initialize with empty values

$fname = $lname = $email = $password = $confirm_password = $errMsg = "";
$fname_err = $lname_err = $email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $user = $_POST["user"];
  $fname =$_POST["fname"];
  $lname =$_POST["lname"];

  if($fname == "" && $lname == ""){
    $errMsg = "Error! You didn't enter the Name.";
}elseif(preg_match("/^[a-zA-z]*$/", $fname) && preg_match("/^[a-zA-z]*$/", $lname)){
    $name = $fname." ".$lname;
}else{
    $fname_err = "Only alphabets and whitespace are allowed.";
    $lname_err = "Only alphabets and whitespace are allowed.";
    $errMsg = "Only alphabets and whitespace are allowed.";
}
 
    // Validate Email
    if(empty(trim($_POST["user"]))){
        $user_err = "Please enter a Username.";
    } elseif(!preg_match("/^[a-zA-z]*$/", $user)){
        $user_err = "Only alphabets and whitespace are allowed.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM admin WHERE user = ?";

        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user);
            
            // Set parameters
            $param_user = trim($_POST["user"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $user_err = "This username is already exists.";
                } else{
                    $user = trim($_POST["user"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later1.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm-password"]))){
        $confirm_password_err = "Please confirm password."; 
    } else{
        $confirm_password = trim($_POST["confirm-password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    //echo $errMsg.$user_err.$password_err.$confirm_password_err;
    // Check input errors before inserting in database
    if($errMsg == "" && $fname == "" && $lname == "" && $user_err == "" && $password_err == "" && $confirm_password_err == ""){

        // Prepare an insert statement
        $sql = "INSERT INTO tbladmin (id, AdminName, AdminuserName, Email, Passwword) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            // Set parameters
            $_id = uniqid(rand(10,99));
            $param_user = $user;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $_id, $param_user, $name, $param_password);
            
                       
            // echo $user."<br>".$param_password."<br>".$_id."<br>".$name."<br>".$sql."<br>";

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
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
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="row mb-3">
                                                
                                                <div class="col-md-6 form-group">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control form-label" id="inputFirstName" name="fname" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputFirstName">First name</label>
                                                        <span class="invalid-feedback"><?php echo $fname_err; ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <div class="form-floating">
                                                        <input class="form-control form-label" id="inputLastName" name="lname" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputLastName">Last name</label>
                                                        <span class="invalid-feedback"><?php echo $lname_err; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><a class="btn btn-primary btn-block" href="login.html">Create Account</a></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
