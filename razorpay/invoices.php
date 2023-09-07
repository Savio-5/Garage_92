<?php

require('config.php');
require_once './razorpay-php/Razorpay.php';
session_start();

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$invoice = array(
  'type' => 'invoice',
  'description' => $_POST['invoice-description'],
  'partial_payment' => false,
  'customer' =>
  array(
    'name' => $_POST['receiver-name'],
    'contact' => $_POST['receiver_phone-no'],
    'email' => $_POST['receiver_email'],
    'billing_address' =>
    array(
      'line1' => 'Cabesa Ward St Cruz',
      'zipcode' => '403005',
      'city' => 'Panjim',
      'state' => 'Goa',
      'country' => 'in',
    ),
  ),
  'line_items' =>
  array(
    0 =>
    array(
      'name' => $_POST['item_name'],
      'description' => $_POST['item_description'],
      'amount' => $_POST['item_amount'] * 100,
      'currency' => 'INR',
      'quantity' => $_POST['item_quantity'],
    ),
  ),
  'sms_notify' => 1,
  'email_notify' => 1,
  'currency' => 'INR',
);


if (isset($_POST['draft-invoice'])) {
  if ($_POST['draft-invoice'] == "1") {
    $invoice['draft'] = intval($_POST['draft-invoice']);
  }
}




$result = $api->invoice->create($invoice);

$res =  $result['id'];

// echo var_dump($result);

require('../includes/config.php');

// $res = mysqli_query($conn, "select * from tblservicerequest join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.ServiceNumber='$sernum'");
// $row = mysqli_fetch_array($res);

if (isset($_POST['service_num'])) {
  $res = mysqli_query($conn, "UPDATE tblservicerequest
SET invoice_id = '$res'
WHERE ServiceNumber='$sernum'");
}



// $row = mysqli_fetch_array($res);


echo var_dump($result);
// echo $res;