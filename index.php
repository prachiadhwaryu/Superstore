<!DOCTYPE html>
<html>
   <head>
      <title>Login In| Superstore
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/1c67a52d9b.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <?php
      //include_once('config/constants.php');
      ?>
      <section class="vh-auto" style="background-color: #eee;">
         <div class="container h-auto">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                     <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                           <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>
                              <form name="formlogin" action="views/login.php" method="post" class="mx-1 mx-md-4">
                                  
                                 <?php   If(isset($_GET['error']) && $_GET['error'] == 1){ ?>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                   <p class="alert alert-danger" role="alert">Invalid username or password</p>
                                </div>
                                </div>
                                  
                                <?php } ?>
                             
                             <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="email" id="email" name="email" class="form-control" />
                                       <label class="form-label" for="email">Email</label>
                                    </div>
                                 </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                       <input type="password" id="password" name="password" class="form-control" />
                                       <label class="form-label" for="password">Password</label>
                                    </div>
                                 </div>
                              
                                 <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                    &nbsp;&nbsp;
                                  </div>
                              </form>
                           </div>
                           <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                              <img src="public/images/img1.webp"
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
