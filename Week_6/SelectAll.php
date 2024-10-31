<?php
// Include the database connection
include 'db.php';
$query = "SELECT * FROM Students";
$stmt = $mysql->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['Firstname'] . $row['Surname'] . "<br>";
}
