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
<div class="row1">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="water.php" target="_self">
          <img src="pictures/water_beverages.jpg" alt="Water & Beverages" style="width:100%">
          <div class="caption">
            <p>Water & Beverages</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="meat.php" target="_self">
          <img src="pictures/meat_poultry.jpg" alt="Meat & Poultry" style="width:100%">
          <div class="caption">
            <p>Meat & Poultry</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="seafood.php" target="_self">
          <img src="pictures/seafood.jpg" alt="Seafood" style="width:100%">
          <div class="caption">
            <p>Seafood</p>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row2">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="bread.php" target="_self">
          <img src="pictures/bread_snacks.jpg" alt="Bread & Snacks" style="width:100%">
          <div class="caption">
            <p>Bread & Snacks</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="processed.php" target="_self">
          <img src="pictures/processed food.jpg" alt="Processed Food" style="width:100%">
          <div class="caption">
            <p>Processed Food</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</body>
</html>