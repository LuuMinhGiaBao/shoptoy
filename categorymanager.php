
    <!-- Bootstrap -->
    <?php
    require_once('headeradmin.php');

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
        <h1>Category Management</h1> 
        <button type="submit" style="background-color: aqua;"><a href="addcategory.php">ADD</a></button>
        <br>
        <br>
        <table id="tableproduct" class="table  table-bordered">
            <thead>
                <tr>    
                    <th><strong>Category ID</strong></th>
                    <th><strong>Category name</strong></th>
                    <th><strong>Disciption</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

            <tbody>
        <?php
       include_once('connect.php');//goi noi dung
       $c = new Connect();//goi lop 2 ham
       $dbLink = $c->connectToMySQL();//truy van k dieu kien option
       $sql = 'SELECT * FROM category';
       $re=$dbLink->query($sql);

       $blink= $c->connectToPDO();
       if(isset($_GET['id'])){
        $cart_del = $_GET['id'];
        $query = "DELETE FROM category WHERE categoryid=?";
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

              <td ><?php echo $row["categoryid"]; ?></td>
              <td><?php echo $row["categoryname"];  ?></td>
              <td><?php echo $row["disciption"]; ?></td>      
              <td style="text-align: center;"><a href="editcategory.php?id=<?= $row['categoryid'] ?>" class="text-muted">Edit</a></td>
              <td style="text-align: center;"><a href="categorymanager.php?id=<?= $row['categoryid'] ?>" onclick="return deleteConfirm()" class="text-muted"><i class="fas fa-times"></i></a></td>
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