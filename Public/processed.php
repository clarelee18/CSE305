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
<title>Processed Food</title>
</head>

<body>
  <p>
        <a href="index.php">Go to Main</a>
        <br><a href="welcome.php" class="btn btn-danger">MyPage</a>
  </p>
  
<h2>Processed Food</h2>

  <table style="width:100%">
  <tr>    
    <td><h3>Noodles</h3></td>
    
    <td>Udon Noodles<p><img src="pictures/Udon Noodles.jpg" alt="Udon Noodles" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="UdonNoodles">Qty:</label>
    <select name="UdonNoodles" id="UdonNoodles">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Soba Noodles<p><img src="pictures/Soba Noodles.jpg" alt="Soba Noodles" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="SobaNoodles">Qty:</label>
    <select name="SobaNoodles" id="SobaNoodles">
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
    <td><h3>Jams</h3></td>
    
    <td>Blackberry Jam<p><img src="pictures/Blackberry Jam.jpg" alt="Blackberry Jam" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="BlackberryJam">Qty:</label>
    <select name="BlackberryJam" id="BlackberryJam">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Apricot Jam<p><img src="pictures/Apricot Jam.jpg" alt="Apricot Jam" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="ApricotJam">Qty:</label>
    <select name="ApricotJam" id="ApricotJam">
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
    <td><h3>Seasonings <br> & Spices</h3></td>
    
    <td>Cumin<p><img src="pictures/Cumin.jpg" alt="Cumin" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Cumin">Qty:</label>
    <select name="Cumin" id="Cumin">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Cinnamon<p><img src="pictures/Cinnamon.jpg" alt="Cinnamon" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Cinnamon">Qty:</label>
    <select name="Cinnamon" id="Cinnamon">
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
    <td><h3>Oils</h3></td>
    
    <td>Avocado Oil<p><img src="pictures/Avocado Oil.jpg" alt="Avocado Oil" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="AvocadoOil">Qty:</label>
    <select name="AvocadoOil" id="AvocadoOil">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Almond Oil<p><img src="pictures/Almond Oil.jpg" alt="Almond Oil" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="AlmondOil">Qty:</label>
    <select name="AlmondOil" id="AlmondOil">
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