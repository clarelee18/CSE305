<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
?>  <p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </p>
<?php
}
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
?>
    <p>
    <a href="login.php" class="btn btn-danger">Login</a>
    </p>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Homepage</title>
</head>

<body>
<h2>Homepage</h2>
    <br><a href="water.php"  title="Water & Beverages">Water & Beverages</a>
    <br><a href="meat.php"  title="Meat & Poultry">Meat & Poultry</a>
    <br><a href="seafood.php"  title="Seafood">Seafood</a>
    <br><a href="bread.php"  title="Bread & Snacks">Bread & Snacks</a>
    <br><a href="processed.php"  title="Processed Food">Processed Food</a>
</body>
</html>