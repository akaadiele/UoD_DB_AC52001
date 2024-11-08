<?php

// --------------------------------------------
// --------------------------------------------
// Variables Declaration

// local host connections
$DB_host = "localhost";
$DB_username = "admin";
$DB_password = "futurefit";
$DB_database = "futurefit-db";

// // AWS Connections - Aka
// $DB_host = "futurefit.cvksiv3inuw9.us-east-1.rds.amazonaws.com";
// $DB_username = "admin";
// $DB_password = "FutureFit#101";
// $DB_database = "FutureFit";

// // AWS Connections - Rosie
// $DB_host = "futurefit-db.cbdqpknj7clb.us-east-1.rds.amazonaws.com";
// $DB_username = "admin";
// $DB_password = "futurefit";
// $DB_database = "futurefit-db";

// --------------------------------------------
// --------------------------------------------

// Create connection With mysqli
$mysql = new mysqli($DB_host, $DB_username, $DB_password, $DB_database);

// Check connection
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
} 
// else {
//     echo "Connected successfully";
// }

// --------------------------------------------
// --------------------------------------------

// Create connection With PDO
// $mysql = new PDO("mysql:host=".$DB_host.";dbname=".$DB_database,$DB_username, $DB_password);
// echo "All done! <br>";

// try {
//     $mysql = new PDO("mysql:host=" . $DB_host . ";dbname=" . $DB_database, $DB_username, $DB_password);
//     // set the PDO error mode to exception
//     $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>
