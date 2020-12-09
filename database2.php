<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Store</title>
  <link rel="stylesheet" href="db_style.css">
  <script src="https://kit.fontawesome.com/33160b8533.js"></script>
  </head>

  <body>


      <div class="navbar">
        <div class="logo">
          <A href="index.html"><img src="/forest.png" id="logo-white" /></a>
        </div>
        <div class="Brand">
          <a href="index.html" class="logolink"><b>SAVE THE FOREST ACTIVISTS</b></a>
        </div>
        <div class="link-1">
          <a href="index.html" class="navlinks">Home</a>
        </div>
        <div class="link-2">
          <a href="http://127.0.0.1:8000" class="navlinks">Events</a>
        </div>
        <div class="link-5">
          <a href="login.html" class="navlinks">Forum</a>
        </div>
        <div class="link-3">
          <a href="database2.php" class="navlinks">Database</a>
        </div>
        <div class="link-4">
          <a href="" id="donatelink">DONATE</a>
        </div>
      </div>

      <p class='header'>DATABASE</p>

      <div class='choose_db'>
         <form method="post">
           <input type="submit" name="products" class="button" value="Products" />
           <input type="submit" name="customers" class="button" value="Customers" />
           <input type="submit" name="orders" class="button" value="Orders" />
           <input type="submit" name="donors" class="button" value="Donors" />
         </form>
     </div>

     <?php
     function display_table($tablename)
     {
       global $products_visibilty, $customers_visibilty, $orders_visibilty, $donors_visibilty;
       echo '<div class="data_display">';
       if ($products_visibilty==1)
       { ?>
         <div class='db_header' >
           <p>PRODUCTS DATA</p>
         </div>
         <form method="post" action="add.php?tablename=Store" target="_blank">
           <input type="text" name="prod_id" placeholder="prod_id">
           <input type="text" name="prod_name" placeholder="prod_name">
           <input type="text" name="prod_price" placeholder="prod_price">
           <input type="text" name="prod_footprint" placeholder="prod_footprint">
           <input type="submit" name="add_store" value="add ">
         </form>

         <?php
       }
       if ($customers_visibilty==1)
       { ?>
         <div class='db_header' >
           <p>CUSTOMERS DATA</p>
         </div>
         <form method="post" action="add.php?tablename=Customer" target="_blank">
           <input type="text" name="Cust_ID" placeholder="Cust_ID">
           <input type="text" name="f_name" placeholder="f_name">
           <input type="text" name="l_name" placeholder="l_name">
           <input type="text" name="p_no" placeholder="p_no">
           <input type="text" name="email" placeholder="email">
           <input type="text" name="address" placeholder="Address">
           <input type="text" name="order_ID" placeholder="order_ID">
           <input type="submit" name="add_customer" value="add ">
         </form>
         <?php
       }
       if ($orders_visibilty==1)
       { ?>
         <div class='db_header' >
           <p>ORDERS DATA</p>
         </div>
         <form method="post" action="add.php?tablename=Store_Order" target="_blank">
           <input type="text" name="order_ID" placeholder="order_ID">
           <input type="text" name="order_qty" placeholder="order_qty">
           <input type="text" name="total" placeholder="total">
           <input type="text" name="product_ID" placeholder="product_ID">
           <input type="submit" name="add_order" value="add ">
         </form>
       <?php
       }
       if ($donors_visibilty==1)
       { ?>
         <div class='db_header'>
           <p>DONORS DATA</p>
         </div>
         <form method="post" action="add.php?tablename=Donors" target="_blank">
           <input type="text" name="donor_ID" placeholder="donor_ID">
           <input type="text" name="donor_name" placeholder="donor_name">
           <input type="text" name="donor_email" placeholder="donor_email">
           <input type="text" name="donor_amount" placeholder="donor_amount">
           <input type="submit" name="add_donors" value="add ">
         </form>
       <?php
       } ?>


       <?php
        $conn=new mysqli(localhost, 'root', 'qwerty666','savethetreesdb');
       if(!$conn){
         echo 'connection error'.mysqli_connect_error();
        }
       else{
         $query="SELECT * FROM $tablename";
         $res=mysqli_query($conn,$query);
         echo "<table>";
         $first_row=true;
         while($row=mysqli_fetch_assoc($res))
         {
           if($first_row)
           {
             $first_row=false;
             echo "<tr>";
             foreach($row as $key=>$field)
             {
               echo '<th style="padding:10px">'.htmlspecialchars($key).'</th>';
             }
             echo '</tr>';
           }
           echo '<tr>';
           $i=1;
           foreach($row as $key=>$field)
           {
             if($i==1)
             {
               $id=$field;
               $i=2;
             }
             echo '<td style="padding:0px 10px">'.htmlspecialchars($field).'</td>';
           }

           ?>
           <td><form method="post" action="edit.php" target="_blank">
             <input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />
             <input type="hidden" name="id" value="<?php echo $id; ?>" />
             <input type="submit" name="edit" value="edit">
           </form>
             <form method="post" action="delete.php" target="_blank">
               <input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />
               <input type="hidden" name="id" value="<?php echo $id; ?>" />
               <input type="submit" name="delete" value="delete">
             </form>
           </td>
         </tr>
             <?php

        }
         echo '</table>';


        echo '</form>';

      }



?> </div>

     <?php
     } ?>

     <?php




     $products_visibilty=0;
     $customers_visibilty=0;
     $orders_visibilty=0;
     $donors_visibilty=0;
      if(array_key_exists('products', $_POST)) {
          products();
      }
      else if(array_key_exists('customers', $_POST)) {
          customers();
      }
      else if(array_key_exists('orders', $_POST)) {
          orders();
      }
      else if(array_key_exists('donors', $_POST)) {
          donors();
      }
      function products() {
        global $products_visibilty, $customers_visibilty, $orders_visibilty, $donors_visibilty;
        $products_visibilty=1;
        $customers_visibilty=0;
        $orders_visibilty=0;
        $donors_visibilty=0;
        display_table('Store');
      }
      function customers() {
        global $products_visibilty, $customers_visibilty, $orders_visibilty, $donors_visibilty;
        $products_visibilty=0;
        $customers_visibilty=1;
        $orders_visibilty=0;
        $donors_visibilty=0;
        display_table('Customer');
      }
      function orders() {
        global $products_visibilty, $customers_visibilty, $orders_visibilty, $donors_visibilty;
        $products_visibilty=0;
        $customers_visibilty=0;
        $orders_visibilty=1;
        $donors_visibilty=0;
        display_table('Store_Order');
      }
      function donors() {
        global $products_visibilty, $customers_visibilty, $orders_visibilty, $donors_visibilty;
        $products_visibilty=0;
        $customers_visibilty=0;
        $orders_visibilty=0;
        $donors_visibilty=1;
        display_table('Donors');
      }
      //$mysqli -> close();
  ?>



      <div class="footer">
        <div class="socials">
        <a href=""><i class="fa fa-twitter footer-image fa-2x" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-facebook footer-image fa-2x" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-instagram footer-image fa-2x" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-reddit-alien fa-2x" aria-hidden="true"></i></a>

        </div>
        <div class="footnote">
          <p>This website has been created for educational purposes only.
            All media (photos, videos) displayed on this website are covehigh by the Creative Commons Zero (CC0) license.
            The CC0 license was released by the non-profit organization Creative Commons.
            You can get more information about Creative Commons and their license on the <a href="https://creativecommons.org/publicdomain/zero/1.0/">official license page</a>.
          </p>
        </div>
      </div>
</body>
</html>
