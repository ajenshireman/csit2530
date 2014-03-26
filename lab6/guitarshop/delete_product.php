<?php
// Get IDs
$product_id = $_POST['product_id'];
$category_id = $_POST['category_id'];

// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM products1
          WHERE productID = '$product_id'";
$db->query($query);

// display the Product List page
require('index.php');
?>