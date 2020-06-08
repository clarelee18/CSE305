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
    <title>Order</title>
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
     <h2>Current Order</h2><br>
        <?php
        $totalCost = 0;
            foreach($_SESSION['product'] as $cart_list) {
                for($i = 0 ; $i < count($cart_list) ; $i++) {
                if ($i == 1) {
                    $cart_list[$i] = intval($cart_list[$i]);
                }
                if ($i == 2){
                    $totalCost = $totalCost + intval($cart_list[$i]);
                }
                echo ($cart_list[$i])."<br/>";
                }
                echo "<br>";
            }
        ?><br><br>

        <p>Payment Method: <?php echo $_POST["payOption"]; ?></p><br>

        <?php 
        function displayContact () {
            echo <<<_END
            <td>
            <form action="success.php" method="post">
            <label for="address">Delivery Address: </label><br>  
            <input type="text" id="address" name="address"><br><br>
            <label for="number">Contact Number: </label><br>
            <input type="text" id="number" name="number"><br><br>
            <input type="submit" value="Confirm">
            <input type = "hidden" name = "user" value="address">
            <input type = "hidden" name = "user" value="number">
            <input type="submit" value="Confirm">
            </form>
            </td>
            _END;
        }
        displayContact();
        ?>
        <?php
            $paymentFee = 0;
            if($totalCost < 40000){
                $paymentFee = 2000;
            }
        ?>
        <p>Payment Fee: <?php echo $paymentFee; ?> </p>

        <?php
        $fee = $_SESSION[$paymentFee];
        $totalFee = $_SESSION[$paymentFee];
        
        ?>

</body>
</html>