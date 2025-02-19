<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: ../index.php");
   }  
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Add Customer | Superstore
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/1c67a52d9b.js" crossorigin="anonymous"></script>
      <script>
     // JavaScript for disabling form submissions if there are invalid fields
         (function () {
    'use strict';
    window.addEventListener('load', function () {
     
         let currForm1 = document.getElementById('formCustomers');
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

      function formatPhone(phone){
        let reg = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}\d{4}$/;
        if (phone.value.match(reg)){
          phone.value = "+1(" + phone.value.slice(0,3) + ")"+ phone.value.slice(3,6)+"-"+phone.value.slice(6,10);

        }
        else{
          alert("Enter a valid 10 digit phone number");
          return false;
        }
      }


      function validatePassword(){
         let password = document.getElementById("password").value;
         let reg = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
         if (!password.match(reg)){
         
             alert("Password does not match required policy");
            
            document.getElementById("password").value = "";
            return false;
          }
      }

      function checkPassword(){
        let password = document.getElementById("password").value;
        let passwordCheck = document.getElementById("confirmPassword").value;
        let reg = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (password != passwordCheck){
         
          alert("Password does not match");
          document.getElementById("password").value = "";
          document.getElementById("confirmPassword").value = "";
          return false;
        }
        // else {
        //   validatePassword();
        // }
      }

      </script>
   </head>
   <body>
      <section class="vh-auto" style="background-color: #eee;">
         <div class="container h-auto">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                     <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                           <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Customer</p>
                              <form name="formCustomers" id="formCustomers" action="saveCustomer.php" method="post" class="mx-1 mx-md-4 needs-validation" novalidate>
                                 
                              <?php 
                              If(isset($_GET['status']) && $_GET['status'] == 1){ ?>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                   <p class="alert alert-success" role="alert">Customer Added Successfully!</p>
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
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="text" id="firstName" name="firstName" class="form-control" minlength="2" pattern="[a-zA-Z ]{2,30}" required />
                                       <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input! Atleast 2 letters.</div>
                                       <label class="form-label" for="firstName">First Name</label>
                                    </div>
                                    <div class="form-outline flex-fill mb-0">&nbsp;
                                    </div>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="text" id="lastName" name="lastName" class="form-control" minlength="2" pattern="[a-zA-Z ]{2,30}" required />
                                        <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input! Atleast 2 letters.</div>
                                       <label class="form-label" for="lastName">Last Name</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-male fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="radio" id="male" name="gender" value="male" class="form-check-input">Male</input>
                                       <input type="radio" id="female" name="gender" value="female" class="form-check-input" checked>Female</input><br>
                                       <label class="form-label" for="gender">Gender</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-calendar fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="date" id="dob" name="dob" min="1910-01-01" max="2004-12-31" class="form-control" required />
                                        <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input!</div>
                                       
                                       <label class="form-label" for="dob">Customer Date of Birth</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="email" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
                                        <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Invalid Input!</div>
                                       
                                       <label class="form-label" for="email">Customer Email</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="text" id="phoneNo" name="phoneNo" class="form-control" minlength="10" onfocusout="formatPhone(this)"  required/>
                                        <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Invalid Input alteast 10 digits required</div>
                                       
                                       <label class="form-label" for="phoneNo">Customer Phone</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-house fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="text" id="address" name="address" class="form-control" required />
                                       <label class="form-label" for="address">Address</label>
                                    </div>
                                    <div class="form-outline flex-fill mb-0">&nbsp;</div>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="text" id="city" name="city" class="form-control" required />
                                        <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input!</div>
                                       <label class="form-label" for="city">City</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                 <i class="fas fa fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <select id="province" name="province" class="form-select" aria-label="Default select example" required>
                                          <option disabled selected value> -- Select Province -- </option>
                                          <option value="AB">Alberta</option>
                                          <option value="BC">British Columbia</option>
                                          <option value="MB">Manitoba</option>
                                          <option value="NB">New Brunswick</option>
                                          <option value="NL">Newfoundland and Labrador</option>
                                          <option value="NS">Nova Scotia</option>
                                          <option value="NT">Northwest Territories</option>
                                          <option value="NU">Nunavut</option>
                                          <option value="ON">Ontario</option>
                                          <option value="PE">Prince Edward Island</option>
                                          <option value="QC">Quebec</option>
                                          <option value="SK">Saskatchewan</option>
                                          <option value="YT">Yukon</option>
                                       </select>
                                       <label class="form-label" for="province">Province</label>
                                    </div>
                                    <div class="form-outline flex-fill mb-0">&nbsp;</div>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="text" id="postalCode" name="postalCode" class="form-control" required />
                                       <div class="valid-feedback">
                                       Valid
                                       </div>
                                       <div class="invalid-feedback">Mandatory Input!</div>
                                       
                                       <label class="form-label" for="postalCode">Zip Code</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="password" id="password" name="password" class="form-control" 
                                       onfocusout="validatePassword()" required/>

                                       <div class="valid-feedback">Valid</div>
                                       <div class="invalid-feedback">password does not match the required policy</div>

                                       <label class="form-label" for="password">Password (password should have 8 digits include characters, symbols, integers))</label>
                                    </div>
                                 </div>
                                 <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" onfocusout="checkPassword()" required/>
                                       <div class="valid-feedback" >Valid</div>
                                       <div class="invalid-feedback" id="">Password does not match</div>
                                       <label class="form-label" for="confirmPassword">Re-enter password</label>
                                    </div>
                                 </div>
                                 <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Add Customer</button>
                                    &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-danger btn-lg">Reset</button>
                                    &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-info btn-lg" onclick="window.location='../views/homePage.php';">Back</button>
                                 </div>
                              </form>
                           </div>
                           <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                              <img src="../public/images/img1.webp"
                                 class="img-fluid">
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
