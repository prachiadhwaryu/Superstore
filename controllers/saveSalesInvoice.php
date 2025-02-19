
<?php
include __DIR__ . '/config/dbConnection.php';

$first_name = $_POST["firstName"];
$last_name = $_POST["lastName"];
$gender = $_POST["gender"];
$company_name = $_POST["companyName"];
$phone_no = $_POST["phoneNo"];
$email = $_POST["email"];

/* Attempting to insert query execution -- Starts */
$sql = "INSERT INTO supplier_master (first_name, last_name, gender, company_name, phone_no, email_id)  
VALUES ('$first_name', '$last_name', '$gender', '$company_name', '$phone_no', '$email')";  // No need to define value for "ID" as it is set as auto-increment

if(mysqli_query($link, $sql)){
echo "Records inserted successfully.";  // Displays successful message after inserting the record
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);  // Displays execution error while inserting a record in the table
}


    
 // Close connection
 mysqli_close($link);

 header("location: addSupplier.php");
?>