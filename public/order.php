<?php
session_start();
?>

<?php
$conn = mysqli_connect('localhost','root','root','fooddb');
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order</title>
</head>

<body>
    <p><a href="index.php"><h2>Homepage</h2></a></p>
    <p><a href="welcome.php" class="btn btn-primary">My Page</a></p>
    <!--adding the details of the order: list, payment method, payment time, address....-->
</body>
</html>