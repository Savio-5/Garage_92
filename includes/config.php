<?php 
// DB credentials.
// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','5@Vio123');
// define('DB_NAME','servicedb');
// Establish database connection.

$conn = mysqli_connect("localhost", "root", "5@Vio123", "servicedb");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>