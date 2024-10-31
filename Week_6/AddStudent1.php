<?php
	// Include the database connection
	include "db.php";
	// Create the prepared statement
	// This method helps protect against SQL Injections
	// Also, if you are inserting many rows into a table, you can
	// prepare a statement once and use it many times
	$stmt = $mysql->prepare("INSERT INTO Students (Firstname, Surname)
	VALUE (:Firstname, :Surname)");
	$stmt->bindParam(":Firstname", $firstname);
	$stmt->bindParam(":Surname", $surname);
	// Insert one row
	$firstname = "Jane";
	$surname = "Doe";
	$stmt->execute();
	// Insert second row
	$firstname = "Frankie";
	$surname = "Smith";
	$stmt->execute();
?>