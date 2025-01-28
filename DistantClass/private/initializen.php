<?php

//finally this php file connect database with the php class after setting all initial data 
//in any php file which are willing to use tutor class to access database, this file will be called to intialize the connection with database  

//sets the credenitials required to call mysqli functions
require_once('credentialsn.php'); 

//load the defined functions to connect to database which contains the mysli functions with the given credentials for database, 
//Establish connection with database and store it in database variable or show if theres any errors in the connection using connect_errno php function which is defined confimr_db_connect function
require_once('database_functionsn.php'); 

//in class tutor php file i have inserted all the details required to create a object from database record and all other functions required to interact with database 
//by loading following file user will be able to use any defined php function in class_tutor.php to interact with database  
require_once('class_tutor.php'); 

// calls the db_connect function which is loaded from database functions.php file and store the return value which is database connection in $database variable 
$database = db_connect(); 

//calling set database functions in class_tutor.php to set $database variable in tutor class to database connection
//after below stop user will be able to access database within tutor class
Tutor::set_database($database); 

?>