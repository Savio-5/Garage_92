<?php
session_start();

if(isset($_SESSION["sid"])){
  header("location: http://localhost/Garage92/logout.php");
  exit;
}

if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
  require("../admin/includes/config_admin.php");
  
  $emailId = $_POST['email'];
  $token = $_POST['reset_link_token'];
//   echo $emailId."<br/>";
//   echo $token."<br/>";
  //echo $emailId;
  
  $pass = $_POST['password'];
  $password = password_hash($pass, PASSWORD_DEFAULT);
//   echo $password;
  
  $query = mysqli_query($conn,"SELECT * FROM `tbluser` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
   $row = mysqli_num_rows($query);
   if($row){
      //echo "UPDATE `users` set `hashed_password`='".$password."', reset_link_token='NULL' ,exp_date='NULL' WHERE email='".$emailId."'";
       mysqli_query($conn,"UPDATE `tbluser` set `Password`='".$password."', reset_link_token=null ,exp_date=null WHERE email='".$emailId."'");
       echo "<script>alert(Congratulations! Your password has been updated successfully.);</script>";
      echo "<script>window.location.href ='./login.php'</script>";
   }else{
      // echo "<p>Something goes wrong. Please try again</p>";
      echo "<script>alert(Something gone wrong. Please try again.);</script>";
      echo "<script>window.location.href ='index.php'</script>";
      
   }
   
}
//mysqli_close($link);
?>