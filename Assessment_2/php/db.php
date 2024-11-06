<?php
// --------------------------------------------
// --------------------------------------------
// Variables Declaration

// local host connections
// $host = "localhost";
// $username = "admin";
// $password = "FutureFit#LocalDB";
// $database = "futurefitlocaldb";

// // AWS Connections - Aka
$host = "futurefit.cvksiv3inuw9.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "FutureFit#101";
$database = "FutureFit";

// // AWS Connections - Rosie
// $host = "futurefit-db.cbdqpknj7clb.us-east-1.rds.amazonaws.com";
// $username = "admin";
// $password = "futurefit";
// $database = "futurefit-db";

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

// *** With PDO
// $mysql = new PDO("mysql:host=".$host.";dbname=".$database,$username, $password);
// echo "All done! <br>";

// try {
//     $mysql = new PDO("mysql:host=" . $host . ";dbname=" . $database, $username, $password);
//     // set the PDO error mode to exception
//     $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>
