<title>SEARCH</title>
<?php
require_once('header.php');
require_once('connect.php');
?>
<div class="container">
  <br>
  <form class="input-group rounded example1" action="search.php">  
       
                    <input type="text" class="form-control rounded" placeholder="Search..."  name="search">
                    <button class="btn btn-primary" name="btnSearch">Search</button>
    </form>  

<br>
<div class="container">
        
            
               
             
        </div>
        <h2>Result for</h2>   
        <br> 
        <div class="row">
            <?php
            $c = new connect();
            $dbLink = $c-> connectToPDO();
            if(isset($_GET['search'])){
                $nameP = $_GET['search'];
            }
            else{
                $nameP ="";
            }
            $sql = "SELECT * FROM product WHERE productname LIKE ?";
            $re = $dbLink->prepare($sql);
            $valueArray = ["%$nameP%"];
            $re->execute($valueArray);
            $rows = $re->fetchAll(PDO::FETCH_BOTH);
            foreach($rows as $r):
            ?>
                  <div class="col-md-4 pd-3">
          <div class="card">
          <a href="detail.php?id=<?=$r['productid']?>">
            <img src="./img/<?=$r['pimage']?>" class="card-img-top" alt="...">
          </a>
            <div class="card-body">
          <a href="detail.php?id=<?=$r['productid']?>"class="text-decoration-none"><h5 class="card-title"><?=$r['productname']?></h5></a>
          <h6 class="card-subtitle mb-2 text-muted"><?=$r['sellprice']?><span>&#8363;</span></h6>
          <br>
          <a href="cart.php?id=<?=$r['productid']?>" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
          <br>
        </div>    
            <?php
            endforeach;
            ?>
        </div>
            <br>
        </div>


<?php
require_once('footer.php');
?>