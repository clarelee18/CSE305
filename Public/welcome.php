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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to MyPage.</h1>
    </div>
    <p>
        <a href="index.php"><h2>Go to Main</h2>
        <a href="cart.php" class="btn btn-primary">View Cart</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </p>
  <br><h3>User information: </h3>
    <p>
        <?php 
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