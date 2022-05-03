<?php 
require('config.php');
require_once './razorpay-php/Razorpay.php';
session_start();
use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$invoiceId = 'inv_JOkf87O1SgwRW2';

$result = $api->invoice->fetch($invoiceId);

$res1 = $result['amount_due'];

// echo $res1;

// if($res1 == 0){
//     echo "Paid";
// }

echo var_dump($result);

?>