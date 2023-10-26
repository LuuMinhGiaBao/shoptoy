<title>PRODUCT </title>
<?php
require_once('headeradmin.php'); 
include_once('connect.php');//goi noi dung
$c = new Connect();//goi lop 2 ham
$dbLink = $c->connectToMySQL();//truy van k dieu kien option
$sql = 'SELECT * FROM product';
$re=$dbLink->query($sql);

$blink= $c->connectToPDO();
if(isset($_GET['id'])){
 $cart_del = $_GET['id'];
 $query = "DELETE FROM product WHERE productid=?";
 $stmt = $blink->prepare($query);
 $stmt->execute(array($cart_del));
}
?>
       <script>
        function deleteConfirm() {
            if(confirm("Are you sure to delete it?")) {
                return true;
            }
            else {
                return false;
            }
        }
        </script>
<div class="container">
 <div class="row">
<?php


if($re->num_rows>0){ 
    while($row=$re->fetch_assoc()){
?>
  <div style="padding-bottom: 30px; padding-top: 30px;"class="col-md-4 pd-3">
            <br><br><br><br><br><br><br><br>
          <div  class="card">
          <a href="detailadmin.php?id=<?=$row['productid']?>">
            <img src="./img/<?=$row['pimage']?>" class="card-img-top" alt="...">
          </a>
            <div class="card-body">
                <a href="detailadmin.php?id=<?=$row['productid']?>"class="text-decoration-none"><h5 class="card-title"><?=$row['productname']?></h5></a>
                <h6 class="card-subtitle mb-2 text-muted"><?=$row['sellprice']?><span>&#8363;</span></h6>
                <br>
                <form action="cartadmin.php" method="GET">
                    <div class="col-lg-9">
                        <input type="hidden" name="productid" value="<?=$row['productid']?>">      
                        <input style="background-color: aquamarine;" type="submit" class="btn btn-primamry shop-buttton"
                         name="btnAdd" value="Add to Cart"/>                 
                    </div>
                </form>  
                <br>
                        
                <a href="editproduct.php?id=<?= $row['productid'] ?>" class="btn btn-primary "style="background-color: aquamarine ;color: black;">Edit</a>  
                <a href="productadmin.php?id=<?= $row['productid'] ?>" onclick="return deleteConfirm()" class="btn btn-danger"style="background-color: aquamarine;color: black;">Delete</a>
              </div>
          </div> 
     
        </div>  
        
    <?php 
        }
    }
    ?>
    
    </div>
    <div style="padding-bottom: 30px; padding-top: 30px;"class="col-md-4 pd-3">
    <a href="addproduct.php">
    <div class="cart">
        <img src="./img/add.jpg" class="card-img-top" alt="...">
        <h1 class="text-center" style="color:brown;">ADD PRODUCT</h1>
        </div>
    </a>
    </div>
  </div>
<?php
require_once('footer.php'); 
?>