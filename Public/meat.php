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
<title>Meat & Poultry</title>
</head>

<body>
  <p>
        <a href="index.php">Go to Main</a>
        <br><a href="logout.php" class="btn btn-danger">Logout</a>
  </p>
  
<h2>Meat & Poultry</h2>

  <table style="width:100%">
  <tr>
    <td><h3>Beef</h3></td>
    <td>Beef Chuck<p><img src="pictures/Beef Chuck Steak.jpeg" alt="Beef Chuck" style="width:128px;height:128px;"></p>
    <label for="Beef Chuck">Qty:</label>
    <select name="Beef Chuck" id="Beef Chuck">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>Beef Rib<p><img src="pictures/Beef Short Ribs.png" alt="Beef Rib" style="width:128px;height:128px;"></p>
    <label for="Beef Rib">Qty:</label>
    <select name="Beef Rib" id="Beef Rib">
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
    <td><h3>Pork</h3></td>
    <td>Bacon<p><img src="pictures/Bacon.jpg" alt="Bacon" style="width:128px;height:128px;"></p>
    <label for="Bacon">Qty:</label>
    <select name="Bacon" id="Bacon">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>Sausage<p><img src="pictures/Sausage.png" alt="Sausage" style="width:128px;height:128px;"></p>
    <label for="Sausage">Qty:</label>
    <select name="Sausage" id="Sausage">
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
    <td><h3>Chicken</h3></td>
    <td>Chicken Breast<p><img src="pictures/Chicken Breast.jpg" alt="Chicken Breast" style="width:128px;height:128px;"></p>
    <label for="Chicken Breast">Qty:</label>
    <select name="Chicken Breast" id="Chicken Breast">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>Chicken Thigh<p><img src="pictures/Chicken Thigh.jpg" alt="Chicken Thigh" style="width:128px;height:128px;"></p>
    <label for="Chicken Thigh">Qty:</label>
    <select name="Chicken Thigh" id="Chicken Thigh">
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
    <td><h3>Eggs</h3></td>
    <td>Duck Eggs<p><img src="pictures/Duck Egg.jpg" alt="Duck Eggs" style="width:128px;height:128px;"></p>
    <label for="Duck Eggs">Qty:</label>
    <select name="Duck Eggs" id="Duck Eggs">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    </select>
    <input type="submit" value="Add to Cart">
    <input type="submit" value="Buy Now">
    </td>
    <td>Chicken Eggs<p><img src="pictures/Chicken Egg.jpg" alt="Chicken Eggs" style="width:128px;height:128px;"></p>
    <label for="Chicken Eggs">Qty:</label>
    <select name="Chicken Eggs" id="Chicken Eggs">
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