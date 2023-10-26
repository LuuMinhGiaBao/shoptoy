<title>CART</title>
<?php
require_once('header.php');
require_once('connect.php');

$c = new Connect();
$dblink= $c->connectToPDO();
if(isset($_SESSION['user_name'])){
    $username=$_SESSION['user_name'];
    if(isset($_GET['productid'])){
        $p_id= $_GET['productid'];
      
        $sqlSelect = "SELECT productid FROM cart  WHERE username=? AND productid=?";
        $re = $dblink->prepare($sqlSelect);
        $re->execute(array("$username","$p_id"));
        if($re->rowCount() == 0 ){
            $query = "INSERT INTO cart (username, productid, cquantity, date) VALUES (?,?,1,CURDATE())";
        }else{
            $query = "UPDATE cart SET cquantity = cquantity +1 where username=? and productid=?";
        }
        $stmt = $dblink->prepare($query);
        $stmt->execute(array("$username","$p_id"));

    }else if(isset($_GET['del_id'])){
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM cart WHERE cartid=?";
        $stmt = $dblink->prepare($query);
        $stmt->execute(array($cart_del));
    }

    $sqlSelect = "SELECT * FROM cart c, product p WHERE c.productid = p.productid and username=?";
    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1->execute(array($username));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);

    $sqlUsers = "SELECT `username`, `fullname` FROM `user`";
    $users = $dblink->query($sqlUsers)->fetchAll(PDO::FETCH_ASSOC);

}else{
    header("Location: login.php");
}
?>


<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    
                    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> item(s)</h6>
                  </div>
                  <form method="POST">
                  <?php
                  $sum=0;
                 foreach($rows as $row
                 
                 ){
                    $quan = $row['cquantity'];
                    $sprice = $row['sellprice'];
                    $sum+=$quan* $sprice ;
                    ?>
                  <hr class="my-4">

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="./img/<?=$row['pimage']?>"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      
                      <h class="text-black mb-0"><?=$row['productname']?></h>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2" name="minus"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>

                      <input name="cquantity" id="quantity" required oninput="updateTotalAmount()" min="0" style="width: 50;" value="<?=$row['cquantity']?>" type="number"
                        class="form-control form-control-sm" />

                      <button class="btn btn-link px-2" name="plus"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?=$row['sellprice']?><span>&#8363;</span></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">

                      <a href="cart.php?del_id=<?=$row['cartid']?>" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>

                  <hr class="my-4">
                  <?php
                     }
                     echo '
                     <div class="d-flex justify-content-between mb-5">
                     <h5 class="text-uppercase">Total price</h5>
                     <h5>'.$sum.'<span>&#8363;</span></h5>
                    </div'
                    ?>
                  </form>
                  <div class="pt-5">
                    <h6 class="mb-0"><a href="home.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                  <h6 class="text-uppercase"><?=$stmt1->rowCount()?> item(s)</h6>
                  </div>


                  <hr class="my-4">

                 

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">BUY</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
        function updateTotalAmount() {
            var selectedProduct = document.getElementById("productid").options[document.getElementById("productid").selectedIndex];
            var price = selectedProduct.getAttribute("data-price");
            var quantity = document.getElementById("cquantity").value;
            var totalAmount = price * quantity;
            document.getElementById("total_amount").value = totalAmount;
        }

        document.getElementById("quantity").addEventListener("input", updateTotalAmount);

        // Initialize total amount on page load
        var initialProduct = document.getElementById("productid").options[0];
        var initialPrice = initialProduct.getAttribute("data-price");
        document.getElementById("total_amount").value = initialPrice;
    </script>
<?php
require_once('footer.php');
?>