<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: ../index.php");
   }  
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Sale Invoice | Superstore
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/1c67a52d9b.js" crossorigin="anonymous"></script>
      <script type="stylesheet" src="..public/style.css">
         
      </script>
      <script>
         $(document).on("click", ".btn-info", function () {
         var invoiceId = $(this).data('id');
         document.getElementById("header").innerHTML = "View Item Details Invoice # "+invoiceId+"<i class='fa-solid fa-cart-shopping mx-1'></i>";

         if (invoiceId == "") {
            document.getElementById("details").innerHTML = "";
            return;
         } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("details").innerHTML = this.responseText;
               }
            };
            xmlhttp.open("GET","../models/getSalesItems.php?invoiceId="+invoiceId,true);
            xmlhttp.send();
         }
      });

      function showInvoice() {
         var invoiceId = document.getElementById('invoiceId').value;
         if (invoiceId == "") {
            document.getElementById("details").innerHTML = "";
            return;
         } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("details").innerHTML = this.responseText;
               }
            };
            xmlhttp.open("GET","getItems.php?invoiceId="+invoiceId,true);
            xmlhttp.send();
         }
   }
      </script>
   </head>
   <body>
      <section class="vh-auto" style="background-color: #eee;">
         <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-lg-12 col-xl-11">
                  <div class="container mt-3">
                     <div class="card" style="border-radius: 25px;">
                        <div class="card-body">
                           <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">View Sale Invoices <i class="fa-solid fa-cart-shopping mx-1"></i></p>
                           <div class="container">
                              <div class="row clearfix">
                                 <div class="col-md-12 table-responsive">
                                    <table class="table table-hover table-sortable" id="invoiceList">
                                       <thead>
                                          <tr>
                                             <th class="text-center">
                                                Invoice ID
                                             </th>
                                             <th class="text-center">
                                                Customer ID
                                             </th>
                                             <th class="text-center">
                                                Invoice Date
                                             </th>
                                             <th class="text-center">
                                                Total Amount
                                             </th>
                                             <th class="text-center">
                                                Payment Type
                                             </th>
                                             <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">Show Invoice
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          
                                          <?php require '../config/dbConnection.php';
                                             $sql = "SELECT sales_invoice_details.invoice_id, customer_id, invoice_date, invoice_amount, payment_type 
                                                      FROM sales_invoice_details, sales_invoice_payment_details 
                                                      WHERE sales_invoice_details.invoice_id = sales_invoice_payment_details.invoice_id;";
                                             $result = mysqli_query($link,$sql);?>
                                                      <?php while($row = mysqli_fetch_assoc($result)) :  ?>
                                             <tr id='<?php echo $row['invoice_id']?>' data-id="<?php echo $row['invoice_id']?>" class="hidden">
                                             <td data-name="invoiceId" class="text-center">
                                                <?php echo $row['invoice_id']?>
                                             </td>
                                             <td class="text-center"> <?php echo $row['customer_id']?> </td>
                                             <td class="text-center"> <?php echo $row['invoice_date']?>      </td>
                                             <td class="text-center"> <?php echo $row['invoice_amount']?> </td>
                                             <td class="text-center"> <?php echo $row['payment_type']?> </td>
                                             <td data-name="del" class="text-center">
                                                <button name="view" data-id="<?php echo $row['invoice_id']?>" class='btn btn-info' data-bs-toggle="modal"  data-bs-target="#myModal"><span aria-hidden="true">View</span></button>
                                             </td>
                                             </tr>    
                                          <?php endwhile;?>
                                       </tbody>
                                    </table>
                                    <button type="reset" class="btn btn-info" onclick="window.location='../views/homePage.php';">Back</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- The Modal -->

      <div class="modal" id="myModal">
      <div class="modal-dialog modal-fullscreen">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Show Sales Details</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
               <div class="card" style="border-radius: 25px;">
                  <div class="card-body">
                     <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" id="header" ></p>
                     <div class="container">
                        <div class="row clearfix">
                           <div class="col-md-12 table-responsive" id="details">
                              
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>