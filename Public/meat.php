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
<title>Meat & Poultry</title>
<style>
th, td {
  border: 1px ridge #2980B9;
}
</style>
</head>

<body>
  <p>
        <a href="index.php">Go to Main</a>
        <br><a href="welcome.php" class="btn btn-danger">MyPage</a>
  </p>
  
<h2>Meat & Poultry</h2>

  <table style="width:100%">
  <tr>
    <td><h3>Beef</h3></td>
    
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
    ."WHERE P.productname = B.productname AND B.subcategory = 'beef'";
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
    <td><h3>Pork</h3></td>
    
    <?php
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) die($conn->connect_error);
    
    $query = "SELECT P.* FROM products P, belongs_to B "
    ."WHERE P.productname = B.productname AND B.subcategory = 'pork'";
    
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
    <td><h3>Chicken</h3></td>
    
    <?php
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) die($conn->connect_error);
    
    $query = "SELECT P.* FROM products P, belongs_to B "
    ."WHERE P.productname = B.productname AND B.subcategory = 'chicken'";
    
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
    <td><h3>Eggs</h3></td>
    
    <?php
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) die($conn->connect_error);
    
    $query = "SELECT P.* FROM products P, belongs_to B "
    ."WHERE P.productname = B.productname AND B.subcategory = 'eggs'";
    
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
