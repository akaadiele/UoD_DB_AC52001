<?php
	// Include the database connection
	include "db.php";
	try{
		// Create the SQL Query
		$query = "CREATE TABLE Students(
			Firstname VARCHAR(30),
			Surname VARCHAR(30)
			)";
		// Execute the query on the database
		$mysql->exec($query);
		} catch ( PDOException $e ) {
		// Any errors from the query are caught in this block
		echo $e->getMessage();
	}
?>