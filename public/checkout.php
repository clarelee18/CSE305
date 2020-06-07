<?php
session_start();
?>

<!--if the session is just -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
</head>

<body>
    <h2>checkout</h2>

    <p>Order list: <?php
     foreach($_SESSION['product'] as $cart_list) {
        for($i = 0 ; $i < count($cart_list) ; $i++) {
         if ($i == 1) {
           $cart_list[$i] = intval($cart_list[$i]);
           }
        echo ($cart_list[$i])."<br/>";
        }
      }
    ?></p>
    <p>Choose a method to pay for the order.</p>
    <select name="payment method" id="payment method">
        <option value=1>bank transfer</option>
        <option value=2>cash</option>
        <option value=3>credit card</option>
        <option value=4>mobile payment</option>
    </select>
    <p><a href="index.php">Homepage</a></p>
</body>