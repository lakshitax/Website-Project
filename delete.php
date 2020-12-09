<div style="background-color:black;margin:20%;color:white;padding:20px;font-family:monospace">

<?php $conn=new mysqli(localhost, 'root', 'qwerty666','savethetreesdb');
$tablename=$_POST['tablename'];
echo $tablename;

echo ": delete entry";

$id=$_POST['id'];
$_POST = array();

switch($tablename){
  case 'Store':
  if (!($conn -> query("DELETE FROM $tablename WHERE prod_id='$id'")))
  {
    echo("Error description: " . $conn -> error);
  }
  else
  {
    echo("Error description: " . $conn -> error);
    echo("Entry deleted successfuly");
  }
  break;

  case 'Customer':
  if (!$mysqli -> query($conn,"DELETE FROM $tablename WHERE 'Customer'.'Cust_ID'='$id'"))
  {
  echo("Error description: " . $mysqli -> error);
  }
  break;

  case 'Store_Order':
  if (!$mysqli -> query($conn,"DELETE FROM $tablename WHERE WHERE 'Store_Order'.'order_ID'='$id'"))
  {
  echo("Error description: " . $mysqli -> error);
  }
  break;

  case 'Donors':
  if (!$mysqli -> query($conn,"DELETE FROM $tablename WHERE 'Donors'.'donor_ID'='$id' "))
  {
  echo("Error description: " . $mysqli -> error);
  }
  break;

}
