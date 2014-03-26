<?php
// Get the product data
$category_id = $_POST['category_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];

// Validate inputs
if (empty($code) || empty($name) || empty($price) ) {
    $error = "Invalid product data. Check all fields and try again.";
    require('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO products1
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 ('$category_id', '$code', '$name', '$price')";
    $db->query($query);

    // Display the Product List page
    require('index.php');
}
?>