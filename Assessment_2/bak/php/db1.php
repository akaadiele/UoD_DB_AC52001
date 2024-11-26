<?php
$host = "localhost";
$username = "admin";
$password = "FutureFit#LocalDB";

// Create connection
$mysql = new mysqli($host, $username, $password);

// Check connection
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
} else {
    echo "Connected successfully";
}
