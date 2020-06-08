<?php
session_start();

require_once 'config.php';  
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) die($conn->connect_error);
?>

<!--if the session is just -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>

<body>
<p><a href="index.php"><h2>Homepage</h2></a></p>
    <p><a href="cart.php" class="btn btn-primary">Back to cart</a></p>
    <h2>Checkout</h2>
    <h3>Order list: <br></h3><?php
     foreach($_SESSION['product'] as $cart_list) {
        for($i = 0 ; $i < count($cart_list) ; $i++) {
        if ($i == 1) {
            $cart_list[$i] = intval($cart_list[$i]);
        }
        echo ($cart_list[$i])."<br/>";
        }
        echo "<br>";
      }
    ?>
    <h3><br>Choose a method to pay for the order.</h3>
    
    <?php 
    function displayPaymentMethods () {
        echo <<<_END
        <td>Payment method
        <form action="order.php" method="post">
        <select name="payOption" id="payOption">
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Cash">Cash</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Mobile Payment">Mobile Payment</option>
        </select>
        <input type = "hidden" name = "user" value="payOption">
        <input type="submit" value="Order Now">
        </form>
        </td>
        _END;
    }
    displayPaymentMethods();
    ?>
    
    <br><br>
    <!--have to add the query to remember the user payment method-->
    <!-- <p><a href="order.php" class="btn btn-danger">Order</a></p>-->
    



</body>
</html>