<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Water & Beverages</title>
</head>

<body>
  <p>
        <a href="index.php">Go to Main</a>
        <br><a href="logout.php" class="btn btn-danger">Logout</a>
  </p>
  
  <h2>Water & Beverages</h2> 

  <table style="width:100%">
  <tr>
    <td><h3>Water</h3></td>
    <div class="popup" onclick="popupFunction()">Water
        <span class="popuptext" id="waterpopup">
    </div>
    
    <td>Fiji<p><img src="pictures/Fiji.jpg" alt="Fiji" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Fiji">Qty:</label>
    <select name="Fiji" id="Fiji">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Samdasoo<p><img src="pictures/Samdasoo.jpeg" alt="Samdasoo" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Samdasoo">Qty:</label>
    <select name="Samdasoo" id="Samdasoo">
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
    <td><h3>Soda</h3></td>
    
    <td>Sprite<p><img src="pictures/Sprite.jpg" alt="Sprite" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Sprite">Qty:</label>
    <select name="Sprite" id="Sprite">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Pepsi<p><img src="pictures/Pepsi.jpeg" alt="Pepsi" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Pepsi">Qty:</label>
    <select name="Pepsi" id="Pepsi">
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
    <td><h3>Coffee</h3></td>
    
    <td>Latte<p><img src="pictures/Latte.jpg" alt="Latte" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Latte">Qty:</label>
    <select name="Latte" id="Latte">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Americano<p><img src="pictures/Americano.jpg" alt="Americano" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Americano">Qty:</label>
    <select name="Americano" id="Americano">
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
    <td><h3>Tea</h3></td>
    
    <td>Peppermint Tea<p><img src="pictures/Peppermint Tea.jpg" alt="Peppermint Tea" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Peppermint">Qty:</label>
    <select name="Peppermint" id="Peppermint">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Rooibos Tea<p><img src="pictures/Rooibos Tea.jpg" alt="Rooibos Tea" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Rooibos">Qty:</label>
    <select name="Rooibos" id="Rooibos">
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
    <td><h3>Juice</h3></td>
    
    <td>Orange Juice<p><img src="pictures/Orange Juice.jpeg" alt="Orange Juice" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Orange">Qty:</label>
    <select name="Orange" id="Orange">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Apple Juice<p><img src="pictures/Apple Juice.jpg" alt="Apple Juice" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Apple">Qty:</label>
    <select name="Apple" id="Apple">
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
    <td><h3>Milk</h3></td>
    
    <td>Strawberry Milk<p><img src="pictures/Strawberry Milk.jpg" alt="Strawberry Milk" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Strawberry">Qty:</label>
    <select name="Strawberry" id="Strawberry">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Banana Milk<p><img src="pictures/Banana Milk.jpg" alt="Banana Milk" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Banana">Qty:</label>
    <select name="Banana" id="Banana">
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