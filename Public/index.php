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
  <table style="width:100%">
  <tr>
    <td><a href="water.php"  title="Water & Beverages">Water & Beverages</a></td>
    <td><p><img src="pictures/water_beverages.jpg"></p></td>
  </tr>
  <tr>
    <td><a href="meat.php"  title="Meat & Poultry">Meat & Poultry</a></td>
    <td><p><img src="pictures/meat_poultry.jpg"></p></td>
  </tr>
  <tr>
    <td><a href="seafood.php"  title="Seafood">Seafood</a></td>
    <td><p><img src="pictures/seafood.jpg"></p></td>
  </tr>
  <tr>
    <td><a href="bread.php"  title="Bread & Snacks">Bread & Snacks</a></td>
    <td><p><img src="pictures/bread_snacks.jpg"></p></td>
  </tr>
  <tr>
    <td><a href="processed.php"  title="Processed Food">Processed Food</a></td>
    <td><p><img src="pictures/processed food.jpg"></p></td>
  </tr>
  </table>
</body>
</html>