<?php 
/**
 * display_discount.php
 * Ajen Shireman
 * CSIT 2530 Lab3
 * 14 February 2014
 *
 * display page for app to calulate product discounts
 * This file was provided as by the textbook authors as a started file
 * Enhancements:
 *  Added code to do the stuff
 */

// Set the timezone in which are running this application
date_default_timezone_set('America/New_York');

// If the user pressed 'clear' clear the form
if ( isset($_POST['cancel']) ) {
    // unset the POST variables
    unset($_POST['product_description']);
    unset($_POST['list_price']);
    unset($_POST['discount_percent']);
    // return user to the index
    header('Location: index.php');
}

// Collect POST variables
$product_description = $_POST['product_description'];
$list_price = $_POST['list_price'];
$discount_percent = $_POST['discount_percent'];

// Validate!
// Product Description
if ( empty($product_description) ) {
    $error = 'Please enter a product description';
} 
// List price
else if ( empty($list_price) ) {
    $error = 'Please enter a list price';
}
else if ( !is_numeric($list_price) ) {
    $error = 'List price must be a valid number';
}
else if ( $list_price <= 0 ) {
    $error = 'List price must be greater than zero';
}
// Discount Percent
else if ( empty($discount_percent) ) {
    $error = 'Please enter a discount percent';
}
else if ( !is_numeric($discount_percent) ) {
    $error = 'Discount percent must be a valid number';
}
else if ( $discount_percent < 0 || $discount_percent > 100 ) {
    $error = 'Discount percent must be greater than zero and less than 100 (inclusive)';
}
// No problems
else {
    $error = '';
}

// Check for errors, and redirect to index if there are any
if ( $error != '' ) {
    include('index.php');
    exit();
}

// calculate discount amount
$discount = $list_price * ( $discount_percent / 100);

// calculate discounted price
$discount_price = $list_price - $discount;

// Format the variables
$list_price_formatted = '$'.number_format($list_price, 2);
$discount_percent_formatted = number_format($discount_percent).'%';
$discount_formatted = '$'.number_format($discount, 2);
$discount_price_formatted = '$'.number_format($discount_price, 2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
        <h1>Ajen Shireman's Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br />

        <p>&nbsp;</p>
    </div>
</body>
</html>