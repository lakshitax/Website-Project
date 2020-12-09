<div style="background-color:black;margin:20%;color:white;padding:20px;font-family:monospace">

<?php $conn=new mysqli(localhost, 'root', 'qwerty666','savethetreesdb');
$tablename=$_POST['tablename'];
echo $tablename;
echo ": edit entry";
$id=$_POST['id'];

switch($tablename){
  case "Store":
    $query="UPDATE Store SET prod_id='$_POST[prod_id]',prod_name='$_POST[prod_name]',prod_price='$_POST[prod_price]',prod_footprint='$_POST[prod_footprint]' WHERE prod_id=$id ";
    break;
  case "Customer":
    $query="UPDATE Customer SET Cust_ID='$_POST[Cust_ID]',f_name='$_POST[f_name]',l_name='$_POST[l_name]',p_no='$_POST[p_no]',email='$_POST[email]',Address='$_POST[Address]',order_ID='$_POST[order_ID]' WHERE Cust_ID='$id' ";
    break;
  case "Store_Order":
    $query="UPDATE Store_Order SET order_ID='$_POST[order_ID]',order_qty='$_POST[order_qty]',total='$_POST[total]',product_ID='$_POST[product_ID]' WHERE order_ID='$id' ";
    break;
  case "Donors":
    $query="UPDATE Donors SET donor_ID='$_POST[donor_ID]',donor_name='$_POST[donor_name]',donor_email='$_POST[donor_email]',donor_amount='$_POST[donor_amount]' WHERE donor_ID='$id' ";
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
?>
</div>
