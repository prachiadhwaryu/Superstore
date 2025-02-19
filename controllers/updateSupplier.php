
<?php
include '../config/dbConnection.php';
$supplier_id = $_POST['supplier_id'];
$first_name = $_POST["firstName"];
$last_name = $_POST["lastName"];
$gender = $_POST["gender"];
$company_name = $_POST["companyName"];
$phone_no = $_POST["phoneNo"];
$email = $_POST["email"];

/* Attempting to update query execution -- Starts */
$sql = "UPDATE supplier_master set first_name='$first_name', last_name='$last_name', gender='$gender', company_name='$company_name', phone_no='$phone_no', email_id='$email' where supplier_id=$supplier_id";  // No need to define value for "ID" as it is set as auto-increment

if(mysqli_query($link, $sql)){
echo "<script>alert('Supplier Updated Successfully'); document.location='../views/viewSuppliers.php';</script>";  
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);  // Displays execution error while inserting a record in the table
}


    
 // Close connection
 mysqli_close($link);

 
?>