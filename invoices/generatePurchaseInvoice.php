<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: ../index.php"); 
   } 
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Purchase Invoice | Superstore
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/1c67a52d9b.js" crossorigin="anonymous"></script>
      <script type="text/javascript" src="../public/js/addRows.js"></script>
      <script type="stylesheet" src="../public/style.css"></script>
      
      <?php
         require '../config/dbConnection.php';
            $sql2 = "SELECT product_id, unit_price, hst FROM product_master";
            $result2 = mysqli_query($link,$sql2);
            
            $sql = "SELECT supplier_id, first_name, last_name from supplier_master";
            $result = mysqli_query($link, $sql);
         
         ?>
      <script type="text/javascript">

         function display_ct7() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            hours = x.getHours( ) % 12;
            hours = hours ? hours : 12;
            hours=hours.toString().length==1? 0+hours.toString() : hours;

            var minutes=x.getMinutes().toString()
            minutes=minutes.length==1 ? 0+minutes : minutes;

            var seconds=x.getSeconds().toString()
            seconds=seconds.length==1 ? 0+seconds : seconds;

            var month=(x.getMonth() +1).toString();
            month=month.length==1 ? 0+month : month;

            var dt=x.getDate().toString();
            dt=dt.length==1 ? 0+dt : dt;

            var x1=month + "/" + dt + "/" + x.getFullYear(); 
            x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
            document.getElementById('clock').innerHTML = x1;
            display_c7();
         }
         function display_c7(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct7()',refresh)
         }

         display_c7()

         function updatePrice() {
            var products = <?php echo json_encode(mysqli_fetch_all($result2, MYSQLI_ASSOC)); ?>;
            var elements = document.getElementById("purchaseInvoice").elements;
            var temp = 0;
            for (var i = 0, element; element = elements[i++];) {
         
               if (typeof element !== 'undefined' && element.name.includes("unitPrice")){
                  var temp = i-2;
                  var prod_id = elements[temp].value;
                  for (var j in products) {
                     if (products[j]['product_id'] == prod_id){
                        element.value = products[j]['unit_price'];
                     }
                  }
               }

               if (typeof element !== 'undefined' && element.name.includes("hst")){
                  var temp = i-4;
                  var prod_id = elements[temp].value;
                  for (var j in products) {
                     if (products[j]['product_id'] == prod_id){
                        element.value = products[j]['hst']+'%';
                     }
                  }
               }

               if (typeof element !== 'undefined' && element.name.includes("quantity")){
                  
                  var temp = i-5;
                  var prod_id = elements[temp].value;
                  for (var j in products) {
                     if (products[j]['product_id'] == prod_id && element.value == ''){
                        element.value = 1;
                     }
                  }
                  calcTotal();
               }
            }
         }
         
         function calcTotal() {
            var elements = document.getElementById("purchaseInvoice").elements;
            var temp = 0;
            var total = 0;
            var marginedTotal = 0;
            var totalTax = 0;
            var finalAmount = 0;

            for (var i = 0, element; element = elements[i++];) {
         
               if (typeof element !== 'undefined' && element.name.includes("delete")){
                  var temp = i;
                  if(elements[temp-3].value < 1)
                     elements[temp-3].value = 1;
                  var qty = parseInt(elements[temp-3].value); 
                  var hst = parseInt(elements[temp-4].value);
                  if(parseInt(elements[temp-5].value) < 0)
                     elements[temp-5].value = 0;
                  var margin = parseInt(elements[temp-5].value);
                  var up = parseFloat(elements[temp-6].value); 
                  var marginedPrice = ((100-margin)/100)*up;
                  var taxableTotal = ((100+hst)/100)*marginedPrice*qty;
                  if(!isNaN(taxableTotal))
                  elements[temp-2].value = "$"+(taxableTotal).toFixed(2);
                 
                  total += (qty * up);
                  marginedTotal += (up*margin/100)*qty;
                  totalTax += (marginedPrice*hst/100)*qty;
                  finalAmount += taxableTotal;
               }
            }
            if(!isNaN(margin))
            {
               document.getElementById("total").value = "$"+(total).toFixed(2);
               document.getElementById("tax").value = "$"+(totalTax).toFixed(2);
               document.getElementById("finalMargin").value = "$"+(marginedTotal).toFixed(2);
               document.getElementById("finalAmount").value = "$"+(finalAmount).toFixed(2);
            }
         }
      </script>
   </head>
   <body>
      <section class="vh-auto" style="background-color: #eee;">
         <div class="container h-auto">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-lg-12 col-xl-11">
                  <div class="container mt-3">
                     <div class="card" style="border-radius: 25px;">
                        <div class="card-body">
                           <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Purchase Invoice <i class="fa-solid fa-cart-shopping mx-1"></i></p>
                           <form name="purchaseInvoice" action="../controllers/savePurchaseDetails.php" method="post" id="purchaseInvoice">
                           <div class="container">
                              <div class="row clearfix">
                                 <div class="col-md-12 table-responsive">
                                    <div class="row mx-1">
                                       <div class="col-md-3">
                                       <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                       Select Supplier : <font color="red">*</font>
                                       </div>
                                       <div class="col-md-3">
                                             <select id="supplier" name="supplier" class="form-select">
                                                <?php  while($row = mysqli_fetch_assoc($result)) :  ?>
                                                <option value="<?php echo $row['supplier_id']?>"><?php echo $row['first_name'] . " " . $row['last_name']?></option>
                                                <?php endwhile;?>
                                             </select>
                                       </div>

                                       <div class="col-md-6">
                                          <span id='clock' style="float:right; color:blue"></span>
                                       </div>
                                    </div>
                                    <table class="table table-hover" id="invoiceList">
                                       <thead>
                                          <tr >
                                             <th class="text-center">
                                                Product ID
                                             <font color="red">*</font>
                                             </th>
                                             <th class="text-center">
                                                Unit Price
                                             </th>
                                             <th class="text-center">
                                                Margin %
                                                <font color="red">*</font>
                                             </th>
                                             <th class="text-center">
                                                Tax
                                             </th>
                                             <th class="text-center">
                                                Quantity
                                                <font color="red">*</font>
                                             </th>
                                             <th class="text-center">
                                                Item Total
                                             </th>
                                             <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr id='addr0' data-id="0" class="hidden">
                                             <td data-name="productId">
                                                <select id="product" name="product[]" class="form-select" onchange="updatePrice()">
                                                   <?php require '../config/dbConnection.php';
                                                      $sql2 = "SELECT product_id, product_name, unit_price FROM product_master";
                                                      $result2 = mysqli_query($link,$sql2);?>
                                                      <option value="Select">Select Product</option>
                                                      <?php while($row2 = mysqli_fetch_assoc($result2)) :  ?>
                                                         <option value="<?php echo $row2['product_id']?>"><?php echo $row2['product_name']?></option>
                                                      <?php endwhile;?>
                                                </select>
                                             </td>
                                             <td data-name="unitPrice">
                                                <input type="number" id="unitPrice" name="unitPrice[]" class="form-control" readOnly="" />
                                             </td>
                                             <td data-name="margin">
                                                <input type="number" id="margin" name="margin[]" min="1" max="100" class="form-control" onchange="calcTotal()" required/>
                                             </td>
                                             <td data-name="hst">
                                                <input type="text" id="hst" name="hst[]" class="form-control" readOnly=""/>
                                             </td>
                                             <td data-name="quantity">
                                                <input type="number" id="quantity" name="quantity[]" class="form-control" min="1" onchange="calcTotal()"/>
                                             </td>
                                             <td data-name="itemTotal">
                                                <input type="text" id="itemTotal" name="itemTotal[]" class="form-control" readOnly=""/>
                                             </td>
                                             <td data-name="delete">
                                                <button name="delete" id="delete" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true" onclick="calcTotal()">×</span></button>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-2">
                                    Total : <input type="text" id="total" name="total" class="form-control" readOnly="" />
                                 </div>
                                 <div class="col-md-2">
                                    Tax : <input type="text" id="tax" name="tax" class="form-control" readOnly="" value=""/>
                                 </div>
                                 <div class="col-md-2">
                                    Margin : <input type="text" id="finalMargin" name="finalMargin" class="form-control" readOnly="" />
                                 </div>
                                 <div class="col-md-3">
                                    Cart Total: <input type="text" id="finalAmount" name="finalAmount" class="form-control" readOnly="" />
                                 </div>
                                 <div class="col-md-3">
                                    Payment Type : <font color="red">*</font>
                                    <select id="paymentType" name="paymentType" class="form-select">
                                       <option value="Cheque">Cheque</option>
                                       <option value="Credit">Credit Card</option>
                                       <option value="Debit">Debit Card</option>
                                       <option value="Cash">Cash</option>
                                    </select>
                                 </div>
                              </div>
                              <br><br>
                              <a id="add_row" class="btn btn-primary float-right">Add Item</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <button type="submit" class="btn btn-success">Generate Order</button>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <button type="reset" class="btn btn-danger ">Reset</button>
                              &nbsp;&nbsp;
                              <button type="reset" class="btn btn-info" onclick="window.location='../views/homePage.php';">Back</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>