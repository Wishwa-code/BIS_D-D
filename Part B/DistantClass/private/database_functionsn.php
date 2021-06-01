<?php

//Defining DB connect function to connect to database server and get the database connection to $database variable
function db_connect() {
	$database = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);  //create the object $connection
	confirm_db_connect($database);

	// this function returns the object $connection with the database
	return $database; 
	}

//defining confirm_db_connect fuctions with database paramater to confirm the connection with database or show whats the errors if theres any	
function confirm_db_connect($database) {
	
	if($database->connect_errno==0) {
		//echo "Connection to DB succeed.<br>";	
		//This area can use to give output to user if the connection with database is succesfull
	}
	
	if($database->connect_errno>0) {

		// This message print if theres any error or errors with relevent error numbers.
		$msg = "Database connection failed: ";
		$msg .= $database->connect_error;
		$msg .= " (" . $database->connect_errno . ")";
		echo $msg;
		echo "<br>";	
	}
	}
	
?>