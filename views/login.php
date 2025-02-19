<?php

include '../config/dbConnection.php';
$tbl_name="admin"; // Table name 


// username and password sent from form 
$email=$_POST['email']; 
$password=$_POST['password']; 


$sql ="SELECT * FROM $tbl_name WHERE email_id='$email' and password='$password' LIMIT 1;";
$result = mysqli_query($link,$sql);

// MySQL count
$count = mysqli_num_rows($result);

if ($count){
	session_start();
  $_SESSION['username'] = $email; // $_SESSION['loggedin'] = true or false would work too
  header("Location: loginSuccess.php");
}else{	  
   header("Location: ../index.php?error=1");  
}
?>