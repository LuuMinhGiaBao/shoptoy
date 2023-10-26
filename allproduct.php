<title>PRODUCTS</title>
<?php
require_once('header.php'); 
include_once('connect.php');//goi noi dung
$c = new Connect();//goi lop 2 ham
$dbLink = $c->connectToMySQL();//truy van k dieu kien option
$sql = 'SELECT * FROM product';
$re=$dbLink->query($sql);
?>
<div class="container">
 <div class="row">
<?php

if($re->num_rows>0){ 
    while($row=$re->fetch_assoc()){
?>

  <div style="padding-bottom: 30px; padding-top: 30px;"class="col-md-4 pd-3">
            <br><br><br><br><br><br><br><br>
          <div  class="card">
            <a href="detail.php?id=<?=$row['productid']?>">
            <img src="./img/<?=$row['pimage']?>" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
                <a href="detail.php?id=<?=$row['productid']?>"class="text-decoration-none"><h5 class="card-title"><?=$row['productname']?></h5></a>
                <h6 class="card-subtitle mb-2 text-muted"><?=$row['sellprice']?><span>&#8363;</span></h6>
                <br>
                <form action="cart.php" method="GET">
                    <div class="col-lg-9">
                        <input type="hidden" name="productid" value="<?=$row['productid']?>">
                        <input style="background-color: aquamarine;" type="submit" class="btn btn-primamry shop-buttton"
                         name="btnAdd" value="Add to Cart"/>
                    </div>
                </form>  
              </div>
          </div>  
        </div>  
    <?php 
        }
    }
    ?>
    </div>
  </div>
<?php
require_once('footer.php'); 
?>