<title>DETAIL PRODUCT</title>
<?php
require_once('header.php');
require_once('connect.php');
?>

<div class="container px-4 py-5">
    <?php
    if(isset($_GET['id'])):
        $pid = $_GET['id'];
        $conn = new Connect();
        $db_Link = $conn->connectToPDO();
        $sql = "select * from product where productid = ?";
        $stmt = $db_Link->prepare($sql);
        $stmt->execute(array($pid));                       
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
    <h2><?=$re['productname']?></h2>
    <ul sytle="list-style-type:none ;" class="list-group">
        Price: <li class="list-group-item"><?=$re['sellprice']?><span>&#8363;</span></li>
        Quatity: <li class="list-group-item"><?=$re['quantity']?></li>
        Description: <li class="list-group-item"><?=$re['disciption']?></li>
    </ul>
    <form action="cart.php" method="GET">
        <div class="col-lg-9">
            <input type="hidden" name="productid" value="<?=$pid?>">
            <br>
            <input style="background-color: aquamarine;" type="submit" class="btn btn-primamry shop-buttton"
            name="btnAdd" value="Add to Cart"/>
        </div>
    </form>
    <?php
        else:
    ?>
        <h2>Nothing to show</h2>
    <?php
            endif;
    ?>
</div>
<?php
require_once('footer.php');
?>