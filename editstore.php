<title>EDIT STORE</title>
<?php
require_once('headerAdmin.php');
include_once('connect.php');
$c = new Connect();//goi lop 2 ham
$bLink = $c->connectToMySQL();//truy van k dieu kien option
$SQ = 'SELECT * FROM user WHERE role="admin"';
$r=$bLink->query($SQ);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $id = strtoupper($_POST['storeid']);
    $name = $_POST['storename'];
    $ma = $_POST['storemanager'];
    $desc = $_POST['address'];

        
    $sql = "UPDATE stores SET 
            storeid='$id',
            storename = '$name',
            storemanager = '$ma',
            address = '$desc' 
            WHERE storeid = '$id'";

    if ($bLink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $bLink->error;
    }
}

    $id = $_GET['id'];
    $sql = "SELECT * FROM stores WHERE storeid = '$id'";
    $result = $bLink->query($sql);
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
              <h2 class="text-uppercase text-center mb-5">EDIT STORE</h2>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                  <label for="storeid">STORE ID</label>
                  <input id="storeid" name="storeid" placeholder="STORE ID" class="form-control input-md" type="text" value="<?= $row['storeid'] ?>" required type="text">
                </div>


                <div class="form-outline mb-4">
                  <label for="store_name">STORE NAME</label>  
                  <input id="store_name" name="storename" placeholder="STORE NAME" class="form-control input-md"  value="<?= $row['storename'] ?>" required  type="text">
                </div>
                <div class="form-outline mb-4">
                  <label for="store_address">ADDRESS</label>                   
                  <input type="text" class="form-control" id="address" name="address" placeholder="ADDRESS" value="<?= $row['address'] ?>" required></input>
                </div>

                <div class="form-outline mb-4">
                <label for="storemanager">STORE MANAGER</label> 
                <select name="storemanager" id="categoryid " class="form-select form-control form-control-lg"  required type="text">
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

               

                    <br>
                    <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btn_summit">UPDATE</button>
                </div>
                <br>

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

