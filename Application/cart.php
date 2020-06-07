<?php 
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

class ShoppingCart {
    
    // need to fetch the data, name (and cost?) of the products and make it into an array

    // initialize the cart 
    public function __construct() {
        $this->order = Array();
    }

    // add product to the cart, given productname and quantity
    // --> have to insert into Becomes, Made_of tables
    public function productList ($product, $quantity) {
        // obtain the current quantity of the product
        $currentQuantity = $this->productList[$product];
        // increment the quantity of specific type of product
        $currentQuantity += $quantity;
        $this->productList[$product] = $currentQuantity;
    }

    // get the product list for the cart
    public function getProductList() {
        return $this->productList;
    }

    // print the product list 
    public function display() {
        print_r($this->order);
    }
}