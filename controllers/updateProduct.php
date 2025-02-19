
<?php
include '../config/dbConnection.php';
$product_id = $_POST["product_id"];
$product_name = $_POST["productName"];
$product_type = $_POST["productType"];
$supplier = $_POST["supplier"];
$unit_price = $_POST["unitPrice"];
$discount = $_POST["discount"];
$hst = $_POST["hst"];
$quantity = $_POST["quantity"];
$in_stock = isset($_POST["inStock"]) ? "Y" : "N";

/* Attempting to update query execution -- Starts */
$sql = "UPDATE product_master SET product_name='$product_name', product_type='$product_type', supplier_id='$supplier', unit_price='$unit_price', discount='$discount', hst='$hst', in_stock_yn='$in_stock', quantity='$quantity' where product_id=$product_id";  


if(mysqli_query($link, $sql)){
echo "<script>alert('Product Updated Successfully'); document.location='../views/viewProducts.php';</script>";  
// Displays successful message after inserting the record
} else{
echo "alert(ERROR: Could not able to execute $sql. " . mysqli_error($link);  // Displays execution error while inserting a record in the table
}
 
 // Close connection
 mysqli_close($link);

// 
?>