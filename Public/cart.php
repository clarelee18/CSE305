
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
   <title>Cart</title>
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
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  
  <h2>Cart</h2>
  <p><a href="checkout.php" class="btn btn-primary">Checkout</a></p>

  <?php   
  
  //--SQL
  require_once 'config.php';  
  $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) die($conn->connect_error);

  // function for managing cart item
    function ManageCartItem($product_qty) {
      $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
      if ($con->connect_error) die($con->connect_error);
      
      // Get specific cart of specific user
      $username = $_SESSION["username"];
      $query = "SELECT DISTINCT sid FROM Manages WHERE username='$username'";
      $result   = $con->query($query);
      $row = mysqli_fetch_assoc($result);
      $cartID = $row['sid'];

/*
      if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $cartID. " . mysqli_error($link);
    }
*/
      $product_name = $_POST['product'];
      $product_qty = intval($product_qty);
      $product_price = intval($_POST['price']);
      $total_price = $product_price * $product_qty;
      
      // check if the array has same item
      $length = count($_SESSION['product']);
      $position = $length;
      
      for($i = 0; $i < $length; $i++) {
          if ($_SESSION['product'][$i][0] == $product_name) {
            $position = $i;
            break;
            }
        }
      if ($position == $length) {
        $newproduct = array($product_name, $product_qty, $total_price, $product_price);
        array_push($_SESSION['product'], $newproduct);
      }
      else {
        // add it to previous value of the quantity
        $_SESSION['product'][$position][1] += $product_qty;
        $_SESSION['product'][$position][2] += $total_price; 
      }
      
      //--SQL
      //addProduct($product_name, $product_qty);
      //need to modify query statement???
      $query = "INSERT INTO Made_of (sid, productname) VALUES ('$cartID', '$product_name')";
      $result = $con->query($query);
      //if (!$result) die ("Database access failed: " . $conn->error);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid='$cartID'";
      $result = $con->query($query);
      //if (!$result) die ("Database access failed: " . $conn->error);
    }

  // --Water & Beverages--
  $option_fiji = isset($_POST['Fiji']) ? $_POST['Fiji'] : false;
  $option_samdasoo = isset($_POST['Samdasoo']) ? $_POST['Samdasoo'] : false;
  $option_sprite = isset($_POST['Sprite']) ? $_POST['Sprite'] : false;
  $option_pepsi = isset($_POST['Pepsi']) ? $_POST['Pepsi'] : false;
  $option_latte = isset($_POST['Latte']) ? $_POST['Latte'] : false;
  $option_americano = isset($_POST['Americano']) ? $_POST['Americano'] : false;
  $option_peppermint = isset($_POST['PeppermintTea']) ? $_POST['PeppermintTea'] : false;
  $option_rooibos = isset($_POST['RooibosTea']) ? $_POST['RooibosTea'] : false;
  $option_orange = isset($_POST['OrangeJuice']) ? $_POST['OrangeJuice'] : false;
  $option_apple = isset($_POST['AppleJuice']) ? $_POST['AppleJuice'] : false;
  $option_strawberry = isset($_POST['StrawberryMilk']) ? $_POST['StrawberryMilk'] : false;
  $option_banana = isset($_POST['BananaMilk']) ? $_POST['BananaMilk'] : false;
   

  // --Water & Beverages--
  if ($option_fiji) {
     ManageCartItem($_POST['Fiji']);
  }
  if ($option_samdasoo) {
     ManageCartItem($_POST['Samdasoo']);
  }       
  if ($option_sprite) {
     ManageCartItem($_POST['Sprite']);
  }
   if ($option_pepsi) {
     ManageCartItem($_POST['Pepsi']);
   }
   if ($option_latte) {
     ManageCartItem($_POST['Latte']);
   }
   if ($option_americano) {
     ManageCartItem($_POST['Americano']);
   }
   if ($option_peppermint) {
     ManageCartItem($_POST['PeppermintTea']);
   }
   if ($option_rooibos) {
     ManageCartItem($_POST['RooibosTea']);
   }
   if ($option_orange) {
     ManageCartItem($_POST['OrangeJuice']);
   }
   if ($option_apple) {
     ManageCartItem($_POST['AppleJuice']);
   }
   if ($option_strawberry) {
     ManageCartItem($_POST['StrawberryMilk']);
   }
   if ($option_banana) {
     ManageCartItem($_POST['BananaMilk']);
   }
   
   // --Meat & Poultry--
   $option_beef_chuck = isset($_POST['BeefChuckSteak']) ? $_POST['BeefChuckSteak'] : false;
   $option_beef_rib = isset($_POST['BeefShortRibs']) ? $_POST['BeefShortRibs'] : false;
   $option_bacon = isset($_POST['Bacon']) ? $_POST['Bacon'] : false;
   $option_sausage = isset($_POST['Sausage']) ? $_POST['Sausage'] : false;
   $option_chicken_breast = isset($_POST['ChickenBreast']) ? $_POST['ChickenBreast'] : false;
   $option_chicken_thigh = isset($_POST['ChickenThigh']) ? $_POST['ChickenThigh'] : false;
   $option_duck_eggs = isset($_POST['DuckEgg']) ? $_POST['DuckEgg'] : false;
   $option_chicken_eggs = isset($_POST['ChickenEgg']) ? $_POST['ChickenEgg'] : false;
   
   // --Meat & Poultry--
   if ($option_beef_chuck) {
     ManageCartItem($_POST['BeefChuckSteak']);
   }
   if ($option_beef_rib) {
     ManageCartItem($_POST['BeefShortRibs']);
   }
   if ($option_bacon) {
     ManageCartItem($_POST['Bacon']);
   }
   if ($option_sausage) {
     ManageCartItem($_POST['Sausage']);
   }
   if ($option_chicken_breast) {
     ManageCartItem($_POST['ChickenBreast']);
   }
   if ($option_chicken_thigh) {
     ManageCartItem($_POST['ChickenThigh']);
   }
   if ($option_duck_eggs) {
     ManageCartItem($_POST['DuckEgg']);
   }
   if ($option_chicken_eggs) {
     ManageCartItem($_POST['ChickenEgg']);
   }
   
   // --Seafood--
   $option_tuna = isset($_POST['Tuna']) ? $_POST['Tuna'] : false;
   $option_salmon = isset($_POST['Salmon']) ? $_POST['Salmon'] : false;
   $option_scallop = isset($_POST['Scallop']) ? $_POST['Scallop'] : false;
   $option_oyster = isset($_POST['Oyster']) ? $_POST['Oyster'] : false;
   $option_laver = isset($_POST['Laver']) ? $_POST['Laver'] : false;
   $option_dried_squid = isset($_POST['DriedSquid']) ? $_POST['DriedSquid'] : false;
   
   // --Seafood--
   if ($option_tuna) {
     ManageCartItem($_POST['Tuna']);
   }
   if ($option_salmon) {
     ManageCartItem($_POST['Salmon']);
   }
   if ($option_scallop) {
     ManageCartItem($_POST['Scallop']);
   }
   if ($option_oyster) {
     ManageCartItem($_POST['Oyster']);
   }
   if ($option_laver) {
     ManageCartItem($_POST['Laver']);
   }
   if ($option_dried_squid) {
     ManageCartItem($_POST['DriedSquid']);
   }
   
   // --Bread & Snacks--
   $option_popcorn = isset($_POST['Popcorn']) ? $_POST['Popcorn'] : false;
   $option_pretzel = isset($_POST['Pretzel']) ? $_POST['Pretzel'] : false;
   $option_baguette = isset($_POST['Baguette']) ? $_POST['Baguette'] : false;
   $option_white_bread = isset($_POST['WhiteBread']) ? $_POST['WhiteBread'] : false;
   $option_melona = isset($_POST['Melona']) ? $_POST['Melona'] : false;
   $option_world_cone = isset($_POST['WorldCone']) ? $_POST['WorldCone'] : false;
   $option_skittles = isset($_POST['Skittles']) ? $_POST['Skittles'] : false;
   $option_starburst = isset($_POST['Starburst']) ? $_POST['Starburst'] : false;
   
   // --Bread & Snacks--
   if ($option_popcorn) {
     ManageCartItem($_POST['Popcorn']);
   }
   if ($option_pretzel) {
     ManageCartItem($_POST['Pretzel']);
   }
   if ($option_baguette) {
     ManageCartItem($_POST['Baguette']);
   }
   if ($option_white_bread) {
     ManageCartItem($_POST['WhiteBread']);
   }
   if ($option_melona) {
     ManageCartItem($_POST['Melona']);
   }
   if ($option_world_cone) {
     ManageCartItem($_POST['WorldCone']);
   }
   if ($option_skittles) {
     ManageCartItem($_POST['Skittles']);
   }
   if ($option_starburst) {
     ManageCartItem($_POST['Starburst']);
   }
   
   // --Processed Food--
   $option_udon_noodles = isset($_POST['UdonNoodles']) ? $_POST['UdonNoodles'] : false;
   $option_soba_soodles = isset($_POST['SobaNoodles']) ? $_POST['SobaNoodles'] : false;
   $option_blackberry_jam = isset($_POST['BlackberryJam']) ? $_POST['BlackberryJam'] : false;
   $option_apricot_jam = isset($_POST['ApricotJam']) ? $_POST['ApricotJam'] : false;
   $option_cumin = isset($_POST['Cumin']) ? $_POST['Cumin'] : false;
   $option_cinnamon = isset($_POST['Cinnamon']) ? $_POST['Cinnamon'] : false;
   $option_avocado_oil = isset($_POST['AvocadoOil']) ? $_POST['AvocadoOil'] : false;
   $option_almond_oil = isset($_POST['AlmondOil']) ? $_POST['AlmondOil'] : false;
   
   // --Processed Food--
   if ($option_udon_noodles) {
     ManageCartItem($_POST['UdonNoodles']);
   }
   if ($option_soba_soodles) {
     ManageCartItem($_POST['SobaNoodles']);
   }
   if ($option_blackberry_jam) {
     ManageCartItem($_POST['BlackberryJam']);
   }
   if ($option_apricot_jam) {
     ManageCartItem($_POST['ApricotJam']);
   }
   if ($option_cumin) {
     ManageCartItem($_POST['Cumin']);
   }
   if ($option_cinnamon) {
     ManageCartItem($_POST['Cinnamon']);
   }
   if ($option_avocado_oil) {
     ManageCartItem($_POST['AvocadoOil']);
   }
   if ($option_almond_oil) {
     ManageCartItem($_POST['AlmondOil']);
   }
   
  echo <<<_END
    <table style="width:100%">
      <tr>
        <td>Product Name</td>
        <td>Quantity</td>
        <td>Price</td>
      </tr>
  _END;
  
  $order_price = 0;
  foreach($_SESSION['product'] as $cart_list) {
      echo <<<_END
        <tr>
        <td>$cart_list[0]</td>
        <td>$cart_list[1]</td>
        <td>$cart_list[2] &nbsp Won</td>
        
        <form action = "cart.php" method='POST'>
        <input type="hidden" name="delete_product" value="$cart_list[0]">
        <td><input type = "submit" value="Delete" name="submit"/></td>
        </tr>
        </form>        
      _END;
      
      $order_price += $cart_list[2];
      
    //echo $cart_list[$i]."\t";
    //echo '<td>'.$_SESSION['product'][$i].'</td>';
    //var_dump($cart_list[$i]);
    //print_r($cart_list);
  }
  echo <<<_END
  <tr>
  <td></td>
  <td>Total: </td>
  <td>$order_price &nbsp Won</td>
  </tr>
  </table>
  _END;
  
  $option_delete = isset($_POST['submit']) ? $_POST['submit'] : false;
  if($option_delete){
     deleteItem($_POST['delete_product']);
  }
  
  function deleteItem($product_name) {
    $length = count($_SESSION['product']);
    $index = 0;
    
    for($i = 0; $i < $length; $i++) {
      if ($_SESSION['product'][$i][0] == $product_name) {
        $index = $i;
        //break;
        }
      print_r($_SESSION['product'][$i]);
    }
    unset($_SESSION['product'][$index]);
    echo $length;
    //$_SESSION['product'] = array_diff($_SESSION['product'], $index);
  }
//  echo "</table>";
  
  // create mysqli object 
  //require_once 'config.php';  
  //$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  //if ($conn->connect_error) die($conn->connect_error);  
   
  //--SQL
  /*
      $sql = mysqli_query($conn, "SELECT * FROM Made_of WHERE sid=1");
      echo "<table border='1'>";
      while($row = mysqli_fetch_array($sql)){
         echo "<tr>";
         echo "<td>" . $row['productname'] . "</td>";
         echo "</tr>";
      }
      echo "</table>";
   */
      mysqli_close($conn);
      
  ?>
  
</body>
</html>
