<?php
// --------------------------------------------
// --------------------------------------------
// Variables Declaration

// // localhost connections
// $host = "localhost";
// $username = "admin";
// $password = "futurefit";
// $database = "futurefit-db";

// AWS Connections
$host = "futurefit-db.ctgqwu88o7b4.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "adminpassword";
$database = "futurefit-db";

// --------------------------------------------
// --------------------------------------------

// With mysqli
// Create connection
$mysql = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
} 
// else {
//     echo "Connected successfully";
// }

// --------------------------------------------
// --------------------------------------------

?>
