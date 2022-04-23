<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
 

require_once 'vendor/autoload.php';
 
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
 
//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
 
$mail->SMTPAuth = true;
$mail->AuthType = 'XOAUTH2';

$email = 'garage.9ne2@gmail.com'; // the email used to register google app
$clientId = '67816791232-nor1qi3iqtgcnvro98bhhv4kp7em567u.apps.googleusercontent.com';
$clientSecret = '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';
$refreshToken = '1//0gJN4H3HIV-EVCgYIARAAGBASNwF-L9IrRXge3Gm_8o8tmEOFL3pY38QGKRhavX1GvdEMgwKFluStOYPsU6hrhoCyFnw5J6ighG4';
 

//Create a new OAuth2 provider instance
$provider = new Google(
    [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);
 
//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email,
        ]
    )
);

// $mail->FromName   ='GARAGE92';
//     $mail->AddAddress($emailId);
//     $mail->Subject    =  $subject;
//     $mail->IsHTML(true);
//     $mail->Body       = "hello";
//     if($mail->Send())
//     {
//       echo "Check Your Email and Click on the link sent to your email";
//     }
//     else
//     {
//       echo "Mail Error - >".$mail->ErrorInfo;
//     }