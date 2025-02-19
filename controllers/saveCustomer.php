
<?php
include __DIR__ . '/config/dbConnection.php';

$first_name = $_POST["firstName"];
$last_name = $_POST["lastName"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$phone_no = $_POST["phoneNo"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$province = $_POST["province"];
$postal_code = $_POST["postalCode"];
$password = md5($_POST["password"]);
//$newsletter = isset($_POST["newsletter"]) ? "Y" : "N";
//$remarks = isset($_POST["remarks"])?$_POST["remarks"]:"";

/* Attempting to insert query execution -- Starts */
$sql = "INSERT INTO customer_master (first_name, last_name, date_of_birth, gender, phone_no, email_id, address1, city, province, postal_code, password, newsletter_yn, remarks)  
VALUES ('$first_name', '$last_name', '$dob', '$gender', '$phone_no', '$email', '$address', '$city', '$province', '$postal_code', '$password', '', '')";  // No need to define value for "ID" as it is set as auto-increment

if(mysqli_query($link, $sql)){
    // Close connection
 mysqli_close($link);
    header("Location: addCustomer.php?status=1"); // status 1 = success
} else{
    // Close connection
 mysqli_close($link);
    header("Location: addCustomer.php?status=0"); // status 0 = Error
}

?>