<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bread & Snacks</title>
  <style>
    th, td {
      border: 1px ridge #2980B9;
    }
  </style>
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
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="water.php">Water & Beverages</a></li>
          <li><a href="meat.php">Meat & Poultry</a></li>
          <li><a href="seafood.php">Seafood</a></li>
          <li><a href="bread.php">Bread & Snacks</a></li>
          <li><a href="processed.php">Processed Food</a></li>
        </ul>
      </li>
      <li><a href="cart.php">Cart</a></li>
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
<h2>Bread & Snacks</h2>
  <table style="width:100%">
  <tr>
    <td><h3>Snacks</h3></td>
    
    <?php
    
    // function for displaying products
    function displayProducts($productname, $image, $price, $description) {
      echo <<<_END
      <td>$productname: $price Won
      <p><img src="pictures/$image" alt="$productname" style="width:128px;height:128px;"></p>
      <br>Description: $description<br>
      <form action="cart.php" method="post">
      <label for="$productname">Qty:</label>
      <select name="$productname" id="$productname">
      <option value=1>1</option>
      <option value=2>2</option>
      <option value=3>3</option>
      <option value=4>4</option>
      </select>
      <input type = "hidden" name = "product" value = "$productname">
      <input type = "hidden" name = "price" value = "$price">
      <input type="submit" value="Add to Cart">
      <input type="submit" value="Buy Now" formaction="buy.php">
      </form>
      </td>
      _END;
    }
    
    // create mysqli object 
    require_once 'config.php';  
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) die($conn->connect_error);
    
    $query = "SELECT P.* FROM products P, belongs_to B "
    ."WHERE P.productname = B.productname AND B.subcategory = 'snacks'";
    // select P.* from products P, belongs_to B 
    // where P.productname = B.productname AND B.subcategory = 'water';
    
    //echo $query ."<br/>";
    
    $result = $conn -> query($query);
    
    // Perform query
    if ($result && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        displayProducts($row["productname"], $row["image"], $row["cost"], $row["description"]);
        //echo "ProductName: ". $row["productname"]." Price: ". $row["cost"]. " Won <br>";
        }
      } else {
        echo "0 results";
    }
        
    $conn->close();
    ?>
    
  </tr>
  <tr>
    <td><h3>Bread</h3></td>
    
    <?php
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) die($conn->connect_error);
    
    $query = "SELECT P.* FROM products P, belongs_to B "
    ."WHERE P.productname = B.productname AND B.subcategory = 'bread'";
    
    $result = $conn -> query($query);
    
    // Perform query
    if ($result && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        displayProducts($row["productname"], $row["image"], $row["cost"], $row["description"]);
        }
      } else {
        echo "0 results";
    }
        
    $conn->close();
    ?>
    
  </tr>
  <tr>
    <td><h3>Ice Cream</h3></td>
    
    <?php
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) die($conn->connect_error);
    
    $query = "SELECT P.* FROM products P, belongs_to B "
    ."WHERE P.productname = B.productname AND B.subcategory = 'ice cream'";
    
    $result = $conn -> query($query);
    
    // Perform query
    if ($result && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        displayProducts($row["productname"], $row["image"], $row["cost"], $row["description"]);
        }
      } else {
        echo "0 results";
    }
        
    $conn->close();
    ?>
    
  </tr>
  <tr>
    <td><h3>Candy</h3></td>
    
    <?php
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) die($conn->connect_error);
    
    $query = "SELECT P.* FROM products P, belongs_to B "
    ."WHERE P.productname = B.productname AND B.subcategory = 'candy'";
    
    $result = $conn -> query($query);
    
    // Perform query
    if ($result && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        displayProducts($row["productname"], $row["image"], $row["cost"], $row["description"]);
        }
      } else {
        echo "0 results";
    }
        
    $conn->close();
    ?>
    
  </tr>
  </table>

</body>
</html>