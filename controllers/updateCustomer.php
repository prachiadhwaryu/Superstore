
<?php
include '../config/dbConnection.php';
$customer_id = $_POST['customer_id'];
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
//$newsletter = isset($_POST["newsletter"]) ? "Y" : "N";
//$remarks = isset($_POST["remarks"])?$_POST["remarks"]:"";

/* Attempting to insert query execution -- Starts */
$sql = "update customer_master set first_name='$first_name', last_name='$last_name', date_of_birth='$dob', gender='$gender', phone_no='$phone_no', email_id='$email', address1='$address', city='$city', province='$province', postal_code='$postal_code' where customer_id = $customer_id";

if(mysqli_query($link, $sql)){
echo "<script>alert('Customer Updated Successfully'); document.location='../views/viewCustomers.php';</script>";    // Displays successful message after inserting the record
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);  // Displays execution error while inserting a record in the table
}


    
 // Close connection
 mysqli_close($link);

?>