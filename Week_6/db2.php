<?php
$host = "ac52001-database-001.cvksiv3inuw9.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "DbSystems#2024";
$database = "ac52001-database-001";
$mysql = new PDO(
    "mysql:host=" . $host . ";dbname=" . $database,
    $username,
    $password
);
echo "All done! <br>";
?>