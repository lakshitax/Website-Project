
<div style="background-color:black;margin:20%;color:white;padding:20px;font-family:monospace">

<?php $conn=new mysqli(localhost, 'root', 'qwerty666','savethetreesdb');
$tablename=$_POST['tablename'];
echo $tablename;
echo ": edit entry";

$id=$_POST['id'];


  if(!$conn){
    echo 'connection error'.mysqli_connect_error();
   }
  else{

    switch($tablename){
      case "Store":

        $old="SELECT * FROM Store WHERE prod_id='$id'";
        $oldrow=mysqli_fetch_array(mysqli_query($conn,$old)) ;
            ?>

        <form method="post" action="editfinal.php">
          <input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />
          <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <input type="text" name="prod_id" value="<?php echo $oldrow['prod_id']?>">
          <input type="text" name="prod_name" value="<?php echo $oldrow['prod_name']?>">
          <input type="text" name="prod_price" value="<?php echo $oldrow['prod_price']?>">
          <input type="text" name="prod_footprint" value="<?php echo $oldrow['prod_footprint']?>">
          <input type="submit" name="edit_store" value="save changes"><br>
        </form>

        <?php
      break;
      case "Customer":
      $old="SELECT * FROM Customer WHERE Cust_ID='$id'";
      echo $old;
      $oldrow=mysqli_fetch_array(mysqli_query($conn,$old)); ?>
      <form method="post" action="editfinal.php">
        <input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="text" name="Cust_ID" value="<?php echo $oldrow['Cust_ID']?>">
        <input type="text" name="f_name" value="<?php echo $oldrow['f_name']?>">
        <input type="text" name="l_name" value="<?php echo $oldrow['l_name']?>">
        <input type="text" name="p_no" value="<?php echo $oldrow['p_no']?>">
        <input type="text" name="email" value="<?php echo $oldrow['email']?>">
        <input type="text" name="Address" value="<?php echo $oldrow['Address']?>">
        <input type="text" name="order_ID" value="<?php echo $oldrow['order_ID']?>">
        <input type="submit" name="edit_customer" value="save changes"><br>
      </form>
      <?php

      break;
      case "Store_Order":
      $old="SELECT * FROM Store_Order WHERE order_ID='$id'";
      echo $old;
      $oldrow=mysqli_fetch_array(mysqli_query($conn,$old)); ?>
      <form method="post" action="editfinal.php">
        <input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="text" name="order_ID" value="<?php echo $oldrow['order_ID']?>">
        <input type="text" name="order_qty" value="<?php echo $oldrow['order_qty']?>">
        <input type="text" name="total" value="<?php echo $oldrow['total']?>">
        <input type="text" name="product_ID" value="<?php echo $oldrow['product_ID']?>">
        <input type="submit" name="edit_order" value="save changes"><br>
      </form>
      <?php

      break;
      case "Donors":
      $old="SELECT * FROM Donors WHERE donor_ID='$id'";
      echo $old;
      $oldrow=mysqli_fetch_array(mysqli_query($conn,$old)); ?>
      <form method="post" action="editfinal.php">
        <input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="text" name="donor_ID" value="<?php echo $oldrow['donor_ID']?>">
        <input type="text" name="donor_name" value="<?php echo $oldrow['donor_name']?>">
        <input type="text" name="donor_email" value="<?php echo $oldrow['donor_email']?>">
        <input type="text" name="donor_amount" value="<?php echo $oldrow['donor_amount']?>">
        <input type="submit" name="edit_donors" value="save changes"><br>
      </form>

      <?php
      break;
    }




  } ?>
</div>
