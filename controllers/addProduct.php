<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: ../index.php");
   }  
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Add Product | Superstore
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/1c67a52d9b.js" crossorigin="anonymous"></script>
      <script type="text/javascript">
          // JavaScript for disabling form submissions if there are invalid fields
         (function () {
    'use strict';
    window.addEventListener('load', function () {
     
         let currForm1 = document.getElementById('formProducts');
        // Validate on submit:
        currForm1.addEventListener('submit', function(event) {
          if (currForm1.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          currForm1.classList.add('was-validated');
        }, false);
    }, false);
  })();
      </script>
            <?php

require '../config/dbConnection.php';

   $sql2 = "SELECT supplier_id from supplier_master";
   $result2 = mysqli_query($link, $sql2);
?>
   </head>
   <body>
      <section class="vh-auto" style="background-color: #eee;">
         <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                     <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                           <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Product</p>
                              <form name="formProducts" id="formProducts" action="saveProduct.php" method="post" class="mx-1 mx-md-4 needs-validation" novalidate>
                                 
                              <?php 
                              If(isset($_GET['status']) && $_GET['status'] == 1){ ?>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                   <p class="alert alert-success" role="alert">Product Added Successfully!</p>
                                </div>
                                </div>
                                <?php }
                                
                                If(isset($_GET['status']) && $_GET['status'] == 0){ ?>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                     <i class="fas fa fa-lg me-3 fa-fw"></i>
                                 <div class="form-outline flex-fill mb-0">
                                <p class="alert alert-warning" role="alert">Something went wrong! Please try again.</p>
                             </div>
                             </div>
                             <?php } ?>
                              <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-solid fa-cubes-stacked fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="text" id="productName" name="productName" class="form-control" minlength="2" pattern="[a-zA-Z ]{2,30}" required />
                                       <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input! Atleast 2 letters.</div>
                                       <label class="form-label" for="productName">Product Name</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-solid fa-cubes-stacked fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <select id="productType" name="productType" class="form-select" aria-label="Default select example" required>
                                          <option disabled selected value> -- Select Product Type -- </option>
                                          <option value="Fruits">Fruits</option>
                                          <option value="Vegetables">Vegetables</option>
                                          <option value="Grocery">Grocery</option>
                                          <option value="Taxable Grocery">Taxable Grocery</option>
                                          <option value="Houseware">Houseware</option>
                                          <option value="Frozen Food">Frozen Food</option>
                                          <option value="Bakery">Bakery</option>
                                          <option value="Meat">Meat</option>
                                          <option value="Seafood">Seafood</option>
                                          <option value="Dairy">Dairy</option>
                                       </select>
                                       <label class="form-label" for="productName">Product Type</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <!--<input class="form-control" list="datalistOptions" id="supplierList" placeholder="Type to search...">
                                       <datalist id="datalistOptions">
                                          <option value="Supplier 12">
                                          <option value="Supplier 13">
                                          <option value="Supplier 14">
                                          <option value="Supplier 15">
                                          <option value="Supplier 16">
                                       </datalist>-->
                                       <select id="supplier" name="supplier" class="form-select" aria-label="Default select example" required>
                                          <option disabled selected value> -- Select Supplier -- </option>
                                          <?php while($row2 = mysqli_fetch_assoc($result2)) :  ?>
                                          <option value="<?php echo $row2['supplier_id']?>"><?php echo $row2['supplier_id']?></option>
                                          <?php endwhile;?>
                                       </select>
                                       <label class="form-label" for="supplier">Select Supplier</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-solid fa-dollar-sign fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="number" step=0.01 id="unitPrice" name="unitPrice" class="form-control" required />
                                       <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input! .</div>
                                       <label class="form-label" for="unitPrice">Unit Price</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">

                                   <i class="fas fa-solid fa-percent fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="number" id="discount" name="discount" class="form-control" value="0" required/>
                                       <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input</div>
                                       <label class="form-label" for="discount">Discount</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">

                                    <i class="fas fa-solid fa-calculator fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="number" id="hst" name="hst" class="form-control" required/>
                                       <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input!</div>
                                       <label class="form-label" for="hst">HST</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">

                                    <i class="fas fa-solid fa-layer-group fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="number" id="quantity" name="quantity" class="form-control" required/>
                                       <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input!</div>
                                       <label class="form-label" for="quantity">Quantity</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                   
                                    <i class="fas fa-solid fa-cubes fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0 form-check form-switch">
                                       <input type="checkbox" id="inStock" name="inStock" class="form-check-input" checked/>
                                       <label class="form-label" for="inStock">In Stock</label>
                                    </div>
                                 </div>
                                 <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                 <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <button type="reset" class="btn btn-danger btn-lg">Reset</button> 
                                 &nbsp;&nbsp;
                                 <button type="reset" class="btn btn-info btn-lg" onclick="window.location='../views/homePage.php';">Back</button>
                                 </div>
                              </form>
                           </div>
                           <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                           <img src="../public/images/img1.webp"
                              class="img-fluid" >
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