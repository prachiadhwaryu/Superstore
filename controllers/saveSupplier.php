
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
    // Close connection
 mysqli_close($link);
    header("Location: addSupplier.php?status=1"); // status 1 = success
} else{
    // Close connection
 mysqli_close($link);
    header("Location: addSupplier.php?status=0"); // status 0 = Error
}

?>