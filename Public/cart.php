
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
</head>
<body>
  <p>
      <a href="index.php" class="btn btn-primary">Go to Main</a>
      <br><a href="logout.php" class="btn btn-danger">Logout</a>
      <a href="checkout.php" class="btn btn-primary">checkout</a>
  </p>
  
  <h2>Cart</h2>

  <?php   
  //--SQL
  require_once 'config.php';  
  $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) die($conn->connect_error);

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
      $product_name = "Fiji";
      $product_qty = $_POST['Fiji'];
      //echo $product_name. ": " . $product_qty;
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      //addProduct($product_name, $product_qty);
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
  }
  if ($option_samdasoo) {
      $product_name = "Samdasoo";
      $product_qty = $_POST['Samdasoo'];
      //echo $product_name. ": " . $product_qty;
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
  }       
   if ($option_sprite) {
      $product_name = "Sprite";
      $product_qty = $_POST['Sprite'];
      //echo "Sprite: ". htmlentities($_POST['Sprite'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_pepsi) {
      $product_name = "Pepsi";
      $product_qty = $_POST['Pepsi'];
      //echo "Pepsi: ". htmlentities($_POST['Pepsi'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_latte) {
      $product_name = "Latte";
      $product_qty = $_POST['Latte'];
      //cho "Latte: ". htmlentities($_POST['Latte'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_americano) {
      $product_name = "Americano";
      $product_qty = $_POST['Americano'];
      //echo "Americano: ". htmlentities($_POST['Americano'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_peppermint) {
      $product_name = "PeppermintTea";
      $product_qty = $_POST['PeppermintTea'];
      //echo "Peppermint Tea: ". htmlentities($_POST['PeppermintTea'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_rooibos) {
      $product_name = "RooibosTea";
      $product_qty = $_POST['RooibosTea'];
      //echo "Rooibos Tea: ". htmlentities($_POST['RooibosTea'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_orange) {
      $product_name = "OrangeJuice";
      $product_qty = $_POST['OrangeJuice'];
      //echo "Orange Juice: ". htmlentities($_POST['OrangeJuice'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_apple) {
      $product_name = "AppleJuice";
      $product_qty = $_POST['AppleJuice'];
      //echo "Apple Juice: ". htmlentities($_POST['AppleJuice'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_strawberry) {
      $product_name = "StrawberryMilk";
      $product_qty = $_POST['StrawberryMilk'];
      //echo "Strawberry Milk: ". htmlentities($_POST['StrawberryMilk'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_banana) {
      $product_name = "BananaMilk";
      $product_qty = $_POST['BananaMilk'];
      //echo "Banana Milk: ". htmlentities($_POST['BananaMilk'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
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
      $product_name = "BeefChuckSteak";
      $product_qty = $_POST['BeefChuckSteak'];
      //echo "Beef Chuck: ". htmlentities($_POST['BeefChuckSteak'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_beef_rib) {
      $product_name = "BeefShortRibs";
      $product_qty = $_POST['BeefShortRibs'];
      //echo "Beef Rib: ". htmlentities($_POST['BeefShortRibs'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_bacon) {
      $product_name = "Bacon";
      $product_qty = $_POST['Bacon'];
      //echo "Bacon: ". htmlentities($_POST['Bacon'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_sausage) {
      $product_name = "Sausage";
      $product_qty = $_POST['Sausage'];
      //echo "Sausage: ". htmlentities($_POST['Sausage'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_chicken_breast) {
      $product_name = "ChickenBreast";
      $product_qty = $_POST['ChickenBreast'];
      //echo "Chicken Breast: ". htmlentities($_POST['ChickenBreast'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_chicken_thigh) {
      $product_name = "ChickenThigh";
      $product_qty = $_POST['ChickenThigh'];
      //echo "Chicken Thigh: ". htmlentities($_POST['ChickenThigh'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_duck_eggs) {
      $product_name = "DuckEgg";
      $product_qty = $_POST['DuckEgg'];
      //echo "Duck Eggs: ". htmlentities($_POST['DuckEgg'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_chicken_eggs) {
      $product_name = "ChickenEgg";
      $product_qty = $_POST['ChickenEgg'];
      //echo "Chicken Eggs: ". htmlentities($_POST['ChickenEgg'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
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
      $product_name = "Tuna";
      $product_qty = $_POST['Tuna'];
      //echo "Tuna: ". htmlentities($_POST['Tuna'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_salmon) {
      $product_name = "Salmon";
      $product_qty = $_POST['Salmon'];
      //echo "Salmon: ". htmlentities($_POST['Salmon'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_scallop) {
      $product_name = "Scallop";
      $product_qty = $_POST['Scallop'];
      //echo "Scallop: ". htmlentities($_POST['Scallop'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_oyster) {
      $product_name = "Oyster";
      $product_qty = $_POST['Oyster'];
      //echo "Oyster: ". htmlentities($_POST['Oyster'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_laver) {
      $product_name = "Laver";
      $product_qty = $_POST['Laver'];
      //echo "Laver: ". htmlentities($_POST['Laver'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_dried_squid) {
      $product_name = "DriedSquid";
      $product_qty = $_POST['DriedSquid'];
      //echo "Dried Squid: ". htmlentities($_POST['DriedSquid'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
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
      $product_name = "Popcorn";
      $product_qty = $_POST['Popcorn'];
      //echo "Popcorn: ". htmlentities($_POST['Popcorn'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_pretzel) {
      $product_name = "Pretzel";
      $product_qty = $_POST['Pretzel'];
      //echo "Pretzel: ". htmlentities($_POST['Pretzel'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_baguette) {
      $product_name = "Baguette";
      $product_qty = $_POST['Baguette'];
      //echo "Baguette: ". htmlentities($_POST['Baguette'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_white_bread) {
      $product_name = "WhiteBread";
      $product_qty = $_POST['WhiteBread'];
      //echo "White Bread: ". htmlentities($_POST['WhiteBread'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_melona) {
      $product_name = "Melona";
      $product_qty = $_POST['Melona'];
      //echo "Melona: ". htmlentities($_POST['Melona'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_world_cone) {
      $product_name = "WorldCone";
      $product_qty = $_POST['WorldCone'];
      //echo "World Cone: ". htmlentities($_POST['World_Cone'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_skittles) {
      $product_name = "Skittles";
      $product_qty = $_POST['Skittles'];
      //echo "Skittles: ". htmlentities($_POST['Skittles'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_starburst) {
      $product_name = "Starburst";
      $product_qty = $_POST['Starburst'];
      //echo "Starburst: ". htmlentities($_POST['Starburst'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
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
      $product_name = "UdonNoodles";
      $product_qty = $_POST['UdonNoodles'];
      //echo "Udon Noodles: ". htmlentities($_POST['UdonNoodles'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_soba_soodles) {
      $product_name = "SobaNoodles";
      $product_qty = $_POST['SobaNoodles'];
      //echo "Soba Noodles: ". htmlentities($_POST['SobaNoodles'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_blackberry_jam) {
      $product_name = "BlackberryJam";
      $product_qty = $_POST['BlackberryJam'];
      //echo "Blackberry Jam: ". htmlentities($_POST['BlackberryJam'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_apricot_jam) {
      $product_name = "ApricotJam";
      $product_qty = $_POST['ApricotJam'];
      //echo "Apricot Jam: ". htmlentities($_POST['ApricotJam'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_cumin) {
      $product_name = "Cumin";
      $product_qty = $_POST['Cumin'];
      //echo "Cumin: ". htmlentities($_POST['Cumin'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_cinnamon) {
      $product_name = "Cinnamon";
      $product_qty = $_POST['Cinnamon'];
      //echo "Cinnamon: ". htmlentities($_POST['Cinnamon'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_avocado_oil) {
      $product_name = "AvocadoOil";
      $product_qty = $_POST['AvocadoOil'];
      //echo "Avocado Oil: ". htmlentities($_POST['AvocadoOil'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   if ($option_almond_oil) {
      $product_name = "AlmondOil";
      $product_qty = $_POST['AlmondOil'];
      //echo "Almond Oil: ". htmlentities($_POST['AlmondOil'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
      //--SQL
      $query = "INSERT INTO Made_of (sid, productname) VALUES (1, '$product_name')";
      $result   = $conn->query($query);
      $query = "UPDATE Shopping_Cart SET number_of_items = number_of_items+'$product_qty' WHERE sid=1";
      $result   = $conn->query($query);
   }
   
  foreach($_SESSION['product'] as $cart_list) {
    for($i = 0 ; $i < count($cart_list) ; $i++) {
     if ($i == 1) {
       $cart_list[$i] = intval($cart_list[$i]);
       }
     //echo '<td>'.$_SESSION['product'][$i].'</td>';
    //var_dump($_SESSION['product']);
    //print_r($cart_list);
    echo ($cart_list[$i])."<br/>";
    }
  }
  
  // create mysqli object 
  //require_once 'config.php';  
  //$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  //if ($conn->connect_error) die($conn->connect_error);

  if ($option_fiji || $option_samdasoo) {
    //select cost from products where productname = "Fiji";
    $query = "SELECT cost FROM Products WHERE productname = '". $product_name."'";
    $result   = $conn->query($query);
    if (!$result) echo "SELECT failed: $query<br>" .
      $conn->error . "<br><br>";
      
    // Perform query
    if ($result && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        echo "Price: ". $row["cost"]. " Won <br>";
      }
    }
  }
  
   
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
