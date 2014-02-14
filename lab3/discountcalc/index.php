<?php 
/**
 * index.php
 * Ajen Shireman
 * CSIT 2530 Lab3
 * 14 February 2014
 *
 * Start page for app to calulate product discounts
 * This file was provided as by the textbook authors as a started file
 * Enhancements:
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

            <div id="data">
                <label>Product Description:</label>
                <input type="text" name="product_description"/><br />

                <label>List Price:</label>
                <input type="text" name="list_price"/><br />

                <label>Discount Percent:</label>
                <input type="text" name="discount_percent"/>%<br />
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate Discount" /><br />
            </div>

        </form>
    </div>
</body>
</html>