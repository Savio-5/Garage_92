<?php 
include ('define.php');

// Establish database connection.

$conn = mysqli_connect("localhost", "root", "5@Vio123", "vsmsdb2");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
