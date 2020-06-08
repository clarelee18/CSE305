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
    <title>Order History</title>
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
    <!--adding the details of the order: list (if possible...), payment method, address, contact number....-->
    <?php
    $username = $_SESSION["username"];
    $query = "SELECT DISTINCT sid FROM Manages WHERE username='$username'";
    $result   = $con->query($query);
    $row = mysqli_fetch_assoc($result);
    $cartID = $row['sid'];

    $query = "SELECT oid FROM Has WHERE sid='$cartID'";
    $result = $con->query($query);
    while($row = mysqli_fetch_array($result)){
        $query = "SELECT * FROM Order_History WHERE oid='$row['oid']'";
        $result2 = $con->query($query2);
        while($row = mysqli_fetch_array($result2)){
            echo "<tr>";
            echo "<td>Total Price: " . $row['total_price'] . "</td>";
            echo "<td>Total Quantity: " . $row['total_quantity'] . "</td>";
            echo "</tr>";
         }
         echo "</table>";
    }


    ?>


</body>
</html>