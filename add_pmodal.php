<?php
include "connect.php";

$output = "";
if (isset($_POST['pro_prize']) && isset($_POST['prize_quantity'])) {

  $product = ucwords($_POST["pro_prize"]);  
  $quantity = $_POST["prize_quantity"];

   $fetch_prizes_items = "SELECT * FROM prices WHERE price_name = '$product'";
   $fpi = sqlsrv_query($conn,$fetch_prizes_items);
   $fpi_fetch = sqlsrv_fetch_array($fpi);
   $fpi_fetch_item = $fpi_fetch['price_name'];

   if($fpi_fetch_item == $product){

    $upp = "UPDATE prices SET quantity = quantity + '$quantity' WHERE price_name = '$fpi_fetch_item'";
    $que_upp =sqlsrv_query($conn,$upp);
                  $output .= "Product Updated!";
   }else{

       $sql_ins = "INSERT INTO prices (price_name,quantity) VALUES ('$product','$quantity') ";
       $inserty = sqlsrv_query($conn, $sql_ins);
           			$output .= "Product Added!";
      }                   
   }
   echo $output;
}
?>