<title>EDIT CATEGORY</title>
<?php
require_once('headerAdmin.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $id = strtoupper($_POST['categoryid']);
    $name = $_POST['categoryname'];
    $desc = $_POST['discription'];

        
    $sql = "UPDATE category SET 
            categoryid='$id',
            categoryname = '$name',
            disciption = '$desc' 
            WHERE categoryid = '$id'";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

    $id = $_GET['id'];
    $sql = "SELECT * FROM category WHERE categoryid = '$id'";
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
              <h2 class="text-uppercase text-center mb-5">EDIT CATEGORY</h2>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                  <label for="category_id">CATEGORY ID</label>
                  <input id="category_id" name="categoryid" placeholder="category ID" class="form-control input-md" type="text" value="<?= $row['categoryid'] ?>" required>
                </div>


                <div class="form-outline mb-4">
                  <label for="category_name">CATEGORY NAME</label>  
                  <input id="category_name" name="categoryname" placeholder="CATEGORY NAME" class="form-control input-md" value="<?= $row['categoryname'] ?>" required type="text">
                </div>

            




                <div class="form-outline mb-4">
                  <label for="category_discription">CATEGORY DISCRIPTION</label>                   
                  <input type="text" class="form-control" id="discription" name="discription" value="<?=$row['disciption']?>" required></input>
                </div>

                    <br>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="btn_summit">UPDATE</button>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                  <button type="submit" href="editcategory.php" onclick="location.href='editcategory.php'"
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

