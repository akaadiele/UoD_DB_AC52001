<?php
// Include the database connection
include "db.php";
// Check that a form has been submitted
if (isset($_POST['submit'])) {
    $stmt = $mysql->prepare("INSERT INTO Students (Firstname, Surname)
VALUE (:Firstname, :Surname)");
    $stmt->bindParam(":Firstname", $firstname);
    $stmt->bindParam(":Surname", $surname);
    // Insert one row
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $stmt->execute();
} else {
    // Error handling
}
