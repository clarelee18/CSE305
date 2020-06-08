<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
require_once 'config.php';  
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) die($conn->connect_error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order success!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <!--adding the details of the order: list, payment method, payment time, address....-->
    <!--update the following tables...
            Order_Shipping_Fee - total_price, delivery_charge
            Order_History - oid, total_price, total_quantity
            Payment - pid, payment_method, payment_date, payment_time
            User_Address - delivery_addr, postal_code
            User_Ordering - username, delivery_addr, contact_number
            Has (order history has payment) - oid, pid, sid
            Paid_for (payment paid for shopping cart) - sid, pid
    -->

    <!--to use the input value from order page-->
    <?php $address =  $_POST["address"]; 
          echo $address;
          $contactNumber =  $_POST["number"]; 
          echo $contactNumber;
    ?> 
</body>
</html>