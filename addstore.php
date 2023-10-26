<title>ADD STORE</title>
<?php
require_once('headerAdmin.php');
include_once('connect.php');

$c = new Connect();//goi lop 2 ham
$bLink = $c->connectToMySQL();//truy van k dieu kien option
$SQ = 'SELECT * FROM user WHERE role="admin"';
$r=$bLink->query($SQ);



if(isset($_POST['btn_addstore'])){
  $c = new Connect();
  $dblink = $c->ConnectToPDO();
    $id = strtoupper($_POST['storeid']);
    $name = $_POST['storename'];
    $ma = $_POST['storemanager'];
    $desc = $_POST['address'];

        
    $sql ="INSERT INTO `stores` (`storeid`, `storename`, `storemanager`, `address`) VALUES (?,?,?,?)";
    $re = $dblink->prepare($sql);
    $v = [$id,$name,$ma,$desc];
    $stmt = $re->execute($v);
    if($stmt){
        echo "Congrats";
    
    }else{
        echo "loi thiet bi";
    }
  }
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
              <h2 class="text-uppercase text-center mb-5">ADD STORE</h2>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                  <label for="store_id">STORE ID</label>
                  <input id="store_id" name="storeid" placeholder="STORE ID" class="form-control input-md" type="text"  required>
                </div>


                <div class="form-outline mb-4">
                  <label for="store_name">STORE NAME</label>  
                  <input id="store_name" name="storename" placeholder="STORE NAME" class="form-control input-md"  required type="text">
                </div>

                <div class="form-outline mb-4">
                <label for="storemanager">STORE MANAGER</label> 
                <select name="storemanager" id="storemanager " class="form-select form-control form-control-lg">
                  <option selected value="unknown">STORE MANAGER</option>
                  <?php 
                if($r->num_rows>0){ 
                  while($row=$r->fetch_assoc()){
                ?>
                  <option><?=$row['username']?></option>
                  <?php
                  }
                }
                  ?>
              </select>
                </div>

                <div class="form-outline mb-4">
                  <label for="store_address">ADDRESS</label>                   
                  <input type="text" class="form-control" id="address" name="address" placeholder="ADDRESS" required></input>
                </div>

                    <br>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btn_addstore">ADD</button>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                  <button type="submit" href="addstore.php" onclick="location.href='addstore.php'"
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

