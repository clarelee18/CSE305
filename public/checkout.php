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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Online Grocery</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="welcome.php">My Page</a></li>
         </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>
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