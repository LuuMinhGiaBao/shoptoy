<title>REGISTER</title>
<?php
require_once('header.php');
require_once('connect.php');
?>
<?php

if (isset($_POST['btnRegister'])) {
 $c = new Connect();
 $dblink = $c->ConnectToPDO();
   $usr = $_POST['username'];
   $pass = $_POST['password'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $gender = $_POST['gender'];
   $ht = $_POST['address'];
   $role = 'customer';
   $fn = strtoupper($_POST['fullname']);
   $sql = "INSERT INTO `user` (`role`,`username`, `fullname`, `password`, `email`, `phone`, `gender`, `address`) VALUES (?,?,?,?,?,?,?,?)";
   $re = $dblink->prepare($sql);
   $v = [$role,$usr,$fn,$pass,$email,$phone,$gender,$ht];
   $stmt = $re->execute($v);
   if ($stmt) {
       echo "Congratulations";
   } else {
       echo "Registration failed";
   }
   }
?>
<link rel="stylesheet" href="register.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<body>
  <div clas="container">
<section class=" bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
    
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
          <p class="text-center text-muted mt-5 mb-0">Already a member?<a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="POST">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name ="username" class="form-control form-control-lg" placeholder="Username" />
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3cg" name="fullname" class="form-control form-control-lg" placeholder="Full name"/>
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" placeholder="Your Email"/>
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" placeholder="Password"/>
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Re-enter the password"/>
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3cg" name="phone" class="form-control form-control-lg" placeholder="Your phone number" />
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3cg" name="address" class="form-control form-control-lg" placeholder="Your address"/>
                  
                </div>

                <div class="form-outline mb-4">
                  
                  <select name="gender" id="gender" class="form-select form-control form-control-lg">
                    <option selected value="unknown">Choose your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btnRegister">Register</button>
                </div>

                <p><br></p>
                <div class="d-flex justify-content-center">
                    <h>Or</h>
                </div>
                <p><br></p>
                <div class="d-flex justify-content-center">
            
      <a href="" class="me-4 link-secondary">
      <i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i>
      </a>
      <a href="" class="me-4 link-secondary">
      <i class="fab fa-twitter fa-2x" style="color: #55acee;"></i>
      </a>
      <a href="" class="me-4 link-secondary">
      <i class="fab fa-google fa-2x" style="color: #dd4b39;"></i>
      </a>
      <a href="" class="me-4 link-secondary">
      <i class="fab fa-instagram fa-2x" style="color: #ac2bac;"></i>
      </a>
      <a href="" class="me-4 link-secondary">
      <i class="fab fa-linkedin-in fa-2x" style="color: #0082ca;"></i>
      </a>
      <a href="" class="me-4 link-secondary">
      <i class="fab fa-github fa-2x" style="color: #333333;"></i>
      </a>
    </div>

                
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</section>
  </div>
</body>
<?php
require_once('footer.php');
?>
