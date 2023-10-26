<title>LOGIN</title>
<?php
require_once('header.php');
require_once('connect.php');
?>
<?php 

if(isset($_POST['btnLogin'])){
    if(isset($_POST['txtPass'])&&isset($_POST['txtUsername'])){
        $pass = $_POST['txtPass'];
        $user = $_POST['txtUsername'];
        $c = new Connect();
        $dbLink =$c->connectToPDO();
        $sql= "SELECT * FROM user WHERE username =? and password = ?";
         $stmt = $dbLink->prepare($sql);
         $re = $stmt->execute(array("$user", "$pass"));
         $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if ($numrow == 1) {
          echo "Login successfully";

          $_SESSION['user_name'] = $row['username'];
          $_SESSION['user_role'] = $row['role']; 

          if ($row['role'] === 'admin') {
          
              header("Location: homeadmin.php"); // Điều hướng đến trang admin
          } else {
              header("Location: index.php"); // Điều hướng đến trang người dùng
          }
      } else {
          echo "Something wrong with your info <br>";
      }
  } else {
      echo "Please enter your info";
  }
}

?>
<link rel="stylesheet" href="register.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
          <p class="text-center text-muted mt-5 mb-0">Not a member?<a href="register.php"
                    class="fw-bold text-body"><u>Register here</u></a></p>
                    
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form method="POST">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name ="txtUsername" class="form-control form-control-lg" placeholder="Username" />
                  
                </div>


                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="txtPass" class="form-control form-control-lg" placeholder="Password"/>
                  
                </div>


                <div class="d-flex justify-content-center">
                  <a href="#!" class="text-body"><u>Forgot your password?</u></a>
                  
                </div>
                    <br>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btnLogin">Login</button>
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
</section>
</body>
<?php
require_once('footer.php');
?>

