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
<title>Bread & Snacks</title>
</head>

<body>
  <p>
        <a href="index.php">Go to Main</a>
        <br><a href="logout.php" class="btn btn-danger">Logout</a>
  </p>
  
<h2>Bread & Snacks</h2>

  <table style="width:100%">
  <tr>
    <td><h3>Snacks</h3></td>
    <td>Popcorn<p><img src="pictures/Popcorn.jpg" alt="Popcorn" style="width:128px;height:128px;"></p>Popcorn
    <label for="Popcorn">Qty:</label>
    <select name="Popcorn" id="Popcorn">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>Pretzel<p><img src="pictures/Pretzel.jpg" alt="Pretzel" style="width:128px;height:128px;"></p>Pretzel
    <label for="Pretzel">Qty:</label>
    <select name="Pretzel" id="Pretzel">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
  </tr>
  <tr>
    <td><h3>Bread</h3></td>
    <td>Baguette<p><img src="pictures/Baguette.jpg" alt="Baguette" style="width:128px;height:128px;"></p>
    <label for="Baguette">Qty:</label>
    <select name="Baguette" id="Baguette">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>White Bread<p><img src="pictures/White Bread.jpg" alt="White Bread" style="width:128px;height:128px;"></p>
    <label for="White Bread">Qty:</label>
    <select name="White Bread" id="White Bread">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
  </tr>
  <tr>
    <td><h3>Ice Cream</h3></td>
    <td>Melona<p><img src="pictures/Melona.jpg" alt="Melona" style="width:128px;height:128px;"></p>
    <label for="Melona">Qty:</label>
    <select name="Melona" id="Melona">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>World Cone<p><img src="pictures/World Cone.jpg" alt="World Cone" style="width:128px;height:128px;"></p>
    <label for="World Cone">Qty:</label>
    <select name="World Cone" id="World Cone">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
  </tr>
  <tr>
    <td><h3>Candy</h3></td>
    <td>Skittles<p><img src="pictures/Skittles.jpg" alt="Skittles" style="width:128px;height:128px;"></p>
    <label for="Skittles">Qty:</label>
    <select name="Skittles" id="Skittles">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>Starburst<p><img src="pictures/Starburst.jpg" alt="Starburst" style="width:128px;height:128px;"></p>
    <label for="Starburst">Qty:</label>
    <select name="Starburst" id="Starburst">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
  </tr>
  </table>

</body>
</html>