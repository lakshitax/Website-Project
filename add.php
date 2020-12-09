
<div style="background-color:black;margin:20%;color:white;padding:20px;font-family:monospace">

<?php $conn=new mysqli(localhost, 'root', 'qwerty666','savethetreesdb');
$tablename=$_GET['tablename'];
  echo $tablename;
  echo"<br>";
  if(!$conn){
    echo 'connection error'.mysqli_connect_error();
   }
  else{

    switch($tablename){
      case "Store":
      if(isset($_POST['add_store'])){
        $query="INSERT INTO Store (prod_id, prod_name, prod_price, prod_footprint) VALUES( '$_POST[prod_id]','$_POST[prod_name]','$_POST[prod_price]','$_POST[prod_footprint]')";

      }
      break;
      case "Customer":
      if(isset($_POST['add_customer'])){
        $query="INSERT INTO Customer VALUES('$_POST[Cust_ID]','$_POST[f_name]','$_POST[l_name]','$_POST[p_no]','$_POST[email]','$_POST[Address]','$_POST[order_ID]')";
      }
      break;
      case "Store_Order":
      if(isset($_POST['add_order'])){
        $query="INSERT INTO Store_Order VALUES('$_POST[order_ID]','$_POST[order_qty]','$_POST[total]','$_POST[product_ID]')";
      }
      break;
      case "Donors":
      if(isset($_POST['add_donors'])){
        $query="INSERT INTO Donors VALUES('$_POST[donor_ID]','$_POST[donor_name]','$_POST[donor_email]','$_POST[donor_amount]')";
      }
      break;

    }
    if (!($conn -> query($query)))
    {
      echo("QUERY UNSUCCESSFUL Error description: " . $conn -> error);
    }
    else
    {
      echo "DATA ADDED SUCCESSFULLY";
    }


  }
?>
</div>
