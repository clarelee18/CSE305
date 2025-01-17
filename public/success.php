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
    <!--remove the item list from the session after finish using it-->
    <!--update the following tables...
            Payment - pid, payment_method
            User_Address - delivery_addr, postal_code
            User_Ordering - username, delivery_addr, contact_number
            Has (order history has payment) - oid, pid, sid
            Paid_for (payment paid for shopping cart) - sid, pid
    -->
    <div class="container pt-4"><h2>Order success!</h2></div>
    <div class="container pt-3">
    <!--to use the input value from order page-->
    <?php 
      $address =  $_POST["address"]; 
      $contactNumber =  $_POST["number"];
      $payment =  $_SESSION["payment"]; ?> 
    
    <?php
      $totalCost = 0;
      $totalquantity = 0;
      foreach($_SESSION['product'] as $cart_list) {
          for($i = 0 ; $i < count($cart_list) ; $i++) {
          if ($i == 1) {
              $cart_list[$i] = intval($cart_list[$i]);
              $totalquantity = $totalquantity + intval($cart_list[$i]);
          }
          if ($i == 2){
              $totalCost = $totalCost + intval($cart_list[$i]);
          }
          echo ($cart_list[$i])."<br/>";
          }
          echo "<br>";
      }
      $paymentFee = 0;
      if($totalCost < 40000){
          $paymentFee = 2000;
      }
      
      echo "Address: ".$address."<br/>";
      echo "Contact number: ".$contactNumber."<br/>";
      echo "Payment method: ".$payment."<br/>";
    
      $query = "SELECT MAX(oid) FROM Order_History";
      $result   = $conn->query($query);
      //$row = mysqli_fetch_assoc($result);
      //$oidLast = $row['oid']+1;
      
      $oidLast = 0;
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
          $oidLast = $row["MAX(oid)"]+1;
        }
      }
      // order_history
      $query1 = "insert into order_history (oid, total_price, total_quantity) values ($oidLast, $totalCost, $totalquantity)";
      $result1 = $conn->query($query1);
      echo $oidLast."<br/>";
      
      // Order_Shipping_Fee
      $query2 = "insert into order_shipping_fee (total_price, delivery_charge) values ($totalCost, $paymentFee)";
      $result2 = $conn->query($query2);
      
      // Payment - pid, payment_method, payment_time, payment_date
      $query3 = "SELECT MAX(pid) FROM Payment";
      $result3   = $conn->query($query3);
      
      $pidLast = 0;
      if ($result3 && $result3->num_rows > 0) {
        while($row = $result3->fetch_assoc()){
          $pidLast = $row["MAX(pid)"]+1;
        }
      }
      echo $pidLast."<br/>";
      
      date_default_timezone_set('Asia/Seoul');
      $timezone = date_default_timezone_get();
      $date = date('Y-m-d', time());
      $current_time = date('H:i:s', time());
      $query4 = "insert into payment (pid, payment_method, payment_time, payment_date) values ($pidLast, '".$payment."', '".$current_time."', '".$date."')";
      $result4   = $conn->query($query4);
      
      /*
      var_dump($pidLast);
      var_dump($date);
      var_dump($current_time);
      var_dump($query4);
      echo "timezone: ".$timezone."<br/>";
      echo "date: ".$date."<br/>";
      echo "current time: ".$current_time."<br/>";
      */
  /*Payment (
  pid INTEGER NOT NULL,
  payment_method VARCHAR(128) NOT NULL,
  payment_time TIME NOT NULL,
  payment_date DATE NOT NULL,
  PRIMARY KEY (pid)
  );*/

      $_SESSION["product"] = array();
      $_SESSION["payment"] = "";
    ?>
    </div>
</body>
</html>
