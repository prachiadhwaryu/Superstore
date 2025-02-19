<?php

/* Binding the database properties with its values -- Starts */

$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$db = getenv('DB_NAME') ?: 'superstore';
/* Binding the database properties with its values -- Ends */

/* Attempting to connect to MySQL database with property names defined above */ 
$link = new mysqli($host, $user, $pass, $db);
 
// Checking whether the connection is established successfully or not
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());  // Notifies the connection error and exits the program
}
?>