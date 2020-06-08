<?php
// Initialize the session
require_once "config.php"; 
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) die($conn->connect_error);
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
//session_destroy();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">-->
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
            <li><a href="cart.php">View Cart</a></li>
            <li><a href="order.php">View Orders</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
    </nav>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to MyPage.</h1>
    </div>
  <br><h3>User information: </h3>
    <p>
        <?php 
            $username = $_SESSION["username"];
            // echo $username;
            $result = mysqli_query($conn, "SELECT * From User_Details WHERE username='$username'");
            if (!$result) die ("Database access failed: " . $conn->error);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo 'First Name: '   . $row['first_name']   . '<br>';
                    echo 'Last Name: '    . $row['last_name']    . '<br>';
                    echo 'Email Address: '    . $row['email']    . '<br>';
                    echo 'Date of Birth: '    . $row['birthdate']    . '<br>';
                }
            }


            $username = $_SESSION["username"];
            // echo $username;
            $result = mysqli_query($conn, "SELECT * From User_Ordering WHERE username='$username'");
            if (!$result) die ("Database access failed: " . $conn->error);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                // echo ' has rows:<br>';
                while ($row = mysqli_fetch_array($result)) {
                    echo '<br>Address: '   . $row['delivery_addr']   . '<br>';
                    echo 'Contact Number: '    . $row['contact_number']    . '<br>';
                }
            }

            mysqli_close($conn);
        ?>
    </p>
</body>
</html>