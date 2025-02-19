<?php
session_start();
if (!isset($_SESSION['username'])) {

header("Location: ../index.php");
 }

 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Superstore
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/1c67a52d9b.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <nav class="navbar bg-dark navbar-dark">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">
               <h1 class="navbar-text" style="letter-spacing: 25px; color: white"><img src="../public/images/superstore.webp" alt="Avatar Logo" style="height: 50px; width:75px;" class="rounded-pill"> SUPERSTORE</h1>
            </a>
             <form align="right" name="form1" method="post" action="logout.php">
              <label class="logoutLblPos">
             <input name="logout" type="submit" id="logout" value="Log out">
             </label>
            </form>

         </div>
         </div>
      </nav>
      <section class="vh-100" style="background-color: #eee;">
         <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col ">
                  <div class="card text-black" style="border-radius: 25px;">
                     <div class="row">
                        <div class="col text-center fw-bold mx-1">
                           <a href="../controllers/addCustomer.php">
                           <img class="img-fluid rounded-circle" src="../public/images/customer.webp" height="50%" width="50%">
                           Add Customer
                           </a>
                        </div>
                        <div class="col text-center fw-bold mx-1">
                           <a href="../controllers/addProduct.php">
                           <img class="img-fluid rounded-circle" src="../public/images/addProduct.webp" height="50%" width="50%">
                           Add Product
                           </a>
                        </div>
                        <div class="col text-center fw-bold mx-1">
                           <a href="../controllers/addSupplier.php">
                           <img class="img-fluid rounded-circle" src="../public/images/addUser.webp" height="50%" width="50%">
                           Add Supplier
                           </a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-center fw-bold mx-1">
                           <a href="../views/viewCustomers.php">
                           <img class="img-fluid rounded-circle" src="../public/images/view.webp" height="50%" width="50%">
                           View Customers
                           </a>
                        </div>
                        <div class="col text-center fw-bold mx-1">
                           <a href="../views/viewProducts.php">
                           <img class="img-fluid rounded-circle" src="../public/images/viewProduct.webp" height="50%" width="50%">
                           View Products
                           </a>
                        </div>
                        <div class="col text-center fw-bold mx-1">
                           <a href="../views/viewSuppliers.php">
                           <img class="img-fluid rounded-circle" src="../public/images/viewSupplier.webp" height="50%" width="50%">
                           View Suppliers
                           </a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-center fw-bold mx-1">
                           <a href="../invoices/generateSalesInvoice.php">
                           <img class="img-fluid rounded-circle" src="../public/images/sales.webp" height="50%" width="50%"><br>
                           Create Sales Invoice
                           </a>
                        </div>
                        <div class="col text-center fw-bold mx-1">
                           <a href="../invoices/generatePurchaseInvoice.php">
                           <img class="img-fluid rounded-circle" src="../public/images/purchase.webp" height="50%" width="50%"><br>
                           Create Purchase Invoice
                           </a>
                        </div>
                        <div class="col text-center fw-bold mx-1">
                           <a href="../invoices/showSaleInvoice.php">
                           <img class="img-fluid rounded-circle" src="../public/images/viewSales.webp" height="50%" width="50%"><br>
                           View Sales Invoices
                           </a>
                        </div>
                        <div class="col text-center fw-bold mx-1">
                           <a href="../invoices/showPurchaseInvoice.php">
                           <img class="img-fluid rounded-circle" src="../public/images/viewPurchase.webp" height="50%" width="50%"><br>
                           View Purchase Invoices
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>