
<?php
include __DIR__ . '/config/dbConnection.php';

$product_name = $_POST["productName"];
$product_type = $_POST["productType"];
$supplier = $_POST["supplier"];
$unit_price = $_POST["unitPrice"];
$discount = $_POST["discount"];
$hst = $_POST["hst"];
$quantity = $_POST["quantity"];
$in_stock = isset($_POST["inStock"]) ? "Y" : "N";

/* Attempting to insert query execution -- Starts */
$sql = "INSERT INTO product_master (product_name, product_type, supplier_id, unit_price, discount, hst, in_stock_yn, quantity)  
VALUES ('$product_name', '$product_type', '$supplier', '$unit_price', '$discount', '$hst', '$in_stock', '$quantity')";  // No need to define value for "ID" as it is set as auto-increment

if(mysqli_query($link, $sql)){
    // Close connection
 mysqli_close($link);
    header("Location: addProduct.php?status=1"); // status 1 = success
} else{
    // Close connection
 mysqli_close($link);
    header("Location: addProduct.php?status=0"); // status 0 = Error
}

?>