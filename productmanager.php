
    <!-- Bootstrap -->
    <?php
    require_once('headeradmin.php');
    require_once('connect.php');
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
        <form name="frm" method="post" action="">
        <h1>Product Management</h1> 
        <button type="submit" style="background-color: aqua;"><a href="addproduct.php">ADD</a></button>
        <br>
        <br>
        <table id="tableproduct" class="table  table-bordered">
            <thead>
                <tr>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Category ID</strong></th>
                    <th><strong>Supplier ID</strong></th>
                    <th><strong>ImportPrice($)</strong></th>
                    <th><strong>SellPrice($)</strong></th>
                    <th><strong>Quantity</strong></th>                   
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

            <tbody>
        <?php
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
       <div class="container">
        <div class="row">
       <?php
       
       if($re->num_rows>0){ 
           while($row=$re->fetch_assoc()){
       ?>
        <tr>

              <td ><?php echo $row["productid"]; ?></td>
              <td><?php echo $row["productname"];  ?></td>
              <td><?php echo $row["categoryid"]; ?></td>
              <td ><?php echo $row["supplierid"]; ?></td>
              <td><?php echo $row["importprice"]; ?></td>
              <td><?php echo $row["sellprice"]; ?></td>
              <td><?php echo $row["quantity"]; ?></td>
              <td><img src="./img/<?=$row['pimage']?> "style="width: 20%;" class="card-img-top" alt="..."></td>
              <td style="text-align: center;"><a href="editproduct.php?id=<?= $row['productid'] ?>" class="text-muted">Edit</a></td>
              <td style="text-align: center;"><a href="productmanager.php?id=<?= $row['productid'] ?>" onclick="return deleteConfirm()" class="text-muted"><i class="fas fa-times"></i></a></td>
            </tr>
            <?php
                }
            }
            ?>
            </tbody>
        </table>
</form>

<?php 
require_once('footer.php')
?>