<title>EDIT SUPPLIER</title>
<?php
require_once('headerAdmin.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $id = strtoupper($_POST['supplierid']);
    $name = $_POST['suppliername'];
    $desc = $_POST['address'];

        
    $sql = "UPDATE supplier SET 
            supplierid='$id',
            suppliername = '$name',
            address = '$desc' 
            WHERE supplierid = '$id'";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

    $id = $_GET['id'];
    $sql = "SELECT * FROM supplier WHERE supplierid = '$id'";
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
              <h2 class="text-uppercase text-center mb-5">EDIT SUPPLIER</h2>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                  <label for="supplier_id">SUPPLIER ID</label>
                  <input id="supplier_id" name="supplierid" placeholder="SUPPLIER ID" class="form-control input-md" type="text" value="<?= $row['supplierid'] ?>" required>
                </div>


                <div class="form-outline mb-4">
                  <label for="supplier_name">SUPPLIER NAME</label>  
                  <input id="supplier_name" name="suppliername" placeholder="SUPPLIER NAME" class="form-control input-md" value="<?= $row['suppliername'] ?>" required type="text">
                </div>

            
                <div class="form-outline mb-4">
                  <label for="supplier_address">ADDRESS</label>                   
                  <input type="text" class="form-control" id="address" name="address" placeholder="ADDRESS" value="<?=$row['address']?>" required></input>
                </div>

                    <br>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btn_summit">UPDATE</button>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                  <button type="submit" href="editsupplier.php" onclick="location.href='editsupplier.php'"
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

