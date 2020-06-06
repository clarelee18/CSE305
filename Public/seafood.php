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
<title>Seafood</title>
</head>

<body>
  <p>
        <a href="index.php">Go to Main</a>
        <br><a href="logout.php" class="btn btn-danger">Logout</a>
  </p>
  
<h2>Seafood</h2>

  <table style="width:100%">
  <tr>
    <td><h3>Fish</h3></td>
    
    <td>Tuna<p><img src="pictures/Tuna.jpg" alt="Tuna" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Tuna">Qty:</label>
    <select name="Tuna" id="Tuna">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Salmon<p><img src="pictures/Salmon.jpg" alt="Salmon" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Salmon">Qty:</label>
    <select name="Salmon" id="Salmon">
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
    <td><h3>Shellfish & Snails</h3></td>
    
    <td>Scallop<p><img src="pictures/Scallop.jpeg" alt="Scallop" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Scallop">Qty:</label>
    <select name="Scallop" id="Scallop">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Oyster<p><img src="pictures/Oyster.jpg" alt="Oyster" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Oyster">Qty:</label>
    <select name="Oyster" id="Oyster">
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
    <td><h3>Dried Seafoods</h3></td>
    
    <td>Laver<p><img src="pictures/Laver.jpg" alt="Laver" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Laver">Qty:</label>
    <select name="Laver" id="Laver">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now" formaction="buy.php">
    </form>
    </td>
    
    <td>Dried Squid<p><img src="pictures/Dried Squid.jpg" alt="Dried Squid" style="width:128px;height:128px;"></p>
    <form action="cart.php" method="post">
    <label for="Dried_Squid">Qty:</label>
    <select name="Dried_Squid" id="Dried_Squid">
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