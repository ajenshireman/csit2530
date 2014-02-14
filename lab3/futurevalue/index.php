<?php 
/**
 * index.php
 * Ajen Shireman
 * CSIT 2530 Lab3
 * 14 February 2014
 *
 * Start page for app to calulate future value of an investment
 * This file was provided as by the textbook authors as a started file
 * Enhancements:
 *  Added check for null values in inout boxes to prevent php error messages
 *  Added button to clear the form
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>Ajen Shireman's Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php 
                           // Added checks to each input to only display variables if they've been set
                           if ( isset($investment) ) { 
                               echo $investment; 
                           } 
                           ?>"/><br />

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php if ( isset($interest_rate) ) { echo $interest_rate; } ?>"/><br />

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php if ( isset($years) ) { echo $years; } ?>"/><br />
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/>
            <input type="submit" name="cancel" value="Clear" /><br />
        </div>

    </form>
    </div>
</body>
</html>