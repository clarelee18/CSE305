<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Homepage</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Grocery</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="welcome.php">My Page</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="water.php">Water & Beverages</a></li>
          <li><a href="meat.php">Meat & Poultry</a></li>
          <li><a href="seafood.php">Seafood</a></li>
          <li><a href="bread.php">Bread & Snacks</a></li>
          <li><a href="processed.php">Processed Food</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
      if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    ?>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php
    }?>
    <?php
      if(isset($_SESSION["loggedin"]) !== true || $_SESSION["loggedin"] !== true){
    ?>
    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php
    }?>
    </ul>
  </div>
</nav>
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