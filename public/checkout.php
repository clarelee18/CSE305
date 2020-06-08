<?php
session_start();
?>
<?php
$conn = mysqli_connect('localhost','root','root','fooddb');
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
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
    ?></p>
    <h3><br>Choose a method to pay for the order.</h3>
    
    <?php 
    function displayPaymentMethods ($username) {
        echo <<<_END
        <td>Payment method
        <form action="order.php" method="post">
        <select name="$username" id="$username">
            <option value="bank transfer">bank transfer</option>
            <option value="cash">cash</option>
            <option value="credit card">credit card</option>
            <option value="mobile payment">mobile payment</option>
        </select>
        <input type = "hidden" name = "user" value="$username">
        <input type="submit" value="Order now">
        </form>
        </td>
        _END;
    }
    $username = $_SESSION["username"];
    displayPaymentMethods($username);
    ?>
    
    <br><br>
    <!--have to add the query to remember the user payment method-->
    <!--Things that have to be done: 
        1. Store the order info into db 
        2. tells the total amount of the payment
        3. tells if the payment fee is needed 
        4. once hit confirm, Remove the items in the cart (Session info)
    -->
    <!-- <p><a href="order.php" class="btn btn-danger">Order</a></p>-->
    
</body>