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
        <br><a href="welcome.php" class="btn btn-danger">MyPage</a>
        <br><a href="logout.php" class="btn btn-danger">Logout</a>
  </p>
  
  <h2>Cart</h2>

   <!-- 
     <p></?php
     $_SESSON['cart']-> display();

     ?></p>
  -->

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
      echo "Fiji: ". htmlentities($_POST['Fiji'], ENT_QUOTES, "UTF-8");
   }
   if ($option_samdasoo) {
      echo "Samdasoo: ". htmlentities($_POST['Samdasoo'], ENT_QUOTES, "UTF-8");
   }
   if ($option_sprite) {
      echo "Sprite: ". htmlentities($_POST['Sprite'], ENT_QUOTES, "UTF-8");
   }
   if ($option_pepsi) {
      echo "Pepsi: ". htmlentities($_POST['Pepsi'], ENT_QUOTES, "UTF-8");
   }
   if ($option_latte) {
      echo "Latte: ". htmlentities($_POST['Latte'], ENT_QUOTES, "UTF-8");
   }
   if ($option_americano) {
      echo "Americano: ". htmlentities($_POST['Americano'], ENT_QUOTES, "UTF-8");
   }
   if ($option_peppermint) {
      echo "Peppermint Tea: ". htmlentities($_POST['Peppermint'], ENT_QUOTES, "UTF-8");
   }
   if ($option_rooibos) {
      echo "Rooibos Tea: ". htmlentities($_POST['Rooibos'], ENT_QUOTES, "UTF-8");
   }
   if ($option_orange) {
      echo "Orange Juice: ". htmlentities($_POST['Orange'], ENT_QUOTES, "UTF-8");
   }
   if ($option_apple) {
      echo "Apple Juice: ". htmlentities($_POST['Apple'], ENT_QUOTES, "UTF-8");
   }
   if ($option_strawberry) {
      echo "Strawberry Milk: ". htmlentities($_POST['Strawberry'], ENT_QUOTES, "UTF-8");
   }
   if ($option_banana) {
      echo "Banana Milk: ". htmlentities($_POST['Banana'], ENT_QUOTES, "UTF-8");
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
      echo "Beef Chuck: ". htmlentities($_POST['Beef_Chuck'], ENT_QUOTES, "UTF-8");
   }
   if ($option_beef_rib) {
      echo "Beef Rib: ". htmlentities($_POST['Beef_Rib'], ENT_QUOTES, "UTF-8");
   }
   if ($option_bacon) {
      echo "Bacon: ". htmlentities($_POST['Bacon'], ENT_QUOTES, "UTF-8");
   }
   if ($option_sausage) {
      echo "Sausage: ". htmlentities($_POST['Sausage'], ENT_QUOTES, "UTF-8");
   }
   if ($option_chicken_breast) {
      echo "Chicken Breast: ". htmlentities($_POST['Chicken_Breast'], ENT_QUOTES, "UTF-8");
   }
   if ($option_chicken_thigh) {
      echo "Chicken Thigh: ". htmlentities($_POST['Chicken_Thigh'], ENT_QUOTES, "UTF-8");
   }
   if ($option_duck_eggs) {
      echo "Duck Eggs: ". htmlentities($_POST['Duck_Eggs'], ENT_QUOTES, "UTF-8");
   }
   if ($option_chicken_eggs) {
      echo "Chicken Eggs: ". htmlentities($_POST['Chicken_Eggs'], ENT_QUOTES, "UTF-8");
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
      echo "Tuna: ". htmlentities($_POST['Tuna'], ENT_QUOTES, "UTF-8");
   }
   if ($option_salmon) {
      echo "Salmon: ". htmlentities($_POST['Salmon'], ENT_QUOTES, "UTF-8");
   }
   if ($option_scallop) {
      echo "Scallop: ". htmlentities($_POST['Scallop'], ENT_QUOTES, "UTF-8");
   }
   if ($option_oyster) {
      echo "Oyster: ". htmlentities($_POST['Oyster'], ENT_QUOTES, "UTF-8");
   }
   if ($option_laver) {
      echo "Laver: ". htmlentities($_POST['Laver'], ENT_QUOTES, "UTF-8");
   }
   if ($option_dried_squid) {
      echo "Dried Squid: ". htmlentities($_POST['Dried_Squid'], ENT_QUOTES, "UTF-8");
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
      echo "Popcorn: ". htmlentities($_POST['Popcorn'], ENT_QUOTES, "UTF-8");
   }
   if ($option_pretzel) {
      echo "Pretzel: ". htmlentities($_POST['Pretzel'], ENT_QUOTES, "UTF-8");
   }
   if ($option_baguette) {
      echo "Baguette: ". htmlentities($_POST['Baguette'], ENT_QUOTES, "UTF-8");
   }
   if ($option_white_bread) {
      echo "White Bread: ". htmlentities($_POST['White_Bread'], ENT_QUOTES, "UTF-8");
   }
   if ($option_melona) {
      echo "Melona: ". htmlentities($_POST['Melona'], ENT_QUOTES, "UTF-8");
   }
   if ($option_world_cone) {
      echo "World Cone: ". htmlentities($_POST['World_Cone'], ENT_QUOTES, "UTF-8");
   }
   if ($option_skittles) {
      echo "Skittles: ". htmlentities($_POST['Skittles'], ENT_QUOTES, "UTF-8");
   }
   if ($option_starburst) {
      echo "Starburst: ". htmlentities($_POST['Starburst'], ENT_QUOTES, "UTF-8");
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
      echo "Udon Noodles: ". htmlentities($_POST['Udon_Noodles'], ENT_QUOTES, "UTF-8");
   }
   if ($option_soba_soodles) {
      echo "Soba Noodles: ". htmlentities($_POST['Soba_Noodles'], ENT_QUOTES, "UTF-8");
   }
   if ($option_blackberry_jam) {
      echo "Blackberry Jam: ". htmlentities($_POST['Blackberry_Jam'], ENT_QUOTES, "UTF-8");
   }
   if ($option_apricot_jam) {
      echo "Apricot Jam: ". htmlentities($_POST['Apricot_Jam'], ENT_QUOTES, "UTF-8");
   }
   if ($option_cumin) {
      echo "Cumin: ". htmlentities($_POST['Cumin'], ENT_QUOTES, "UTF-8");
   }
   if ($option_cinnamon) {
      echo "Cinnamon: ". htmlentities($_POST['Cinnamon'], ENT_QUOTES, "UTF-8");
   }
   if ($option_avocado_oil) {
      echo "Avocado Oil: ". htmlentities($_POST['Avocado_Oil'], ENT_QUOTES, "UTF-8");
   }
   if ($option_almond_oil) {
      echo "Almond Oil: ". htmlentities($_POST['Almond_Oil'], ENT_QUOTES, "UTF-8");
   }
   
  ?>
  
</body>
</html>