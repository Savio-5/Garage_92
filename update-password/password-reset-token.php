<?php
session_start();

if(isset($_SESSION["sid"])){
  header("location: ./index.php");
  exit;
}

if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    require("../includes/config.php");
    
    $emailId = $_POST['email'];
    $result = mysqli_query($conn,"SELECT * FROM tbluser WHERE email='" . $emailId . "'");
    $row= mysqli_fetch_array($result);
  if($row)
  {
    
     $token = md5($emailId).rand(10,9999);
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
    $expDate = date("Y-m-d H:i:s",$expFormat);
    $update = mysqli_query($conn,"UPDATE tbluser set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
    

    $output='<p>Dear user,</p>';
    $output.='<p>Please click on the following link to reset your password.</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.="<p><a href='".$url."update-password/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a></p>";		
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>Please be sure to copy the entire link into your browser.The link will expire after 1 day for security reason.</p>';
    $output.='<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>';   	
    $output.='<p>Thanks,</p>';
    $output.='<p>GARAGE92 Team</p>';
    $body = $output; 
    $subject = 'Reset Password';
    

    require("../includes/email.php");

    $mail->FromName   ='GARAGE92';
    $mail->AddAddress($emailId);
    $mail->Subject    =  $subject;
    $mail->IsHTML(true);
    $mail->Body       = $body;
    if($mail->Send())
    {
      echo "<script>alert('Check Your Email and Click on the link sent to your email.');</script>";
      echo "<script>window.location.href = index.php'</script>";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "<script>alert('Invalid Email Address. Go back');</script>";
  }
}
?>

