<?php 
/**
 * index.php
 * Ajen Shireman
 * CSIT 2530 Lab3
 * 14 February 2014
 *
 * Start page for app to calulate product discounts
 * This file was provided as by the textbook authors as a started file
 * Needed validation:
 *  All fields must be filled out
 *  list_price and discount_percent must be numeric
 *  list price must be greater than 0 (maybe equal to 0)
 *  discount_percent must be between 0 and 100 (inclusive)
 * 
 */
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
        <form action="display_discount.php" method="post">
            <div class="error">
                <?php 
                if ( !empty($error) ) {
                    echo "<p>$error</p>";                    
                }
                ?>
            </div>
            <div id="data">
                <label>Product Description:</label>
                <input type="text" name="product_description" 
                      value="<?php if ( isset($product_description) ) { echo $product_description; } ?>" /><br />

                <label>List Price:</label>
                <input type="text" name="list_price" 
                       value="<?php if ( isset($list_price) ) { echo $list_price; } ?>" /><br />

                <label>Discount Percent:</label>
                <input type="text" name="discount_percent" 
                       value="<?php if ( isset($discount_percent) ) { echo $discount_percent; } ?>" />%<br />
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate Discount" />
                <input type="submit" name="cancel" value="Clear" /><br />
            </div>

        </form>
    </div>
</body>
</html>