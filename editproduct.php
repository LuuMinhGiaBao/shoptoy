<title>EDIT PRODUCT</title>
<?php
require_once('headerAdmin.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $id = strtoupper($_POST['productid']);
    $name = $_POST['productname'];
    $cat = $_POST['categoryid'];
    $sup = $_POST['supplierid'];
    $iprice = $_POST['importprice'];
    $sprice = $_POST['sellprice'];
    $quan = $_POST['quantity'];
    $desc = $_POST['product_discription'];
    $importdate = date('Y-m-d' , strtotime($_POST['date']));

    $img = str_replace(' ','-',$_FILES['Pro_image']['name']);
    $imgdir='./img/';//coppy hinh vao thu muc
    $flag= move_uploaded_file(
        $_FILES['Pro_image']['tmp_name'],$imgdir.$img
    );
    if($flag){
        
    $sql = "UPDATE product SET 
            productid='$id',
            productname = '$name',
            categoryid = '$cat',
            supplierid = '$sup',
            importprice = '$iprice',
            sellprice = '$sprice',
            quantity = '$quan',   
            pimage = '$img',
            date = '$importdate',
            disciption = '$desc' 
            WHERE productid = '$id'";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}
}
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE productid = '$id'";
    $result = $blink->query($sql);
    $row = $result->fetch_assoc();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="register.css" />
<body>
<section class=" bg-image "
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
         
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">EDIT PRODUCT</h2>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                  <label for="product_id">PRODUCT ID</label>
                  <input id="product_id" name="productid" placeholder="PRODUCT ID" class="form-control input-md" type="text" value="<?= $row['productid'] ?>" required>
                </div>


                <div class="form-outline mb-4">
                  <label for="product_name">PRODUCT NAME</label>  
                  <input id="product_name" name="productname" placeholder="PRODUCT NAME" class="form-control input-md" value="<?= $row['productname'] ?>" required type="text">
                </div>

                <div class="form-outline mb-4">
                  <label for="cateloryid">CATEGORY ID</label> 
                  <input id="categoryid" name="categoryid" placeholder="CATEGORY ID" class="form-control input-md" value="<?= $row['categoryid'] ?>" required type="text">
                </div>

                <div class="form-outline mb-4">
                  <label for="product_supplier">SUPPLIER ID</label>    
                  <input id="supplierid" name="supplierid" placeholder="SUPPLIER ID" class="form-control input-md" value="<?= $row['supplierid'] ?>" required type="text">
                </div>

                <div class="form-outline mb-4">
                  <label for="import_price">IMPORT PRICE</label>  
                  <input id="import_price" name="importprice" placeholder="IMPORT PRICE" class="form-control input-md" value="<?= $row['importprice'] ?>" required type="text">
                </div>

                <div class="form-outline mb-4">
                  <label for="sell_price">SELL PRICE</label>  
                  <input id="sell_price" name="sellprice" placeholder="SELL PRICE" class="form-control input-md" value="<?= $row['sellprice'] ?>" required type="text">
                </div>

                <div class="form-outline mb-4">
                  <label for="quantity">QUANTITY</label>  
                  <input id="quantity" name="quantity" placeholder="QUANTITY" class="form-control input-md" value="<?= $row['quantity'] ?>" required type="text">
                </div>

                <div class="form-outline mb-4">
                  <label for="quantity">PRODUCT IMAGE</label>  
                  <input type="file" name="Pro_image" id="Pro_image" class="form-control"required>
                  
                </div>

                <div class="form-outline mb-4">
                  <label for="quantity">IMPORT DATE</label>  
                  <input id="date" name="date" placeholder="IMPORT DATE" value="<?php echo date('Y-m-d');?>" class="form-control input-md" value="<?= $row['date'] ?>" required type="date"> 
                </div>

                <div class="form-outline mb-4">
                  <label for="product_discription">PRODUCT DISCRIPTION</label>                   
                  <input type="text" class="form-control" id="product_discription" name="product_discription" value="<?=$row['disciption']?>" required></input>
                </div>

                    <br>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btn_summit">UPDATE</button>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                  <button type="submit" href="editproduct.php" onclick="location.href='productadmin.php'"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btn_reset">RESET</button>
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

