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
    
    <td>Beef Chuck<p><img src="pictures/Beef Chuck Steak.jpeg" alt="Beef Chuck" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="BeefChuckSteak">Qty:</label>
    <select name="BeefChuckSteak" id="BeefChuckSteak">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Beef Rib<p><img src="pictures/Beef Short Ribs.png" alt="Beef Rib" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="BeefShortRibs">Qty:</label>
    <select name="BeefShortRibs" id="BeefShortRibs">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
  </tr>
  <tr>
    <td><h3>Pork</h3></td>
    
    <td>Bacon<p><img src="pictures/Bacon.jpg" alt="Bacon" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Bacon">Qty:</label>
    <select name="Bacon" id="Bacon">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Sausage<p><img src="pictures/Sausage.png" alt="Sausage" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Sausage">Qty:</label>
    <select name="Sausage" id="Sausage">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
  </tr>
  <tr>
    <td><h3>Chicken</h3></td>
    
    <td>Chicken Breast<p><img src="pictures/Chicken Breast.jpg" alt="Chicken Breast" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="ChickenBreast">Qty:</label>
    <select name="ChickenBreast" id="ChickenBreast">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Chicken Thigh<p><img src="pictures/Chicken Thigh.jpg" alt="Chicken Thigh" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="ChickenThigh">Qty:</label>
    <select name="ChickenThigh" id="ChickenThigh">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
  </tr>
  <tr>
    <td><h3>Eggs</h3></td>
    
    <td>Duck Eggs<p><img src="pictures/Duck Egg.jpg" alt="Duck Eggs" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="DuckEgg">Qty:</label>
    <select name="DuckEgg" id="DuckEgg">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Chicken Eggs<p><img src="pictures/Chicken Egg.jpg" alt="Chicken Eggs" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="ChickenEgg">Qty:</label>
    <select name="ChickenEgg" id="ChickenEgg">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
  </tr>
  </table>

</body>
</html>