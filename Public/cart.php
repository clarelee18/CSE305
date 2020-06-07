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
      <a href="index.php">Go to Main</a>
      <br><a href="logout.php" class="btn btn-danger">Logout</a>
  </p>
  
  <h2>Cart</h2>
  
  <?php   
  // --Water & Beverages--
  $option_fiji = isset($_POST['Fiji']) ? $_POST['Fiji'] : false;
  $option_samdasoo = isset($_POST['Samdasoo']) ? $_POST['Samdasoo'] : false;
  $option_sprite = isset($_POST['Sprite']) ? $_POST['Sprite'] : false;
  $option_pepsi = isset($_POST['Pepsi']) ? $_POST['Pepsi'] : false;
  $option_latte = isset($_POST['Latte']) ? $_POST['Latte'] : false;
  $option_americano = isset($_POST['Americano']) ? $_POST['Americano'] : false;
  $option_peppermint = isset($_POST['Peppermint']) ? $_POST['Peppermint'] : false;
  $option_rooibos = isset($_POST['Rooibos']) ? $_POST['Rooibos'] : false;
  $option_orange = isset($_POST['Orange']) ? $_POST['Orange'] : false;
  $option_apple = isset($_POST['Apple']) ? $_POST['Apple'] : false;
  $option_strawberry = isset($_POST['Strawberry']) ? $_POST['Strawberry'] : false;
  $option_banana = isset($_POST['Banana']) ? $_POST['Banana'] : false;
   
  // --Water & Beverages--
  if ($option_fiji) {
      $product_name = "Fiji";
      $product_qty = $_POST['Fiji'];
      //echo $product_name. ": " . $product_qty;
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
  }
  if ($option_samdasoo) {
      $product_name = "Samdasoo";
      $product_qty = $_POST['Samdasoo'];
      //echo $product_name. ": " . $product_qty;
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
  }       
   if ($option_sprite) {
      $product_name = "Sprite";
      $product_qty = $_POST['Sprite'];
      //echo "Sprite: ". htmlentities($_POST['Sprite'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_pepsi) {
      $product_name = "Pepsi";
      $product_qty = $_POST['Pepsi'];
      //echo "Pepsi: ". htmlentities($_POST['Pepsi'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_latte) {
      $product_name = "Latte";
      $product_qty = $_POST['Latte'];
      //cho "Latte: ". htmlentities($_POST['Latte'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_americano) {
      $product_name = "Americano";
      $product_qty = $_POST['Americano'];
      //echo "Americano: ". htmlentities($_POST['Americano'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_peppermint) {
      $product_name = "Peppermint";
      $product_qty = $_POST['Peppermint'];
      //echo "Peppermint Tea: ". htmlentities($_POST['Peppermint'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_rooibos) {
      $product_name = "Rooibos";
      $product_qty = $_POST['Rooibos'];
      //echo "Rooibos Tea: ". htmlentities($_POST['Rooibos'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_orange) {
      $product_name = "Orange";
      $product_qty = $_POST['Orange'];
      //echo "Orange Juice: ". htmlentities($_POST['Orange'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_apple) {
      $product_name = "Apple";
      $product_qty = $_POST['Apple'];
      //echo "Apple Juice: ". htmlentities($_POST['Apple'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_strawberry) {
      $product_name = "Strawberry";
      $product_qty = $_POST['Strawberry'];
      //echo "Strawberry Milk: ". htmlentities($_POST['Strawberry'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_banana) {
      $product_name = "Banana";
      $product_qty = $_POST['Banana'];
      //echo "Banana Milk: ". htmlentities($_POST['Banana'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   
   // --Meat & Poultry--
   $option_beef_chuck = isset($_POST['Beef_Chuck']) ? $_POST['Beef_Chuck'] : false;
   $option_beef_rib = isset($_POST['Beef_Rib']) ? $_POST['Beef_Rib'] : false;
   $option_bacon = isset($_POST['Bacon']) ? $_POST['Bacon'] : false;
   $option_sausage = isset($_POST['Sausage']) ? $_POST['Sausage'] : false;
   $option_chicken_breast = isset($_POST['Chicken_Breast']) ? $_POST['Chicken_Breast'] : false;
   $option_chicken_thigh = isset($_POST['Chicken_Thigh']) ? $_POST['Chicken_Thigh'] : false;
   $option_duck_eggs = isset($_POST['Duck_Eggs']) ? $_POST['Duck_Eggs'] : false;
   $option_chicken_eggs = isset($_POST['Chicken_Eggs']) ? $_POST['Chicken_Eggs'] : false;
   
   // --Meat & Poultry--
   if ($option_beef_chuck) {
      $product_name = "Beef_Chuck";
      $product_qty = $_POST['Beef_Chuck'];
      //echo "Beef Chuck: ". htmlentities($_POST['Beef_Chuck'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_beef_rib) {
      $product_name = "Beef_Rib";
      $product_qty = $_POST['Beef_Rib'];
      //echo "Beef Rib: ". htmlentities($_POST['Beef_Rib'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_bacon) {
      $product_name = "Bacon";
      $product_qty = $_POST['Bacon'];
      //echo "Bacon: ". htmlentities($_POST['Bacon'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_sausage) {
      $product_name = "Sausage";
      $product_qty = $_POST['Sausage'];
      //echo "Sausage: ". htmlentities($_POST['Sausage'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_chicken_breast) {
      $product_name = "Chicken_Breast";
      $product_qty = $_POST['Chicken_Breast'];
      //echo "Chicken Breast: ". htmlentities($_POST['Chicken_Breast'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_chicken_thigh) {
      $product_name = "Chicken_Thigh";
      $product_qty = $_POST['Chicken_Thigh'];
      //echo "Chicken Thigh: ". htmlentities($_POST['Chicken_Thigh'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_duck_eggs) {
      $product_name = "Duck_Eggs";
      $product_qty = $_POST['Duck_Eggs'];
      //echo "Duck Eggs: ". htmlentities($_POST['Duck_Eggs'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_chicken_eggs) {
      $product_name = "Chicken_Eggs";
      $product_qty = $_POST['Chicken_Eggs'];
      //echo "Chicken Eggs: ". htmlentities($_POST['Chicken_Eggs'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   
   // --Seafood--
   $option_tuna = isset($_POST['Tuna']) ? $_POST['Tuna'] : false;
   $option_salmon = isset($_POST['Salmon']) ? $_POST['Salmon'] : false;
   $option_scallop = isset($_POST['Scallop']) ? $_POST['Scallop'] : false;
   $option_oyster = isset($_POST['Oyster']) ? $_POST['Oyster'] : false;
   $option_laver = isset($_POST['Laver']) ? $_POST['Laver'] : false;
   $option_dried_squid = isset($_POST['Dried_Squid']) ? $_POST['Dried_Squid'] : false;
   
   // --Seafood--
   if ($option_tuna) {
      $product_name = "Tuna";
      $product_qty = $_POST['Tuna'];
      //echo "Tuna: ". htmlentities($_POST['Tuna'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_salmon) {
      $product_name = "Salmon";
      $product_qty = $_POST['Salmon'];
      //echo "Salmon: ". htmlentities($_POST['Salmon'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_scallop) {
      $product_name = "Scallop";
      $product_qty = $_POST['Scallop'];
      //echo "Scallop: ". htmlentities($_POST['Scallop'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_oyster) {
      $product_name = "Oyster";
      $product_qty = $_POST['Oyster'];
      //echo "Oyster: ". htmlentities($_POST['Oyster'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_laver) {
      $product_name = "Laver";
      $product_qty = $_POST['Laver'];
      //echo "Laver: ". htmlentities($_POST['Laver'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_dried_squid) {
      $product_name = "Dried_Squid";
      $product_qty = $_POST['Dried_Squid'];
      //echo "Dried Squid: ". htmlentities($_POST['Dried_Squid'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   
   // --Bread & Snacks--
   $option_popcorn = isset($_POST['Popcorn']) ? $_POST['Popcorn'] : false;
   $option_pretzel = isset($_POST['Pretzel']) ? $_POST['Pretzel'] : false;
   $option_baguette = isset($_POST['Baguette']) ? $_POST['Baguette'] : false;
   $option_white_bread = isset($_POST['White_Bread']) ? $_POST['White_Bread'] : false;
   $option_melona = isset($_POST['Melona']) ? $_POST['Melona'] : false;
   $option_world_cone = isset($_POST['World_Cone']) ? $_POST['World_Cone'] : false;
   $option_skittles = isset($_POST['Skittles']) ? $_POST['Skittles'] : false;
   $option_starburst = isset($_POST['Starburst']) ? $_POST['Starburst'] : false;
   
   // --Bread & Snacks--
   if ($option_popcorn) {
      $product_name = "Popcorn";
      $product_qty = $_POST['Popcorn'];
      //echo "Popcorn: ". htmlentities($_POST['Popcorn'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_pretzel) {
      $product_name = "Pretzel";
      $product_qty = $_POST['Pretzel'];
      //echo "Pretzel: ". htmlentities($_POST['Pretzel'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_baguette) {
      $product_name = "Baguette";
      $product_qty = $_POST['Baguette'];
      //echo "Baguette: ". htmlentities($_POST['Baguette'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_white_bread) {
      $product_name = "White_Bread";
      $product_qty = $_POST['White_Bread'];
      //echo "White Bread: ". htmlentities($_POST['White_Bread'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_melona) {
      $product_name = "Melona";
      $product_qty = $_POST['Melona'];
      //echo "Melona: ". htmlentities($_POST['Melona'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_world_cone) {
      $product_name = "World_Cone";
      $product_qty = $_POST['World_Cone'];
      //echo "World Cone: ". htmlentities($_POST['World_Cone'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_skittles) {
      $product_name = "Skittles";
      $product_qty = $_POST['Skittles'];
      //echo "Skittles: ". htmlentities($_POST['Skittles'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_starburst) {
      $product_name = "Starburst";
      $product_qty = $_POST['Starburst'];
      //echo "Starburst: ". htmlentities($_POST['Starburst'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   
   // --Processed Food--
   $option_udon_noodles = isset($_POST['Udon_Noodles']) ? $_POST['Udon_Noodles'] : false;
   $option_soba_soodles = isset($_POST['Soba_Noodles']) ? $_POST['Soba_Noodles'] : false;
   $option_blackberry_jam = isset($_POST['Blackberry_Jam']) ? $_POST['Blackberry_Jam'] : false;
   $option_apricot_jam = isset($_POST['Apricot_Jam']) ? $_POST['Apricot_Jam'] : false;
   $option_cumin = isset($_POST['Cumin']) ? $_POST['Cumin'] : false;
   $option_cinnamon = isset($_POST['Cinnamon']) ? $_POST['Cinnamon'] : false;
   $option_avocado_oil = isset($_POST['Avocado_Oil']) ? $_POST['Avocado_Oil'] : false;
   $option_almond_oil = isset($_POST['Almond_Oil']) ? $_POST['Almond_Oil'] : false;
   
   // --Processed Food--
   if ($option_udon_noodles) {
      $product_name = "Udon_Noodles";
      $product_qty = $_POST['Udon_Noodles'];
      //echo "Udon Noodles: ". htmlentities($_POST['Udon_Noodles'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_soba_soodles) {
      $product_name = "Soba_Noodles";
      $product_qty = $_POST['Soba_Noodles'];
      //echo "Soba Noodles: ". htmlentities($_POST['Soba_Noodles'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_blackberry_jam) {
      $product_name = "Blackberry_Jam";
      $product_qty = $_POST['Blackberry_Jam'];
      //echo "Blackberry Jam: ". htmlentities($_POST['Blackberry_Jam'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_apricot_jam) {
      $product_name = "Apricot_Jam";
      $product_qty = $_POST['Apricot_Jam'];
      //echo "Apricot Jam: ". htmlentities($_POST['Apricot_Jam'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_cumin) {
      $product_name = "Cumin";
      $product_qty = $_POST['Cumin'];
      //echo "Cumin: ". htmlentities($_POST['Cumin'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_cinnamon) {
      $product_name = "Cinnamon";
      $product_qty = $_POST['Cinnamon'];
      //echo "Cinnamon: ". htmlentities($_POST['Cinnamon'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_avocado_oil) {
      $product_name = "Avocado_Oil";
      $product_qty = $_POST['Avocado_Oil'];
      //echo "Avocado Oil: ". htmlentities($_POST['Avocado_Oil'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
   }
   if ($option_almond_oil) {
      $product_name = "Almond_Oil";
      $product_qty = $_POST['Almond_Oil'];
      //echo "Almond Oil: ". htmlentities($_POST['Almond_Oil'], ENT_QUOTES, "UTF-8");
      $newproduct = array($product_name, $product_qty);
      array_push($_SESSION['product'], $newproduct);
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
   
  ?>
  
</body>
</html>