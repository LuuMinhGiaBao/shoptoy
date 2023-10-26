<title>ATN SHOP</title>
<?php
require_once('header.php'); 
include_once('connect.php');//goi noi dung
$c = new Connect();//goi lop 2 ham
$dbLink = $c->connectToMySQL();//truy van k dieu kien option
$sql = 'SELECT * FROM product ORDER BY date DESC LIMIT 6';
$re=$dbLink->query($sql);
?>
<style>
        .carousel-item {
  height: 50vh;
  min-height: 100px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    </style>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('./img/mkd1.jpg')">
        
      </div>
      <div class="carousel-item" style="background-image: url('./img/mkd3.jpg')">
        
      </div>
      <div class="carousel-item" style="background-image: url('./img/mkd4.jpg')">
     
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
<section class="py-2 text-center container">
    <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"></h1>
          </div>
      </div>
  </section>
<div class="container">
 <div class="row">
<?php
if($re->num_rows>0){ 
    while($row=$re->fetch_assoc()){
?>
        
        <div style="padding-bottom: 30px;"class="col-md-4 pd-3">
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
          <br> 
        </div>   
    <?php 
        }
    }
    ?>
  </div>
      <div style="margin-bottom: 40px;text-align: center">
        <input onclick="location.href='allproduct.php'" style="background-color: aquamarine;"type="submit" name="btnShowmore" value="Show More">
      </div>
  </div>
</div>
<?php
require_once('footer.php'); 
?>