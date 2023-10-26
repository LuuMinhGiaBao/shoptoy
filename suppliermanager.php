
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
        <h1>Supplier Management</h1> 
        <button type="submit" style="background-color: aqua;"><a href="addsupplier.php">ADD</a></button>
        <br>
        <br>
        <table id="tableproduct" class="table  table-bordered">
            <thead>
                <tr>    
                    <th><strong>Suppilier ID</strong></th>
                    <th><strong>Supplier name</strong></th>
                    <th><strong>Address</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

            <tbody>
        <?php
        
       include_once('connect.php');//goi noi dung
       $c = new Connect();//goi lop 2 ham
       $dbLink = $c->connectToMySQL();//truy van k dieu kien option
       $sql = 'SELECT * FROM supplier';
       $re=$dbLink->query($sql);

       $blink= $c->connectToPDO();
       if(isset($_GET['del_id'])){
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM supplier WHERE supplierid=?";
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

              <td ><?php echo $row["supplierid"]; ?></td>
              <td><?php echo $row["suppliername"];  ?></td>
              <td><?php echo $row["address"]; ?></td>      
              <td style="text-align: center;"><a href="editsupplier.php?id=<?= $row['supplierid'] ?>" class="text-muted">Edit</a></td>
              <td style="text-align: center;"><a  href="suppliermanager.php?del_id=<?=$row['supplierid']?>" onclick="return deleteConfirm()" class="text-muted"><i class="fas fa-times"></i></a></td>
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