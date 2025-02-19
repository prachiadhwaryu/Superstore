<?php
include '../config/dbConnection.php';

$supplier = $_POST["supplier"];
$total = trim($_POST["total"], '$');
$finalMargin = trim($_POST["finalMargin"], '$');
$tax = trim($_POST["tax"], '$');
$finalAmount = trim($_POST["finalAmount"], '$');
$paymentType = $_POST["paymentType"];

/* Attempting to insert query execution -- Starts */
$sql = "INSERT INTO purchase_invoice_details (supplier_id)  
VALUES ('$supplier')";  // No need to define value for "ID" as it is set as auto-increment

if(mysqli_query($link, $sql)){
    $invoice_id = mysqli_insert_id($link);

    $sql = "INSERT INTO purchase_invoice_payment_details (invoice_id, total_amount, total_margin, total_tax, invoice_amount, payment_type)
    VALUES ('$invoice_id', '$total', '$finalMargin', '$tax', '$finalAmount', '$paymentType')";

    $product_id = $_POST["product"];
    $unit_Price = $_POST["unitPrice"];
    $margin = $_POST["margin"];
    $hst = $_POST["hst"];
    $quantity = $_POST["quantity"];
    $item_Total = $_POST["itemTotal"];

    echo mysqli_query($link, $sql);
    foreach($product_id as $key=>$val){
        $iTotal = trim($item_Total[$key], '$');
        $sql = "INSERT INTO purchase_invoice_item_details (invoice_id, product_id, unit_price, quantity, margin, hst, item_amount)
        VALUES ('$invoice_id', '$product_id[$key]', '$unit_Price[$key]', '$quantity[$key]', '$margin[$key]', '$hst[$key]', '$iTotal')";
        echo mysqli_query($link, $sql);
    }
    /*if(mysqli_multi_query($link, $sql)){
            echo "Records inserted successfully.";  // Displays successful message after inserting the record
        }*/
    }
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);  // Displays execution error while inserting a record in the table
}
 
 // Close connection
 mysqli_close($link);

header("location: ../invoices/generatePurchaseInvoice.php");
?>